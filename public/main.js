// ==============================
// Castel • main.js
// ==============================
const $ = (s, el=document) => el.querySelector(s);
const $$ = (s, el=document) => Array.from(el.querySelectorAll(s));
const on = (el, ev, fn) => el && el.addEventListener(ev, fn);
function brl(n){ return isFinite(n) ? Number(n).toLocaleString("pt-BR",{style:"currency",currency:"BRL"}) : "-"; }

document.addEventListener("DOMContentLoaded", () => {
  const y = $("#year"); if (y) y.textContent = new Date().getFullYear();
  const burger = $(".hamburger"), nav = $(".nav");
  on(burger, "click", ()=>{ nav?.classList.toggle("open"); burger.classList.toggle("open"); });

  wireInstagram();
  pageHome();
  pageEmpreendimentos();
  pageEmpreendimento();
  pageSimulador();
});

// ---------------- Dataset (exemplo mínimo) ----------------
const EMPREENDIMENTOS = [
  {
    id: 1,
    slug: "residencial-atlantico",
    nome: "Residencial Atlântico",
    status: "lancamento",
    cidade: "", uf: "RN", bairro: "100m²",
    preco: 289900, area: "Natal", quartos: 2, vagas: 1, banheiros: 2,
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

const DETAIL_BASE = "/empreendimento";
const statusLabel = (s)=>({lancamento:"Lançamento",em_construcao:"Em construção",avulso:"Avulso",entregue:"Entregue"}[s]||s);
const detailHref = (item)=> `${DETAIL_BASE}?slug=${encodeURIComponent(item.slug)}`;

// ---------------- Home (cards de destaque) ----------------
function pageHome(){
  const grid = $("#home-cards");
  if(!grid) return;
  grid.innerHTML = "";
  // pega 1-3 itens do dataset
  EMPREENDIMENTOS.slice(0,3).forEach(it=>{
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
}

// -------------- Lista (empreendimentos) -------------------
function pageEmpreendimentos(){
  const grid = $("#grid-empreendimentos");
  if(!grid) return;

  const form = $("#form-filtro");
  const render = (list)=>{
    grid.innerHTML = "";
    if (!list.length){
      grid.innerHTML = '<p class="muted">Nenhum empreendimento encontrado.</p>';
      return;
    }
    list.forEach(it=>{
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
    });
  };

  function filtrar(){
    const status = $("#f-status")?.value || "";
    const cidade = ($("#f-cidade")?.value || "").trim().toLowerCase();
    const min = parseInt($("#f-preco-min")?.value || "0", 10);
    const max = parseInt($("#f-preco-max")?.value || "999999999", 10);
    const areaMin = parseInt($("#f-area-min")?.value || "0", 10);
    const quartos = parseInt($("#f-quartos")?.value || "0", 10);

    const out = EMPREENDIMENTOS.filter(e =>
      (status ? e.status === status : true) &&
      (cidade ? e.cidade.toLowerCase().includes(cidade) : true) &&
      e.preco >= min && e.preco <= max &&
      e.area >= areaMin &&
      (quartos ? e.quartos === quartos : true)
    );
    render(out);
  }

  on(form,"input",filtrar);
  render(EMPREENDIMENTOS);
}

// -------------- Detalhe (empreendimento) ------------------
function pageEmpreendimento(){
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

  const comod = (item.comodidades||[]).map(c=>`<span class="tag badge">${c}</span>`).join("");

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
          <strong>Informações legais</strong>
          <p class="muted" style="margin:.25rem 0 0;">
            Incorporação: ${item.incorporacao || "-"} • Registro: ${item.registro || "-"}<br/>
            Previsão de entrega: ${item.entregaPrevista ? item.entregaPrevista : "—"}
          </p>
        </div>

        <div class="card" style="margin-top:1rem;">
          <div class="body">
            
          </div>
        </div>
      </div>
    </div>

    <section class="section" style="padding-top:1rem;">
      <h2 style="margin:0 0 .5rem;">Reservar</h2>
          <p class="muted">Preencha o formulário para manifestar interesse em um empreendimento.</p>
          <form id="form-reserva" class="card" style="padding:1rem;">
            <div class="form-grid">
              <div><label>Tipo</label>
                <select name="tipo"><option>Reserva</option><option>Visita</option><option>Dúvidas</option></select>
              </div>
              <div><label>Nome</label><input class="input" name="nome" required></div>
              <div><label>E-mail</label><input type="email" class="input" name="email" required></div>
              <div><label>Telefone/WhatsApp</label><input type="tel" class="input" name="telefone" required></div>
              <div class="full"><label>Mensagem</label><textarea class="input" rows="5" name="mensagem"></textarea></div>
              <div class="full"><label><input type="checkbox" required> Concordo em receber contato da Castel.</label></div>
            </div>
            <button class="btn" type="submit">Enviar</button>
            <p class="form-ok muted" hidden>Recebemos sua solicitação. Obrigado!</p>
          </form>
    </section>

    <section class="section" style="padding-top:0;">
      <h2 style="margin:0 0 .5rem;">Localização</h2>
      <div>${mapa}</div>
    </section>
  `;
}

// -------------------- Simulador ---------------------------
function pageSimulador(){
  const form = $("#form-simulador");
  if(!form) return;
  const out = $("#sim-out");

  function recalc(){
    const valor = Number(form.valor.value || 0);
    const entrada = Number(form.entrada.value || 0);
    const jurosAA = Number(form.juros.value || 0);
    const meses = Number(form.meses.value || 0);
    const pv = Math.max(valor - entrada, 0);
    const i = (jurosAA/100) / 12;
    if (pv <= 0 || i <= 0 || meses <= 0){
      out.innerHTML = `<p class="muted">Preencha os campos para simular.</p>`;
      return;
    }
    const parcela = pv * (i * Math.pow(1+i, meses)) / (Math.pow(1+i, meses) - 1);

    out.innerHTML = `
      <div class="card" style="padding:1rem;">
        <h3 style="margin:.25rem 0;">Resultado da simulação</h3>
        <p style="margin:.25rem 0;">Parcela estimada: <strong>${brl(parcela)}</strong></p>
        <table class="table" style="margin-top:.5rem;">
          <tr><th>Valor do imóvel</th><td>${brl(valor)}</td></tr>
          <tr><th>Entrada</th><td>${brl(entrada)}</td></tr>
          <tr><th>Financiado</th><td>${brl(pv)}</td></tr>
          <tr><th>Juros a.a.</th><td>${jurosAA}%</td></tr>
          <tr><th>Prazo</th><td>${meses} meses</td></tr>
        </table>
      </div>`;
  }

  on(form, "input", recalc);
  recalc();
}

// --------------- Integração Instagram (dummy) ------------
function wireInstagram(){
  document.addEventListener("click", (e)=>{
    const card = e.target.closest("[data-instagram-profile]");
    if(!card) return;
    const handle = card.getAttribute("data-instagram-profile");
    window.open(`https://instagram.com/${handle}`, "_blank","noopener");
  });
}
