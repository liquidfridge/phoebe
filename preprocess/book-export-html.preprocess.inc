<?php

/**
 * Implements template_preprocess_book_export_html().
 */
function phoebe_preprocess_book_export_html(&$variables) {
  $theme_path = drupal_get_path('theme', 'phoebe');
  $variables['theme_url'] = url($theme_path);

  $variables['header'] = variable_get('site_name');

  $footer = NULL;
  if (module_exists('footer_message')) {
    $msg = variable_get('footer_message_msg', array('value' => 'This is default site footer content.'));
    $format = isset($msg['format']) ? $msg['format'] : NULL;
    $footer = check_markup($msg['value'], $format);
  }
  $variables['footer'] = $footer;
}
