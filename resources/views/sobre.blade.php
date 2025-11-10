@extends('layouts.app')
@section('title','Sobre Nós • Castel Construções e Incorporações')
@section('description','Conheça a história, cultura, missão, visão e valores da Castel — foco no cliente, qualidade e exclusividade.')

@section('content')

<!-- Hero com vídeo e mensagem principal -->
<section class="hero" role="region" aria-label="Apresentação institucional">
<video src="/media/VideoCastel.mp4" autoplay muted loop playsinline></video>
  <div class="content">
    <h1 style="color:var(--brand-blue); text-shadow:none">Construindo confiança, entregando qualidade</h1>
    <p class="lead">
      Há mais de uma década transformando terrenos em lares, com transparência, prazo e foco total no cliente.
    </p>
    <div class="actions">
      <a class="cta" href="https://castel.acadeone.com.br/vendas/" target="_blank">Conheça nossos empreendimentos</a>
      <a class="cta" style="background:var(--brand-blue)" href="/contato">Fale com a gente</a>
    </div>
  </div>
</section>

<!-- KPIs -->
<section class="section">
  <div class="container">
    <div class="kpis">
      <div class="kpi reveal">
        <div class="num" data-kpi="16">16+</div>
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

<!-- História -->
<section class="section" style="background:var(--brand-gray)">
  <div class="container">
    <h2>Nossa História</h2>
    <div class="grid" style="grid-template-columns: 1fr 1fr; gap: 2rem; align-items: center;">
      <div class="reveal">
        <p class="lead">Tudo começou a cerca de 16 anos, quando dois jovens empreendedores, <strong>Einstein Preston</strong> e <strong>Marcel Duarte</strong>, amigos de longas datas e que já vinham de outros negócios, apostaram dessa vez no setor imobiliário sócios da JR Imóveis, que logo prosperaram no setor.</p>
        <p>Muito inquietos e logo perceberam que podiam ir mais longe, então decidiram entrar da área da construção civil, acreditam em uma região da cidade onde todos diziam que era uma loucura, loucura essa que virou um desafio que se tornou um case de sucesso.</p>
        <p>Desde então a Castel Construções e Incorporações vem se destacando cada vez mais no mercado de Mossoró e Região pela qualidade e compromisso com seus empreendimentos.</p>
      </div>
      <div class="reveal">
        <img src="https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?q=80&w=1200&auto=format&fit=crop" alt="Equipe da Castel Construções" style="border-radius: 8px; width: 100%; height: auto;">
      </div>
    </div>
  </div>
</section>

<!-- Portfólio -->
<section class="section">
    <div class="container">
        <h2>Portfólio de Sucesso</h2>
        <p class="muted" style="max-width:80ch; margin-bottom: 2rem;">A Castel tem em seu portfólio condomínios fechados que são referência no mercado, além de projetos inovadores em andamento.</p>
        <div class="grid cols-3">
            <div class="card reveal">
                <div class="body">
                    <h3 style="margin:.25rem 0">Condomínios Entregues</h3>
                    <p>Três condomínios fechados entregues e que são referência no mercado: o <strong>Boulevard Residence</strong> em Mossoró, o <strong>Praia Mar Residence</strong> e o <strong>Veneza Residence Beach</strong> na cidade praia de Tibau/RN.</p>
                </div>
            </div>
            <div class="card reveal">
                <div class="body">
                    <h3 style="margin:.25rem 0">Complexo Rota dos Ventos</h3>
                    <p>Um complexo com 1.600 lotes, que abriga o <strong>Veneza Residencial</strong> em fase de construção, além do condomínio <strong>Rota Galpões</strong> e <strong>Galpões Rota</strong> em fase de implantação.</p>
                </div>
            </div>
            <div class="card reveal">
                <div class="body">
                    <h3 style="margin:.25rem 0">Futuros Lançamentos</h3>
                    <p>Em 2025, o <strong>Rancho Texas</strong>, um condomínio para casa de campo. Em 2026, o <strong>Porto Ilha</strong> em Tibau/RN e o <strong>Porto Franco</strong> em Mossoró.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Diferenciais -->
<section class="section" style="background:var(--brand-gray)">
  <div class="container">
    <h2>Nossos Diferenciais</h2>
    <div class="grid cols-2" style="margin-top:1rem; gap: 2rem;">
        <div class="card reveal">
            <div class="body">
                <strong>CASAS CASTEL</strong>
                <p class="muted">Construindo as casas de acordo com o sonho e o desejo de cada cliente.</p>
            </div>
        </div>
        <div class="card reveal">
            <div class="body">
                <strong>Castel Terraplenagem</strong>
                <p class="muted">Uma empresa de serviços e locações de equipamentos para dinamizar e dar velocidade às obras.</p>
            </div>
        </div>
    </div>
    <div style="text-align: center; margin-top: 2rem;">
        <h4>Nossa marca mais forte é entregar obra antes do prazo.</h4>
        <p><strong>Castel Construções:</strong> muita qualidade alinhada a conforto e bem estar.</p>
    </div>
  </div>
</section>

<!-- Time & Cultura -->
<section class="section">
  <div class="container" style="text-align:center;">
    <h2>Diretores</h2>
    <p class="muted">Trabalho, foco e determinação é o combustível desses empreendedores que não páram.</p>
    <div class="grid cols-2" style="margin-top:1rem; text-align:center;">
      <div class="reveal">
          <strong>Einstein Preston Cordeiro Leite</strong>
      </div>
      <div class="reveal">
          <strong>Marcel Frederick Duarte Reginaldo</strong>
      </div>
    </div>
    <div class="actions" style="margin-top:2rem">
      <a class="btn" href="https://castel.acadeone.com.br/vendas/" target="_blank">Ver portfólio</a>
      <a class="btn secondary" href="https://www.instagram.com/castelconstrutora" target="_blank" rel="noopener">Ver bastidores no Instagram</a>
    </div>
  </div>
</section>

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
      el.textContent = v + '+';
      if(p < 1) requestAnimationFrame(step);
      else el.textContent = target + '+';
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
