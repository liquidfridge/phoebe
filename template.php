<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * phoebe theme.
 */

/**
 * Returns HTML for a menu link and submenu.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @ingroup themeable
 */
function phoebe_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  $icon = NULL;
  $text = NULL;

  if (!empty($element['#localized_options']['attributes']['class'])) {
    foreach ($element['#localized_options']['attributes']['class'] as $delta => $class) {
      if (stripos($class, 'icon-') === 0) {
        $icon = $class;
        $element['#localized_options']['attributes']['class'][$delta] = 'icon';
      }
    }
  }

  if (empty($icon)) {
    $text = $element['#title'];
  }
  else {
    $element['#localized_options']['attributes']['title'] = $element['#title'];
    $element['#localized_options']['html'] = TRUE;
    $text = '<span' . drupal_attributes(array('class' => $icon)) . '></span>'
        . '<span class="element-invisible">' . check_plain($element['#title']) . '</span>';
  }

  $output = l($text, $element['#href'], $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements theme_talk_comments().
 */
function phoebe_talk_comments($variables) {
  $node = clone($variables['node']);
  $node->comment = _talk_node_comment_value($node);
  comment_node_view($node, 'full');

  if ($node->comment == COMMENT_NODE_OPEN) {
    if (user_access('post comments')) {
      // If comment form on same page as Talk, remove "Add new comment" link
      if (variable_get('comment_form_location_' . $node->type, COMMENT_FORM_BELOW) == COMMENT_FORM_BELOW) {
        unset($node->content['links']['comment']['#links']['comment-add']);
      }
    }
  }

  return drupal_render($node->content);
}

/**
 * Implements hook_form_comment_form_alter().
 */
function phoebe_form_comment_form_alter(&$form, &$form_state) {
  $form['author']['#access'] = FALSE;
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function phoebe_form_comment_confirm_delete_alter(&$form, &$form_state) {
  // Add "button" class to cancel link.
  $form['actions']['cancel']['#options']['attributes']['class'][] = 'button';
}
