<?php
// Desenvolvido por: Bruna Nunes de Carvalho
namespace App\Models;

use PDO;
use PDOException;
use App\Core\Database;

class Produto
{
    // Lista todos os produtos não excluídos
    public static function buscarTodos()
    {
        try {
            $pdo = Database::conectar();
            $sql = "SELECT * FROM produtos WHERE deleted_at IS NULL";
            return $pdo->query($sql)->fetchAll();
        } catch (PDOException $e) {
            echo "<h2>Erro ao listar produtos</h2>";
            echo $e->getMessage();
            exit;
        }
    }

    // Busca produto pelo ID
    public static function buscarPorId($id)
    {
        try {
            $pdo = Database::conectar();
            $sql = "SELECT * FROM produtos 
                    WHERE id_produto = :id AND deleted_at IS NULL";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "<h2>Erro ao buscar produto</h2>";
            echo $e->getMessage();
            exit;
        }
    }

    // Insere novo produto
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            $sql = "INSERT INTO produtos 
                        (nome, descricao, quantidade, valor_un, categoria)
                    VALUES
                        (:nome, :descricao, :quantidade, :valor_un, :categoria)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
            $stmt->bindParam(':valor_un', $dados['valor_un'], PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);

            $stmt->execute();
            return $pdo->lastInsertId();

        } catch (PDOException $e) {
            echo "<h2>Erro ao salvar produto</h2>";
            echo $e->getMessage();
            exit;
        }
    }

    // Atualiza produto existente
    public static function update($id, $dados)
    {
        try {
            $pdo = Database::conectar();

            $sql = "UPDATE produtos SET
                        nome = :nome,
                        descricao = :descricao,
                        quantidade = :quantidade,
                        valor_un = :valor_un,
                        categoria = :categoria,
                        updated_at = NOW()
                    WHERE id_produto = :id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
            $stmt->bindParam(':valor_un', $dados['valor_un'], PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "<h2>Erro ao atualizar produto</h2>";
            echo $e->getMessage();
            exit;
        }
    }

    // Soft delete (exclusão lógica)
    public static function softDelete($id)
    {
        try {
            $pdo = Database::conectar();
            $sql = "UPDATE produtos SET deleted_at = NOW() WHERE id_produto = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "<h2>Erro ao excluir produto</h2>";
            echo $e->getMessage();
            exit;
        }
    }

    // Exclusão permanente
    public static function fisicalDelete($id)
    {
        try {
            $pdo = Database::conectar();
            $sql = "DELETE FROM produtos WHERE id_produto = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "<h2>Erro ao excluir permanentemente</h2>";
            echo $e->getMessage();
            exit;
        }
    }
}
