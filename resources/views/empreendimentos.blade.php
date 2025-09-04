<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Empreendimentos • Castel Construções e Incorporações</title>
  <meta name="description" content="Lançamentos, em construção, avulsos e entregues da Castel." />
  <meta name="theme-color" content="#143a7b" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <meta property="og:title" content="Empreendimentos • Castel" />
  <meta property="og:description" content="Lançamentos, em construção, avulsos e entregues da Castel." />
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
      <a href="empreendimentos" aria-current="page">Empreendimentos</a>
      <a href="reservas">Reservas</a>
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
    <h2>Empreendimentos</h2>
    <p class="muted">Use os filtros para encontrar o imóvel ideal.</p>

    <form id="form-filtro" class="card" style="padding:1rem; margin-bottom:1rem;">
      <div class="form-grid">
        <div>
          <label for="f-status">Status</label>
          <select id="f-status" name="status">
            <option value="">Todos</option>
            <option value="lancamento">Lançamentos</option>
            <option value="em_construcao">Em construção</option>
            <option value="avulso">Avulsos</option>
            <option value="entregue">Entregues</option>
          </select>
        </div>
        <div>
          <label for="f-cidade">Cidade</label>
          <input id="f-cidade" class="input" placeholder="Ex.: Natal" />
        </div>
        <div>
          <label for="f-preco-min">Preço mín. (R$)</label>
          <input id="f-preco-min" class="input" type="number" min="0" step="10000" />
        </div>
        <div>
          <label for="f-preco-max">Preço máx. (R$)</label>
          <input id="f-preco-max" class="input" type="number" min="0" step="10000" />
        </div>
        <div>
          <label for="f-area-min">Metragem mín. (m²)</label>
          <input id="f-area-min" class="input" type="number" min="0" step="1" />
        </div>
        <div>
          <label for="f-quartos">Quartos</label>
          <select id="f-quartos">
            <option value="">Todos</option>
            <option>1</option><option>2</option><option>3</option><option>4</option>
          </select>
        </div>
      </div>
    </form>

    <div id="grid-empreendimentos" class="grid cols-3"></div>
  </div>
</section>

<dialog id="modal-detalhes" style="border:none; border-radius:16px; padding:0; width:min(920px, 95vw);">
  <div class="card">
    <img class="thumb" alt="Imagem do empreendimento" src="">
    <div class="body">
      <h3>Nome</h3>
      <p class="meta muted"></p>
      <p>Preço: <strong class="price"></strong></p>
      <div class="actions">
        <button class="btn red" id="btn-intencao-inline">Tenho interesse</button>
        <button class="btn secondary close">Fechar</button>
      </div>
    </div>
  </div>
</dialog>

<dialog id="modal-intencao" style="border:none; border-radius:16px; padding:0; width:min(680px, 95vw);">
  <form id="form-intencao" class="card">
    <div class="body">
      <h3 style="margin:0;">Intenção de Compra</h3>
      <div class="form-grid">
        <div><label>Empreendimento</label><input name="empreendimento" class="input" required></div>
        <div><label>Nome</label><input name="nome" class="input" required></div>
        <div><label>E-mail</label><input name="email" type="email" class="input" required></div>
        <div><label>Telefone/WhatsApp</label><input name="telefone" type="tel" class="input" required></div>
        <div class="full"><label>Mensagem</label><textarea name="mensagem" rows="4"></textarea></div>
      </div>
      <div style="display:flex; gap:.5rem; margin-top:.5rem;">
        <button class="btn" type="submit">Enviar intenção</button>
        <button type="button" class="btn secondary close">Fechar</button>
      </div>
      <p class="form-ok muted" hidden>Recebemos sua intenção. Em breve entraremos em contato.</p>
    </div>
  </form>
</dialog>

<script src="main.js"></script>
<script src="empreendimentos.js"></script>

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

<script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html>
