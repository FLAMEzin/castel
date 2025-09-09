/* ==============================
   Castel • main.js (único)
   Versão: 1-empreendimento funcional
   ============================== */

/* --------- Helpers genéricos --------- */
const $ = (s, el = document) => el.querySelector(s);
const $$ = (s, el = document) => Array.from(el.querySelectorAll(s));
const on = (el, ev, fn) => el && el.addEventListener(ev, fn);

function brl(n) {
  if (!isFinite(n)) return "-";
  return Number(n).toLocaleString("pt-BR", { style: "currency", currency: "BRL" });
}
function pct(n) {
  return `${(+n).toLocaleString("pt-BR", { maximumFractionDigits: 2 })}%`;
}

/* ================================
   Config da rota de DETALHES
   (para evitar 404, uso query ?slug=)
   ================================ */
const DETAIL_BASE = "empreendimento"; // view/rota simples
const USE_PRETTY_ROUTE = false;       // false => empreedimento?slug={slug}

function detailHref(item) {
  return USE_PRETTY_ROUTE
    ? `/empreendimento/${encodeURIComponent(item.slug)}`
    : `${DETAIL_BASE}?slug=${encodeURIComponent(item.slug)}`;
}

/* --------- Header / Nav / Footer --------- */
document.addEventListener("DOMContentLoaded", () => {
  const y = $("#year");
  if (y) y.textContent = new Date().getFullYear();

  const burger = $(".hamburger");
  const nav = $(".nav");
  on(burger, "click", () => {
    nav?.classList.toggle("open");
    burger.classList.toggle("open");
  });

  // cartões/links que abrem instagram pelo data-instagram-profile
  $$(".card[data-instagram-profile]").forEach((c) => {
    on(c, "click", () => {
      const h = c.getAttribute("data-instagram-profile") || "castelconstrutora";
      window.open(`https://www.instagram.com/${h}`, "_blank", "noopener");
    });
    on(c, "keypress", (e) => {
      if (e.key === "Enter" || e.key === " ") c.click();
    });
  });

  // botão flutuante de WhatsApp: se estiver com href "#", coloca padrão
  const waFab = $("#wa-fab");
  if (waFab && (!waFab.getAttribute("href") || waFab.getAttribute("href") === "#")) {
    waFab.setAttribute(
      "href",
      "https://wa.me/5584994618126?text=Ol%C3%A1!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es."
    );
  }
});

/* =========================================
   DATASET CENTRAL — APENAS 1 EXEMPLO
   ========================================= */
const EMPREENDIMENTOS = [
  {
    id: 1,
    slug: "residencial-atlantico",
    nome: "Residencial Atlântico",
    status: "lancamento",
    cidade: "Natal",
    uf: "RN",
    bairro: "Ponta Negra",
    preco: 289900,
    area: 58,
    quartos: 2,
    suites: 1,
    vagas: 1,
    banheiros: 2,
    descricao:
      "Empreendimento moderno a poucos minutos da orla, com lazer completo e plantas inteligentes.",
    capa:
      "https://images.unsplash.com/photo-1460317442991-0ec209397118?q=80&w=1600&auto=format&fit=crop",
    imagens: [
      "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1600&auto=format&fit=crop",
      "https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1600&auto=format&fit=crop",
      "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop",
    ],
    comodidades: ["Piscina", "Academia", "Coworking", "Playground", "Portaria 24h"],
    coords: { lat: -5.876, lng: -35.171 },
    plantas: [
      "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+58m%C2%B2",
      "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+62m%C2%B2",
    ],
    entregaPrevista: "2027-03",
    incorporacao: "Castel Construções e Incorporações",
    registro: "R-01/12345",
  },
];

function statusLabel(s) {
  return (
    {
      lancamento: "Lançamento",
      em_construcao: "Em construção",
      avulso: "Avulso",
      entregue: "Entregue",
    }[s] || s
  );
}

/* =========================================
   HOME — preencher destaques (1 card)
   ========================================= */
