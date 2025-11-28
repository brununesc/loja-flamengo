<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Loja Flamengo' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="d-flex flex-column">

    <header class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="/" class="navbar-brand fw-bold">
                Loja Flamengo
            </a>

            <nav>
                <a href="/" class="nav-link d-inline text-light">Início</a>
                <a href="/produtos" class="nav-link d-inline text-light">Produtos</a>
                <a href="/usuarios" class="nav-link d-inline text-light">Usuários</a>
                <a href="/sobre" class="nav-link d-inline text-light">Sobre</a>
            </nav>
        </div>
    </header>

    <main class="flex-fill container my-4">
        <?= $content ?>
    </main>

    <footer class="footer-site mt-auto">
        <p class="mb-0">Loja Oficial do Flamengo</p>
        <p class="mb-0">Desenvolvido por Bruna Nunes de Carvalho</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>

</body>
</html>
