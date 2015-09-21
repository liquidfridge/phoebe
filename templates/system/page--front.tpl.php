<?php
// Ensure Metatag module adds its content.
render($page['content']['metatags']);
?>
<div class="l-page">
  <div class="l-container">
    <header class="l-header" role="banner">
      <div class="l-logo"></div>
      <?php if ($page['content']['front_title']): ?>
        <h1 class="l-title"><?php print render($page['content']['front_title']); ?></h1>
      <?php endif; ?>
    </header>

    <div class="l-main">
      <?php print render($page['content']['front_body']); ?>
    </div>
  </div>
</div>
