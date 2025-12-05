<?php 
namespace App\Core;

use PDO;
use PDOException;

class Database {

    // Conexão com o banco da Loja Flamengo
    public static function conectar(){
        $host   = '127.0.0.1';
        $porta  = '3306';
        $banco  = 'loja_flamengo';
        $usuario = 'root';
        $senha   = ''; // Ajuste conforme seu MySQL

        // Montagem correta do DSN
        $dsn = "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $usuario, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            die("Erro ao conectar: " . $e->getMessage());
        }
    }
}
