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

  $data['views']['table']['group'] = t('Custom Global');
  $data['views']['table']['join'] = [
    // #global is a special flag which allows a table to appear all the time.
    '#global' => [],
  ];


  $data['views']['logged_in'] = [
    'title' => t('Logged in'),
    'help' => t('Checks if a user is logged in.'),
    'field' => [
      'id' => 'logged_in',
    ],
  ];

  return $data;
}
