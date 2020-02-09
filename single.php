<?php
get_header();
?>

<main id="main-content">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $category = get_the_category();
    $images = get_post_meta($post->ID, '_igv_images', true);
    $residency = get_post_meta($post->ID, '_igv_residency', true);
    $hide_date = get_post_meta($post->ID, '_igv_hide_date', true);
?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <header class="padding-top-small padding-bottom-small">
            <div class="container grid-row justify-center">
              <div class="grid-item item-s-12 item-m-7 item-l-5 text-align-center">
                <div class="font-size-small">
                  <span><?php echo is_singular('resident') ? 'Resident' : 'News'; ?></span>
                  <?php echo empty($hide_date) ? '<span>&ensp;|&ensp;</span>' : ''; ?>
                  <date><?php
                    if (is_singular('resident')) {
                      echo !empty($residency) ? $residency : '';
                    } else {
                      echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : '';
                    }
                  ?></date>
                </div>
                <h1 class="font-size-extra line-larger"><?php the_title(); ?></h1>
              </div>
            </div>
          </header>

          <?php render_carousel($images); ?>

          <?php if (strlen(get_the_content()) > 0) { ?>

          <section class="padding-top-small padding-bottom-small border-top">
            <div id="post-content" class="container grid-row justify-center line-larger">
              <?php the_content(); ?>
            </div>
          </section>

          <?php } ?>
        </article>

<?php
  }
}

if( get_post_type() === 'post' ) {
  get_template_part('partials/recent-news');
}
?>
</main>

<?php
get_footer();
?>
