<?php

require_once "Usuario.php";
require_once "UsuarioDAO.php";

class UsuarioController {

    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function listar() {
        return $this->usuarioDAO->listar();
    }

    public function salvar($dados) {
        $usuario = new Usuario();

        $usuario->setNome($dados['nome']);
        $usuario->setEmail($dados['email']);
        $usuario->setSenha($dados['senha']);

        if (empty($dados['id'])) {
            // Cadastro de novo usuário
            $this->usuarioDAO->inserir($usuario);
        } else {
            // Atualização de usuário existente
            $usuario->setId($dados['id']);
            $this->usuarioDAO->atualizar($usuario);
        }
    }

    public function buscarPorId($id) {
        return $this->usuarioDAO->buscarPorId($id);
    }

    public function excluir($id) {
        return $this->usuarioDAO->excluir($id);
    }
}
?>