(function homeHighlights() {
  const grid = $("#home-cards");
  if (!grid) return;
  grid.innerHTML = "";
  EMPREENDIMENTOS.slice(0, 1).forEach((it) => {
    const el = document.createElement("article");
    el.className = "card";
    el.innerHTML = `
      <a class="thumb-link" href="${detailHref(it)}" aria-label="Ver ${it.nome}">
        <img class="thumb" src="${it.capa}" alt="Empreendimento ${it.nome}" />
      </a>
      <div class="body">
        <span class="badge">${it.cidade}/${it.uf}</span>
        <h3 style="margin:.5rem 0;">${it.nome}</h3>
        <a class="cta" href="${detailHref(it)}">Saiba mais</a>
      </div>`;
    grid.appendChild(el);
  });
})();

/* =========================================
   LISTA + FILTROS (empreendimentos.blade)
   ========================================= */
function renderLista(list) {
  const grid = $("#grid-empreendimentos");
  if (!grid) return;
  grid.innerHTML = "";
  if (!list.length) {
    grid.innerHTML =
      '<p class="muted">Nenhum empreendimento encontrado com os filtros atuais.</p>';
    return;
  }
  list.forEach((item) => {
    const li = document.createElement("article");
    li.className = "card";
    li.innerHTML = `
      <a class="thumb-link" href="${detailHref(item)}" aria-label="Ver detalhes de ${item.nome}">
        <img class="thumb" src="${item.capa}" alt="Imagem do empreendimento ${item.nome}" loading="lazy" />
      </a>
      <div class="body">
        <div style="display:flex; gap:.5rem; align-items:center; flex-wrap:wrap;">
          <span class="badge ${item.status === "lancamento" ? "red" : "blue"}">${statusLabel(item.status)}</span>
          <span class="badge">${item.cidade}/${item.uf}</span>
          <span class="badge">${item.quartos} quartos</span>
          <span class="badge">${item.area} m²</span>
        </div>
        <h3 style="margin:.5rem 0 0;">${item.nome}</h3>
        <p class="muted" style="margin:0;">A partir de <strong>${brl(item.preco)}</strong></p>
        <div style="margin-top:.75rem; display:flex; gap:.5rem; flex-wrap:wrap;">
          <a class="btn" href="${detailHref(item)}">Ver detalhes</a>
          <a class="btn red" href="https://wa.me/5584994618126?text=${encodeURIComponent(
            `Olá! Tenho interesse no ${item.nome}.`
          )}" target="_blank" rel="noopener">Tenho interesse</a>
        </div>
      </div>`;
    grid.appendChild(li);
  });
}

function filtrarEmpreendimentos() {
  const q = (id) => document.getElementById(id);
  const status = q("f-status")?.value || "";
  const cidade = (q("f-cidade")?.value || "").trim().toLowerCase();
  const min = parseInt(q("f-preco-min")?.value || "0", 10);
  const max = parseInt(q("f-preco-max")?.value || "999999999", 10);
  const areaMin = parseInt(q("f-area-min")?.value || "0", 10);
  const quartos = parseInt(q("f-quartos")?.value || "0", 10);

  let list = EMPREENDIMENTOS.filter(
    (e) =>
      (status ? e.status === status : true) &&
      (cidade ? e.cidade.toLowerCase().includes(cidade) : true) &&
      e.preco >= min &&
      e.preco <= max &&
      e.area >= areaMin &&
      (quartos ? e.quartos === quartos : true)
  );
  renderLista(list);
}

