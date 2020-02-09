<?php

// Custom functions (like special queries, etc)

function render_carousel($images) {
  if (!empty($images)) {
    $is_single = count($images) > 1 ? false : true;
?>
  <section id="gallery" class="border-top">
    <div class="container">
      <div class="swiper-container padding-bottom-small">
        <div class="swiper-wrapper padding-top-small <?php echo $is_single ? 'justify-center' : ''; ?>">
        <?php
          foreach($images as $key => $value) {
            $caption = wp_get_attachment_caption($key);
        ?>
          <figure class="swiper-slide text-align-center grid-column justify-start padding-bottom-small">
            <div class="font-size-zero">
              <?php
                echo wp_get_attachment_image($key, 'carousel', false, array('data-no-lazysizes'=>'true'));
              ?>
            </div>
            <?php if (!empty($caption)) { ?>
            <figcaption class="font-size-small text-align-center padding-top-micro">
              <?php echo $caption; ?>
            </figcaption>
            <?php } ?>
          </figure>
        <?php
          }
        ?>
        </div>
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
  </section>
<?php
  }
}
