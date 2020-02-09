<?php
get_header();
?>

<main id="main-content">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $images = get_post_meta($post->ID, '_igv_images', true);
    $sections = get_post_meta($post->ID, '_igv_sections', true);
?>

  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="padding-top-small padding-bottom-small">
      <div class="container grid-row justify-center">
        <h1 class="grid-item text-align-center"><?php the_title(); ?></h1>
      </div>
    </header>

    <?php render_carousel($images); ?>

    <?php if (strlen(get_the_content()) > 0) { ?>

    <section class="padding-top-small padding-bottom-small border-top">
      <div class="container grid-row justify-center">
        <div class="grid-item item-s-12 item-m-10 item-l-6">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

    <?php } if (!empty($sections)) { ?>

    <section class="padding-top-small border-top">
      <div class="container grid-row justify-center">
        <div class="grid-item item-s-12 item-l-10 no-gutter masonry-grid">
          <?php foreach($sections as $section) { ?>

          <div class="masonry-item padding-bottom-small">
            <?php echo !empty($section['content']) ? apply_filters('the_content', $section['content']) : ''; ?>
          </div>

          <?php } ?>
        </div>
      </div>
    </section>

    <?php } ?>

  </article>

<?php
  }
}
?>

</main>

<?php
get_footer();
?>
