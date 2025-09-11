@extends('layouts.app')

@section('title', 'Início • Castel Construções e Incorporações')
@section('description', 'Construtora Castel — empreendimentos com qualidade e seriedade no RN.')

@section('content')
  <section class="hero" role="region" aria-label="Apresentação">
    <video src="/media/VideoCastel.mp4" autoplay muted loop playsinline></video>
    <div class="content">
      <h1>Seu novo lar com <span style="color: var(--brand-red)">segurança</span> e <span style="color:#a3c9ff">qualidade</span>.</h1>
      <p class="lead">Incorporações modernas, atendimento humano e condições que cabem no seu bolso.</p>
      <div class="actions">
        <a class="cta" href="/empreendimentos">Ver Empreendimentos</a>
        <a class="cta" style="background:var(--brand-blue)" href="/simulador">Simular Financiamento</a>
      </div>
    </div>
  </section>

  <section class="section" id="destaques">
    <div class="container">
      <h2>Destaques</h2>
      <p class="muted">Alguns dos nossos projetos mais recentes.</p>
      <div class="grid cols-3" id="home-cards"></div>
    </div>
  </section>

  <section class="section" style="background: var(--brand-gray)">
    <div class="container">
      <div class="grid" style="grid-template-columns: 1.2fr 1fr; align-items: center">
        <div>
          <h2>Por que a Castel?</h2>
          <ul>
            <li>Mais de 10 anos de atuação com total transparência.</li>
            <li>Time técnico experiente em engenharia e gestão.</li>
            <li>Condições facilitadas e suporte em todo o processo.</li>
          </ul>
          <div class="actions">
            <a href="/sobre" class="btn">Conheça nossa história</a>
          </div>
        </div>
        <img src="https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=1200&auto=format&fit=crop"
             alt="Equipe de engenharia da Castel" style="border-radius:14px; width:100%" />
      </div>
    </div>
  </section>

  <section class="section" id="instagram">
    <div class="container">
      <h2>Instagram</h2>
      <p class="muted">Acompanhe <strong>@castelconstrutora</strong>.</p>
      <div class="grid cols-3">
        <div class="card" data-instagram-profile="castelconstrutora" role="button" tabindex="0" aria-label="Abrir Instagram">
          <img class="thumb" src="https://images.unsplash.com/photo-1505691723518-36a5ac3b2f07?q=80&w=1200&auto=format&fit=crop" alt="Post do Instagram" />
          <!-- <div class="body"><strong>@castelconstrutora</strong><p class="muted">Toque para abrir</p></div> -->
        </div>
        <div class="card" data-instagram-profile="castelconstrutora">
          <img class="thumb" src="https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?q=80&w=1200&auto=format&fit=crop" alt="Post do Instagram" />
          <!-- <div class="body"><strong>@castelconstrutora</strong><p class="muted">Toque para abrir</p></div> -->
        </div>
        <div class="card" data-instagram-profile="castelconstrutora">
          <img class="thumb" src="https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1200&auto=format&fit=crop" alt="Post do Instagram" />
          <!-- <div class="body"><strong>@castelconstrutora</strong><p class="muted">Toque para abrir</p></div> -->
        </div>
      </div>
    </div>
  </section>
@endsection
