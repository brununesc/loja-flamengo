<?php
namespace App\Models;

use PDO;
use App\Core\Database;
use PDOException;

class Usuario {

    // Buscar todos os usuários
    public static function buscarTodos() {
        $pdo = Database::conectar();
        $sql = "SELECT * FROM usuarios";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar usuário por ID
    public static function buscarPorId($id) {
        $pdo = Database::conectar();
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Salvar novo usuário
    public static function salvar($dados) {
        try {
            $pdo = Database::conectar();
            $senha_criptografada = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios (nome, cpf, data_nascimento, celular, rua, numero, complemento, bairro, cidade, cep, estado, email, nivel_acesso, genero, senha, torcedor)";
            $sql .= " VALUES (:nome, :cpf, :data_nascimento, :celular, :rua, :numero, :complemento, :bairro, :cidade, :cep, :estado, :email, :nivel_acesso, :genero, :senha, :torcedor)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento'], PDO::PARAM_STR);
            $stmt->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
            $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
            $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
            $stmt->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
            $stmt->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);

            // Níveis de acesso: torcedor, vendedor, admin
            $nivel = $dados['nivel_acesso'] ?? 'torcedor';
            $stmt->bindParam(':nivel_acesso', $nivel, PDO::PARAM_STR);

            $stmt->bindParam(':genero', $dados['genero'], PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha_criptografada, PDO::PARAM_STR);

            // Campo torcedor fixo Flamengo
            $torcedor = 'Flamengo';
            $stmt->bindParam(':torcedor', $torcedor, PDO::PARAM_STR);

            $stmt->execute();

            return $pdo->lastInsertId();

        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
            exit;
        }
    }

    // Atualizar usuário
    public static function atualizar($id, $dados) {
        try {
            $pdo = Database::conectar();
            $senha_criptografada = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "UPDATE usuarios SET nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento, celular = :celular, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, cep = :cep, estado = :estado, email = :email, nivel_acesso = :nivel_acesso, genero = :genero, senha = :senha WHERE id = :id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento'], PDO::PARAM_STR);
            $stmt->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
            $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
            $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
            $stmt->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
            $stmt->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $stmt->bindParam(':nivel_acesso', $dados['nivel_acesso'], PDO::PARAM_STR);
            $stmt->bindParam(':genero', $dados['genero'], PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha_criptografada, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao atualizar usuário: " . $e->getMessage();
            exit;
        }
    }

    // Deletar usuário
    public static function deletar($id) {
        try {
            $pdo = Database::conectar();
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
            exit;
        }
    }
}
