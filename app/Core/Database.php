<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {

    // Conexão com o banco da Loja Flamengo
    public static function conectar() {
        $host = '127.0.0.1';
        $porta = '3306';

        // Ajustado apenas o nome do banco para o tema Flamengo
        $banco = 'loja_flamengo';

        $usuario = 'root';
        $senha = 'root';
        
        $dsn = "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8";
        
        try {
            return new PDO($dsn, $usuario, $senha, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        } catch (PDOException $e) {
            die("Erro na conexão com o banco da Loja Flamengo: " . $e->getMessage());
        }
    }
}
