<?php
// Desenvolvido por: Bruna Nunes de Carvalho
namespace App\Models;

use PDO;
use PDOException;
use App\Core\Database;

class Usuario
{
    // Lista todos os usuários ativos
    public static function buscarTodos()
    {
        $pdo = Database::conectar();
        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL";
        return $pdo->query($sql)->fetchAll();
    }

    // Busca usuário pelo ID
    public static function buscarPorId($id)
    {
        $pdo = Database::conectar();

        $sql = "SELECT * FROM usuarios 
                WHERE id_usuario = :id AND deleted_at IS NULL";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    // Busca usuário pelo e-mail
    public static function buscarPorEmail($email)
    {
        $pdo = Database::conectar();

        $sql = "SELECT * FROM usuarios 
                WHERE email = :email AND deleted_at IS NULL";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }

    // Salva novo usuário
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            $senha_hash = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios 
                    (nome, cpf, data_nascimento, celular, rua, numero, complemento, bairro, cidade, cep, estado, email, nivel_acesso, genero, senha)
                    VALUES
                    (:nome, :cpf, :data_nascimento, :celular, :rua, :numero, :complemento, :bairro, :cidade, :cep, :estado, :email, :nivel_acesso, :genero, :senha)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':celular', $dados['celular']);
            $stmt->bindParam(':rua', $dados['rua']);
            $stmt->bindParam(':numero', $dados['numero']);
            $stmt->bindParam(':complemento', $dados['complemento']);
            $stmt->bindParam(':bairro', $dados['bairro']);
            $stmt->bindParam(':cidade', $dados['cidade']);
            $stmt->bindParam(':cep', $dados['cep']);
            $stmt->bindParam(':estado', $dados['estado']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':nivel_acesso', $dados['nivel_acesso']);
            $stmt->bindParam(':genero', $dados['genero']);
            $stmt->bindParam(':senha', $senha_hash);

            $stmt->execute();
            return (int) $pdo->lastInsertId();

        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

    // Atualiza um usuário existente
    public static function atualizar($id, $dados)
    {
        $pdo = Database::conectar();

        // Atualiza com ou sem senha
        if (!empty($dados['senha'])) {
            $senha_hash = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "UPDATE usuarios SET
                    nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento,
                    celular = :celular, rua = :rua, numero = :numero,
                    complemento = :complemento, bairro = :bairro, cidade = :cidade,
                    cep = :cep, estado = :estado, email = :email,
                    nivel_acesso = :nivel_acesso, genero = :genero,
                    senha = :senha, updated_at = NOW()
                    WHERE id_usuario = :id";
        } else {
            $sql = "UPDATE usuarios SET
                    nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento,
                    celular = :celular, rua = :rua, numero = :numero,
                    complemento = :complemento, bairro = :bairro, cidade = :cidade,
                    cep = :cep, estado = :estado, email = :email,
                    nivel_acesso = :nivel_acesso, genero = :genero,
                    updated_at = NOW()
                    WHERE id_usuario = :id";
        }

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':cpf', $dados['cpf']);
        $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
        $stmt->bindParam(':celular', $dados['celular']);
        $stmt->bindParam(':rua', $dados['rua']);
        $stmt->bindParam(':numero', $dados['numero']);
        $stmt->bindParam(':complemento', $dados['complemento']);
        $stmt->bindParam(':bairro', $dados['bairro']);
        $stmt->bindParam(':cidade', $dados['cidade']);
        $stmt->bindParam(':cep', $dados['cep']);
        $stmt->bindParam(':estado', $dados['estado']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':nivel_acesso', $dados['nivel_acesso']);
        $stmt->bindParam(':genero', $dados['genero']);

        if (!empty($dados['senha'])) {
            $stmt->bindParam(':senha', $senha_hash);
        }

        return $stmt->execute();
    }

    // Exclusão lógica
    public static function softDelete($id)
    {
        $pdo = Database::conectar();
        $sql = "UPDATE usuarios SET deleted_at = NOW() WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Exclusão física
    public static function fisicalDelete($id)
    {
        $pdo = Database::conectar();
        $sql = "DELETE FROM usuarios WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
