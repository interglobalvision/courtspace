<?php
get_header();
?>

<main id="main-content">
  <header class="padding-top-small padding-bottom-small">
    <div class="container">
      <div class="grid-row">
        <h1 class="text-align-center grid-item item-s-12">News & Announcements</h1>
      </div>
    </div>
  </header>

<?php
$highlight_args = array(
  'ignore_sticky_posts' => true,
  'meta_query' => array(
    array(
      'key'     => '_igv_highlight',
      'value'   => 'on',
      'compare' => '=',
    ),
  ),
);

$highlight_query = new WP_Query($highlight_args);

$highlight_ids = array();

if ($highlight_query->have_posts()) {
?>
  <section>
<?php
  while ($highlight_query->have_posts()) {
    $highlight_query->the_post();
    array_push($highlight_ids, $post->ID);
?>
    <article class="news-highlight padding-top-small padding-bottom-small border-top">
      <div class="container">
        <div class="grid-row">
          <div class="grid-item item-s-12 item-m-6 item-l-5 offset-l-1 font-size-zero grid-row align-items-center">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('archive-thumb'); ?>
            </a>
          </div>
          <div class="grid-item item-s-12 item-m-6 item-l-5 padding-top-tiny grid-column justify-between">
            <div>
              <date class="font-size-tiny"><?php echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : ''; ?></date>
              <h2 class="font-size-extra"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div><?php the_excerpt(); ?></div>
          </div>
        </div>
      </div>
    </article>
<?php
  }
?>
  </section>
<?php
}
wp_reset_postdata();
?>
<?php
$news_args = array(
  'ignore_sticky_posts' => false,
  'post__not_in' => $highlight_ids,
);

$news_query = new WP_Query($news_args);

if ($news_query->have_posts()) {
?>
  <section class="border-top">
    <div class="container">
      <div class="grid-row">
<?php
  while ($news_query->have_posts()) {
    $news_query->the_post();
    $hide_date = get_post_meta($post->ID, '_igv_hide_date', true);
?>
        <article <?php post_class('grid-item item-s-12 item-m-6 item-l-4 padding-top-small margin-bottom-small text-align-center'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink(); ?>">
            <div><?php the_post_thumbnail('archive-thumb'); ?></div>
            <date class="font-size-micro"><?php echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : ''; ?></date>
            <h2 class="font-size-basic"><?php the_title(); ?></h2>
          </a>
        </article>
<?php
  }
?>
      </div>
    </div>
  </section>
<?php
}
wp_reset_postdata();
?>

</main>

<?php
get_footer();
?>
