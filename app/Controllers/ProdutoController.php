<?php

namespace App\Controllers;

use App\Models\Produto;

class ProdutoController
{
    // Lista os produtos cadastrados
    public function listar()
    {
        $lista_produtos = Produto::buscarTodos();

        render("produtos/lista_produtos.php", [
            'title' => "Produtos do Flamengo",
            'produtos' => $lista_produtos
        ]);
    }

    // Editar um produto existente
    public function editar($id) {
        $produto = Produto::buscarPorId($id);

        if (!$produto) {
            header('Location: /produtos');
            exit;
        }

        render("produtos/form_produtos.php", [
            'title' => "Editar Produto do Flamengo",
            'dados' => $produto
        ]);
    }

    // Exclusão lógica
    public function excluir($id) {
        Produto::softDelete($id);
        header('Location: /produtos');
        exit;
    }

    // Salvar ou atualizar produto
    public function salvar()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'descricao' => filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'valor_un' => filter_input(INPUT_POST, 'valor_un', FILTER_SANITIZE_SPECIAL_CHARS),
            'categoria' => filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS)
        ];

        // Validações básicas
        $erros = [];

        if (empty($dados['nome'])) {
            $erros[] = 'O campo NOME não pode ficar vazio.';
        } else if (strlen($dados['nome']) < 4) {
            $erros[] = 'O nome deve ter pelo menos 4 caracteres.';
        }

        // Caso haja erros, retorna ao formulário
        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $dados['id_produto'] = $id;
            $_SESSION['dados'] = $dados;

            if ($id) {
                header('Location: /produtos/editar?id=' . $id);
            } else {
                header('Location: /produtos/inserir');
            }
            exit;
        }

        // Decide entre atualizar ou criar
        if ($id) {
            Produto::update($id, $dados);
        } else {
            Produto::salvar($dados);
        }

        header('Location: /produtos');
        exit;
    }
}
