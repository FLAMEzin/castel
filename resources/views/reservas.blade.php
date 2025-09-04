<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reservas • Castel Construções e Incorporações</title>
  <meta name="description" content="Manifeste seu interesse ou faça uma reserva." />
  <meta name="theme-color" content="#143a7b" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <meta property="og:title" content="Reservas • Castel" />
  <meta property="og:description" content="Manifeste seu interesse ou faça uma reserva." />
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
<header class="header">
  <div class="topbar">
    <div class="container">
      <span>Atendimento 24/7</span>
      <span class="sep">•</span>
      <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações." style="color: #fff">(84) 98800-4885</a>
      <span class="sep">•</span>
      <a href="mailto:contato@castelconstrutora.com.br" style="color:#fff;">contato@castelconstrutora.com.br</a>
    </div>
  </div>
  <div class="container navbar">
    <a class="brand" href="index" aria-label="Castel - Início">
      <img src="/img/Logo.png" width="150" alt="Castel Logo" />
    </a>
    <nav class="nav">
      <a href="index">Início</a>
      <a href="sobre">Sobre Nós</a>
      <a href="empreendimentos">Empreendimentos</a>
      <a href="reservas" aria-current="page">Reservas</a>
      <a href="avulsos">Avulsos</a>
      <a href="terraplenagem">Castel Terraplenagem</a>
      <a href="simulador">Simulador</a>
      <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
      <a class="cta" href="https://www.instagram.com/castelconstrutora" target="_blank" rel="noopener">Instagram</a>
    </nav>
    <button class="hamburger" aria-label="Abrir menu"><span></span></button>
  </div>
</header>

<section class="section">
  <div class="container">
    <h2>Reservas</h2>
    <p class="muted">Preencha o formulário para manifestar interesse em um empreendimento. Entraremos em contato.</p>

    <form id="form-reserva" class="card" style="padding:1rem;">
      <div class="form-grid">
        <div><label>Empreendimento</label><input class="input" name="empreendimento" placeholder="Nome do empreendimento" required></div>
        <div>
          <label>Tipo</label>
          <select name="tipo">
            <option>Reserva</option>
            <option>Visita</option>
            <option>Dúvidas</option>
          </select>
        </div>
        <div><label>Nome</label><input class="input" name="nome" required></div>
        <div><label>E-mail</label><input type="email" class="input" name="email" required></div>
        <div><label>Telefone/WhatsApp</label><input type="tel" class="input" name="telefone" required></div>
        <div><label>Cidade</label><input class="input" name="cidade"></div>
        <div class="full"><label>Mensagem</label><textarea class="input" rows="5" name="mensagem"></textarea></div>
        <div class="full"><label><input type="checkbox" required> Concordo em receber contato da Castel.</label></div>
      </div>
      <button class="btn" type="submit">Enviar</button>
      <p class="form-ok muted" hidden>Recebemos sua solicitação. Obrigado!</p>
    </form>
  </div>
</section>

<footer class="footer section">
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

<a id="wa-fab" class="whatsapp-fab" target="_blank" rel="noopener" href="#">
  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.52 3.48A11.8 11.8 0 0012 0C5.39 0 .03 5.36.03 12a11.9 11.9 0 001.6 6L0 24l6.2-1.62a11.9 11.9 0 005.8 1.48h.01c6.61 0 11.97-5.36 11.97-12z"/></svg>
</a>

<script src="main.js"></script>
<script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html>
