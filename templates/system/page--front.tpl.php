<?php
// Ensure Metatag module adds its content.
render($page['content']['metatags']);
?>
<div class="l-page">
  <div class="l-image"<?php
  if ($page['content']['front_image']) {
    print drupal_attributes(array(
      'style' => 'background-image: url(' . $page['content']['front_image'] . ');',
    ));
  }
  ?>></div>
  <div class="l-text">
    <header class="l-header" role="banner">
      <div class="l-constrained">
        <?php if (!empty($user_menu)): ?>
          <div class="l-user">
            <?php
            print theme('links', array(
              'links' => $user_menu,
              'attributes' => array(
                'class' => array('menu'),
              ),
              'heading' => array(
                'text' => t('User menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            ));
            ?>
          </div>
        <?php endif; ?>
      </div>
    </header>

    <div class="l-main" id="main-content">
      <div class="l-constrained">
        <h1 class="l-site-name">
          <?php print render($page['content']['site_name']); ?>
        </h1>

        <?php print render($page['content']['front_body']); ?>

        <div class="l-menu">
          <?php print render($page['content']['front_menu']); ?>
        </div>

        <?php if ($page['content']['front_footer']): ?>
          <div class="l-credit">
            <?php print render($page['content']['front_footer']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>