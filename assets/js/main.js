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

  // Formulario de contacto en pasos (mejora progresiva)
  var form = document.querySelector('form.form--steps');
  if (!form) { return; }
  var steps = Array.prototype.slice.call(form.querySelectorAll('.step'));
  var prev = form.querySelector('[data-prev]');
  var next = form.querySelector('[data-next]');
  var submit = form.querySelector('[data-submit]');
  var bar = document.createElement('div');
  bar.className = 'progress';
  bar.innerHTML = '<i></i>';
  form.insertBefore(bar, form.firstChild);
  var cur = 0;

  function show(i) {
    cur = i;
    steps.forEach(function (s, n) { s.hidden = n !== i; });
    prev.hidden = i === 0;
    next.hidden = i === steps.length - 1;
    submit.hidden = i !== steps.length - 1;
    bar.firstChild.style.width = ((i + 1) / steps.length * 100) + '%';
  }
  next.addEventListener('click', function () { if (cur < steps.length - 1) { show(cur + 1); steps[cur].querySelector('legend').scrollIntoView({ block: 'start' }); } });
  prev.addEventListener('click', function () { if (cur > 0) { show(cur - 1); } });
  show(0);
})();
