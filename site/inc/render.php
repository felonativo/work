<?php
/** Shared page renderer. Every page is this file plus a variant name. */

function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

/** Bilingual text node: server-renders Spanish, JS swaps to English on toggle. */
function t(array $pair, string $tag = 'span', string $class = ''): string {
    $cls = $class ? ' class="' . e($class) . '"' : '';
    return "<{$tag}{$cls} data-es=\"" . e($pair['es']) . "\" data-en=\"" . e($pair['en']) . "\">"
         . e($pair['es']) . "</{$tag}>";
}

function icon(string $name): string {
    $paths = [
        'instagram' => '<rect x="2" y="2" width="20" height="20" rx="5.5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.6" cy="6.4" r="1.2" fill="currentColor" stroke="none"/>',
        'tiktok'    => '<path d="M15.5 2.5c.5 2.4 2 4 4.5 4.3v3.1c-1.7.1-3.2-.4-4.6-1.3v6.1c0 3.6-2.6 6.3-6 6.3S3.4 18.3 3.4 14.9c0-3.3 2.6-5.9 6.1-5.7v3.2c-.4-.1-.8-.2-1.2-.2-1.6 0-2.8 1.2-2.8 2.8s1.2 2.8 2.8 2.8c1.7 0 2.9-1.2 2.9-3.1V2.5z"/>',
        'youtube'   => '<rect x="2" y="5" width="20" height="14" rx="4.5"/><path d="M10.2 9.3v5.4l4.6-2.7z" fill="currentColor" stroke="none"/>',
        'mail'      => '<rect x="2.5" y="4.5" width="19" height="15" rx="3"/><path d="M3.5 7l8.5 6 8.5-6"/>',
    ];
    $p = $paths[$name] ?? '';
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" '
         . 'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $p . '</svg>';
}

function social_row(array $socials, string $who): string {
    $labels = ['instagram' => 'Instagram', 'tiktok' => 'TikTok', 'youtube' => 'YouTube'];
    $out = '<ul class="socials">';
    foreach ($socials as $key => $url) {
        $aria = e($labels[$key] . ' — ' . $who);
        $out .= '<li><a href="' . e($url) . '" aria-label="' . $aria . '" target="_blank"'
              . ' rel="noopener" data-track="social:' . e($key) . ':' . e(strtolower($who)) . '">'
              . icon($key) . '</a></li>';
    }
    return $out . '</ul>';
}

/** The eight stars of the flag, on an arc. */
function star_arc(int $count = 8): string {
    $svg = '<svg class="stars" viewBox="0 0 200 40" aria-hidden="true">';
    $svg .= '<defs><symbol id="star" viewBox="0 0 10 10">'
          . '<path d="M5 0l1.4 3.2L10 3.7 7.4 6l.7 3.6L5 7.9 1.9 9.6 2.6 6 0 3.7l3.6-.5z"/>'
          . '</symbol></defs>';
    for ($i = 0; $i < $count; $i++) {
        $frac = $count > 1 ? $i / ($count - 1) : 0.5;
        $x = 22 + $frac * 156;
        $y = 24 - sin($frac * M_PI) * 9;       // gentle upward arc
        $svg .= '<use href="#star" x="' . round($x, 1) . '" y="' . round($y, 1) . '"'
              . ' width="12" height="12" style="--i:' . $i . '"/>';
    }
    return $svg . '</svg>';
}

/** The cabin: arch silhouette drawn from the real house. */
function cabin_svg(): string {
    return <<<SVG
<svg class="cabin" viewBox="0 0 96 116" aria-hidden="true">
  <path class="cabin-body" d="M22 100C22 58 27 24 48 8c21 16 26 50 26 92z"/>
  <path class="cabin-roof" d="M17 74C18 44 26 20 48 4c22 16 30 40 31 70"/>
  <rect class="cabin-win" x="33" y="40" width="15" height="19" rx="3.5"/>
  <rect class="cabin-win" x="53" y="52" width="13" height="16" rx="3.5"/>
  <path class="cabin-door" d="M35 100V76a6 6 0 0 1 12 0v24z"/>
  <g class="cabin-stilts">
    <rect x="27" y="100" width="6" height="10" rx="2.5"/>
    <rect x="45" y="100" width="6" height="10" rx="2.5"/>
    <rect x="63" y="100" width="6" height="10" rx="2.5"/>
  </g>
  <path class="cabin-steps" d="M4 110h12v-6H9M16 104v-7h10"/>
</svg>
SVG;
}

