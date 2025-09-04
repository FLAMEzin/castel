
// Dataset de empreendimentos (exemplo). Substitua pelos dados reais.
const EMPREENDIMENTOS = [
  { id: 1, nome: 'Residencial Atlântico', status: 'lancamento', cidade: 'Natal', uf: 'RN', preco: 289900, area: 58, quartos: 2, vagas: 1, capa: 'https://images.unsplash.com/photo-1460317442991-0ec209397118?q=80&w=1200&auto=format&fit=crop' },
  { id: 2, nome: 'Parque das Dunas', status: 'em_construcao', cidade: 'Natal', uf: 'RN', preco: 349900, area: 72, quartos: 3, vagas: 2, capa: 'https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?q=80&w=1200&auto=format&fit=crop' },
  { id: 3, nome: 'Vila do Sol', status: 'entregue', cidade: 'Mossoró', uf: 'RN', preco: 259900, area: 54, quartos: 2, vagas: 1, capa: 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1200&auto=format&fit=crop' },
  { id: 4, nome: 'Praia Bella', status: 'avulso', cidade: 'Parnamirim', uf: 'RN', preco: 189900, area: 46, quartos: 2, vagas: 1, capa: 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200&auto=format&fit=crop' },
  { id: 5, nome: 'Jardim Imperial', status: 'lancamento', cidade: 'Mossoró', uf: 'RN', preco: 399900, area: 89, quartos: 3, vagas: 2, capa: 'https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=1200&auto=format&fit=crop' },
  { id: 6, nome: 'Central Park RN', status: 'em_construcao', cidade: 'Caicó', uf: 'RN', preco: 219900, area: 50, quartos: 2, vagas: 1, capa: 'https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1200&auto=format&fit=crop' }
];

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
    li.innerHTML = `
      <img class="thumb" src="${item.capa}" alt="Imagem do empreendimento ${item.nome}" loading="lazy" />
      <div class="body">
        <div style="display:flex; gap:.5rem; align-items:center; flex-wrap:wrap;">
          <span class="badge ${item.status==='lancamento' ? 'red' : 'blue'}">${item.status.replace('_',' ')}</span>
          <span class="badge">${item.cidade}/${item.uf}</span>
          <span class="badge">${item.quartos} quartos</span>
          <span class="badge">${item.area} m²</span>
        </div>
        <h3 style="margin:.5rem 0 0;">${item.nome}</h3>
        <p class="muted" style="margin:0;">A partir de <strong>${fmtCurrency(item.preco)}</strong></p>
        <div style="margin-top:.75rem; display:flex; gap:.5rem; flex-wrap:wrap;">
          <button class="btn" data-id="${item.id}" data-action="ver">Ver detalhes</button>
          <button class="btn red" data-id="${item.id}" data-action="interesse">Tenho interesse</button>
        </div>
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
    (quartos ? e.quartos === quartos : true)
  );
  renderLista(list);
}

function wireEmpreendimentos() {
  const form = document.getElementById('form-filtro');
  if (!form) return;
  form.addEventListener('input', filtrar);
  renderLista(EMPREENDIMENTOS);
  filtrar();

  document.addEventListener('click', (e) => {
    const btn = e.target.closest('button[data-action]');
    if (!btn) return;
    const id = Number(btn.dataset.id);
    const item = EMPREENDIMENTOS.find(i => i.id === id);
    if (!item) return;
    if (btn.dataset.action === 'interesse') {
      // Preenche intenção de compra
      const fld = document.querySelector('#form-intencao input[name=empreendimento]');
      if (fld) fld.value = item.nome;
      document.getElementById('modal-intencao').showModal();
    } else {
      // Mostra modal com detalhes simples
      const d = document.getElementById('modal-detalhes');
      d.querySelector('h3').textContent = item.nome;
      d.querySelector('img').src = item.capa;
      d.querySelector('.price').textContent = fmtCurrency(item.preco);
      d.querySelector('.meta').textContent = `${item.cidade}/${item.uf} • ${item.area} m² • ${item.quartos} quartos`;
      d.showModal();
    }
  });

  document.querySelectorAll('dialog .close').forEach(btn => btn.addEventListener('click', e => {
    e.target.closest('dialog').close();
  }));
}

wireEmpreendimentos();
