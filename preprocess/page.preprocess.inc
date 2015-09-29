<?php

/**
 * Implements hook_preprocess_page().
 */
function phoebe_preprocess_page(&$variables) {
  global $theme;
  global $user;

  $theme_path = drupal_get_path('theme', 'phoebe');
  $theme_url = url($theme_path);

  // Add theme settings.
  drupal_add_js(array(
    $theme => array(
      'path' => $theme_path,
      'url' => $theme_url,
    )), 'setting');

  // Build menus.
  $variables['footer_menu'] = menu_tree('menu-footer-menu');
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
    drupal_add_css($theme_path . '/css/phoebe.front.css', array(
      'group' => CSS_THEME,
    ));

    // Title.
    $variables['page']['content']['site_name'] = variable_get('site_name');

    // Image.
    $url = NULL;
    $fid = variable_get('dandelion_front_page_image');
    if (!empty($fid)) {
      if (($file = file_load($fid)) !== FALSE) {
        $url = file_create_url($file->uri);
      }
    }
    $variables['page']['content']['front_image'] = $url;

    // Body.
    $body = variable_get('dandelion_front_page_body', array('value' => NULL, 'format' => NULL));
    $variables['page']['content']['front_body'] = check_markup($body['value'], $body['format']);

    // Footer.
    $footer = variable_get('dandelion_front_page_footer', array('value' => NULL, 'format' => NULL));
    $variables['page']['content']['front_footer'] = check_markup($footer['value'], $footer['format']);

    // Menu.
    $tree = menu_tree_all_data('menu-front-menu');
    $front_menu = menu_tree_output($tree);
    $variables['page']['content']['front_menu'] = $front_menu;
  }
  else {
    // Add CSS.
    drupal_add_css($theme_path . '/css/phoebe.not-front.css', array(
      'group' => CSS_THEME,
      'weight' => -100,
    ));

    // Header image.
    $url = NULL;
    $fid = variable_get('dandelion_front_page_image');
    if (!empty($fid)) {
      if (($file = file_load($fid)) !== FALSE) {
        $url = file_create_url($file->uri);
      }
    }
    $variables['page']['header_image'] = $url;
  }
}
