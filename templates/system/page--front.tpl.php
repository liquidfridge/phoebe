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
    <div class="l-constrained">
      <header class="l-header" role="banner">
        <h1 class="l-site-name">
          <?php print render($page['content']['site_name']); ?><span class="blinking-cursor"></span>
        </h1>
      </header>

      <div class="l-main">
        <?php print render($page['content']['front_body']); ?>

        <div class="l-menu">
          <?php print render($page['content']['front_menu']); ?>
        </div>
      </div>

      <?php if ($page['content']['front_footer']): ?>
        <footer class="l-footer" role="contentinfo">
          <div class="l-credit">
            <?php print render($page['content']['front_footer']); ?>
          </div>
        </footer>
      <?php endif; ?>
    </div>
  </div>
</div>