(function wireEmpreendimentos() {
  const form = $("#form-filtro");
  if (!form) return;
  on(form, "input", filtrarEmpreendimentos);
  renderLista(EMPREENDIMENTOS); // desenha o único card
  filtrarEmpreendimentos();     // aplica filtros (continua 1)

  // dialogs (se existirem na página)
  const dialogDetalhes = $("#modal-detalhes");
  const dialogIntencao = $("#modal-intencao");
  const formIntencao = $("#form-intencao");

  document.addEventListener("click", (e) => {
    const btn = e.target.closest("button[data-action]");
    if (!btn) return;
    const id = Number(btn.dataset.id);
    const item = EMPREENDIMENTOS.find((i) => i.id === id);
    if (!item) return;

    if (btn.dataset.action === "interesse" && dialogIntencao) {
      const fld = $("#form-intencao input[name=empreendimento]");
      if (fld) fld.value = item.nome;
      dialogIntencao.showModal();
    } else if (dialogDetalhes) {
      dialogDetalhes.querySelector("h3").textContent = item.nome;
      dialogDetalhes.querySelector("img").src = item.capa;
      dialogDetalhes.querySelector(".price").textContent = brl(item.preco);
      dialogDetalhes.querySelector(".meta").textContent = `${item.cidade}/${item.uf} • ${item.area} m² • ${item.quartos} quartos`;
      dialogDetalhes.showModal();
    }
  });

  $$("#modal-detalhes .close, #modal-intencao .close").forEach((b) =>
    on(b, "click", (ev) => ev.target.closest("dialog").close())
  );

  on(formIntencao, "submit", (ev) => {
    ev.preventDefault();
    const ok = formIntencao.querySelector(".form-ok");
    if (ok) ok.hidden = false;
    setTimeout(() => dialogIntencao?.close(), 1200);
  });
})();

/* =========================================
   PÁGINA DE DETALHES (empreendimento.blade)
   Aceita: ?slug=, ?id=, /empreendimento/{slug|id}, #/slug
   ========================================= */
