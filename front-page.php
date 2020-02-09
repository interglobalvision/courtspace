<?php
get_header();
?>

<main id="main-content">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $tagline = get_bloginfo('description');

    if ($tagline !== '') {
?>
  <section class="padding-top-small padding-bottom-small">
    <div class="container grid-row">
      <div class="grid-item item-s-12 text-align-center line-larger">
        <div class="font-size-large"><span><?php echo $tagline; ?></span></div>
        <div class="font-size-mid"><span>Orah, Bosnia and Herzegovina</span></div>
      </div>
    </div>
  </section>
<?php
    }
    if (!empty(get_the_post_thumbnail())) {
?>
  <section class="padding-top-small padding-bottom-small <?php echo $tagline !== '' ? 'border-top' : ''; ?>">
    <div class="container grid-row">
      <div class="grid-item item-s-12">
        <div id="home-banner" style="background-image: url('<?php the_post_thumbnail_url('full-width'); ?>')"></div>
      </div>
    </div>
  </section>
<?php
    }

    get_template_part('partials/recent-news');
  }
}
?>


</main>

<?php
get_footer();
?>
