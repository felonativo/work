<?php
/**
 * sannayfelo.com — single source of truth.
 * Edit a link here and it changes on every page.
 */

return [
  'domain'   => 'sannayfelo.com',
  'base_url' => 'https://sannayfelo.com',

  // Joint YouTube channel. The channel_id is resolved automatically from the
  // handle on first run and cached; fill it in by hand to skip that step.
  'youtube' => [
    'handle'     => '@SannaFelo',
    'url'        => 'https://www.youtube.com/@SannaFelo',
    'channel_id' => '', // e.g. 'UCxxxxxxxxxxxxxxxxxxxxxx'
  ],

  // Cloudflare Web Analytics token. Leave empty to disable analytics entirely.
  'cf_analytics_token' => '',

  'people' => [
    'felo' => [
      'name'    => 'Felo',
      'photo'   => '/assets/img/felo.webp',
      'banner'  => '/assets/img/banner-sand.webp',
      'email'   => 'feloferoe@gmail.com',
      'flag'    => '🇻🇪',
      'tagline' => [
        'es' => 'Explorando el mundo entre dos culturas',
        'en' => 'Exploring the world between two cultures',
      ],
      'socials' => [
        'instagram' => 'https://www.instagram.com/felofaroe/',
        'tiktok'    => 'https://www.tiktok.com/@felofaroe',
        'youtube'   => 'https://www.youtube.com/@SannaFelo',
      ],
    ],
    'sanna' => [
      'name'    => 'Sanna',
      'photo'   => '/assets/img/sanna.webp',
      'banner'  => '/assets/img/banner-sand.webp',
      'email'   => 'sannalavida@gmail.com',
      'flag'    => '🇫🇴',
      'tagline' => [
        'es' => 'Viajes, cultura y vida entre dos mundos',
        'en' => 'Travel, culture and life between two worlds',
      ],
      'socials' => [
        'instagram' => 'https://www.instagram.com/sannalavida',
        'tiktok'    => 'https://www.tiktok.com/@sannalavida',
        'youtube'   => 'https://www.youtube.com/@SannaFelo',
      ],
    ],
  ],

  // The couple page at the root.
  'couple' => [
    'name'    => 'Sanna y Felo',
    'banner'  => '/assets/img/banner.webp',
    'tagline' => [
      'es' => 'Dos culturas explorando el mundo',
      'en' => 'Two cultures exploring the world',
    ],
  ],

  /**
   * The shared bottom, in display order.
   * Flip 'enabled' to true the day a link actually exists — nothing else to do.
   */
  'links' => [
    'venezuela' => [
      'enabled' => true,
      'url'     => 'https://gofund.me/4f6bb1f0c',
      'label'   => [
        'es' => 'Ayuda a las víctimas del terremoto',
        'en' => 'Help the earthquake victims',
      ],
    ],
    'stay' => [
      'enabled' => true,
      'url'     => 'https://caribbeancoralrestorationlanding.vercel.app/',
      'label'   => [
        'es' => 'Casita Off Grid en Bocas del Toro',
        'en' => 'Off Grid Cabin in Bocas del Toro',
      ],
      'note'    => [
        'es' => 'Panamá · restauración de coral',
        'en' => 'Panama · coral restoration',
      ],
    ],
    // Our Faroe Islands guide, right under the video on every page.
    // Couple page: header link + topic table. /felo and /sanna: header link only.
    // Every link has a Spanish and an English target; the ES|EN switch swaps them.
    'guides' => [
      'enabled' => true,
      'pages'   => ['couple', 'felo', 'sanna'],
      'topics_on' => ['couple'],
      'url'     => [
        'es' => 'https://thefaroeislandsguide.com/es/',
        'en' => 'https://thefaroeislandsguide.com/en/',
      ],
      'label'   => [
        'es' => 'Nuestra guía de las Islas Feroe',
        'en' => 'Our Faroe Islands guide',
      ],
      'note'    => ['es' => 'thefaroeislandsguide.com', 'en' => 'thefaroeislandsguide.com'],
      'topics'  => [
        [
          'title' => ['es' => 'Islas Feroe', 'en' => 'Faroe Islands'],
          'desc'  => ['es' => 'Qué son, dónde están y lo básico', 'en' => 'What they are, where, the basics'],
          'url'   => ['es' => 'https://thefaroeislandsguide.com/es/islas-feroe/',
                      'en' => 'https://thefaroeislandsguide.com/en/faroe-islands/'],
        ],
        [
          'title' => ['es' => 'Qué hacer', 'en' => 'Things to do'],
          'desc'  => ['es' => 'Senderismo, barcos, pueblos y miradores', 'en' => 'Hikes, boat trips, villages, viewpoints'],
          'url'   => ['es' => 'https://thefaroeislandsguide.com/es/que-ver-y-hacer/',
                      'en' => 'https://thefaroeislandsguide.com/en/things-to-do/'],
        ],
        [
          'title' => ['es' => 'Planifica tu viaje', 'en' => 'Plan your trip'],
          'desc'  => ['es' => 'Entrada, presupuesto, transporte y qué llevar', 'en' => 'Entry, budget, transport, what to pack'],
          'url'   => ['es' => 'https://thefaroeislandsguide.com/es/planifica-tu-viaje/',
                      'en' => 'https://thefaroeislandsguide.com/en/plan-your-trip/'],
        ],
      ],
    ],
    'gear' => [
      'enabled' => false, // no existe todavía
      'url'     => '',
      'label'   => [
        'es' => 'Lo que usamos para viajar',
        'en' => 'What we travel with',
      ],
    ],
  ],
];
