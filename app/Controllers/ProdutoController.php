<?php

require_once "Produto.php";
require_once "ProdutoDAO.php";

class ProdutoController {

    private $produtoDAO;

    public function __construct() {
        $this->produtoDAO = new ProdutoDAO();
    }

    public function listar() {
        return $this->produtoDAO->listar();
    }

    public function salvar($dados) {
        $produto = new Produto();

        $produto->setNome($dados['nome']);
        $produto->setDescricao($dados['descricao']);
        $produto->setPreco($dados['preco']);
        $produto->setImagem($dados['imagem']);

        if (empty($dados['id'])) {
            // Cadastro de novo produto
            $this->produtoDAO->inserir($produto);
        } else {
            // Edição de produto
            $produto->setId($dados['id']);
            $this->produtoDAO->atualizar($produto);
        }
    }

    public function buscarPorId($id) {
        return $this->produtoDAO->buscarPorId($id);
    }

    public function excluir($id) {
        return $this->produtoDAO->excluir($id);
    }
}
?>
