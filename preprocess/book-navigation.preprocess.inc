<?php

/**
 * Implements hook_preprocess_book_navigation().
 */
function phoebe_preprocess_book_navigation(&$variables) {
  $nid = $variables['book_id'];
  $url = 'node/' . $nid;
  $alias = drupal_get_path_alias($url);

  // Add book-navigation--[ALIAS] template suggestion.
  $name = 'book_navigation__' . $alias;
  $name = str_replace(array(':', '-'), '_', $name);
  $variables['theme_hook_suggestions'][] = $name;
}
