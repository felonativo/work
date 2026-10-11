# Brevo emails

Two emails, both Spanish. Paste the HTML into Brevo: **Campaigns → Templates →
Create a template → "Paste your code"** (the HTML editor), save, then note the
template's numeric ID (shown in the template list / in the URL).

| file | purpose | where it plugs in |
|---|---|---|
| `confirm-es.html` | Double opt-in confirmation. Must contain `{{ params.DOIurl }}` (it does). | Its ID goes in `site/inc/config.php` → `newsletter.doi_template_id` |
| `welcome-es.html` | The grant guide people get right after confirming. | Brevo → Automations → "Welcome email" → trigger: contact added to the **Faroe Islands** list → send this template |

Subject lines to use:

- Confirmation: `Confirma tu correo para recibir la guía`
- Welcome: `Cómo vivir sin pagar renta en el Ártico (la convocatoria cierra el 15 de octubre)`

Before sending anything:

- The welcome email says the call **closes October 15**. After that date, edit it
  (remove that line and the "Ojo con esto" deadline bullet) or swap in the next
  opportunity.
- All grant details come from the text the site owner pasted from
  arcticdigitalnomads.com/grant — re-read that page and fix anything that changed.
- Brevo adds your company/sender address to the footer from Account → Company
  information. Fill that in; it is a legal requirement for marketing email.
- `{{ unsubscribe }}` is Brevo's unsubscribe link placeholder; keep it.
