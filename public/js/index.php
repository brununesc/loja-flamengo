<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UsuarioController;
use App\Controllers\ProdutoController;

function render($view, $data = [])
{
    extract($data);
    ob_start();
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    require __DIR__ . '/../app/Views/layouts/base.php';
}

function render_sem_template($view, $data = [])
{
    extract($data);
    require __DIR__ . '/../app/Views/' . $view;
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$usuarioCtrl = new UsuarioController();
$produtoCtrl  = new ProdutoController();

/* ------------------------- ROTAS GERAIS ------------------------- */

if ($url === "/" || $url === "/index.php") {

    render_sem_template('home.php', [
        'title' => 'Bem-vindo!',
        'lenda' => 'Agora eu sou uma lêndia do PHP!'
    ]);

} else if ($url === "/sobre") {

    render('sobre.php', ['title' => 'Sobre a Página']);


/* ------------------------- ROTAS DE USUÁRIOS ------------------------- */

} else if ($url === "/usuarios") {

    $usuarioCtrl->listar();

} else if ($url === "/usuarios/inserir") {

    render('usuarios/form_usuarios.php', [
        'title' => 'Cadastrar Usuário!',
        'dados' => []
    ]);

} else if ($url === "/usuarios/editar") {

    if (isset($_GET['id'])) {
        $usuarioCtrl->editar($_GET['id']);
    } else {
        header('Location: /usuarios');
    }

} else if ($url === "/usuarios/excluir") {

    if (isset($_GET['id'])) {
        $usuarioCtrl->excluir($_GET['id']);
    } else {
        header('Location: /usuarios');
    }

} else if ($url === "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuarioCtrl->salvar();


/* ------------------------- ROTAS DE PRODUTOS ------------------------- */

} else if ($url === "/produtos") {

    $produtoCtrl->listar();

} else if ($url === "/produtos/inserir") {

    render('produtos/form_produtos.php', [
        'title' => 'Cadastrar Produto!',
        'dados' => []
    ]);

} else if ($url === "/produtos/editar") {

    if (isset($_GET['id'])) {
        $produtoCtrl->editar($_GET['id']);
    } else {
        header('Location: /produtos');
    }

} else if ($url === "/produtos/excluir") {

    if (isset($_GET['id'])) {
        $produtoCtrl->excluir($_GET['id']);
    } else {
        header('Location: /produtos');
    }

} else if ($url === "/produtos/salvar" && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $produtoCtrl->salvar();


/* ------------------------- 404 ------------------------- */

} else {

    echo "<h1>Erro 404 - Página não encontrada.</h1>";
}
