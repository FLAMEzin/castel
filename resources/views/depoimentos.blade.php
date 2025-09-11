@extends('layouts.app')
@section('title','Depoimentos • Castel')
@section('description','Comentários de clientes da Castel.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Depoimentos</h2>
    <p class="muted">Conte sua experiência com a Castel. Os depoimentos passam por moderação.</p>

    <form id="form-depoimento" class="card" style="padding:1rem; margin-bottom:1rem;">
      <div class="form-grid">
        <div><label>Nome</label><input class="input" name="nome" required></div>
        <div class="full"><label>Mensagem</label><textarea class="input" name="msg" rows="4" required></textarea></div>
      </div>
      <button class="btn" type="submit">Enviar depoimento</button>
    </form>

    <div id="lista-depoimentos" class="grid cols-3"></div>

    <div class="card" style="margin-top:1rem;">
      <div class="body">
        <strong>Moderação</strong>
        <p class="muted">Para moderar, acesse <code>depoimentos?admin=1</code> neste mesmo navegador.</p>
        <div id="mod-pending"></div>
      </div>
    </div>
  </div>
</section>
@endsection
