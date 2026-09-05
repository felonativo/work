# Feloferoe Linktree-style Website: Brainstorm / Discovery Notes
Date: 2026-09-05 · Goal: Design a Linktree-style personal bio-link website for Instagram/YouTube ("feloferoe"), then a second matching site for wife's brand "Sanna La Vida"

## Summary / key decisions
- **One website, one shared domain**, not two separate sites. A landing/chooser page lets visitors pick "Felo" or "Sanna," routing to that person's own sub-page. Build Felo's profile content first; Sanna's ("Sanna La Vida") follows the same template.
- Purpose: a single bio-link page to drop in Instagram/YouTube/social profiles
- Visual style: green palette, adventurous/travel vibe; fade-in hero banner; circular profile photo centered at top of each profile page. User will share a reference example.
- Top of each profile page: row of social media icons linking out to all their profiles
- Featured/hero section: latest YouTube video, shown with its thumbnail
- Planned/future link: a Faroe Islands travel guide (not built yet — placeholder for now)
- A monetization section: an affiliate link
- A section for their Airbnb property in Bocas del Toro
- A "contact us" box — clicking it should open an email (NOT WhatsApp — explicitly excluded, no WhatsApp yet)
- Likely tech approach: static site (HTML/CSS/JS), multiple routes/pages, hosted free (GitHub Pages/Vercel) — pending explicit confirmation

## Q&A log
### Q1 — Site structure (one domain, two profiles) & visual style
- Asked: Tech/hosting approach (recommended: static site on GitHub Pages/Vercel)
- Captured:
  - **Site architecture decision:** ONE shared domain for both Felo and Sanna. A main "chooser" landing page lets a visitor pick "her profile" or "his profile," which routes to separate sub-pages (one per person) — not two separate sites/domains.
  - **Visual style:** green color palette, "very adventurous" feeling/vibe (fits travel/adventure content)
  - A hero banner that fades in (fade-in animation on load)
  - A main profile picture (circular, Linktree-style) centered at the top-middle of each profile page
  - User will send a reference example/screenshot later so I can match the look more precisely
  - Tech/hosting question not explicitly confirmed yet, but a static site (single codebase, multiple routes: `/`, `/felo`, `/sanna`) fully supports this chooser + sub-page structure, so proceeding on that assumption unless told otherwise
- Flags:
  - Waiting on: reference image/example from user for visual style -> user will send
  - Domain name not yet decided -> user

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
  - Build feloferoe's site first; wife's site ("Sanna La Vida") is the same concept, done afterward, separately
- Flags: none yet

## Open flags (pending input)
(none yet)
