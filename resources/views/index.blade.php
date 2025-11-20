@extends('layouts.app')

@section('title', 'Início • Castel Construções e Incorporações')
@section('description', 'Construtora Castel — empreendimentos com qualidade e seriedade no RN.')

@section('content')
  <section class="hero" role="region" aria-label="Apresentação">
    <video src="/media/VideoCastelHome.mp4" autoplay muted loop playsinline></video>
    <div class="content">
      <h1 style="color:var(--brand-blue); text-shadow:none">{{ $home['title'] }}</h1>
      <p class="lead">{{ $home['sub_title'] }}</p>
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

@endsection
