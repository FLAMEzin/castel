// ==============================
// Castel • main.js (mínimo ok)
// ==============================
const $ = (s, el=document) => el.querySelector(s);
const $$ = (s, el=document) => Array.from(el.querySelectorAll(s));
const on = (el, ev, fn) => el && el.addEventListener(ev, fn);

function brl(n){ return isFinite(n) ? Number(n).toLocaleString("pt-BR",{style:"currency",currency:"BRL"}) : "-"; }

// ---- Config link de detalhes: /empreendimento?slug=... (sem rota dinâmica)
const DETAIL_BASE = "/empreendimento";
function detailHref(item){ return `${DETAIL_BASE}?slug=${encodeURIComponent(item.slug)}`; }

// ---- Dataset com 1 único exemplo (lista -> detalhe)
const EMPREENDIMENTOS = [
  {
    id: 1,
    slug: "residencial-atlantico",
    nome: "Residencial Atlântico",
    status: "lancamento",
    cidade: "Natal", uf: "RN", bairro: "Ponta Negra",
    preco: 289900, area: 58, quartos: 2, suites: 1, vagas: 1, banheiros: 2,
    descricao: "Empreendimento moderno a poucos minutos da orla, com lazer completo e plantas inteligentes.",
    capa: "https://images.unsplash.com/photo-1460317442991-0ec209397118?q=80&w=1600&auto=format&fit=crop",
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

function statusLabel(s){ return ({lancamento:"Lançamento",em_construcao:"Em construção",avulso:"Avulso",entregue:"Entregue"}[s]||s); }

// ---- Header básico
document.addEventListener("DOMContentLoaded", () => {
  const y = $("#year");
  if (y) y.textContent = new Date().getFullYear();
  const burger = $(".hamburger");
  const nav = $(".nav");
  on(burger, "click", ()=>{ nav?.classList.toggle("open"); burger.classList.toggle("open"); });
});

// ---- Render da LISTA (empreendimentos.blade)
(function listaPage(){
  const grid = $("#grid-empreendimentos");
  if(!grid) return;

  grid.innerHTML = "";
  const it = EMPREENDIMENTOS[0];

  const card = document.createElement("article");
  card.className = "card";
  card.innerHTML = `
    <a class="thumb-link" href="${detailHref(it)}" aria-label="Ver ${it.nome}">
      <img class="thumb" src="${it.capa}" alt="Empreendimento ${it.nome}" />
    </a>
    <div class="body">
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <span class="badge red">${statusLabel(it.status)}</span>
        <span class="badge">${it.cidade}/${it.uf}</span>
        <span class="badge">${it.quartos} quartos</span>
        <span class="badge">${it.area} m²</span>
      </div>
      <h3 style="margin:.5rem 0 0;">${it.nome}</h3>
      <p class="muted" style="margin:0;">A partir de <strong>${brl(it.preco)}</strong></p>
      <div style="margin-top:.75rem; display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn" href="${detailHref(it)}">Ver detalhes</a>
        <a class="btn red" href="https://wa.me/5584994618126?text=${encodeURIComponent(`Olá! Tenho interesse no ${it.nome}.`)}" target="_blank" rel="noopener">Tenho interesse</a>
      </div>
    </div>`;
  grid.appendChild(card);

  const form = $("#form-filtro");
  on(form, "input", () => { /* com 1 item, mantemos o card */ });
})();

// ---- Página de DETALHES (empreendimento.blade) — usa ?slug=
(function detalhePage(){
  const container = $("#detalhe-empreendimento");
  if(!container) return;

  const qs = new URLSearchParams(location.search);
  const slug = qs.get("slug");
  const item = EMPREENDIMENTOS.find(e => e.slug === slug);

  if(!item){
    container.innerHTML = `
      <div class="card"><div class="body">
        <h1 style="margin:0;">Empreendimento não encontrado</h1>
        <p class="muted">Voltar para a <a href="/empreendimentos">lista</a>.</p>
      </div></div>`;
    console.warn("Detalhe não encontrado. URL:", location.href, "slug:", slug);
    return;
  }

  document.title = `${item.nome} • Castel`;

  const galImgs = (item.imagens||[]).map(src=>(
    `<img src="${src}" alt="Galeria ${item.nome}" style="width:100%; height:220px; object-fit:cover; border-radius:12px;">`
  )).join("");

  const plantas = (item.plantas||[]).map(src=>(
    `<img src="${src}" alt="Planta ${item.nome}" style="width:100%; height:220px; object-fit:cover; border-radius:12px;">`
  )).join("");

  const comod = (item.comodidades||[]).map(c=>`<span class="tag">${c}</span>`).join("");

  const mapa = (item.coords && typeof item.coords.lat==="number")
    ? `<iframe title="Mapa ${item.nome}" loading="lazy" allowfullscreen
         referrerpolicy="no-referrer-when-downgrade"
         src="https://www.google.com/maps?q=${encodeURIComponent(`${item.coords.lat},${item.coords.lng}`)}&z=15&output=embed"
         style="width:100%; height:380px; border:0; border-radius:12px;"></iframe>`
    : `<div class="card"><div class="body"><p class="muted" style="margin:0;">Mapa em breve.</p></div></div>`;

  container.innerHTML = `
    <nav class="breadcrumb" style="font-size:.9rem; margin:.5rem 0 1rem;">
      <a href="/index">Início</a> / <a href="/empreendimentos">Empreendimentos</a> / <span>${item.nome}</span>
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
        <div style="display:flex; gap:.5rem; flex-wrap:wrap; margin:.25rem 0 .75rem;">
          <span class="badge red">${statusLabel(item.status)}</span>
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
          <a class="btn" href="/reservas">Reservar/Visitar</a>
          <a class="btn secondary" href="/simulador">Simular financiamento</a>
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
      ${ plantas ? `<div class="gallery" style="display:grid; grid-template-columns: repeat(3,1fr); gap:.5rem;">${plantas}</div>` : `<p class="muted">Plantas em breve.</p>` }
    </section>

    <section class="section" style="padding-top:0;">
      <h2 style="margin:0 0 .5rem;">Localização</h2>
      <div>${mapa}</div>
    </section>
  `;
})();

console.log("[Castel] main.js carregado em", location.pathname);
