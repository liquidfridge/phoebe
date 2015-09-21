<?php

/**
 * Implements hook_preprocess_page().
 */
function phoebe_preprocess_page(&$variables) {
  global $user;

  // Build menus.
  $user_menu = array();
  $path = current_path();

  if (user_is_logged_in()) {
//    $user_menu[] = array(
//      'title' => t('Log out'),
//      'href' => url('user/logout'),
//      'weight' => 0,
//      'expanded' => 0,
//    );
  }
  else {
    $query = array();

    if (stripos($path, 'user/login') === FALSE) {
      $query['destination'] = $path;
    }

    $user_menu[] = array(
      'title' => t('Log in'),
      'href' => url('user/login'),
      'query' => $query,
      'alias' => TRUE,
      'weight' => 0,
      'expanded' => 0,
    );
  }

  $variables['user_menu'] = $user_menu;

  // If front page.
  if ($variables['is_front']) {
    // Add CSS.
    drupal_add_css(drupal_get_path('theme', 'phoebe') . '/css/phoebe.front.css', array(
      'group' => CSS_THEME,
    ));

    // Load "front" node.
    $title = NULL;
    $body = NULL;
    $alias = 'front';
    $path = drupal_lookup_path('source', $alias);
    $front = explode('/', $path);

    if ($front[0] == 'node' && ctype_digit($front[1])) {
      $nid = $front[1];
      $node = node_load($nid);

      if (!empty($node)) {
        $node_view = node_view($node);
        $title = $node_view['#node']->title;
        $body = $node_view['body'];
      }
    }

    $variables['page']['content']['front_title'] = $title;
    $variables['page']['content']['front_body'] = $body;
  }
  else {
    // Add CSS.
    drupal_add_css(drupal_get_path('theme', 'phoebe') . '/css/phoebe.not-front.css', array(
      'group' => CSS_THEME,
      'weight' => -100,
    ));
  }
}
