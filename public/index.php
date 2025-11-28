<?php
// Importa o autoload do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php'; 

use App\Controllers\UsuarioController;
use App\Controllers\ProdutoController;
use App\Models\Usuario;
use App\Models\Produto;

// Função para renderizar as telas com layout
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
    ob_start();
    require __DIR__ . '/../app/Views/' . $view;
}

// Obtém a URL do navegador
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// NAVEGAÇÃO GERAL

if ($url == "/" || $url == "/index.php") {
    render_sem_template('/home.php', [
        'title' => 'Bem-vindo à Loja do Flamengo!',
        'lenda' => 'Aqui o Mengão domina tudo!'
    ]);
} else if ($url == "/sobre") {
    render('sobre.php', ['title' => 'Sobre a Loja Flamengo']);
}

// USUÁRIOS

else if ($url == "/usuarios") {
    $controller = new UsuarioController();
    $controller->listar();
    render('usuarios/lista_usuarios.php', ['title' => 'Lista de Usuários']);
}

else if ($url == "/usuarios/inserir") {
    render('usuarios/form_usuarios.php', ['title' => 'Cadastrar Usuário']);
}

// PRODUTOS

else if ($url == "/produtos") {
    render('produtos/lista_produtos.php', ['title' => 'Listar Produtos']);
} else if ($url == "/produtos/inserir") {
    render('produtos/form_produtos.php', ['title' => 'Cadastrar Produto']);
}
