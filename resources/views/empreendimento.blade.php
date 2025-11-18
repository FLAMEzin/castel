@extends('layouts.app')

@section('title', 'Empreendimento • Castel')

@section('content')
<main class="section">
  <div class="container" id="detalhe-empreendimento">
    {{-- O conteúdo será renderizado via JS --}}
  </div>
</main>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('detalhe-empreendimento');
  if (!container) return;

  const slug = window.location.pathname.split('/').pop();
  const empreendimento = window.CASTEL_EMPREENDIMENTOS.find(e => e.slug === slug);

  if (!empreendimento) {
    container.innerHTML = `
      <div class="card" style="padding:1.5rem">
        <h2>Empreendimento não encontrado</h2>
        <p class="muted">O empreendimento que você procura não foi encontrado. Ele pode ter sido removido ou o link está incorreto.</p>
        <div class="actions" style="margin-top:1rem">
          <a class="btn" href="/empreendimentos">Ver todos os empreendimentos</a>
        </div>
      </div>
    `;
    return;
  }

  document.title = `${empreendimento.nome} • Castel`;

  const isLote = empreendimento.tipo === 'lote';

  let detailsHtml = `
    <div class="badge-group">
      <span class="badge blue">${window.castelStatusLabel(empreendimento.status)}</span>
      <span class="badge">${empreendimento.cidade}/${empreendimento.uf}</span>
      <span class="badge">${empreendimento.area} m²</span>
  `;

  if (!isLote) {
    detailsHtml += `
      <span class="badge">${empreendimento.quartos} ${empreendimento.quartos > 1 ? 'quartos' : 'quarto'}</span>
      ${empreendimento.suites ? `<span class="badge">${empreendimento.suites} ${empreendimento.suites > 1 ? 'suítes' : 'suíte'}</span>` : ''}
      <span class="badge">${empreendimento.vagas} ${empreendimento.vagas > 1 ? 'vagas' : 'vaga'}</span>
    `;
  }
  
  detailsHtml += '</div>';

  let comodidadesHtml = '';
  if (empreendimento.comodidades && empreendimento.comodidades.length) {
    comodidadesHtml = `
      <h4>Comodidades</h4>
      <ul class="comodidades-list">
        ${empreendimento.comodidades.map(c => `<li>${c}</li>`).join('')}
      </ul>
    `;
  }
  
  let plantasHtml = '';
  if(empreendimento.plantas && empreendimento.plantas.length > 0){
      plantasHtml = `
      <section class="section">
          <h2>Plantas</h2>
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
      </section>
      `
  }
  
  let galeriaHtml = '';
    if(empreendimento.imagens && empreendimento.imagens.length > 0){
      galeriaHtml = `
      <div class="grid cols-2">
        ${empreendimento.imagens.map(img => `<a href="${img}" target="_blank" rel="noopener"><img src="${img}" class="thumb" loading="lazy" /></a>`).join('')}
      </div>
      `
  }

  container.innerHTML = `
    <div style="margin-bottom:1.5rem">
        <a href="/empreendimentos">&larr; Voltar para a lista</a>
    </div>

    <div class="grid" style="grid-template-columns: 2fr 1fr; align-items: start; gap: 1.5rem;">
      <div class="col-main">
        <img src="${empreendimento.capa}" alt="Imagem principal de ${empreendimento.nome}" class="thumb" style="margin-bottom:1rem; border-radius: var(--radius-md);">
        <h1>${empreendimento.nome}</h1>
        ${detailsHtml}
        <p class="lead" style="margin-top:1rem">${empreendimento.descricao}</p>
        
        ${galeriaHtml}
      </div>

      <div class="col-sidebar">
        <div class="card" style="padding:1.5rem; position:sticky; top:2rem;">
            <h3>A partir de</h3>
            <p class="price">${window.castelFmtCurrency(empreendimento.preco)}</p>
            <p class="muted">Entre em contato para condições e unidades disponíveis.</p>
            <a href="/contato?assunto=Interesse+em+${empreendimento.slug}" class="btn red" style="width:100%">Tenho interesse</a>
            <hr>
            ${comodidadesHtml}
        </div>
      </div>
    </div>
    
    ${plantasHtml}
    
  `;
});
</script>
@endsection
