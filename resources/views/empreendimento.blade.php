<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Empreendimento • Castel</title>
  <link rel="stylesheet" href="/style.css" />
</head>
<body>
  <header class="header">
    <div class="container navbar">
      <a class="brand" href="/index"><img src="/img/Logo.png" width="150" alt="Castel Logo"></a>
      <nav class="nav">
        <a href="/index">Início</a>
        <a href="/empreendimentos">Empreendimentos</a>
        <a href="/simulador">Simulador</a>
      </nav>
      <button class="hamburger" aria-label="Abrir menu"><span></span></button>
    </div>
  </header>

  <main class="section">
    <div class="container" id="detalhe-empreendimento"></div>
  </main>

  <footer class="footer section">
    <div class="container">© <span id="year"></span> Castel</div>
  </footer>

  <script src="/main.js"></script>
  <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html>
