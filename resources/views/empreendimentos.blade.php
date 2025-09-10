<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Empreendimentos • Castel</title>
  <link rel="stylesheet" href="/style.css" />
</head>
<body>
  <header class="header">
    <div class="container navbar">
      <a class="brand" href="/index"><img src="/img/Logo.png" width="150" alt="Castel Logo"></a>
      <nav class="nav">
        <a href="/index">Início</a>
        <a href="/empreendimentos" aria-current="page">Empreendimentos</a>
        <a href="/simulador">Simulador</a>
      </nav>
      <button class="hamburger" aria-label="Abrir menu"><span></span></button>
    </div>
  </header>

  <main class="section">
    <div class="container">
      <h1>Empreendimentos</h1>

      <!-- Filtros simples (não quebram o JS) -->
      <form id="form-filtro" class="card" style="padding:1rem; margin-bottom:1rem;">
        <div class="form-grid">
          <div><label>Status</label>
            <select id="f-status"><option value="">Todos</option><option value="lancamento">Lançamento</option></select>
          </div>
          <div><label>Cidade</label><input id="f-cidade" class="input" placeholder="Natal"></div>
          <div><label>Preço mín.</label><input id="f-preco-min" class="input" type="number"></div>
          <div><label>Preço máx.</label><input id="f-preco-max" class="input" type="number"></div>
          <div><label>Metragem mín.</label><input id="f-area-min" class="input" type="number"></div>
          <div><label>Quartos</label>
            <select id="f-quartos"><option value="">Todos</option><option>1</option><option>2</option></select>
          </div>
        </div>
      </form>

      <!-- Onde o JS desenha o(s) card(s) -->
      <div id="grid-empreendimentos" class="grid cols-3" aria-live="polite"></div>
    </div>
  </main>

  <footer class="footer section">
    <div class="container">© <span id="year"></span> Castel</div>
  </footer>

  <script src="/main.js"></script>
  <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html>
