<?php
// Check if the page title should be displayed.
$display_title = dandelion_check_path_visibility(1, implode("\n", array(
  'comment/*',
    )));
?>

<div class="l-page">
  <header class="l-header" role="banner"<?php
  if ($page['header_image']) {
    print drupal_attributes(array(
      'style' => 'background-image: url(' . $page['header_image'] . ');',
    ));
  }
  ?>>
    <div class="l-constrained">
      <div class="l-masthead">
        <div class="l-branding">
          <div class="l-logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="icon-home">
              <?php
              print phoebe_icon(array(
                'id' => 'home',
                'color' => 'white',
                'hover_color' => 'navy',
                'title' => t('Home'),
              ));
              ?>
            </a>
          </div>
        </div>
        <?php print render($page['navigation']); ?>
      </div>

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
    <div class="l-content" role="main">
      <div class="l-constrained">
        <?php print render($page['highlighted']); ?>

        <a id="main-content"></a>

        <?php if ($display_title && $title): ?>
          <h1 class="l-title"><?php print $title; ?></h1>
        <?php endif; ?>

        <?php print $messages; ?>
        <?php print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div>
    </div>

    <?php print render($page['sidebar']); ?>
  </div>

  <footer class="l-footer" role="contentinfo">
    <div class="l-constrained">
      <?php print render($page['footer']); ?>
    </div>
  </footer>
</div>
