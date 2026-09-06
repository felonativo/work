# Sanna y Felo — Link-in-bio Website: Brainstorm / Discovery Notes
Date: 2026-09-05 · Goal: Design a Linktree-style link-in-bio website at **sannayfelo.com** — a couple page at the root plus a standalone page for each of them. **Site language: Spanish.**

Handles: **@feloferoe** (Felo) · **Sanna La Vida** (Sanna)

## Summary / key decisions
- **Domain: `sannayfelo.com`** — DECIDED. Spanish "y" (and) ties to Felo's Caribbean side and reads naturally bilingually.
- **Three pages, one site — NO chooser gate.**
  - `/felo` — Felo's page. Goes in Felo's own Instagram/social bios.
  - `/sanna` — Sanna's page. Goes in Sanna's own bios.
  - `/` (root) — a real couple page, not a door: both of them in a split jungle/fjord header, then the same shared body. The link for brand deals, press, and anyone typing the bare domain.
  - No visitor ever has to click before reaching content. Build Felo's page first; Sanna's reuses the template.
- **Site language: SPANISH.** Spanish-speaking followers are the main audience "now". All UI copy, section headers, buttons and taglines in Spanish. Because the user said "now", keep every UI string in one strings/data file so another language (or a per-page language) can be added later without touching layout.
- **Brand story to lean on:** Felo = Caribbean, "jungle man"; Sanna = Faroe Islands, "Viking". The jungle ↔ fjord / warm ↔ cold contrast is the visual and narrative spine of the whole site.
- **Page anatomy: personal top + shared bottom.** Personal header (own photo, name, tagline, own socials) sits above a shared body (latest video, guides, Airbnb, contact) driven by one shared data file. Edit a link once → updates on both pages.
- **YouTube is one joint channel** → the same single latest video appears on both pages. One video only, not a carousel.
- **The Airbnb box is deliberately not like the other link boxes** — styled as the tiny house itself, with a little roof on top, and something "dynamic". Detailed design TBD.
- Purpose: a single bio-link page to drop in Instagram/YouTube/social profiles
- Visual style: green palette, adventurous/travel vibe; fade-in hero banner; circular profile photo centered at top of each profile page
- Top of each profile page: row of social media icons linking out to all their profiles
- Featured/hero section: latest YouTube video, shown with its thumbnail
- Planned/future link: a Faroe Islands travel guide (not built yet — placeholder for now)
- A monetization section: an affiliate link
- A section for their Airbnb property in Bocas del Toro
- A "contact us" box — clicking it opens email (NOT WhatsApp — explicitly excluded, no WhatsApp yet)
- Tech approach: static site, multiple routes. Latest video auto-pulled from YouTube's free RSS feed via a daily scheduled rebuild — no API key, no manual updates.
- **No follower/subscriber counts anywhere** (user: "skip the counts").

## Design language (extracted from user's 4 reference screenshots)
References supplied: Linktree's own page (lime green), Ziwe (pink), thekelseyrose (beige). Patterns worth copying:

1. **One saturated brand color owns the entire page.** None of them are white. Background is the brand. → For us: deep jungle green. Opportunity: a gradient from jungle green → fjord slate-blue literally encodes the jungle↔Viking story.
2. **Header stack order is consistent:** banner/wordmark → profile image → name → one-line tagline → social icon row. Ziwe's is almost exactly what Felo described (banner graphic + centered photo).
3. **Social icons are flat, monochrome, unlabeled, one row.** No boxes or buttons — they inherit a single brand color. 6–8 max before crowding. Linktree's row includes an email icon alongside the socials.
4. **The YouTube card is the hero, and it's rich — not a plain link.** Both Ziwe and Kelsey show: large 16:9 thumbnail + play overlay, video title, channel name, metadata (subscriber count, "2 weeks ago"), and an embedded Subscribe button. Far more compelling than a text link. NOTE: Linktree auto-fetches this; on a custom site it's a build decision.
5. **Section headers group links into meaning** ("Iconic Guest", "Popular Episodes", "Follow Me on Social", "Shop my favs!"). Grouping beats a flat wall of 8 buttons. → Ours, in Spanish: Último Video / Nuestras Guías / Quédate con Nosotros / Lo Que Usamos / Escríbenos.
6. **Link buttons: full-width, rounded, icon left, label centered, optional subtitle.** Kelsey's subtitles carry social proof ("466.7K followers"). Big tap targets, consistent height — mobile-first, since nearly all traffic is an Instagram bio tap.
7. **Card personality comes from border/shadow.** Linktree = thick black border + hard drop shadow; Ziwe = offset pink shadow. Cheap, high-impact styling.
8. **Horizontal carousels for multiple items.** Ziwe's "Popular Episodes" scrolls sideways with the next card peeking — shows 4–5 videos without a long page.
9. **Emoji + casual voice in labels** ("Watch me on Youtube 📺", "Revolve Favs 💛"). Keeps it human; fits a travel couple.

**Linktree-platform-only features we'd have to build or skip:** Verified badge, sticky Subscribe button, the ⋮ share/report menu, auto-fetched follower counts.

**Where we should beat these examples:** all four bury the person's identity — you land on a wall of buttons. Felo & Sanna have a genuinely good story, and the split jungle/fjord header (on the root couple page) is a storytelling moment no Linktree gets. NOTE: originally conceived as a "pick your guide" chooser gate; dropped in Q7 — the visual survives as a page header, not a door.

## Q&A log
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
