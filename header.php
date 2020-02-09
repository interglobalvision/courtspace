<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<?php
$options = get_site_option('_igv_site_options');
?>

<section id="main-container">
  <header id="header">
    <h1 class="u-visuallyhidden"><?php bloginfo('name'); ?></a></h1>

    <div id="main-nav-holder" class="border-bottom">
      <div class="container">
        <div class="grid-row align-items-center justify-between">

          <div id="logo-holder" class="grid-item item-s-6 item-l-2 padding-top-tiny padding-bottom-tiny font-size-zero">
            <a href="<?php echo home_url(); ?>"><img id="header-logo" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/kamen-logo.png" /></a>
          </div>

          <nav id="main-nav" class="grid-item no-gutter item-s-12 item-l-auto flex-grow">
            <?php
              wp_nav_menu( array(
                'menu' => 'main'
              ) );
            ?>
          </nav>

          <div id="main-nav-social" class="grid-item item-s-12 item-l-2 text-align-right">
            <?php
              if (!empty($options['socialmedia_instagram'])) {
            ?>
              <a class="social-link" href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-ig.png" /></a>
            <?php
              }
              if (!empty($options['socialmedia_facebook_url'])) {
            ?>
              <a class="social-link" href="<?php echo $options['socialmedia_facebook_url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-fb.png" /></a>
            <?php
              }
            ?>
          </div>

          <div id="menu-toggle-holder" class="grid-item">
            <img id="menu-toggle-open" class="menu-toggle" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/menu-open.png"/>
            <img id="menu-toggle-close" class="menu-toggle" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/menu-close.png" />
          </div>
        </div>
      </div>
    </div>

    <div id="mobile-nav-holder">
      <nav id="mobile-nav" class="border-bottom">
        <ul class="container justify-center align-items-center">
          <?php
            $menuLocations = get_nav_menu_locations();
            $menuID = $menuLocations['main'];
            $menu_items = wp_get_nav_menu_items($menuID);
            foreach ( $menu_items as $menu_item ) {
              $current = ( $_SERVER['REQUEST_URI'] == parse_url( $menu_item->url, PHP_URL_PATH ) ) ? 'current-menu-item' : '';

              echo '<li class="' . $current . '"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
            }
          ?>
          <?php
            if (!empty($options['socialmedia_instagram'])) {
          ?>
          <li>
            <a class="social-link" href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-ig.png" /></a>
          </li>
          <?php
            }
            if (!empty($options['socialmedia_facebook_url'])) {
          ?>
          <li>
            <a class="social-link" href="<?php echo $options['socialmedia_facebook_url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-fb.png" /></a>
          </li>
          <?php
            }
          ?>
        </ul>
      </nav>
    </div>
  </header>

  <div id="header-spacer"></div>
