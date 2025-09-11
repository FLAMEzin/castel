@extends('layouts.app')
@section('title','Sobre Nós • Castel Construções e Incorporações')
@section('description','Conheça a história, cultura, missão, visão e valores da Castel — foco no cliente, qualidade e exclusividade.')

@section('content')

<!-- Hero com vídeo e mensagem principal -->
<section class="hero" role="region" aria-label="Apresentação institucional">
  <video src="/media/Institucional.mp4" autoplay muted loop playsinline></video>
  <div class="content">
    <h1>Construindo confiança, entregando qualidade</h1>
    <p class="lead">
      Há mais de uma década transformando terrenos em lares, com transparência, prazo e foco total no cliente.
    </p>
    <div class="actions">
      <a class="cta" href="/empreendimentos">Conheça nossos empreendimentos</a>
      <a class="cta" style="background:var(--brand-blue)" href="/contato">Fale com a gente</a>
    </div>
  </div>
</section>

<!-- KPIs -->
<section class="section">
  <div class="container">
    <div class="kpis">
      <div class="kpi reveal">
        <div class="num" data-kpi="12">12+</div>
        <div class="muted">anos de história</div>
      </div>
      <div class="kpi reveal">
        <div class="num" data-kpi="35">35+</div>
        <div class="muted">obras entregues</div>
      </div>
      <div class="kpi reveal">
        <div class="num" data-kpi="500">500+</div>
        <div class="muted">famílias atendidas</div>
      </div>
      <div class="kpi reveal">
        <div class="num" data-kpi="98">98%</div>
        <div class="muted">de satisfação</div>
      </div>
    </div>
  </div>
</section>

<!-- Missão, Visão, Valores -->
<section class="section" style="background:var(--brand-gray)">
  <div class="container">
    <h2>Quem somos</h2>
    <p class="muted" style="max-width:70ch">
      A Castel nasceu com o propósito de transformar sonhos em endereços. Unimos engenharia, gestão e atendimento humano
      para entregar obras seguras, funcionais e com estética que valoriza cada detalhe.
    </p>
    <div class="grid cols-3" style="margin-top:1rem">
      <article class="card reveal">
        <img class="thumb" alt="Missão" src="https://images.unsplash.com/photo-1531346878377-a5be20888e57?q=80&w=1200&auto=format&fit=crop">
        <div class="body">
          <h3 style="margin:.25rem 0">Missão</h3>
          <p>Construir com excelência, respeitando prazos, orçamento e a experiência do cliente do início ao fim.</p>
        </div>
      </article>
      <article class="card reveal">
        <img class="thumb" alt="Visão" src="https://images.unsplash.com/photo-1529429612779-c8e40ef2f36e?q=80&w=1200&auto=format&fit=crop">
        <div class="body">
          <h3 style="margin:.25rem 0">Visão</h3>
          <p>Ser referência regional em incorporação e engenharia, reconhecida por qualidade e transparência.</p>
        </div>
      </article>
      <article class="card reveal">
        <img class="thumb" alt="Valores" src="https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?q=80&w=1200&auto=format&fit=crop">
        <div class="body">
          <h3 style="margin:.25rem 0">Valores</h3>
          <ul style="margin:.25rem 0 0; padding-left:1rem">
            <li>Ética e transparência</li>
            <li>Segurança e qualidade</li>
            <li>Compromisso com prazos</li>
            <li>Respeito às pessoas e ao meio ambiente</li>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- Diferenciais -->
<section class="section">
  <div class="container">
    <h2>Nossos diferenciais</h2>
    <div class="grid cols-4" style="margin-top:1rem">
      <div class="card reveal">
        <div class="body">
          <strong>Atendimento humano</strong>
          <p class="muted">Do primeiro contato à entrega das chaves, com transparência e proximidade.</p>
        </div>
      </div>
      <div class="card reveal">
        <div class="body">
          <strong>Projeto inteligente</strong>
          <p class="muted">Plantas funcionais, materiais de qualidade e estética atemporal.</p>
        </div>
      </div>
      <div class="card reveal">
        <div class="body">
          <strong>Prazo e previsibilidade</strong>
          <p class="muted">Gestão de obra com responsabilidade e comunicação clara.</p>
        </div>
      </div>
      <div class="card reveal">
        <div class="body">
          <strong>Pós-obra presente</strong>
          <p class="muted">Suporte técnico e documentação em dia. Confiança que continua.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Linha do tempo -->
