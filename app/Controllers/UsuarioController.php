<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController
{
    // Lista os usuários cadastrados
    public function listar()
    {
        $lista_usuarios = Usuario::buscarTodos();

        render("usuarios/lista_usuarios.php", [
            'title' => "Usuários da Loja Flamengo",
            'usuarios' => $lista_usuarios
        ]);
    }

    // Editar dados do usuário
    public function editar($id)
    {
        $usuario = Usuario::buscarPorId($id);

        if (!$usuario) {
            header('Location: /usuarios');
            exit;
        }

        render("usuarios/form_usuarios.php", [
            'title' => "Editar Usuário",
            'dados' => $usuario
        ]);
    }

    // Exclusão lógica
    public function excluir($id)
    {
        Usuario::softDelete($id);
        header('Location: /usuarios');
        exit;
    }

    // Exclusão física
    public function excluirFisico($id) {
        Usuario::fisicalDelete($id);
        header('Location: /usuarios');
        exit;
    }

    // Salvar ou atualizar usuário
    public function salvar()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        // Sanitização básica dos dados
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'cpf' => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_nascimento' => $_POST['data_nascimento'] ?? '',
            'celular' => filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_SPECIAL_CHARS),
            'rua' => filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS),
            'numero' => filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS),
            'complemento' => filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS),
            'bairro' => filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS),
            'cidade' => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'cep' => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS),
            'estado' => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'nivel_acesso' => filter_input(INPUT_POST, 'nivel_acesso', FILTER_DEFAULT),
            'genero' => filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS),
            'senha' => filter_input(INPUT_POST, 'senha', FILTER_DEFAULT)
        ];

        // Validações
        $erros = [];

        if (empty($dados['nome'])) {
            $erros[] = 'O campo NOME não pode ficar vazio.';
        } else if (strlen($dados['nome']) < 4) {
            $erros[] = 'O nome deve ter pelo menos 4 caracteres.';
        }

        // Retorna ao formulário em caso de erro
        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $dados['id_usuario'] = $id;
            $_SESSION['dados'] = $dados;

            if ($id) {
                header('Location: /usuarios/editar?id=' . $id);
            } else {
                header('Location: /usuarios/inserir');
            }
            exit;
        }

        // Decide entre criar ou atualizar
        if ($id) {
            Usuario::atualizar($id, $dados);
        } else {
            Usuario::salvar($dados);
        }

        header('Location: /usuarios');
        exit;
    }
}
