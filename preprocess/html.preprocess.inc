<?php

/**
 * Implements hook_preprocess_html().
 */
function phoebe_preprocess_html(&$variables) {
  $theme_path = drupal_get_path('theme', 'phoebe');

  $variables['theme_info'] = array(
    'realpath' => $theme_path,
  );
}
