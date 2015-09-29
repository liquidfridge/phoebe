<!DOCTYPE html>
<?php if (omega_extension_enabled('compatibility') && omega_theme_get_setting('omega_conditional_classes_html', TRUE)): ?>
<!--[if IEMobile 7]><html class="ie iem7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
<!--[if lte IE 6]><html class="ie lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="ie lt-ie9 lt-ie8" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
<!--[if IE 8]><html class="ie lt-ie9" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><html class="ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
<![if !IE]><html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]>
<?php else: ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<?php endif; ?>
<head>
  <title><?php print $head_title; ?></title>
  <link rel="apple-touch-icon-precomposed" sizes="192x192" href="/apple-touch-icon-192x192-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="180x180" href="/apple-touch-icon-180x180-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-152x152-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/apple-touch-icon-120x120-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/apple-touch-icon-76x76-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-57x57-precomposed.png" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body<?php print $attributes; ?>>
  <div class="l-page">
    <header class="l-header" role="banner">
      <div class="l-branding">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <?php if ($site_name): ?>
            <h1 class="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <?php print $header; ?>
    </header>

    <div class="l-main">
      <div class="l-content" role="main">
        <?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
        <?php print $messages; ?>
        <?php print $content; ?>
      </div>
    </div>

    <footer class="l-footer" role="contentinfo">
      <?php print $footer; ?>
    </footer>
  </div>
</body>
</html>
