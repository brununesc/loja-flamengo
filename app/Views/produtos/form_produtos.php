<main class="container my-5">
  <div class="container my-5">
    <div class="card shadow-sm">
      <div class="card-body p-4 p-md-5">

        <h2 class="mb-4 text-danger">Cadastrar Produto</h2>

        <form action="index.html" method="POST">

          <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto:</label>
            <input
              type="text"
              class="form-control"
              id="nome"
              placeholder="Ex: Camisa Oficial Flamengo 2025"
              name="nome"
              required
            />
          </div>

          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto:</label>
            <textarea
              class="form-control"
              id="descricao"
              rows="3"
              placeholder="Descrição detalhada do item do Mengão"
              name="descricao"
              required
            ></textarea>
          </div>

          <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade em Estoque:</label>
            <input
              type="number"
              class="form-control"
              id="quantidade"
              name="quantidade"
              required
            />
          </div>

          <div class="mb-3">
            <label for="valor_unitario" class="form-label">Valor Unitário (R$):</label>
            <input
              type="text"
              class="form-control"
              id="valor_unitario"
              name="valor_unitario"
              placeholder="Ex: 199.90"
              required
            />
          </div>

          <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <select class="form-select" id="categoria" name="categoria" required>
              <option value="">Selecione</option>
              <option value="vestuario">Vestuário</option>
              <option value="calcados">Calçados</option>
              <option value="colecionaveis">Colecionáveis</option>
              <option value="acessorios">Acessórios</option>
              <option value="esporte">Esportes</option>
            </select>
          </div>

          <button type="submit" class="btn btn-danger">Cadastrar</button>
          <button type="button" class="btn btn-secondary">Voltar</button>
          <button type="reset" class="btn btn-dark">Limpar</button>

        </form>

      </div>
    </div>
  </div>
</main>
