<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * phoebe theme.
 */

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