<section class="section" style="background:var(--brand-gray)">
  <div class="container">
    <h2>Nossa trajetória</h2>
    <div class="grid" style="grid-template-columns:1fr 1fr; align-items:start">
      <div class="reveal">
        <ul style="list-style:none; padding:0; margin:0">
          <li style="display:flex; gap:.75rem; margin-bottom:1rem">
            <span class="badge blue" aria-hidden="true">2013</span>
            <div>
              <strong>Fundação da Castel</strong>
              <p class="muted" style="margin:.25rem 0 0">Primeiras obras residenciais com foco em qualidade construtiva.</p>
            </div>
          </li>
          <li style="display:flex; gap:.75rem; margin-bottom:1rem">
            <span class="badge blue" aria-hidden="true">2017</span>
            <div>
              <strong>Expansão e novos bairros</strong>
              <p class="muted" style="margin:.25rem 0 0">Portfólio cresce com produtos para diferentes perfis.</p>
            </div>
          </li>
          <li style="display:flex; gap:.75rem; margin-bottom:1rem">
            <span class="badge blue" aria-hidden="true">2021</span>
            <div>
              <strong>Processos digitais</strong>
              <p class="muted" style="margin:.25rem 0 0">Gestão integrada, mais agilidade e previsibilidade de obra.</p>
            </div>
          </li>
          <li style="display:flex; gap:.75rem; margin-bottom:1rem">
            <span class="badge blue" aria-hidden="true">Hoje</span>
            <div>
              <strong>Casas e apartamentos que viram histórias</strong>
              <p class="muted" style="margin:.25rem 0 0">Seguimos entregando com seriedade e foco no cliente.</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="reveal">
        <div class="card">
          <img class="thumb" alt="Obras Castel" src="https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=1600&auto=format&fit=crop">
          <div class="body">
            <strong>Construção que inspira</strong>
            <p class="muted" style="margin:0">Equipe técnica experiente, fornecedores homologados e controle de qualidade em todas as etapas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Time & Cultura -->
<section class="section">
  <div class="container">
    <h2>Time & cultura</h2>
    <div class="grid cols-3" style="margin-top:1rem">
      <div class="card reveal">
        <div class="body">
          <strong>Liderança técnica</strong>
          <p class="muted">Engenharia com experiência de campo e obra — decisões assertivas e seguras.</p>
        </div>
      </div>
      <div class="card reveal">
        <div class="body">
          <strong>Cliente no centro</strong>
          <p class="muted">Atendimento consultivo, comunicação clara e compromisso com a experiência.</p>
        </div>
      </div>
      <div class="card reveal">
        <div class="body">
          <strong>Parcerias sólidas</strong>
          <p class="muted">Rede de fornecedores e especialistas, garantindo padrão e prazo.</p>
        </div>
      </div>
    </div>

    <div class="actions" style="margin-top:1rem">
      <a class="btn" href="/empreendimentos">Ver portfólio</a>
      <a class="btn secondary" href="https://www.instagram.com/castelconstrutora" target="_blank" rel="noopener">Ver bastidores no Instagram</a>
    </div>
  </div>
</section>

<!-- Selos / Confiança -->
<!-- <section class="section reveal" aria-label="Selos de confiança">
  <div class="container">
    <h2>Confiança de quem constrói com a gente</h2>
    <div class="trustbar" style="margin-top:.5rem">
      <img src="https://dummyimage.com/140x40/ccd3e3/31425a&text=CREA" alt="CREA" />
      <img src="https://dummyimage.com/140x40/ccd3e3/31425a&text=CAIXA" alt="CAIXA" />
      <img src="https://dummyimage.com/140x40/ccd3e3/31425a&text=Selo+Qualidade" alt="Selo de Qualidade" />
      <img src="https://dummyimage.com/140x40/ccd3e3/31425a&text=PBQP-H" alt="PBQP-H" />
    </div>
  </div>
</section> -->

@endsection

@section('scripts')
<script>
  // animação simples dos KPIs (contagem)
  const easeOut = t => 1 - Math.pow(1 - t, 4);
  function animateCount(el){
    const target = Number(el.getAttribute('data-kpi') || 0);
    const start = performance.now();
    const dur = 900;
    function step(ts){
      const p = Math.min(1, (ts - start)/dur);
      const v = Math.floor(easeOut(p) * target);
      el.textContent = target >= 100 ? v + (target >= 100 ? (target % 1 ? '' : '+') : '') : v + (target >= 10 ? '+' : '');
      if(p < 1) requestAnimationFrame(step);
      else el.textContent = target + (target >= 10 ? '+' : '');
    }
    requestAnimationFrame(step);
  }
  document.querySelectorAll('.kpi .num').forEach(animateCount);

  // revelar elementos com .reveal ao rolar
  const ro = new IntersectionObserver(entries=>{
    for (const e of entries) {
      if (e.isIntersecting) { e.target.classList.add('in'); ro.unobserve(e.target); }
    }
  }, {threshold: .12});
  document.querySelectorAll('.reveal').forEach(el=>ro.observe(el));
</script>
@endsection
