<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Simulador de Financiamento • Castel Construções e Incorporações</title>
  <meta name="description" content="Simule parcelas do financiamento do seu imóvel." />
  <meta name="theme-color" content="#143a7b" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <meta property="og:title" content="Simulador de Financiamento • Castel" />
  <meta property="og:description" content="Simule parcelas do financiamento do seu imóvel." />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Castel" />

  @verbatim
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Castel Construções e Incorporações",
    "url": "https://exemplo-castel.com.br/",
    "logo": "https://exemplo-castel.com.br/img/Logo.png",
    "sameAs": ["https://www.instagram.com/castelconstrutora"]
  }
  </script>
  @endverbatim
</head>
<body>
<header class="header" role="banner">
  <div class="topbar" aria-label="Informações de contato">
    <div class="container">
      <span>Atendimento 24/7</span>
      <span class="sep">•</span>
      <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações." style="color: #fff">(84) 98800-4885</a>
      <span class="sep">•</span>
      <a href="mailto:contato@castelconstrutora.com.br" style="color:#fff;">contato@castelconstrutora.com.br</a>
    </div>
  </div>
  <div class="container navbar" role="navigation" aria-label="Principal">
    <a class="brand" href="index" aria-label="Castel - Início">
      <img src="/img/Logo.png" width="150" alt="Castel Logo" />
    </a>
    <nav class="nav" aria-label="Navegação do site">
      <a href="index">Início</a>
      <a href="sobre">Sobre Nós</a>
      <a href="empreendimentos">Empreendimentos</a>
      <a href="reservas">Reservas</a>
      <a href="avulsos">Avulsos</a>
      <a href="terraplenagem">Castel Terraplenagem</a>
      <a href="simulador" aria-current="page">Simulador</a>
      <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
      <a class="cta" href="https://www.instagram.com/castelconstrutora" target="_blank" rel="noopener">Instagram</a>
    </nav>
    <button class="hamburger" aria-label="Abrir menu"><span></span></button>
  </div>
</header>

<section class="section">
  <div class="container">
    <h2>Simulador de Financiamento</h2>
    <p class="muted">
      Estimativa com <strong>Tabela Price</strong> (juros compostos). Valores aproximados — para proposta oficial, fale com nossa equipe.
    </p>

    <form id="form-simulador" class="card" style="padding:1rem;" novalidate>
      <div class="form-grid">
        <div>
          <label for="s-valor">Valor do imóvel (R$)</label>
          <input id="s-valor" class="input" name="valor" type="number" inputmode="decimal" value="300000" step="1000" min="10000" required />
        </div>
        <div>
          <label for="s-entrada">Entrada (R$)</label>
          <input id="s-entrada" class="input" name="entrada" type="number" inputmode="decimal" value="30000" step="1000" min="0" required />
        </div>
        <div>
          <label for="s-juros">Juros a.a. (%)</label>
          <input id="s-juros" class="input" name="juros" type="number" inputmode="decimal" value="9.5" step=".1" min="0" max="50" required />
        </div>
        <div>
          <label for="s-meses">Prazo (meses)</label>
          <input id="s-meses" class="input" name="meses" type="number" value="360" step="12" min="12" max="420" required />
        </div>
      </div>

      <div class="actions" style="margin-top:.75rem; display:flex; gap:.5rem; flex-wrap:wrap;">
        <button class="btn" type="button" id="btn-simular">Simular</button>
        <button class="btn secondary" type="reset" id="btn-limpar">Limpar</button>
      </div>
    </form>

    <div id="sim-out" aria-live="polite" style="margin-top:1rem;"></div>
  </div>
</section>

<footer class="footer section" role="contentinfo">
  <div class="container">
    <div class="grid" style="grid-template-columns: 2fr 1fr 1fr;">
      <div>
        <a class="brand" href="index"><img src="/img/Logo.png" width="150" alt="Castel Logo" /></a>
        <p class="muted" style="max-width:48ch;">Construções e Incorporações. Qualidade, transparência e ética em cada empreendimento.</p>
      </div>
      <div>
        <h3 style="margin:.25rem 0;">Contato</h3>
        <p><a href="mailto:contato@castelconstrutora.com.br">contato@castelconstrutora.com.br</a><br>
        <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações." style="color: #fff">(84) 98800-4885</a>
        <p>Logradouro: Rua Seis de Janeiro, 1837 <br>
 Bairro: Santo Antonio <br>
 Município/UF: Mossoró, RN</p>
      </div>
      <div>
        <h3 style="margin:.25rem 0;">Navegação</h3>
        <p>
          <a href="sobre">Sobre Nós</a><br>
          <a href="empreendimentos">Empreendimentos</a><br>
          <a href="reservas">Reservas</a><br>
          <a href="terraplenagem">Terraplenagem</a><br>
          <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
        </p>
      </div>
    </div>
    <div class="subfooter">
      © <span id="year"></span> Castel Construções e Incorporações — Todos os direitos reservados.
    </div>
  </div>
</footer>

<a id="wa-fab" class="whatsapp-fab" aria-label="Fale no WhatsApp" target="_blank" rel="noopener" href="#">
  <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0012 0C5.39 0 .03 5.36.03 12a11.9 11.9 0 001.6 6L0 24l6.2-1.62a11.9 11.9 0 005.8 1.48h.01c6.61 0 11.97-5.36 11.97-12 0-3.2-1.25-6.2-3.46-8.38z"/></svg>
</a>

<script src="main.js"></script>
<script src="simulador.js"></script>
<script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html>
