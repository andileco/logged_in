<?php

/**
 * @file
 * Contains logged_in\logged_in.views.inc..
 * Provide a custom views field that checks if a user is logged in.
 */

/**
 * Implements hook_views_data().
 */
function logged_in_views_data() {

  $data['logged_in']['table']['group'] = t('Custom Global');
  $data['logged_in']['table']['join'] = [
    // #global is a special flag which allows a table to appear all the time.
    '#global' => [],
  ];

  $data['logged_in']['field'] = [
    'title' => t('Logged in'),
    'help' => t('Checks if a user is logged in.'),
    'field' => [
      'id' => 'logged_in',
    ],
  ];

  $data['logged_in']['area'] = [
    'title' => t('Logged In Area'),
    'help' => t('Provides fields to show options based on logged in status.'),
    'area' => [
      'id' => 'logged_in_area',
    ],
  ];

  return $data;
}
