@extends('layouts.app')
@section('title','Reservas • Castel')
@section('description','Manifeste seu interesse ou faça uma reserva.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Reservas</h2>
    <p class="muted">Preencha o formulário para manifestar interesse em um empreendimento.</p>

    <form id="form-reserva" class="card" style="padding:1rem;">
      <div class="form-grid">
        <div><label>Empreendimento</label><input class="input" name="empreendimento" placeholder="Nome do empreendimento" required></div>
        <div><label>Tipo</label>
          <select name="tipo"><option>Reserva</option><option>Visita</option><option>Dúvidas</option></select>
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
@endsection
