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
    var phs = document.querySelectorAll('[data-ph-es][data-ph-en]');
    for (var j = 0; j < phs.length; j++) {
      phs[j].setAttribute('placeholder', phs[j].getAttribute('data-ph-' + lang));
    }
    var msgs = document.querySelectorAll('.nl-msg[data-shown]');
    for (var k = 0; k < msgs.length; k++) {
      msgs[k].textContent = msgs[k].getAttribute('data-' + msgs[k].getAttribute('data-shown') + '-' + lang);
    }
    if (btn) {
      btn.dataset.lang = lang;
      btn.setAttribute('aria-checked', lang === 'en' ? 'true' : 'false');
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

  /* Newsletter signup → api/subscribe.php */
  var forms = document.querySelectorAll('form[data-nl]');
  Array.prototype.forEach.call(forms, function (form) {
    var input = form.querySelector('.nl-input');
    var button = form.querySelector('.nl-btn');
    var msg = form.querySelector('.nl-msg');

    function say(kind) {
      msg.setAttribute('data-shown', kind);
      msg.textContent = msg.getAttribute('data-' + kind + '-' + document.documentElement.lang);
      msg.hidden = false;
      msg.className = 'nl-msg ' + (kind.indexOf('ok') === 0 ? 'good' : 'bad');
    }

    form.addEventListener('submit', function (ev) {
      ev.preventDefault();
      var email = input.value.trim();
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { say('bad'); input.focus(); return; }
      var lang = document.documentElement.lang;
      var label = button.textContent;
      button.disabled = true;
      button.textContent = button.getAttribute('data-sending-' + lang);
      fetch('/api/subscribe.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          email: email,
          lang: lang,
          page: location.pathname,
          website: form.querySelector('.nl-hp').value
        })
      }).then(function (r) { return r.json().then(function (j) { return { s: r.status, j: j }; }); })
        .then(function (res) {
          if (res.j && res.j.ok) {
            say(res.j.mode === 'doi' ? 'ok-doi' : 'ok');
            form.querySelector('.nl-row').hidden = true;
          } else {
            say(res.s === 422 ? 'bad' : 'err');
            button.disabled = false;
            button.textContent = label;
          }
        })
        .catch(function () {
          say('err');
          button.disabled = false;
          button.textContent = label;
        });
    });
  });

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
