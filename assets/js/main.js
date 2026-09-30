/* El JS solo agrega: sin él, todo el contenido y los formularios funcionan igual. */
(function () {
  'use strict';
  document.documentElement.classList.add('js');

  // Revelado suave al hacer scroll
  var els = document.querySelectorAll('.card, .steps li, .prose, .formbox');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
      });
    }, { threshold: 0.1 });
    els.forEach(function (el) { el.classList.add('reveal'); io.observe(el); });
  }

  // Barra fija con un solo CTA, después del hero (o del encabezado en las demás páginas)
  var sticky = document.querySelector('[data-stickybar]');
  var mark = document.querySelector('.hero') || document.querySelector('.site-header');
  if (sticky && mark && 'IntersectionObserver' in window) {
    var links = sticky.querySelectorAll('a');
    new IntersectionObserver(function (en) {
      var on = !en[0].isIntersecting;
      sticky.classList.toggle('is-on', on);
      links.forEach(function (a) { a.tabIndex = on ? 0 : -1; });
    }, { rootMargin: '-80px 0px 0px 0px' }).observe(mark);
  }

  // Selector de proyecto en pasos (mejora progresiva: sin JS se ven los tres pasos juntos)
  var form = document.querySelector('form.form--steps');
  if (!form) { return; }
  var steps = Array.prototype.slice.call(form.querySelectorAll('.step'));
  var prev = form.querySelector('[data-prev]');
  var next = form.querySelector('[data-next]');
  var submit = form.querySelector('[data-submit]');
  var bar = document.createElement('div');
  bar.className = 'progress';
  bar.setAttribute('aria-hidden', 'true');
  bar.innerHTML = '<i></i>';
  form.insertBefore(bar, form.firstChild);
  var cur = 0;

  function chosen(step) { return !step.querySelector('input[type=radio]') || !!step.querySelector('input[type=radio]:checked'); }
  function show(i, focus) {
    cur = i;
    steps.forEach(function (s, n) { s.hidden = n !== i; });
    prev.hidden = i === 0;
    next.hidden = i === steps.length - 1;
    submit.hidden = i !== steps.length - 1;
    bar.firstChild.style.width = ((i + 1) / steps.length * 100) + '%';
    if (focus) { var f = steps[i].querySelector('input:checked') || steps[i].querySelector('input'); if (f) { f.focus({ preventScroll: true }); } }
  }
  function advance() {
    if (!chosen(steps[cur])) { steps[cur].classList.add('needs-choice'); return; }
    steps[cur].classList.remove('needs-choice');
    if (cur < steps.length - 1) { show(cur + 1, true); }
  }
  next.addEventListener('click', advance);
  prev.addEventListener('click', function () { if (cur > 0) { show(cur - 1, true); } });
  steps.forEach(function (s, n) {
    s.addEventListener('change', function (e) {
      if (e.target.type === 'radio' && n === cur && n < steps.length - 1) { setTimeout(advance, 220); }
    });
  });
  form.addEventListener('submit', function (e) {
    if (!chosen(steps[0])) { e.preventDefault(); show(0, true); steps[0].classList.add('needs-choice'); }
  });
  // Si el servidor devolvió errores, abrir el primer paso con error.
  var firstErr = steps.findIndex ? steps.findIndex(function (s) { return s.querySelector('.field__err'); }) : -1;
  show(firstErr > 0 ? firstErr : 0, false);
})();
