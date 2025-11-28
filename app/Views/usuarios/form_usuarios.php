<main class="container my-5">
  <div class="container my-5">
    <div class="card shadow-sm">
      <div class="card-body p-4 p-md-5">

        <h2 class="mb-4 text-danger">Cadastrar Torcedor / Cliente - Loja Flamengo</h2>

        <form action="index.html" method="POST">

          <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo:</label>
            <input
              type="text"
              class="form-control"
              id="nome"
              placeholder="Ex: João da Nação Rubro-Negra"
              name="nome"
              required
            />
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="exemplo@flamengo.com"
              name="email"
              required
            />
          </div>

          <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input
              type="text"
              class="form-control"
              id="cpf"
              placeholder="000.000.000-00"
              name="cpf"
            />
          </div>

          <div class="mb-3">
            <label for="celular" class="form-label">Celular:</label>
            <input
              type="text"
              class="form-control"
              id="celular"
              placeholder="(DDD) 90000-0000"
              name="celular"
            />
          </div>

          <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input
              type="date"
              class="form-control"
              id="data_nascimento"
              name="data_nascimento"
            />
          </div>

          <div class="mb-3">
            <label for="genero" class="form-label">Gênero:</label>
            <select class="form-select" id="genero" name="genero">
              <option value="">Selecione</option>
              <option value="M">Masculino</option>
              <option value="F">Feminino</option>
              <option value="O">Outro</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input
              type="text"
              class="form-control"
              id="cidade"
              placeholder="Ex: Rio de Janeiro"
              name="cidade"
            />
          </div>

          <button type="submit" class="btn btn-danger">Cadastrar</button>
          <button type="button" class="btn btn-secondary">Voltar</button>
          <button type="reset" class="btn btn-dark">Limpar</button>

        </form>

      </div>
    </div>
  </div>
</main>
