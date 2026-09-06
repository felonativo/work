# sannayfelo.com

Link-in-bio site for Sanna y Felo. Plain PHP + CSS + a little JS — no build step,
no framework, nothing to compile. Designed for Hostinger shared hosting.

Design decisions and the reasoning behind them live in
`brainstorms/2026-09-05-sanna-y-felo-website.md`.

## Pages

| URL | file | who |
|---|---|---|
| `/` | `index.php` | the couple page — brands, press, the bare domain |
| `/felo/` | `felo/index.php` | goes in Felo's own bios |
| `/sanna/` | `sanna/index.php` | goes in Sanna's own bios |

Each page = a personal top (own photo, name, tagline, own socials) + the shared
bottom, which is driven entirely by `inc/config.php`.

## Deploying to Hostinger

1. Upload the **contents** of this `site/` folder into `public_html/`.
2. Make `cache/` writable (`chmod 755 cache`, or 775 if PHP runs as another user).
   It holds the cached YouTube feed and the click log. Nothing in it is precious.
3. Open the site. Done — there is nothing to build.

## The images — replace these

`assets/img/` currently ships **placeholder artwork** so the site works out of the
box. Replace all three with the real photos, keeping the same filenames:

| file | what | target size |
|---|---|---|
| `banner.webp` | the Caribbean ↔ Faroe landscape | ~200 KB, max 1600px wide |
| `felo.webp` | Felo's portrait | ~40 KB, 240×240 (it only ever renders in a 116px circle) |
| `sanna.webp` | Sanna's portrait | ~40 KB, 240×240 |

**Compress them first** — squoosh.app, drag and drop, choose WebP. The originals
are 4.5 MB and 2 MB; unconverted they would take several seconds to load on mobile
data, on a page whose entire job is opening instantly from an Instagram bio.
Aim for the whole page under 500 KB.

Also wanted, but not yet present: `og-couple.jpg`, `og-felo.jpg`, `og-sanna.jpg`
(1200×630, Spanish) for the WhatsApp/Instagram share preview, and `favicon.png`.

## Everyday edits — all in `inc/config.php`

- **Change a link** — edit its `url`. It updates on all three pages at once.
- **Turn on the Faroe guide or the affiliate box** — set `'enabled' => true` and add
  the `url`. They are built and waiting; nothing else to do. Until then they simply
  do not render (deliberately — no "coming soon" boxes).
- **Change a tagline or a label** — every string has an `es` and an `en`.

## The latest video

`inc/youtube.php` reads the channel's free public RSS feed, server-side, and caches
it for an hour. No API key, no quota, nothing to maintain — a new video appears by
itself.

The channel id is resolved from the `@SannaFelo` handle on first run and remembered
in `cache/channel_id.txt`. To skip that, put the `UC…` id straight into
`config.php`. If YouTube is ever unreachable the box falls back to a plain link to
the channel — the page never breaks.

The card is a **link, not an embedded player**: it opens YouTube. Autoplayed views
are not counted by YouTube and mass two-second bounces would hurt average view
duration; sending real traffic to the channel is worth more.

## Analytics

Cookieless, so no consent banner anywhere.

- **Cloudflare Web Analytics** — paste your token into `cf_analytics_token` in
  `config.php`. Leave it empty and no analytics script loads at all.
- **Which box people press** — every outbound click posts to `api/click.php`, which
  appends one line to `cache/clicks.log`. No cookies, no IP, no identifiers.
  Read it with `tail -100 cache/clicks.log`. Pageviews cannot tell you whether the
  house beats the video; this can.

## Language

Spanish and English. The browser's language wins when it clearly says one or the
other; otherwise **every page falls back to Spanish**. The `ES | EN` toggle
overrides it and the choice is remembered on that device.

The share preview is Spanish only — it is read straight from the HTML before any
script runs, so it cannot follow the toggle.
