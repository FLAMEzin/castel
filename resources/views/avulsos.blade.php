<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Avulsos • Castel Construções e Incorporações</title>
  <meta name="description" content="Imóveis avulsos disponíveis na Castel." />
  <meta name="theme-color" content="#143a7b">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <meta property="og:title" content="Avulsos • Castel">
  <meta property="og:description" content="Imóveis avulsos disponíveis na Castel.">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Castel">

  @verbatim
    <script type="application/ld+json">
    {"@context": "https://schema.org", "@type": "Organization", "name": "Castel Construções e Incorporações", "url": "https://exemplo-castel.com.br/", "logo": "https://exemplo-castel.com.br/assets/img/logo.png", "sameAs": ["https://www.instagram.com/"]}
    </script>
  @endverbatim

</head>

<body>
  <header class="header" role="banner">
    <div class="topbar" aria-label="Informações de contato">
      <div class="container">
        <span>Atendimento 24/7</span>
        <span class="sep">•</span>
        <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações."
          style="color: #fff">(84) 98800-4885</a>
        <span class="sep">•</span>
        <a href="mailto:contato@castelconstrutora.com.br" style="color:#fff;">contato@castelconstrutora.com.br</a>
      </div>
    </div>
    <div class="container navbar" role="navigation" aria-label="Principal">
      <a class="brand" href="index" aria-label="Castel - Início">
        <img src="/img/Logo.png" width="150px" alt="logo" />
      </a>
      <nav class="nav" aria-label="Navegação do site">
        <a href="index">Início</a>
        <a href="sobre">Sobre Nós</a>
        <a href="empreendimentos">Empreendimentos</a>
        <a href="reservas">Reservas</a>
        <a href="avulsos">Avulsos</a>
        <a href="servicos">Castel Serviços</a>
        <a
          href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
        <a class="cta" href="https://instagram.com/" target="_blank" rel="noopener">Instagram</a>
      </nav>
      <button class="hamburger" aria-label="Abrir menu"><span></span></button>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <h2>Imóveis Avulsos</h2>
      <p class="muted">Selecionamos oportunidades especiais. Para filtros completos, acesse <a
          href="empreendimentos">Empreendimentos</a>.</p>
      <div id="grid-empreendimentos" class="grid cols-3"></div>
    </div>
  </section>
  <script src="assets/js/empreendimentos.js"></script>
  <script>
    // Render apenas os 'avulso'
    const only = EMPREENDIMENTOS.filter(e => e.status === 'avulso');
    renderLista(only);
  </script>

  <footer class="footer section" role="contentinfo">
    <div class="container">
      <div class="grid" style="grid-template-columns: 2fr 1fr 1fr;">
        <div>
          <img src="/img/Logo.png" width="150px" alt="logo" />
          <p class="muted" style="max-width:48ch;">Construções e Incorporações. Qualidade, transparência e ética em cada
            empreendimento.</p>
        </div>
        <div>
          <h3 style="margin:.25rem 0;">Contato</h3>
          <p><a href="mailto:contato@castelconstrutora.com.br">contato@castelconstrutora.com.br</a><br>
            <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações."
              style="color: #fff">(84) 98800-4885</a>
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
            <a href="servicos">Serviços</a><br>
            <a
              href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
          </p>
        </div>
      </div>
      <div class="subfooter">
        © <span id="year"></span> Castel Construções e Incorporações — Todos os direitos reservados.
      </div>
    </div>
  </footer>

  <a id="wa-fab" class="whatsapp-fab" aria-label="Fale no WhatsApp" target="_blank" rel="noopener" href="#">
    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
      <path
        d="M20.52 3.48A11.8 11.8 0 0012 0C5.39 0 .03 5.36.03 12a11.9 11.9 0 001.6 6L0 24l6.2-1.62a11.9 11.9 0 005.8 1.48h.01c6.61 0 11.97-5.36 11.97-12 0-3.2-1.25-6.2-3.46-8.38zM12 22.03h-.01a9.96 9.96 0 01-5.08-1.4l-.36-.21-3.68.96.98-3.58-.24-.37A9.97 9.97 0 012.03 12C2.03 6.5 6.5 2.03 12 2.03c2.65 0 5.14 1.03 7.01 2.9a9.86 9.86 0 012.92 7.07c0 5.5-4.47 9.97-9.93 9.97zm5.49-7.43c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07a8.08 8.08 0 01-2.38-1.47 9 9 0 01-1.67-2.06c-.18-.3 0-.46.14-.61.14-.15.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.57-.49-.5-.67-.5h-.57c-.2 0-.52.08-.8.37s-1.04 1.02-1.04 2.5 1.07 2.9 1.22 3.1c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.32.17-1.45-.07-.13-.27-.2-.57-.35z" />
    </svg>
  </a>

  <script src="main.js"></script>
  <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>

</html>