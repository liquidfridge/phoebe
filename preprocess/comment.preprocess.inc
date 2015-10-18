<?php

/**
 * Implements hook_preprocess_comment().
 */
function phoebe_preprocess_comment(&$variables) {
  $comment = $variables['elements']['#comment'];

  if (empty($comment->in_preview)) {
    if (isset($variables['content']['links']['comment']['#links']['comment-delete'])) {
      $variables['content']['links']['comment']['#links']['comment-delete']['title'] = t('Delete');
    }
    if (isset($variables['content']['links']['comment']['#links']['comment-edit'])) {
      $variables['content']['links']['comment']['#links']['comment-edit']['title'] = t('Edit');
    }
    if (isset($variables['content']['links']['comment']['#links']['comment-reply'])) {
      $variables['content']['links']['comment']['#links']['comment-reply']['title'] = t('Reply');
    }
  }

  // Remove "comment forbidden" message because it's empty.
  if (isset($variables['content']['links']['comment']['#links']['comment_forbidden'])) {
    unset($variables['content']['links']['comment']['#links']['comment_forbidden']);
  }

  $uri = entity_uri('comment', $comment);
  $uri['options'] += array(
    'attributes' => array(
      'class' => array(
        'permalink'
      ),
      'rel' => 'bookmark',
      'title' => t('Permalink'),
    ),
  );

  $variables['permalink'] = l(t('∞'), $uri['path'], $uri['options']);
  $variables['submitted'] = t('!username !datetime', array(
    '!username' => '<span class="username">' . $comment->name . '</span>',
    '!datetime' => '<span class="time">' . $variables['created'] . '</span>',
  ));
}
