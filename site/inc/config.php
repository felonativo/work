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
        'instagram' => 'https://www.instagram.com/feloferoe/',
        'tiktok'    => 'https://www.tiktok.com/@feloferoe',
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
    'guides' => [
      'enabled' => false, // no existe todavía
      'url'     => '',
      'label'   => [
        'es' => 'Guía de las Islas Feroe',
        'en' => 'Faroe Islands guide',
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
