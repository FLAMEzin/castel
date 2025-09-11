@extends('layouts.app')
@section('title','Castel Terraplenagem • Castel')
@section('description','Serviços de terraplenagem e obras de infraestrutura.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Castel Terraplenagem</h2>
    <p class="muted">Linha completa de serviços de terraplenagem com equipamentos próprios e equipe qualificada.</p>
    <div class="grid cols-3">
      <div class="card"><div class="body"><strong>Escavação e aterro</strong><p>Obras com segurança, estudo de solo e licenças.</p></div></div>
      <div class="card"><div class="body"><strong>Compactação</strong><p>Solo preparado para receber pavimentação.</p></div></div>
      <div class="card"><div class="body"><strong>Drenagem</strong><p>Soluções completas para saneamento e drenagem.</p></div></div>
    </div>
    <div class="card" style="margin-top:1rem;">
      <video controls poster="https://images.unsplash.com/photo-1536859355448-76f92ebdc33d?q=80&w=1200&auto=format&fit=crop">
        <source src="/media/terraplenagem.mp4" type="video/mp4" />
      </video>
    </div>
  </div>
</section>
@endsection
