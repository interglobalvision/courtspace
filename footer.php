<?php
$options = get_site_option('_igv_site_options');
?>

  <footer id="footer" class="padding-top-small padding-bottom-basic margin-top-small font-size-basic">
    <div class="container">
      <div id="footer-row" class="grid-row justify-between">
        <div id="footer-logo-holder" class="grid-item item-s-6 item-m-6 item-l-3 margin-bottom-small">
          <a href="<?php echo home_url(); ?>"><img id="footer-logo" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/courtspace-logo.png" /></a>
        </div>

        <div id="footer-contact" class="grid-item no-gutter item-s-12 item-m-12 item-l-4 grid-row">
          <div class="grid-item item-s-12 item-m-6 item-l-12 margin-bottom-small">
            <h4><span class="font-bold">Mailing List</span></h4>
            <form novalidate="true" id="mailchimp-form" class="grid-row">
              <input type="email" name="EMAIL" placeholder="Your email" id="mailchimp-email" class="grid-item no-gutter">
              <button type="submit" id="mailchimp-submit" class="grid-item no-gutter">Join</button>
            </form>
            <div id="mailchimp-response"></div>
          </div>
          <div class="grid-item item-s-12 item-m-6 item-l-12 margin-bottom-small">
            <h4><span class="font-bold">Contact</span></h4>
            <?php echo !empty($options['contact_email']) ? '<a class="link-underline" href="mailto:' . $options['contact_email'] . '">' . $options['contact_email'] . '</a>' : ''; ?>
          </div>
        </div>

        <div id="footer-address" class="grid-item no-gutter item-s-12 item-m-12 item-l-3 grid-row">
          <div class="grid-item item-s-12 item-m-6 item-l-12 margin-bottom-small">
            <h4><span class="font-bold">Location</span></h4>
            <?php echo !empty($options['contact_address']) ? apply_filters('the_content', $options['contact_address']) : ''; ?>
          </div>
          <div class="grid-item item-s-12 item-m-6 item-l-12 margin-bottom-small">
            <h4><span class="font-bold">Map</span></h4>
            <div><a class="link-underline" href="https://goo.gl/maps/J8yje38URfzKbwJQA">42.815860, 18.417979</a></div>
          </div>
        </div>

        <div id="footer-social" class="grid-item item-s-6 item-m-6 item-l-2 margin-bottom-small text-align-right">
          <?php
            if (!empty($options['socialmedia_instagram'])) {
          ?>
            <a class="social-link" href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-ig-white.png" /></a>
          <?php
            }
            if (!empty($options['socialmedia_facebook_url'])) {
          ?>
            <a class="social-link" href="<?php echo $options['socialmedia_facebook_url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-fb-white.png" /></a>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </footer>

</section>

<?php
get_template_part('partials/scripts');
get_template_part('partials/schema-org');
?>

</body>
</html>
