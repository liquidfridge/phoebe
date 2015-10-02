<?php

/**
 * Implements template_preprocess_book_export_html().
 */
function phoebe_preprocess_book_export_html(&$variables) {
  $theme_path = drupal_get_path('theme', 'phoebe');
  $variables['theme_url'] = url($theme_path);

  $variables['site_name'] = variable_get('site_name');

  $source_url = url('node/' . $variables['id'], array('absolute' => TRUE));
  $source_changed = dandelion_get_book_changed($variables['id']);
  $variables['source'] = '<p>'
      . t('Source: !url', array(
        '!url' => l(trim($source_url, '/'), $source_url),
      ))
      . '<br />'
      . t('Updated: !datetime', array(
        '!datetime' => format_date($source_changed),
      ))
      . '</p>';

  $footer = NULL;
  if (module_exists('footer_message')) {
    $msg = variable_get('footer_message_msg', array('value' => 'This is default site footer content.'));
    $format = isset($msg['format']) ? $msg['format'] : NULL;
    $footer = check_markup($msg['value'], $format);
  }
  $variables['footer'] = $footer;
}
