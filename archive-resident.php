<?php
get_header();
?>

<main id="main-content">
  <header class="padding-top-small padding-bottom-small border-bottom">
    <div class="container grid-row justify-center">
      <h1 class="grid-item text-align-center">Current & Past Residents</h1>
    </div>
  </header>

  <section class="padding-top-small">
    <div class="container">
      <div class="grid-row">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $residency = get_post_meta($post->ID, '_igv_residency', true);
?>

        <article <?php post_class('grid-item item-s-12 item-m-6 item-l-4 margin-bottom-small text-align-center'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink(); ?>">
            <div><?php echo the_post_thumbnail('archive-thumb'); ?></div>
            <date class="font-size-small"><?php echo !empty($residency) ? $residency : ''; ?></date>
            <h2 class="font-size-mid"><?php the_title(); ?></h2>
          </a>
        </article>

<?php
  }
}
?>

      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>
