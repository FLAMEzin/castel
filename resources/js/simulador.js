
function calcParcela(principal, jurosMes, meses) {
  if (jurosMes <= 0) return principal / meses;
  const i = jurosMes;
  const n = meses;
  const pmt = principal * ((i * Math.pow(1 + i, n)) / (Math.pow(1 + i, n) - 1));
  return pmt;
}

function wireSimulador() {
  const form = document.getElementById('form-simulador');
  if (!form) return;
  const out = document.getElementById('sim-out');
  form.addEventListener('input', () => form.dispatchEvent(new Event('submit')));
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const valor = Number(form.valor.value || 0);
    const entrada = Number(form.entrada.value || 0);
    const jurosAno = Number(form.juros.value || 9.5);
    const meses = Number(form.meses.value || 360);

    const principal = Math.max(0, valor - entrada);
    const jurosMes = (jurosAno / 100) / 12;
    const parcela = calcParcela(principal, jurosMes, meses);

    const total = parcela * meses;
    const jurosTotais = total - principal;

    function fmt(n) { return n.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }); }

    out.innerHTML = `
      <div class="card" style="margin-top:1rem;">
        <div class="body">
          <h3 style="margin:0 0 .25rem;">Resultado</h3>
          <p class="muted" style="margin:.25rem 0;">Parcela estimada</p>
          <div style="font-size:1.75rem; font-weight:800;">${fmt(parcela)}</div>
          <div style="display:flex; gap:1rem; flex-wrap:wrap; margin-top:.75rem;">
            <span class="badge">Entrada: <strong>${fmt(entrada)}</strong></span>
            <span class="badge">Financiado: <strong>${fmt(principal)}</strong></span>
            <span class="badge">Total pago: <strong>${fmt(total)}</strong></span>
            <span class="badge red">Juros totais: <strong>${fmt(jurosTotais)}</strong></span>
          </div>
        </div>
      </div>
    `;
  });
  form.dispatchEvent(new Event('submit'));
}
wireSimulador();
