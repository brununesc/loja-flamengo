<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700;900&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="/css/styles.css" />

  <title><?= $title ?></title>

  <!-- Ícones -->
  <link rel="icon" type="image/png" href="/imgs/flamengo-icon.png" sizes="96x96" />
  <link rel="shortcut icon" href="/imgs/flamengo-icon.png" />

</head>

<body>

  <div class="superinfo-bg">
    <div class="superinfo">
      <p>Atendimento: Seg. a Sáb. - 09h às 18h</p>
      <a href="tel:5514991112222">+55 14 99111-2222</a>
      <p>Rio de Janeiro - Oficial</p>
    </div>
  </div>

  <header class="menu-bg">
    <div class="menu">
      <div class="menu-logo">
        <a href="#">Loja Flamengo</a>
      </div>

      <nav class="menu-nav">
        <ul>
          <li><a href="#sobre">Sobre</a></li>
          <li><a href="#produtos">Produtos</a></li>
          <li><a href="#planos">Planos</a></li>
          <li><a href="#qualidade">Qualidade</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Texto de introdução -->
  <h1 class="introducao">Onde a Paixão Rubro-Negra<br>Encontra os Melhores Produtos</h1>
  <h1><?= $lenda ?></h1>

  <section class="sobre" id="sobre">
    <div class="sobre-info">
      <h1>Sobre</h1>
      <p>
        A Loja Flamengo é o espaço oficial para quem carrega o amor pelo Mengão no peito.
        Aqui você encontra produtos licenciados, qualidade premium e lançamentos exclusivos
        para colecionadores e torcedores apaixonados.
      </p>
      <p>
        Nosso compromisso é entregar autenticidade, estilo e a verdadeira identidade rubro-negra
        em cada peça. Seja para jogos, dia a dia ou coleção, o Flamengo está sempre com você.
      </p>
    </div>

    <div class="sobre-img">
      <img src="/imgs/flamengo-sobre1.jpg" alt="Torcida Flamengo">
    </div>

    <div class="sobre-img">
      <img src="/imgs/flamengo-sobre2.jpg" alt="Produtos Flamengo">
    </div>
  </section>

  <section class="produtos" id="produtos">
    <h1>Produtos</h1>

    <div class="produtos-container">
      <div class="produtos-item red">
        <h2>Camisetas</h2>
        <img src="/imgs/produto-camisa.png" alt="Camisa Flamengo">
      </div>
      <div class="produtos-item black">
        <h2>Agasalhos</h2>
        <img src="/imgs/produto-agasalho.png" alt="Agasalho Flamengo">
      </div>
      <div class="produtos-item red">
        <h2>Acessórios</h2>
        <img src="/imgs/produto-boné.png" alt="Boné Flamengo">
      </div>
    </div>
  </section>

  <!-- Planos podem ser utilizados para combos de produtos -->
  <section class="preco" id="planos">
    <div class="preco-item">
      <h2>Plano Bronze</h2>
      <span><sup>R$</sup>59</span>
      <ul>
        <li>Camiseta Casual</li>
        <li>Adesivo Oficial</li>
        <li>Garantia de Autenticidade</li>
        <li>Suporte ao Cliente</li>
      </ul>
      <a href="#">Comprar</a>
    </div>

    <div class="preco-item">
      <h2>Plano Prata</h2>
      <span><sup>R$</sup>129</span>
      <ul>
        <li>Camiseta Oficial 2025</li>
        <li>Bandeira Rubro-Negra</li>
        <li>Chaveiro Exclusivo</li>
        <li>Frete com Desconto</li>
      </ul>
      <a href="#">Comprar</a>
    </div>

    <div class="preco-item">
      <h2>Plano Ouro</h2>
      <span><sup>R$</sup>249</span>
      <ul>
        <li>Camiseta Oficial + Agasalho</li>
        <li>Acessório Premium</li>
        <li>Box Exclusivo</li>
        <li>Suporte Prioritário</li>
        <li>Frete Grátis Brasil</li>
      </ul>
      <a href="#">Comprar</a>
    </div>
  </section>

  <section class="qualidade" id="qualidade">
    <div class="qualidade-item">
      <h2>Produto Oficial</h2>
      <p>Garantia de autenticidade e qualidade do Flamengo.</p>
    </div>

    <div class="qualidade-item">
      <h2>Atendimento Humanizado</h2>
      <p>Suporte dedicado para torcedores e colecionadores.</p>
    </div>

    <div class="qualidade-item">
      <h2>Entrega Segura</h2>
      <p>Rastreio completo e embalagem reforçada.</p>
    </div>

    <div class="qualidade-item">
      <h2>Novidades Constantes</h2>
      <p>Lançamentos e coleções especiais durante todo o ano.</p>
    </div>
  </section>

  <section class="newsletter">
    <div class="newsletter-info">
      <h1>Newsletter</h1>
      <p>Receba lançamentos e promoções exclusivas do Mengão!</p>
    </div>

    <form class="newsletter-form">
      <input type="email" placeholder="Seu e-mail" />
      <button type="submit">Assinar</button>
    </form>
  </section>

  <footer class="footer">
    <p>LOJA FLAMENGO © 2025 - Desenvolvido por Bruna Nunes de Carvalho</p>
  </footer>

</body>

</html>
