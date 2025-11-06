const EMPREENDIMENTOS = window.CASTEL_EMPREENDIMENTOS || [];

function fmtCurrency(v) {
  return v.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

function renderLista(list) {
  const grid = document.getElementById('grid-empreendimentos');
  if (!grid) return;
  grid.innerHTML = '';
  if (!list.length) {
    grid.innerHTML = '<p class="muted">Nenhum empreendimento encontrado com os filtros atuais.</p>';
    return;
  }
  list.forEach(item => {
    const li = document.createElement('article');
    li.className = 'card';

    // Condicionais para lote
    const isLote = item.tipo === 'lote';
    const quartosBadge = isLote ? '' : `<span class="badge">${item.quartos} quartos</span>`;
    const vagasBadge = isLote || !item.vagas ? '' : `<span class="badge">${item.vagas} vagas</span>`;

    li.innerHTML = `
      <a href="/empreendimento/${item.slug}" style="text-decoration:none; color:inherit;">
        <img class="thumb" src="${item.capa}" alt="Imagem do empreendimento ${item.nome}" loading="lazy" />
        <div class="body">
          <div style="display:flex; gap:.5rem; align-items:center; flex-wrap:wrap;">
            <span class="badge ${item.status==='lancamento' ? 'red' : 'blue'}">${window.castelStatusLabel(item.status)}</span>
            <span class="badge">${item.cidade}/${item.uf}</span>
            ${quartosBadge}
            ${vagasBadge}
            <span class="badge">${item.area} m²</span>
          </div>
          <h3 style="margin:.5rem 0 0;">${item.nome}</h3>
          <p class="muted" style="margin:0;">A partir de <strong>${fmtCurrency(item.preco)}</strong></p>
        </div>
      </a>
      <div class="body" style="border-top:1px solid var(--brand-outline); padding-top:.75rem;">
        <a class="btn" href="/empreendimento/${item.slug}">Ver detalhes</a>
        <a class="btn red" href="/contato?assunto=Interesse+em+${item.slug}">Tenho interesse</a>
      </div>`;
    grid.appendChild(li);
  });
}

function filtrar() {
  const q = (id) => document.getElementById(id);
  const status = q('f-status').value;
  const cidade = q('f-cidade').value.trim().toLowerCase();
  const min = parseInt(q('f-preco-min').value || '0', 10);
  const max = parseInt(q('f-preco-max').value || '999999999', 10);
  const areaMin = parseInt(q('f-area-min').value || '0', 10);
  const quartos = parseInt(q('f-quartos').value || '0', 10);
  let list = EMPREENDIMENTOS.filter(e => 
    (status ? e.status === status : true) &&
    (cidade ? (e.cidade.toLowerCase().includes(cidade)) : true) &&
    e.preco >= min && e.preco <= max &&
    e.area >= areaMin &&
    (quartos ? e.quartos >= quartos : true)
  );
  renderLista(list);
}

function wireEmpreendimentos() {
  const form = document.getElementById('form-filtro');
  if (!form) return;
  form.addEventListener('input', filtrar);
  renderLista(EMPREENDIMENTOS);
  filtrar();
}

wireEmpreendimentos();
