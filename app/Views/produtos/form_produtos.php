<main class="container my-5">
  <div class="container my-5">
    <div class="card shadow-sm">
      <div class="card-body p-4 p-md-5">

        <!-- Título muda automaticamente entre Cadastro e Edição -->
        <h2 class="mb-4">
          <?= isset($dados['id_produto']) ? 'Editar Produto' : 'Cadastro de Produtos' ?>
        </h2>

        <form action="/produtos/salvar" method="POST">

          <input type="hidden" name="id" value="<?= $dados['id_produto'] ?? '' ?>">

          <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto:</label>
            <input
              type="text"
              class="form-control"
              id="nome"
              name="nome"
              placeholder="Digite o Nome do Produto"
              value="<?= $dados['nome'] ?? '' ?>"
              required />
          </div>

          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto:</label>
            <input
              type="text"
              class="form-control"
              id="descricao"
              name="descricao"
              value="<?= $dados['descricao'] ?? '' ?>"
              required />
          </div>

          <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input
              type="number"
              class="form-control"
              id="quantidade"
              name="quantidade"
              value="<?= $dados['quantidade'] ?? '' ?>"
              required />
          </div>

          <div class="mb-3">
            <label for="valor_un" class="form-label">Valor Unitário:</label>
            <input
              type="number"
              step="0.01"
              class="form-control"
              id="valor_un"
              name="valor_un"
              placeholder="0.00"
              value="<?= $dados['valor_un'] ?? '' ?>"
              required />
          </div>

          <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input
              type="text"
              class="form-control"
              id="categoria"
              name="categoria"
              value="<?= $dados['categoria'] ?? '' ?>"
              required />
          </div>

          <button type="submit" class="btn btn-success">Salvar</button>
          <a href="/produtos" class="btn btn-warning">Voltar</a>
          <button type="reset" class="btn btn-danger">Limpar</button>

        </form>
      </div>
    </div>
  </div>
</main>
