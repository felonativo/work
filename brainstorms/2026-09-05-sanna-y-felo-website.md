# Sanna y Felo — Link-in-bio Website: Brainstorm / Discovery Notes
Date: 2026-09-05 · Goal: Design a Linktree-style link-in-bio website at **sannayfelo.com** — a couple page at the root plus a standalone page for each of them. **Bilingual: Spanish + English.**

Handles: **@feloferoe** (Felo) · **Sanna La Vida** (Sanna)

## Summary / key decisions
- **Domain: `sannayfelo.com`** — DECIDED. Spanish "y" (and) ties to Felo's Caribbean side and reads naturally bilingually.
- **Three pages, one site — NO chooser gate.**
  - `/felo` — Felo's page. Goes in Felo's own Instagram/social bios.
  - `/sanna` — Sanna's page. Goes in Sanna's own bios.
  - `/` (root) — a real couple page, not a door: both of them in a split jungle/fjord header, then the same shared body. The link for brand deals, press, and anyone typing the bare domain.
  - No visitor ever has to click before reaching content. Build Felo's page first; Sanna's reuses the template.
- **Site language: BILINGUAL — Spanish + English.** Spanish is the primary/main audience today, English is the second language (Sanna's Nordic following, international Airbnb guests). Every UI string lives in one strings file with an `es` and `en` value.
  - Language chosen by a small `ES | EN` toggle top-right. Browser language wins when it clearly says es or en; otherwise **every page falls back to Spanish** (Q15 — including `/sanna`). Visitor can override; choice remembered.
  - IMPORTANT distinction: the *chrome* is bilingual (section headers, buttons, taglines, contact copy). The *content* is whatever language it was published in — the YouTube video title comes from the channel, guide names are what they're called. So this is "bilingual interface + native-language content", not a fully translated site.
- **Brand story to lean on:** Felo = **Venezuelan** ("Nativo Venezolano", 🇻🇪; "jungle man" is his casual framing, good for the visuals); Sanna = Faroe Islands ("vikinga", 🇫🇴). Their own public line is *"nuestra historia entre dos culturas" / "our story between two cultures"* — that IS the brand. Jungle ↔ fjord / warm ↔ cold is its visual spine.
- **Page anatomy: personal top + shared bottom.** Personal header (own photo, name, tagline, own socials) sits above a shared body (latest video, guides, Airbnb, contact) driven by one shared data file. Edit a link once → updates on both pages.
- **YouTube is one joint channel** → the same single latest video appears on both pages. One video only, not a carousel.
- **The Airbnb box is deliberately not like the other link boxes** — styled as the tiny house itself, with a little roof on top, and something "dynamic". Detailed design TBD.
- Purpose: a single bio-link page to drop in Instagram/YouTube/social profiles
- Visual style: green palette, adventurous/travel vibe; fade-in hero banner; circular profile photo centered at top of each profile page
- Top of each profile page: row of social media icons linking out to all their profiles
- Featured/hero section: latest YouTube video, shown with its thumbnail
- **Faroe Islands guide and affiliate link do not exist yet** — both sections are built into the template but ship switched OFF in the data file. No "coming soon" boxes.
- **The off-grid stay is the flagship asset**: an off-grid Airbnb stay in Bocas del Toro, Panama, tied to a coral restoration project. Their own property, no platform cut. Biggest/most distinctive box on the page. Link (provisional): https://caribbeancoralrestorationlanding.vercel.app/
- A "contact us" box — clicking it opens email (NOT WhatsApp — explicitly excluded, no WhatsApp yet)
- Tech approach: static site, multiple routes. Latest video auto-pulled from YouTube's free RSS feed via a daily scheduled rebuild — no API key, no manual updates.
- **No follower/subscriber counts anywhere** (user: "skip the counts").

## Their real Instagram bios (screenshot, Q14) — source of truth for voice

**@feloferoe** — name "Felo" · category "Blog personal" · 27 posts · **56.4K followers**
```
🇻🇪 Nativo Venezolano
🇫🇴 Casado con una vikinga
Te cuento nuestra historia ↓
youtube.com/@sannafelo
```

**@sannalavida** — name "Sanna" · 28 posts · **73.5K followers**
```
🇫🇴 Faroese
🇻🇪 Husband @feloferoe
↓ Our story between two cultures
📧 sannalavida@gmail.com
youtube.com/@sannafelo
```

What this changes:
1. **Felo is VENEZUELAN, not generically "Caribbean."** His own bio: "Nativo Venezolano." Earlier notes said "Caribeño" — corrected everywhere. ("Jungle man" was his casual framing in conversation; it's useful for the *visual* language, but "venezolano" is the public identity.)
2. **"Vikinga" is HIS OWN WORD** — "Casado con una vikinga." Not Claude's invention. Safe and authentic to use on the site.
3. **Their two bios are in DIFFERENT LANGUAGES.** Felo's is Spanish, Sanna's is English. Strong evidence their audiences genuinely differ — and direct support for the bilingual decision. Raises the question of per-page *default* language.
4. **Sanna is the bigger account** (73.5K vs 56.4K). `/sanna` may well get more traffic than `/felo`, even though the user asked to build Felo's first.
5. **Their real positioning line already exists**, in both languages: *"Te cuento nuestra historia"* / *"Our story between two cultures."* Better than anything invented — use it.
6. Both bios already point at the same channel, `@sannafelo` — confirms the joint channel.
7. Sanna's email is already public in her bio, so using it on the site exposes nothing new.
8. Both use flag emoji as culture markers: 🇻🇪 + 🇫🇴. A ready-made visual device for the split header.

(Follower counts recorded as background only — they are NOT displayed on the site, per Q5.)

## Taglines — DECIDED / pending

**Root / couple page — ✅ FINAL (Q17, option G)**
- es: **Dos culturas explorando el mundo**
- en: **Two cultures exploring the world**

**`/sanna` — ✅ FINAL (Q19)**
- es: **Viajes, cultura y vida entre dos mundos**
- en: **Travel, culture and life between two worlds**

**`/felo` — user picked *Explorando el mundo entre dos culturas*, pending resolution of a collision with the root tagline (Q20).**
Differentiated alternative on the table: *Explorando el mundo desde el trópico* / *Exploring the world from the tropics*.

**VOICE RULE (Q19): do not over-use "off-grid."** It is the product, not the identity — say it once, on the stay box.

### Earlier identity-first drafts (superseded, kept for reference)
- root: es *Un venezolano y una vikinga — nuestra historia entre dos culturas* / en *A Venezuelan and a Viking — our story between two cultures*
- `/sanna`: es *Feroesa. Casada con un venezolano.* / en *Faroese. Married to a Venezuelan.* — dropped: it defines the larger account by her husband, which her own bio pointedly does not do.

## Tagline options (Q15 — pick one per page)

Short is the constraint. All built from vocabulary they already use (venezolano, vikinga, off-grid, dos culturas).

**Root / couple page**
| # | es | en |
|---|---|---|
| 1 | Un venezolano y una vikinga | A Venezuelan and a Viking |
| 2 | Dos culturas, una historia | Two cultures, one story |
| 3 | Trópico y fiordos | Tropics and fjords |
| 4 | Un venezolano y una vikinga, off-grid en Panamá | A Venezuelan and a Viking, off-grid in Panama |
| 5 | Del Caribe a las Islas Feroe | From the Caribbean to the Faroe Islands |
| 6 | Nuestra historia entre dos culturas | Our story between two cultures |
| 7 | Selva y fiordos | Jungle and fjords |

**`/felo`**
| # | es | en |
|---|---|---|
| 1 | Nativo venezolano. Casado con una vikinga. | Venezuelan native. Married to a Viking. |
| 2 | Venezolano en el trópico | Venezuelan in the tropics |
| 3 | Venezolano, off-grid en Bocas | Venezuelan, off-grid in Bocas |
| 4 | Del Caribe, con una vikinga | From the Caribbean, with a Viking |

**`/sanna`**
| # | es | en |
|---|---|---|
| 1 | Feroesa. Casada con un venezolano. | Faroese. Married to a Venezuelan. |
| 2 | Vikinga en el Caribe | Viking in the Caribbean |
| 3 | De los fiordos al trópico | From the fjords to the tropics |
| 4 | Islas Feroe → Panamá | Faroe Islands → Panama |

### Generic / commercial options for the couple (Q16 — "que ayude a vendernos")
The tagline's job here is to sell: a brand, sponsor or guest should know the niche instantly.

| # | es | en | angle |
|---|---|---|---|
| A | Viajes, naturaleza y vida off-grid | Travel, nature and off-grid living | names the niche outright — most sellable |
| B | Aventura, naturaleza y vida simple | Adventure, nature and simple living | softer, lifestyle-brand friendly |
| C | Dos mundos, una aventura | Two worlds, one adventure | emotional, brand-y, less informative |
| D | Historias de viaje entre dos mundos | Travel stories from two worlds | keeps the two-cultures hook, still generic |
| E | Viajamos, creamos, compartimos | We travel, we create, we share | creator-forward, rhythmic |
| F | Creando historias de viaje y naturaleza | Creating travel and nature stories | plain descriptor, safe |
| G | Dos culturas explorando el mundo | Two cultures exploring the world | bridges identity and niche |

**Claude's pick: A.** Three words name the whole business — travel, nature, off-grid — and it works equally for a sponsor, an Airbnb guest and a new follower. It also stays true as the content evolves.

**Note the trade-off:** generic sells, but "un venezolano y una vikinga" is the hook nobody else on earth has. The resolution is that the design carries the identity (flags, split header, photos) while the tagline does the commercial work — so neither is lost.

### Commercial options for the personal pages (Q18)

**`/felo`** — angle: nature, off-grid, the tropics (he owns the house + coral project)
| # | es | en |
|---|---|---|
| 1 | Viajes, naturaleza y vida off-grid | Travel, nature and off-grid living |
| 2 | Explorando el trópico y la vida off-grid | Exploring the tropics and off-grid living |
| 3 | Naturaleza, aventura y vida simple | Nature, adventure and simple living |
| 4 | Viajes y vida off-grid en el trópico | Travel and off-grid living in the tropics |

**`/sanna`** — angle: culture, the move between two worlds
| # | es | en |
|---|---|---|
| 1 | Viajes, cultura y vida entre dos mundos | Travel, culture and life between two worlds |
| 2 | Explorando el mundo entre dos culturas | Exploring the world between two cultures |
| 3 | Viajes, naturaleza y nuevas culturas | Travel, nature and new cultures |
| 4 | Del norte al trópico, explorando el mundo | From the north to the tropics, exploring the world |

**Claude's picks: felo #1, sanna #1.** They stay commercial, match the root's register, and each claims a different territory so the pages read as distinct.

### `/felo` — variants of #2 without leaning on off-grid (Q19)
| # | es | en |
|---|---|---|
| 2a | Explorando el trópico y la naturaleza | Exploring the tropics and nature |
| 2b | Explorando el trópico y la vida simple | Exploring the tropics and simple living |
| 2c | Explorando el trópico, el mar y la selva | Exploring the tropics, the sea and the jungle |
| 2d | Explorando el trópico y sus culturas | Exploring the tropics and its cultures |
| 2e | Explorando la naturaleza del trópico | Exploring the nature of the tropics |

Claude's pick: **2a** — closest to #2's shape, keeps nature (his territory), drops the off-grid repetition, and pairs cleanly with Sanna's "cultura" angle so the two pages stay distinct.

## Page spec (as decided so far)

Every page is mobile-first — nearly all traffic is a thumb tapping an Instagram bio.

**Personal top** (differs per page)
1. `ES | EN` toggle — small, top-right, must not push down the photo
2. Banner image, fades in on load
3. Circular profile photo, centered, top-middle (overlapping the banner's lower edge)
4. Name
5. One-line tagline
6. Social icon row — flat, monochrome, unlabeled: Instagram · TikTok · YouTube

**Shared bottom** (same on every page, one data file)
1. **Último Video · Latest Video** — rich card: 16:9 thumbnail, play overlay, title, channel name. ONE video, auto-pulled from the joint channel's RSS. No subscriber count.
2. **Quédate con Nosotros · Stay With Us** — the off-grid stay. The BIGGEST, most distinctive box on the page: styled as the tiny house itself, little roof on top, something "dynamic". Not shaped like the other boxes.
3. **Nuestras Guías · Our Guides** — OFF (no content yet)
4. **Lo Que Usamos · What We Use** — affiliate. OFF (no content yet)
5. **Escríbenos · Say Hi** — opens email. Per-page address (Felo's / Sanna's). No WhatsApp.

**Order rationale (Q13):** video first, stay second. A visitor arriving from a reel is in "who are these two?" mode, not "book a trip" mode — the video is the low-commitment next step they came for. The stay converts them on the way down, which is why it's second but visually dominant.

## Content inventory (confirmed by user, Q11)

| Item | Owner | URL / value | Status |
|---|---|---|---|
| Instagram | Felo | https://www.instagram.com/feloferoe/ | LIVE |
| Instagram | Sanna | https://www.instagram.com/sannalavida | LIVE |
| TikTok | Felo | https://www.tiktok.com/@feloferoe | LIVE |
| TikTok | Sanna | https://www.tiktok.com/@sannalavida | LIVE |
| YouTube | **JOINT** | https://www.youtube.com/@SannaFelo | LIVE |
| Email | Felo | feloferoe@gmail.com | LIVE |
| Email | Sanna | sannalavida@gmail.com | LIVE |
| Off-grid stay + coral restoration | shared | https://caribbeancoralrestorationlanding.vercel.app/ | LIVE — provisional link, may move later |
| Faroe Islands guide | shared | — | **DOES NOT EXIST** → section built but switched off |
| Affiliate link | shared | — | **DOES NOT EXIST** → section built but switched off |

Notes:
- Social set is small and clean: **Instagram, TikTok, YouTube** only. No Facebook / X / Pinterest. That's 3 icons (+ optionally an email icon, as in the Linktree reference).
- The YouTube handle is `@SannaFelo` — the channel is branded to both of them, confirming the joint-channel decision.
- TECHNICAL: YouTube's RSS feed needs a `channel_id` (`UC…`), not the `@handle`. Must resolve the handle to its channel ID once, then hardcode it in the data file.
- The stay is BOTH a coral-restoration project and an off-grid Airbnb; marketed as "off-grid stay in Bocas del Toro, Panama".
- **CORRECTION to the "shared bottom" model (Q6):** contact is NOT shared — there are two different emails. Contact is personal. Working assumption: `/felo` → feloferoe@gmail.com, `/sanna` → sannalavida@gmail.com, and the root couple page offers both (or a chosen primary). User to correct if wrong.

## Design language (extracted from user's 4 reference screenshots)
References supplied: Linktree's own page (lime green), Ziwe (pink), thekelseyrose (beige). Patterns worth copying:

1. **One saturated brand color owns the entire page.** None of them are white. Background is the brand. → For us: deep jungle green. Opportunity: a gradient from jungle green → fjord slate-blue literally encodes the jungle↔Viking story.
2. **Header stack order is consistent:** banner/wordmark → profile image → name → one-line tagline → social icon row. Ziwe's is almost exactly what Felo described (banner graphic + centered photo).
3. **Social icons are flat, monochrome, unlabeled, one row.** No boxes or buttons — they inherit a single brand color. 6–8 max before crowding. Linktree's row includes an email icon alongside the socials.
4. **The YouTube card is the hero, and it's rich — not a plain link.** Both Ziwe and Kelsey show: large 16:9 thumbnail + play overlay, video title, channel name, metadata (subscriber count, "2 weeks ago"), and an embedded Subscribe button. Far more compelling than a text link. NOTE: Linktree auto-fetches this; on a custom site it's a build decision.
5. **Section headers group links into meaning** ("Iconic Guest", "Popular Episodes", "Follow Me on Social", "Shop my favs!"). Grouping beats a flat wall of 8 buttons. → Ours (es / en): Último Video · Latest Video / Nuestras Guías · Our Guides / Quédate con Nosotros · Stay With Us / Lo Que Usamos · What We Use / Escríbenos · Say Hi.
6. **Link buttons: full-width, rounded, icon left, label centered, optional subtitle.** Kelsey's subtitles carry social proof ("466.7K followers"). Big tap targets, consistent height — mobile-first, since nearly all traffic is an Instagram bio tap.
7. **Card personality comes from border/shadow.** Linktree = thick black border + hard drop shadow; Ziwe = offset pink shadow. Cheap, high-impact styling.
8. **Horizontal carousels for multiple items.** Ziwe's "Popular Episodes" scrolls sideways with the next card peeking — shows 4–5 videos without a long page.
9. **Emoji + casual voice in labels** ("Watch me on Youtube 📺", "Revolve Favs 💛"). Keeps it human; fits a travel couple.

**Linktree-platform-only features we'd have to build or skip:** Verified badge, sticky Subscribe button, the ⋮ share/report menu, auto-fetched follower counts.

**Where we should beat these examples:** all four bury the person's identity — you land on a wall of buttons. Felo & Sanna have a genuinely good story, and the split jungle/fjord header (on the root couple page) is a storytelling moment no Linktree gets. NOTE: originally conceived as a "pick your guide" chooser gate; dropped in Q7 — the visual survives as a page header, not a door.

## Q&A log
### Q20 — Felo's tagline pick creates a collision with the root
- Asked: which no-off-grid variant for `/felo`?
- Captured:
  - **User picked "Explorando el mundo entre dos culturas"** — which was Sanna's option 2, not one of the Felo variants.
  - **COLLISION:** that is the root tagline reordered.
    - root: *Dos culturas explorando el mundo*
    - felo: *Explorando el mundo entre dos culturas*
    - sanna: *Viajes, cultura y vida entre dos mundos*
    All three now say "two cultures / two worlds" — the blurring risk raised in Q18, now realised. The pages already share a background, a video and a whole bottom half; identical taglines remove the last differentiator.
  - **Honest counter-weight Claude owes the user:** almost nobody sees two of these pages — one link, one page. The repetition is only visible to someone comparing them, i.e. a brand, sponsor or press contact evaluating the couple. Which is precisely the audience the commercial taglines exist to serve. So it costs little with followers and most with buyers.
  - Alternatives offered: keep the shape and his territory but drop the duplication — e.g. *Explorando el mundo desde el trópico*.
- Flags:
  - `/felo` final tagline — user to confirm duplicate-of-root or take a differentiated variant

### Q19 — De-emphasise "off-grid"; Sanna's tagline DECIDED
- Asked: which commercial taglines for the personal pages?
- Captured:
  - **User: "no te enfoques tanto en el off-grid. me gusta el dos y uno de sanna."**
  - **`/sanna` — ✅ FINAL (option 1):** es *Viajes, cultura y vida entre dos mundos* / en *Travel, culture and life between two worlds*
  - **`/felo` — he likes option 2's SHAPE ("Explorando el trópico y…") but option 2 itself contains "off-grid"**, which he just asked to de-emphasise. Contradiction flagged to him; variants of #2 without off-grid offered.
  - **SITE-WIDE VOICE RULE (new):** "off-grid" is not the identity. Use it sparingly — ideally once, on the stay box, where it is literally the product. Do not repeat it across taglines, headers and copy.
    - Consequence: revisit wording elsewhere in this doc that leans on "off-grid" as the brand (the flagship-asset bullet, the stay box copy).
- Flags:
  - `/felo` final tagline -> user, choosing from the no-off-grid variants of #2

### Q18 — Personal taglines must also be commercial
- Asked: keep the personal taglines identity-based (their own bio words)?
- Captured:
  - **User: "si los quiero tambien comerciales como el root."** All three taglines are commercial/sellable — no identity-only lines anywhere.
  - Claude's identity-based recommendation (his IG bio words / "Vikinga en el Caribe") is dropped.
  - **Risk Claude raised:** with a shared bottom, one joint video and now three similar commercial taglines, the three pages risk blurring into each other — only the photo and name would differ. Mitigation: give each person a DIFFERENT commercial angle rather than the same generic line.
    - Felo's angle → nature / off-grid / the tropics (he owns the house + coral project)
    - Sanna's angle → culture / between two worlds / the Nordic-to-tropics move
  - New commercial option sets for both personal pages written into the Tagline options section.
- Flags:
  - Final personal taglines -> user (+ Sanna for hers)

### Q17 — Root tagline — DECIDED (option G)
- Asked: which generic/commercial option for the couple?
- Captured:
  - **User picked G.** Root tagline is:
    - es: **Dos culturas explorando el mundo**
    - en: **Two cultures exploring the world**
  - Good fit for the brief: it sells (names what they do — exploring/travel) while keeping the two-cultures hook that is unique to them. Claude had recommended A ("Viajes, naturaleza y vida off-grid"); G is the bridge option and keeps more brand.
  - Still open: the two personal page taglines.
- Flags:
  - `/felo` and `/sanna` taglines -> ASKED NEXT

### Q16 — Tagline should be generic + commercial ("que ayude a vendernos")
- Asked: (user request) more generic options for the couple description, aimed at selling themselves. Short.
- Captured:
  - **The tagline's job changed.** It is no longer an identity line ("who we are") — it is a commercial positioning line aimed at brands, sponsors, Airbnb guests and collaborators.
  - Implication: it should name the NICHE plainly (travel / nature / off-grid living) so a brand reading it in three seconds knows whether they fit.
  - Key structural insight surfaced: he does not have to choose between generic and distinctive. The 🇻🇪 + 🇫🇴 flags, the split jungle/fjord header and the profile photos already carry the venezolano+vikinga identity visually — so the TEXT can do the commercial work while the DESIGN keeps the hook. Both jobs get done.
  - New generic option set written into the Tagline options section.
- Flags:
  - Final pick still open -> user (+ Sanna for hers)

### Q15 — Per-page fallback language — RESOLVED (Spanish everywhere)
- Asked: should `/felo` default to Spanish and `/sanna` to English, mirroring their own bios?
- Captured:
  - **User: "keep both in Spanish as fallback page."** Recommendation overridden.
  - Final rule: the browser/phone language still wins when it clearly says Spanish or English. When it is ambiguous or neither, **every page falls back to Spanish** — `/felo`, `/sanna`, and root alike. The `ES | EN` toggle remains on every page.
  - User also asked for more short tagline/description options → see the expanded Tagline options section.
- Flags:
  - Pick final taglines from the expanded option list -> user (+ Sanna for hers)

### Q14 — Taglines — user answered with a screenshot of both real IG bios
- Asked: do the drafted taglines work? (Claude drafted "Un caribeño y una vikinga…" etc.)
- Captured:
  - User replied with a screenshot of both Instagram profiles rather than prose — see the "Their real Instagram bios" section above, now the source of truth for voice.
  - **Claude was wrong to write "caribeño"** — his own bio says "Nativo Venezolano". Corrected throughout.
  - "Vikinga" was validated — it is his own word, from his own bio.
  - Taglines rewritten entirely from their own public wording; recorded above.
  - New fact: their bios are in different languages (his Spanish, hers English), and Sanna has the larger following.
- Flags:
  - Sanna to approve her own tagline -> Sanna
  - Given his bio is Spanish and hers is English, should each page DEFAULT to a different language? -> ASKED NEXT

### Q13 — Page priority / what the page is for — RESOLVED
- Asked: the video and the stay compete for the top slot — if this page did one thing well for a year, is it grow the channel or fill the house? (Claude recommended video first, stay second but visually biggest.)
- Captured:
  - **User: "yes video first, airbnb 2nd."** Recommendation confirmed.
  - Final order locked; full ordering written into the Page spec section above.
  - The stay is second in sequence but FIRST in visual weight — biggest, most distinctive box.
- Flags: none

### Q12 — What the "Airbnb" link really is — RESOLVED
- Asked: is `caribbeancoralrestorationlanding.vercel.app` a conservation project, the rental's landing page, or both? Where should the box point, and does that page stay separate? (Claude tried to fetch the page to answer this without asking — the network egress proxy blocked the domain, so it had to be asked.)
- Captured:
  - **User: "its both."** It is a coral restoration project AND the stay. He markets it as: **"my Airbnb off-grid stay in Panama island Bocas del Toro."**
  - **Link target for now: the Vercel URL**, `https://caribbeancoralrestorationlanding.vercel.app/`. Explicitly "for now" — treat as provisional.
  - Vocabulary to use on the site (his words): *off-grid stay*, *Bocas del Toro*, *Panama*, coral restoration. NOT generic "our Airbnb".
  - Strategic note: this is the only asset they own outright with no platform taking a cut, and "stay off-grid and help restore a coral reef" is a far stronger hook than a generic affiliate link. Supports making it the largest, most distinctive box on the page (already agreed: tiny-house styling with a roof).
- Flags:
  - The Vercel URL is provisional — revisit whether it should point at a real Airbnb/booking listing (where money changes hands) or move onto `sannayfelo.com/casa` -> user, later
  - Claude could not inspect the page (egress blocked), so its actual content/copy is unknown — user to supply copy/photos for the box -> user

### Q11 — What exists today vs aspirational — RESOLVED
- Asked: which of the six content items has a real URL right now? (Claude recommended shipping only real things, building the rest but switching them off in the data file rather than showing "coming soon" boxes.)
- Captured:
  - Handles, YouTube channel, the Airbnb page and the emails: **all real** — full list recorded in the Content inventory section above.
  - **Faroe Islands guide: does not exist.** **Affiliate link: does not exist.** Both sections get built into the template but ship switched OFF (`enabled: false`); flipping one line turns them on later. No "coming soon" boxes — they make a page look abandoned, and it would sit in the Instagram bio rotting.
  - Two separate emails surfaced a modelling error: the contact box can't be shared. See correction note in the Content inventory.
- Flags:
  - The "Airbnb" URL is `caribbeancoralrestorationlanding.vercel.app` — that reads like a **coral restoration project**, not a tiny-house rental listing. Need to know what this actually is. -> ASKED NEXT
  - Confirm the per-page email routing (and what the root couple page uses) -> user
  - Resolve `@SannaFelo` to its `UC…` channel ID for the RSS feed -> Claude, at build time

### Q10 — Language switching — RESOLVED (option a)
- Asked: toggle w/ auto-detect (a), both languages shown at once (b), or auto-detect only (c)?
- Captured:
  - **User picked (a).** A small `ES | EN` toggle, top-right.
  - Behaviour: auto-detect from the browser/phone language on first visit, defaulting to **Spanish** when unclear; the visitor can override with the toggle; the choice is remembered (localStorage) for return visits.
  - Rejected (b) — doubling every label bloats a page whose job is to be scanned in ~3 seconds.
  - Rejected (c) — auto-detect alone strands people whose phone language isn't the language they read (common among expats/immigrants, a real slice of this audience).
  - Layout note: toggle sits in the top corner, small, and must not compete with or push down the profile photo.
- Flags: none

### Q9 — Bilingual — RESOLVED (both languages)
- Asked: Does the Spanish decision include Sanna's page, given her possible Faroese/Nordic following? (Claude recommended all-Spanish for v1, strings kept swappable.)
- Captured:
  - **User: "do both languages on it."** Recommendation overridden again — the site is BILINGUAL, Spanish + English, not Spanish-only.
  - Applies to the whole site, both people's pages and the root couple page — not a per-page language split.
  - Consequence: every UI string needs an `es` and an `en` value in the strings file. This is a real content task for the user (or Claude drafts and they correct).
  - Consequence surfaced: only the interface can be reliably bilingual. The YouTube video title comes from the channel in whatever language it was published; guide names and the Airbnb listing are similarly fixed. So: bilingual chrome, native-language content.
- Flags:
  - How the language is chosen/switched (toggle vs auto-detect vs both shown at once) -> ASKED NEXT

### Q8 — Site language — RESOLVED (Spanish)
- Asked: What language is the site in? Claude recommended English-primary with Spanish flourishes, but flagged it was guessing at the audience split and asked how Spanish-speaking the real following is.
- Captured:
  - **User: "no do it in spanish is our main audience now."** Claude's English recommendation was WRONG — overridden.
  - Site is **Spanish**: all copy, section headers, button labels, taglines.
  - The word "now" matters: the audience mix may shift (Sanna's Nordic following, international Airbnb guests). So build with all UI strings in a single strings file — adding a language later should be a data change, not a rebuild.
  - Spanish section headers to use: Último Video / Nuestras Guías / Quédate con Nosotros / Lo Que Usamos / Escríbenos.
- Flags:
  - Does Sanna's page also go Spanish, given her Faroese/Nordic followers? -> ASKED NEXT

### Q7 — Chooser landing page — RESOLVED (dropped)
- Asked: Is the chooser worth it? Each of you will put your OWN deep link in your OWN bio, so followers land directly on `/felo` or `/sanna` and almost nobody ever sees the chooser — meanwhile the few who do hit it face a door before any content.
- Captured:
  - **User: "yes good."** Chooser gate is dropped.
  - Final routes: `/felo` and `/sanna` are the real bio links; `/` (root) becomes a genuine couple page rather than a gate — split jungle-green/fjord-blue header with both of them, then the same shared body.
  - The split-screen jungle↔fjord visual the user liked survives: it becomes the root page's HEADER instead of a door in front of the site.
  - Principle worth remembering: every page must stand alone, because most visitors will only ever see one of them.
- Flags: none

### Q6 — Shared vs personal content — RESOLVED
- Asked: Almost everything you described is "our/we" (video, guide, Airbnb, contact) but the architecture is two personal pages. Which is it? And is the YouTube channel joint or one each?
- Captured:
  - **CONFIRMED: "Personal top and shared bottom, as how it should be."** Each profile page = personal header (own photo, name, tagline, own social handles) + shared body (latest video, guides, Airbnb, contact).
  - Shared content lives in ONE data file, rendered on both pages — edit a link once, it updates everywhere. User: "We edit the links."
  - **YouTube channel is JOINT.** One channel, so the same latest video appears on both pages. Only ever ONE video shown on the page (not a carousel of several — differs from the Ziwe reference).
  - **Airbnb box should be visually special** — "a little bit dynamic," deliberately different from the uniform link boxes. Concept: styled like the tiny house itself, with a little roof on top of the box. Specific design to be worked out later.
- Flags:
  - Airbnb box detailed design (roof treatment, animation/"dynamic" behavior) -> revisit in a design pass
  - (Resolved in Q7: chooser dropped; root becomes a real couple page.)

### Q5 — Latest-video refresh mechanism — RESOLVED
- Asked: How should the latest YouTube video stay current — (a) free RSS feed + daily rebuild, (b) serverless function for instant, (c) manual? And do you want subscriber counts (which would require a YouTube API key)?
- Captured:
  - **User: "Skip the counts."** No subscriber/follower counts anywhere on the site.
  - Skipping counts removes the only reason to need a YouTube API key → **working decision: option (a)**, YouTube's free public RSS feed (`youtube.com/feeds/videos.xml?channel_id=...`), refreshed by a scheduled daily rebuild. No API key, no quota, no cost, no ongoing manual work. Video appears automatically within ~24h of publishing.
  - Consequence: hosting can stay a plain static site (no serverless runtime required).
  - Consequence for design: the reference examples' social-proof subtitles (e.g. "466.7K followers") are OUT. Link button subtitles, if used, must be hand-written text instead.
- Flags: none

### Q4 — Reference examples analyzed
- Asked: user sent 4 Linktree screenshots and said "analyze these examples"
- Captured: full teardown recorded above in "Design language". Key takeaway — the reference that most matches Felo's stated vision is Ziwe's (banner graphic at top + centered hero photo + icon row + rich video card + grouped sections).
- Flags: none

### Q3 — Social platforms & handles (ASKED, NOT YET ANSWERED)
- Asked: Which platforms need icons at the top (guess: Instagram, YouTube, TikTok)? And the actual handles/URLs for both Felo and Sanna?
- Captured: not answered yet — user moved to the domain decision and reference examples
- Flags:
  - Full list of social platforms + handles/URLs for Felo AND Sanna -> user (treat as a content-collection task, batch with other content later)

### Q2 — Domain name — RESOLVED
- Asked: Do you own a domain, or want suggestions? User asked for shared travel-theme options.
- Captured:
  - Couple's story angle for branding: he's Caribbean ("jungle man"), she's from the Faroe Islands ("Viking")
  - Claude proposed: nature-pairing (WildAndFjord.com, FjordAndJungle.com), Viking/jungle wordplay (TheJungleViking.com), handle-based (FeloAndSanna.com)
  - **User decided: `sannayfelo.com`** — handle/name-based with a Spanish twist, her name first
- Flags:
  - Availability check + registration of `sannayfelo.com` -> not yet done

### Q1 — Site structure (one domain, two profiles) & visual style
- Asked: Tech/hosting approach (recommended: static site on GitHub Pages/Vercel)
- Captured:
  - **Site architecture decision:** ONE shared domain for both. A main "chooser" landing page lets a visitor pick her profile or his profile, routing to separate sub-pages — not two separate sites/domains.
  - **Visual style:** green color palette, "very adventurous" feeling/vibe
  - A hero banner that fades in (fade-in animation on load)
  - A main profile picture (circular, Linktree-style) centered at the top-middle of each profile page
  - User will send a reference example (→ delivered, see Q4)
  - Tech/hosting not explicitly confirmed, but a static site (routes `/`, `/felo`, `/sanna`) supports this structure
- Flags:
  - Hosting + how the "latest video" refreshes -> open, see Open flags

### Q0 — Initial brain dump (from kickoff prompt)
- Asked: (n/a — user's initial framing of the project)
- Captured:
  - Wants a Linktree-like website to use as the bio link on Instagram, YouTube, other social media
  - Social media icons at the top, all linking out
  - First/featured thing on the page = latest YouTube video, with a thumbnail
  - Later: a Faroe Islands guide link
  - A link to something that makes money — an affiliate link
  - A section for their Airbnb house in Bocas del Toro
  - A contact box — on click, sends to email (explicitly NOT WhatsApp, "no WhatsApp yet, we don't want to include it")
  - Personal brand/handle: "feloferoe"
  - Build Felo's profile first; Sanna's is the same concept, done afterward
- Flags: none

## Open flags (pending input)
- Full list of social platforms + handles/URLs, for Felo AND Sanna -> user
- Availability check + registration of `sannayfelo.com` -> user (or Claude can check)
- YouTube channel ID/URL — is it one joint channel or one each? -> user
- Affiliate program(s) / what the money link actually points to -> user
- Airbnb listing URL for the Bocas del Toro house -> user
- Contact email address to use in the mailto link -> user
- Profile photos + banner images (jungle / fjord shots) -> user
- Faroe Islands guide: is it a future page on this site, or an off-site link? -> user
