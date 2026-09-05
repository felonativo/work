# Sanna y Felo — Link-in-bio Website: Brainstorm / Discovery Notes
Date: 2026-09-05 · Goal: Design a Linktree-style link-in-bio website at **sannayfelo.com** — a shared landing page that routes to Felo's profile and Sanna's profile

Handles: **@feloferoe** (Felo) · **Sanna La Vida** (Sanna)

## Summary / key decisions
- **Domain: `sannayfelo.com`** — DECIDED. Spanish "y" (and) ties to Felo's Caribbean side and reads naturally bilingually.
- **One website, one shared domain**, not two separate sites. A landing/chooser page lets visitors pick Felo or Sanna, routing to that person's own sub-page (`/felo`, `/sanna`). Build Felo's profile first; Sanna's follows the same template.
- **Brand story to lean on:** Felo = Caribbean, "jungle man"; Sanna = Faroe Islands, "Viking". The jungle ↔ fjord / warm ↔ cold contrast is the visual and narrative spine of the whole site.
- Purpose: a single bio-link page to drop in Instagram/YouTube/social profiles
- Visual style: green palette, adventurous/travel vibe; fade-in hero banner; circular profile photo centered at top of each profile page
- Top of each profile page: row of social media icons linking out to all their profiles
- Featured/hero section: latest YouTube video, shown with its thumbnail
- Planned/future link: a Faroe Islands travel guide (not built yet — placeholder for now)
- A monetization section: an affiliate link
- A section for their Airbnb property in Bocas del Toro
- A "contact us" box — clicking it opens email (NOT WhatsApp — explicitly excluded, no WhatsApp yet)
- Tech approach: static site, multiple routes — hosting/refresh mechanism still open (see flags)

## Design language (extracted from user's 4 reference screenshots)
References supplied: Linktree's own page (lime green), Ziwe (pink), thekelseyrose (beige). Patterns worth copying:

1. **One saturated brand color owns the entire page.** None of them are white. Background is the brand. → For us: deep jungle green. Opportunity: a gradient from jungle green → fjord slate-blue literally encodes the jungle↔Viking story.
2. **Header stack order is consistent:** banner/wordmark → profile image → name → one-line tagline → social icon row. Ziwe's is almost exactly what Felo described (banner graphic + centered photo).
3. **Social icons are flat, monochrome, unlabeled, one row.** No boxes or buttons — they inherit a single brand color. 6–8 max before crowding. Linktree's row includes an email icon alongside the socials.
4. **The YouTube card is the hero, and it's rich — not a plain link.** Both Ziwe and Kelsey show: large 16:9 thumbnail + play overlay, video title, channel name, metadata (subscriber count, "2 weeks ago"), and an embedded Subscribe button. Far more compelling than a text link. NOTE: Linktree auto-fetches this; on a custom site it's a build decision.
5. **Section headers group links into meaning** ("Iconic Guest", "Popular Episodes", "Follow Me on Social", "Shop my favs!"). Grouping beats a flat wall of 8 buttons. → Ours: Latest Video / Our Guides / Stay With Us / Gear We Use / Say Hi.
6. **Link buttons: full-width, rounded, icon left, label centered, optional subtitle.** Kelsey's subtitles carry social proof ("466.7K followers"). Big tap targets, consistent height — mobile-first, since nearly all traffic is an Instagram bio tap.
7. **Card personality comes from border/shadow.** Linktree = thick black border + hard drop shadow; Ziwe = offset pink shadow. Cheap, high-impact styling.
8. **Horizontal carousels for multiple items.** Ziwe's "Popular Episodes" scrolls sideways with the next card peeking — shows 4–5 videos without a long page.
9. **Emoji + casual voice in labels** ("Watch me on Youtube 📺", "Revolve Favs 💛"). Keeps it human; fits a travel couple.

**Linktree-platform-only features we'd have to build or skip:** Verified badge, sticky Subscribe button, the ⋮ share/report menu, auto-fetched follower counts.

**Where we should beat these examples:** all four bury the person's identity — you land on a wall of buttons. Felo & Sanna have a genuinely good story, and the chooser landing page is an asset no Linktree gets: a storytelling moment (split screen, jungle one side / fjord the other, "pick your guide").

## Q&A log
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
- How the "latest YouTube video" stays current (auto-fetch vs manual) -> user, ASKED NEXT
- YouTube channel ID/URL for Felo (and Sanna) -> user
- Affiliate program(s) / what the money link actually points to -> user
- Airbnb listing URL for the Bocas del Toro house -> user
- Contact email address to use in the mailto link -> user
- Profile photos + banner images (jungle / fjord shots) -> user
- Faroe Islands guide: is it a future page on this site, or an off-site link? -> user