function render_page(array $cfg, array $str, string $variant): string {
    $isCouple = ($variant === 'couple');
    $subject  = $isCouple ? $cfg['couple'] : $cfg['people'][$variant];
    $video    = yt_latest_video($cfg);

    $title = $isCouple
        ? $str['meta_title']['es']
        : $subject['name'] . ' — ' . $subject['tagline']['es'];
    $desc  = $str['meta_desc']['es'];
    $ogImg = $cfg['base_url'] . '/assets/img/og-' . $variant . '.jpg';
    $canon = $cfg['base_url'] . ($isCouple ? '/' : '/' . $variant . '/');

    ob_start(); ?>
<!doctype html>
<html lang="es" data-variant="<?= e($variant) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($desc) ?>">
<link rel="canonical" href="<?= e($canon) ?>">
<meta name="theme-color" content="#0E2A1F">

<meta property="og:type" content="website">
<meta property="og:locale" content="es_ES">
<meta property="og:site_name" content="Sanna y Felo">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<meta property="og:url" content="<?= e($canon) ?>">
<meta property="og:image" content="<?= e($ogImg) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" href="/assets/img/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<button id="lang" class="lang" type="button"
        aria-label="<?= e($str['lang_switch']['es']) ?>" data-lang="es">
  <span class="on">ES</span><span class="sep">|</span><span class="off">EN</span>
</button>

<main class="wrap">

  <header class="hero">
    <div class="banner">
      <img src="/assets/img/banner.webp" alt="" width="1600" height="900" fetchpriority="high">
    </div>

    <?php if ($isCouple): ?>
      <div class="avatars">
        <?php foreach (['sanna', 'felo'] as $slug):
          $p = $cfg['people'][$slug]; ?>
          <div class="who">
            <a class="avatar" href="/<?= e($slug) ?>/" data-track="profile:<?= e($slug) ?>">
              <img src="<?= e($p['photo']) ?>" alt="<?= e($p['name']) ?>" width="240" height="240" loading="eager">
            </a>
            <p class="who-name"><?= e($p['name']) ?> <span class="flag"><?= $p['flag'] ?></span></p>
            <?= social_row($p['socials'], $p['name']) ?>
          </div>
        <?php endforeach; ?>
      </div>
      <h1 class="name"><?= e($cfg['couple']['name']) ?></h1>
      <?= t($cfg['couple']['tagline'], 'p', 'tagline') ?>
    <?php else: ?>
      <div class="avatars one">
        <div class="who">
          <span class="avatar">
            <img src="<?= e($subject['photo']) ?>" alt="<?= e($subject['name']) ?>" width="240" height="240" loading="eager">
          </span>
        </div>
      </div>
      <h1 class="name"><?= e($subject['name']) ?> <span class="flag"><?= $subject['flag'] ?></span></h1>
      <?= t($subject['tagline'], 'p', 'tagline') ?>
      <?= social_row($subject['socials'], $subject['name']) ?>
    <?php endif; ?>
  </header>

  <!-- 1. Latest video -->
  <section class="block">
    <?= t($str['section_video'], 'h2', 'sec') ?>
    <?php if ($video['url']): ?>
      <a class="card video" href="<?= e($video['url']) ?>" target="_blank" rel="noopener" data-track="video">
        <span class="thumb">
          <?php if ($video['thumb']): ?>
            <img src="<?= e($video['thumb']) ?>" alt="" width="1280" height="720" loading="lazy">
          <?php endif; ?>
          <span class="play" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M8 5.5v13l11-6.5z"/></svg></span>
        </span>
        <span class="card-body">
          <span class="card-title"><?= e($video['title'] ?? '') ?></span>
          <span class="card-meta">YouTube · Sanna y Felo</span>
        </span>
      </a>
    <?php else: ?>
      <a class="card row" href="<?= e($cfg['youtube']['url']) ?>" target="_blank" rel="noopener" data-track="video-fallback">
        <span class="ico"><?= icon('youtube') ?></span>
        <?= t($str['channel_fallback'], 'span', 'card-label') ?>
      </a>
    <?php endif; ?>
  </section>

  <!-- 2. Venezuela -->
  <?php $vz = $cfg['links']['venezuela']; if ($vz['enabled']): ?>
  <section class="block">
    <?= t($str['section_help'], 'h2', 'sec') ?>
    <a class="card vzla" href="<?= e($vz['url']) ?>" target="_blank" rel="noopener" data-track="venezuela">
      <span class="ribbon" aria-hidden="true"></span>
      <?= star_arc() ?>
      <span class="card-body">
        <?= t($vz['label'], 'span', 'card-label') ?>
        <?= t($str['donate_via'], 'span', 'card-meta') ?>
      </span>
    </a>
  </section>
  <?php endif; ?>

  <!-- 3. The stay -->
  <?php $st = $cfg['links']['stay']; if ($st['enabled']): ?>
  <section class="block">
    <?= t($str['section_stay'], 'h2', 'sec') ?>
    <a class="card stay" href="<?= e($st['url']) ?>" target="_blank" rel="noopener" data-track="stay">
      <?= cabin_svg() ?>
      <span class="card-body">
        <?= t($st['label'], 'span', 'card-label') ?>
        <?= t($st['note'], 'span', 'card-meta') ?>
      </span>
    </a>
  </section>
  <?php endif; ?>

  <!-- 4-5. Guides + gear, off until they exist -->
  <?php
  $more = array_filter([$cfg['links']['guides'], $cfg['links']['gear']], fn($l) => $l['enabled']);
  if ($more): ?>
  <section class="block">
    <?= t($str['section_more'], 'h2', 'sec') ?>
    <?php foreach ($more as $k => $l): ?>
      <a class="card row" href="<?= e($l['url']) ?>" target="_blank" rel="noopener" data-track="more:<?= e((string)$k) ?>">
        <?= t($l['label'], 'span', 'card-label') ?>
      </a>
    <?php endforeach; ?>
  </section>
  <?php endif; ?>

  <!-- 6. Contact -->
  <section class="block">
    <?= t($str['section_hello'], 'h2', 'sec') ?>
    <?php if ($isCouple): ?>
      <?php foreach (['sanna', 'felo'] as $slug): $p = $cfg['people'][$slug]; ?>
        <a class="card row" href="mailto:<?= e($p['email']) ?>" data-track="email:<?= e($slug) ?>">
          <span class="ico"><?= icon('mail') ?></span>
          <span class="card-label"><?= e($p['name']) ?></span>
          <span class="card-meta"><?= e($p['email']) ?></span>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <a class="card row" href="mailto:<?= e($subject['email']) ?>" data-track="email:<?= e($variant) ?>">
        <span class="ico"><?= icon('mail') ?></span>
        <?= t($str['email_us'], 'span', 'card-label') ?>
        <span class="card-meta"><?= e($subject['email']) ?></span>
      </a>
    <?php endif; ?>
  </section>

  <footer class="foot">
    <?php if (!$isCouple): ?>
      <a href="/" data-track="to-couple">sannayfelo.com</a>
    <?php else: ?>
      <span>sannayfelo.com</span>
    <?php endif; ?>
  </footer>

</main>

<script src="/assets/app.js" defer></script>
<?php if ($cfg['cf_analytics_token']): ?>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js"
        data-cf-beacon='{"token":"<?= e($cfg['cf_analytics_token']) ?>"}'></script>
<?php endif; ?>
</body>
</html>
<?php
    return ob_get_clean();
}
