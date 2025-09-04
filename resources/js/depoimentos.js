
const storeKey = 'castel_depoimentos';

function readStore() {
  try { return JSON.parse(localStorage.getItem(storeKey)) || { pending: [], approved: [] }; }
  catch { return { pending: [], approved: [] }; }
}
function writeStore(data) { localStorage.setItem(storeKey, JSON.stringify(data)); }

function renderTestimonials() {
  const data = readStore();
  const list = document.getElementById('lista-depoimentos');
  if (!list) return;
  list.innerHTML = '';
  if (!data.approved.length) {
    list.innerHTML = '<p class="muted">Ainda não há depoimentos aprovados.</p>';
    return;
  }
  data.approved.forEach(d => {
    const el = document.createElement('div');
    el.className = 'card';
    el.innerHTML = \`
      <div class="body">
        <strong>\${d.nome}</strong>
        <p style="margin:.4rem 0 0;">\${d.msg}</p>
      </div>\`;
    list.appendChild(el);
  });
}

function wireTestimonials() {
  const form = document.getElementById('form-depoimento');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const data = readStore();
      const payload = Object.fromEntries(new FormData(form));
      data.pending.push({ nome: payload.nome, msg: payload.msg, ts: Date.now() });
      writeStore(data);
      form.reset();
      alert('Depoimento enviado para moderação. Obrigado!');
    });
  }

  // Painel simples de moderação: /depoimentos.html?admin=1
  const params = new URLSearchParams(location.search);
  if (params.get('admin') === '1') {
    const box = document.getElementById('mod-pending');
    if (box) {
      const data = readStore();
      box.innerHTML = '';
      if (!data.pending.length) {
        box.innerHTML = '<p class="muted">Sem itens pendentes.</p>';
      } else {
        data.pending.forEach((d, idx) => {
          const item = document.createElement('div');
          item.className = 'card';
          item.innerHTML = \`
            <div class="body">
              <strong>\${d.nome}</strong>
              <p style="margin:.4rem 0 1rem;">\${d.msg}</p>
              <div style="display:flex; gap:.5rem;">
                <button class="btn" data-action="approve" data-idx="\${idx}">Aprovar</button>
                <button class="btn red" data-action="reject" data-idx="\${idx}">Rejeitar</button>
              </div>
            </div>\`;
          box.appendChild(item);
        });
        box.addEventListener('click', (e) => {
          const b = e.target.closest('button[data-action]');
          if (!b) return;
          const i = Number(b.dataset.idx);
          const data2 = readStore();
          const item = data2.pending.splice(i, 1)[0];
          if (b.dataset.action === 'approve') data2.approved.unshift(item);
          writeStore(data2);
          location.reload();
        });
      }
    }
  }
  renderTestimonials();
}
wireTestimonials();
