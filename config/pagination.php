<?php

return [
  /**
   * The framework that will be used to render the pagination links
   *
   * If you want to render the pagination links with the default Laravel pagination
   * then set the value to 'default'.
   *
   * If you want to render the pagination links
   * with the Tailwind CSS framework then set the value to 'tailwind'.
   *
   * If you want to render the pagination links with the Bootstrap CSS framework then set
   * the value to 'bootstrap'.
   *
   * Available options: 'tailwind', 'bootstrap'
   *
   * @var string
   */
  'framework' => env('PAGINATION_FRAMEWORK', 'tailwind'),

  /**
   * Pagination styles
   *
   * The styles that will be used to render the pagination links.
   *
   * Available options: 'tailwind', 'bootstrap'
   *
   * @var array
   */
  'styles' => [
    /**
     * Tailwind styles
     *
     * The styles that will be used to render the pagination links with the Tailwind CSS framework.
     *
     * @var array
     */
    'tailwind' => [
      'base'        => 'ajax-pagination px-4 py-2 rounded-lg shadow flex items-center gap-2',
      'previous'    => 'bg-{{inactive_bg}} text-{{inactive_text}} hover:bg-{{hover_bg}} mr-2',
      'next'        => 'bg-{{inactive_bg}} text-{{inactive_text}} hover:bg-{{hover_bg}}',
      'page'        => 'bg-{{inactive_bg}} text-{{inactive_text}} hover:bg-{{hover_bg}} mr-2',
      'active'      => 'bg-{{active_bg}} text-{{active_text}}',
      'info_text'   => 'text-center mt-3 text-sm text-{{info_text}}',
    ],

    /**
     * Bootstrap styles
     *
     * The styles that will be used to render the pagination links with the Bootstrap CSS framework.
     *
     * @var array
     */

    'bootstrap' => [
      'base'      => 'page-link ajax-pagination',
      'previous'  => '',
      'next'      => '',
      'page'      => '',
      'active'    => 'active',
      'info_text' => 'text-muted',
    ],
  ],

  /**
   * Pagination colors
   *
   * The colors that will be used to render the pagination links.
   *
   * @var array
   */
  'colors' => [
    'active_bg'     => env('PAGINATION_ACTIVE_BG',     'blue-500'),
    'active_text'   => env('PAGINATION_ACTIVE_TEXT',   'white'),
    'inactive_bg'   => env('PAGINATION_INACTIVE_BG',   'gray-300'),
    'inactive_text' => env('PAGINATION_INACTIVE_TEXT', 'gray-700'),
    'hover_bg'      => env('PAGINATION_HOVER_BG',      'gray-400'),
    'info_text'     => env('PAGINATION_INFO_TEXT',     'gray-600'),
  ],
];
