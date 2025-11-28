<?php
namespace App\Models;

use PDO;
use App\Core\Database;
use PDOException;

class Produto {

    // Buscar todos os produtos
    public static function buscarTodos() {
        $pdo = Database::conectar();
        $sql = "SELECT * FROM produtos";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar produto por ID
    public static function buscarPorId($id) {
        $pdo = Database::conectar();
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Salvar novo produto
    public static function salvar($dados) {
        try {
            $pdo = Database::conectar();

            $sql = "INSERT INTO produtos (nome, descricao, quantidade, valor_un, categoria, clube)";
            $sql .= " VALUES (:nome, :descricao, :quantidade, :valor_un, :categoria, :clube)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
            $stmt->bindParam(':valor_un', $dados['valor_un'], PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);
            $clube = 'Flamengo';
            $stmt->bindParam(':clube', $clube, PDO::PARAM_STR);

            $stmt->execute();

            return $pdo->lastInsertId();

        } catch (PDOException $e) {
            echo "Erro ao inserir produto: " . $e->getMessage();
            exit;
        }
    }

    // Atualizar produto
    public static function atualizar($id, $dados) {
        try {
            $pdo = Database::conectar();
            $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, quantidade = :quantidade, valor_un = :valor_un, categoria = :categoria WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
            $stmt->bindParam(':valor_un', $dados['valor_un'], PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar produto: " . $e->getMessage();
            exit;
        }
    }

    // Deletar produto
    public static function deletar($id) {
        try {
            $pdo = Database::conectar();
            $sql = "DELETE FROM produtos WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar produto: " . $e->getMessage();
            exit;
        }
    }
}
