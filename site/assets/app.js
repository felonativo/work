/* Language toggle + outbound click tracking. No dependencies. */
(function () {
  'use strict';

  var KEY = 'syf-lang';
  var btn = document.getElementById('lang');

  function stored() {
    try { return localStorage.getItem(KEY); } catch (e) { return null; }
  }
  function remember(lang) {
    try { localStorage.setItem(KEY, lang); } catch (e) { /* private mode */ }
  }

  /* Browser language wins when it clearly says es or en; otherwise Spanish. */
  function detect() {
    var saved = stored();
    if (saved === 'es' || saved === 'en') return saved;
    var langs = navigator.languages || [navigator.language || ''];
    for (var i = 0; i < langs.length; i++) {
      var l = String(langs[i]).toLowerCase();
      if (l.indexOf('es') === 0) return 'es';
      if (l.indexOf('en') === 0) return 'en';
    }
    return 'es';
  }

  function apply(lang) {
    document.documentElement.lang = lang;
    var nodes = document.querySelectorAll('[data-es][data-en]');
    for (var i = 0; i < nodes.length; i++) {
      var v = nodes[i].getAttribute('data-' + lang);
      if (v !== null) nodes[i].textContent = v;
    }
    if (btn) {
      btn.dataset.lang = lang;
      var on = btn.querySelector('.on'), off = btn.querySelector('.off');
      if (on && off) {
        on.textContent = lang.toUpperCase();
        off.textContent = lang === 'es' ? 'EN' : 'ES';
      }
    }
  }

  apply(detect());

  if (btn) {
    btn.addEventListener('click', function () {
      var next = document.documentElement.lang === 'es' ? 'en' : 'es';
      apply(next);
      remember(next);
    });
  }

  /* Which box people actually press. Pageviews alone can't answer that. */
  document.addEventListener('click', function (ev) {
    var el = ev.target.closest && ev.target.closest('[data-track]');
    if (!el) return;
    var name = el.getAttribute('data-track');
    if (window.clarity) { try { window.clarity('event', name); } catch (e) {} }
    if (typeof navigator.sendBeacon === 'function') {
      try {
        navigator.sendBeacon('/api/click.php',
          new Blob([JSON.stringify({ t: name, p: location.pathname })],
                   { type: 'application/json' }));
      } catch (e) { /* never block the navigation */ }
    }
  }, true);
})();