(function detalhesPage() {
  const container = $("#detalhe-empreendimento");
  if (!container) return;

  // 1) tenta achar slug/id em querystring
  const qs = new URLSearchParams(location.search);
  let slug = qs.get("slug");
  let id = qs.get("id");

  // 2) se não tem, tenta do pathname: /empreendimento/{coisa}
  if (!slug && !id) {
    const parts = location.pathname.split("/").filter(Boolean);
    const i = parts.findIndex((p) => p.toLowerCase() === "empreendimento");
    if (i >= 0 && parts[i + 1]) {
      const seg = decodeURIComponent(parts[i + 1]).replace(/\.html?$/i, "");
      if (/^\d+$/.test(seg)) id = seg; else slug = seg;
    }
  }

  // 3) fallback hash: #/residencial-atlantico
  if (!slug && !id && location.hash) {
    const h = location.hash.replace(/^#\/?/, "");
    if (h) {
      if (/^\d+$/.test(h)) id = h; else slug = h;
    }
  }

  // 4) resolve item
  let item = null;
  if (slug) item = EMPREENDIMENTOS.find((e) => e.slug === slug);
  if (!item && id) item = EMPREENDIMENTOS.find((e) => String(e.id) === String(id));

  // 5) se ainda não achou: mostra link válido (debug)
  if (!item) {
    const links = EMPREENDIMENTOS.map(
      (e) => `<li><a href="${detailHref(e)}">${e.nome}</a></li>`
    ).join("");
    container.innerHTML = `
      <div class="card"><div class="body">
        <h1 style="margin:0;">Empreendimento não encontrado</h1>
        <p class="muted">Tente o link abaixo ou volte para a <a href="empreendimentos">lista</a>.</p>
        <ul>${links}</ul>
      </div></div>`;
    console.warn("[Castel] Detalhes: não encontrado. URL:", location.href);
    return;
  }

  // 6) render normal
  document.title = `${item.nome} • Castel`;

  const galImgs = (item.imagens || [])
    .map(
      (src) =>
        `<img src="${src}" alt="Galeria ${item.nome}" style="width:100%; height:220px; object-fit:cover; border-radius:12px;">`
    )
    .join("");

  const plantas = (item.plantas || [])
    .map(
      (src) =>
        `<img src="${src}" alt="Planta ${item.nome}" style="width:100%; height:220px; object-fit:cover; border-radius:12px;">`
    )
    .join("");

  const comod = (item.comodidades || [])
    .map((c) => `<span class="tag">${c}</span>`)
    .join("");

  const mapa =
    item.coords && typeof item.coords.lat === "number"
      ? `<iframe title="Mapa ${item.nome}" loading="lazy" allowfullscreen
           referrerpolicy="no-referrer-when-downgrade"
           src="https://www.google.com/maps?q=${encodeURIComponent(
             `${item.coords.lat},${item.coords.lng}`
           )}&z=15&output=embed"
           style="width:100%; height:380px; border:0; border-radius:12px;"></iframe>`
      : `<div class="card"><div class="body"><p class="muted" style="margin:0;">Mapa em breve.</p></div></div>`;

  container.innerHTML = `
    <nav class="breadcrumb" aria-label="breadcrumb" style="font-size:.9rem; margin:.5rem 0 1rem;">
      <a href="index">Início</a> / <a href="empreendimentos">Empreendimentos</a> / <span>${item.nome}</span>
    </nav>

    <div class="grid" style="grid-template-columns:1.2fr 1fr; align-items:start; gap:1rem;">
      <div>
        <img class="thumb" src="${item.capa}" alt="${item.nome}" style="width:100%; height:420px; object-fit:cover; border-radius:14px;">
        <div class="gallery" style="display:grid; grid-template-columns: repeat(3,1fr); gap:.5rem; margin-top:.75rem;">
          ${galImgs}
        </div>
      </div>
      <div>
        <h1 style="margin:0 0 .25rem;">${item.nome}</h1>
        <div class="specs" style="display:flex; gap:.5rem; flex-wrap:wrap; margin:.25rem 0 .75rem;">
          <span class="badge ${item.status === "lancamento" ? "red" : "blue"}">${statusLabel(item.status)}</span>
          <span class="badge">${item.bairro ? item.bairro + " • " : ""}${item.cidade}/${item.uf}</span>
          <span class="badge">${item.quartos} quartos${item.suites ? ` • ${item.suites} suíte(s)` : ""}</span>
          <span class="badge">${item.area} m²</span>
          <span class="badge">${item.vagas} vaga(s)</span>
        </div>
        <p class="muted" style="margin:.25rem 0;">A partir de <strong>${brl(item.preco)}</strong></p>
        <p style="margin:.5rem 0 1rem;">${item.descricao || ""}</p>

        <div style="display:flex; gap:.5rem; flex-wrap:wrap; margin-bottom:1rem;">${comod}</div>

        <div class="actions" style="display:flex; gap:.5rem; flex-wrap:wrap;">
          <a class="btn red" target="_blank" rel="noopener"
             href="https://wa.me/5584994618126?text=${encodeURIComponent(`Olá! Tenho interesse no ${item.nome}. Pode me ajudar?`)}">Quero conversar</a>
          <a class="btn" href="reservas">Reservar/Visitar</a>
          <a class="btn secondary" href="simulador">Simular financiamento</a>
        </div>

        <div class="card" style="margin-top:1rem;">
          <div class="body">
            <strong>Informações legais</strong>
            <p class="muted" style="margin:.25rem 0 0;">
              Incorporação: ${item.incorporacao || "-"} • Registro: ${item.registro || "-"}<br/>
              Previsão de entrega: ${item.entregaPrevista ? item.entregaPrevista : "—"}
            </p>
          </div>
        </div>
      </div>
    </div>

    <section class="section" style="padding-top:1rem;">
      <h2 style="margin:0 0 .5rem;">Plantas</h2>
      ${
        plantas
          ? `<div class="gallery" style="display:grid; grid-template-columns: repeat(3,1fr); gap:.5rem;">${plantas}</div>`
          : `<p class="muted">Plantas em breve.</p>`
      }
    </section>

    <section class="section" style="padding-top:0;">
      <h2 style="margin:0 0 .5rem;">Localização</h2>
      <div>${mapa}</div>
    </section>
  `;
})();

/* =========================================
   SIMULADOR (RF08) — Tabela Price
   Robusto: funciona com id (#s-valor) ou só name="valor"
   ========================================= */
(function simulador() {
  const form = $("#form-simulador");
  const out = $("#sim-out");
  if (!form || !out) return;

  const vValor   = $("#s-valor")   || $('input[name="valor"]', form);
  const vEntrada = $("#s-entrada") || $('input[name="entrada"]', form);
  const vJuros   = $("#s-juros")   || $('input[name="juros"]', form);
  const vMeses   = $("#s-meses")   || $('input[name="meses"]', form);
  const btnSimular = $("#btn-simular") || null;
  const btnLimpar  = $("#btn-limpar")  || null;

  function parse(v) {
    const n = Number(String(v).replace(/\s/g, ""));
    return isNaN(n) ? 0 : n;
  }

  function renderError(msg) {
    out.innerHTML = `
      <div class="card">
        <div class="body">
          <p style="color:var(--brand-red); margin:0;"><strong>${msg}</strong></p>
        </div>
      </div>
    `;
  }

  function calc() {
    const valor = parse(vValor?.value ?? 0);
    const entrada = parse(vEntrada?.value ?? 0);
    const jurosAA = parse(vJuros?.value ?? 0);
    const meses = parse(vMeses?.value ?? 0);

    if (valor <= 0 || meses < 12) {
      renderError("Informe um valor de imóvel válido e prazo a partir de 12 meses.");
      return;
    }
    if (entrada < 0 || entrada >= valor) {
      renderError("A entrada deve ser zero ou positiva e menor que o valor do imóvel.");
      return;
    }
    if (jurosAA < 0 || jurosAA > 50) {
      renderError("Informe uma taxa anual entre 0% e 50%.");
      return;
    }

    const pv = valor - entrada;
    const i = Math.pow(1 + jurosAA / 100, 1 / 12) - 1; // taxa efetiva mensal
    const parcela = i === 0 ? pv / meses : (pv * i) / (1 - Math.pow(1 + i, -meses));
    const totalPago = parcela * meses + entrada;
    const jurosTotais = totalPago - valor;

    const msgShare = [
      "Simulação Castel",
      `Imóvel: ${brl(valor)}`,
      `Entrada: ${brl(entrada)}`,
      `Prazo: ${meses} meses`,
      `Juros: ${pct(jurosAA)}/ano (${(i * 100).toFixed(3)}%/mês)`,
      `Parcela estimada: ${brl(parcela)}`,
      `Total pago (com entrada): ${brl(totalPago)}`,
      `Juros totais: ${brl(jurosTotais)}`
    ].join("\n");

    const waUrl = "https://wa.me/?text=" + encodeURIComponent(msgShare);
    const mailto =
      "mailto:?subject=" +
      encodeURIComponent("Simulação Castel") +
      "&body=" +
      encodeURIComponent(msgShare);

    out.innerHTML = `
      <div class="grid" style="grid-template-columns: 1fr 1fr; gap:1rem;">
        <div class="card">
          <div class="body">
            <strong>Parcela estimada</strong>
            <p style="font-size:1.8rem; margin:.25rem 0 0;"><b>${brl(parcela)}</b></p>
            <p class="muted" style="margin:0;">Tabela Price (${meses}x)</p>
          </div>
        </div>
        <div class="card">
          <div class="body">
            <strong>Resumo</strong>
            <p style="margin:.25rem 0 0;">Financiado: <b>${brl(pv)}</b></p>
            <p style="margin:.25rem 0 0;">Total pago (com entrada): <b>${brl(totalPago)}</b></p>
            <p style="margin:.25rem 0 0;">Juros totais: <b>${brl(jurosTotais)}</b></p>
          </div>
        </div>
      </div>

      <div class="card" style="margin-top:1rem;">
        <div class="body" style="display:flex; gap:.5rem; flex-wrap:wrap;">
          <a class="btn red" href="${waUrl}" target="_blank" rel="noopener">Enviar por WhatsApp</a>
          <a class="btn" href="${mailto}">Enviar por E-mail</a>
          <a class="btn secondary" href="reservas">Solicitar proposta</a>
        </div>
        <p class="muted" style="margin:.5rem 0 0;">
          * Simulação aproximada. CET, seguros e políticas bancárias podem alterar os valores finais.
        </p>
      </div>
    `;
  }

  ["input", "change"].forEach((ev) => on(form, ev, calc));
  if (btnSimular) on(btnSimular, "click", calc);
  if (btnLimpar) on(btnLimpar, "click", () => setTimeout(calc, 0));
  calc();
})();
