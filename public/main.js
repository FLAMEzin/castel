
// Castel - JS base
const nav = document.querySelector('.nav');
const burger = document.querySelector('.hamburger');
if (burger) {
  burger.addEventListener('click', () => nav.classList.toggle('open'));
}

function setActiveNav() {
  const path = location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav a').forEach(a => {
    const href = a.getAttribute('href');
    if ((path === '' && href.endsWith('index.html')) || href.endsWith(path)) {
      a.classList.add('active');
    }
  });
}
setActiveNav();

// Mask phone input (simple)
function maskPhone(input) {
  input.addEventListener('input', e => {
    let v = e.target.value.replace(/\D/g, '').slice(0, 11);
    if (v.length > 6) v = v.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    else if (v.length > 2) v = v.replace(/(\d{2})(\d{0,5})/, '($1) $2');
    else v = v.replace(/(\d{0,2})/, '($1');
    e.target.value = v.trim();
  });
}
document.querySelectorAll('input[type=tel]').forEach(maskPhone);

// Generic form handler (front-end only)
function wireForm(selector) {
  const form = document.querySelector(selector);
  if (!form) return;
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form));
    console.log('Form data =>', data);
    form.reset();
    const ok = form.querySelector('.form-ok');
    if (ok) {
      ok.hidden = false;
      setTimeout(() => (ok.hidden = true), 6000);
    } else {
      alert('Enviado! (Mock) Configure o endpoint no back-end.)');
    }
  });
}

// Wire default forms
wireForm('#form-contato');
wireForm('#form-reserva');
wireForm('#form-intencao');

// WhatsApp FAB (troque o número abaixo)
const WHATS_NUMBER = '5584994618126';
const wa = document.getElementById('wa-fab');
if (wa) {
  wa.href = `https://wa.me/${WHATS_NUMBER}?text=${encodeURIComponent('Olá! Vim pelo site da Castel e gostaria de mais informações.')}`;
}

// Instagram (placeholder): abre perfil ao clicar
document.querySelectorAll('[data-instagram-profile]').forEach((el) => {
  el.addEventListener('click', () => {
    const p = el.getAttribute('data-instagram-profile');
    window.open(`https://instagram.com/${p}`, '_blank');
  });
});



// --- Reveal on scroll ---
const io = new IntersectionObserver((entries)=>{
  for(const e of entries){
    if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); }
  }
},{threshold:.12});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

// --- CountUp (KPI) ---
function countUp(el, to){
  let n = 0; const dur = 900; const start = performance.now();
  const step = (t)=>{
    const p = Math.min(1,(t-start)/dur);
    n = Math.floor(to * (0.5 - Math.cos(Math.PI*p)/2));
    el.textContent = n.toLocaleString('pt-BR');
    if(p<1) requestAnimationFrame(step);
  };
  requestAnimationFrame(step);
}
document.querySelectorAll('[data-countto]').forEach(el=>countUp(el, Number(el.dataset.countto||0)));

// --- Instagram quick open banner ---
const igBanner = document.getElementById('ig-banner');
if(igBanner){
  igBanner.addEventListener('click', ()=> window.open('https://instagram.com/castel', '_blank'));
}
