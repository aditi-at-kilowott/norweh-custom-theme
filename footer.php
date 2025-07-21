<footer class="site-footer">
  <div class="footer-columns container">

  <!-- LOGO -->
<div class="footer-column center-column">
  <?php 
    $footer_logo = get_field('footer_logo', 'option');
    if ($footer_logo):
  ?>
    <img src="<?php echo esc_url($footer_logo['url']); ?>" class="footer-logo" alt="Norweh Logo" />
  <?php endif; ?>
</div>

    <!-- QUICK LINKS -->
    <div class="footer-column">
      <h4 class="footer-title">Quick Links</h4>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_quick_links',
          'menu_class' => 'footer-links',
          'container' => false
        ));
      ?>
    </div>

    <!-- CONTACT INFORMATION -->
    <div class="footer-column">
      <h4 class="footer-title">Contact Information</h4>
      <?php $contact = get_field('footer_contact_info', 'option'); ?>
      <?php if ($contact): ?>
        <p>
          <?php if ($contact['location_icon']): ?>
          <img src="<?php echo esc_url($contact['location_icon']['url']); ?>" alt="Location Icon">
          <?php endif; ?>
          <?php echo esc_html($contact['address']); ?>
        </p>

        <p>
          <?php if ($contact['phone_icon']): ?>
          <img src="<?php echo esc_url($contact['phone_icon']['url']); ?>" alt="Phone Icon">
          <?php endif; ?>
          <?php echo esc_html($contact['phone']); ?>
        </p>

        <p>
          <?php if ($contact['email_icon']): ?>
           <img src="<?php echo esc_url($contact['email_icon']['url']); ?>" alt="Email Icon">
          <?php endif; ?>
          <?php echo esc_html($contact['email']); ?>
        </p>
      <?php endif; ?>
    </div>

   <!-- GIVEAWAY SECTION -->
<div class="footer-column giveaway-column">
  <?php $giveaway = get_field('giveaway_section', 'option'); ?>
  <?php if ($giveaway): ?>
    <h4 class="footer-title"><?php echo esc_html($giveaway['heading']); ?></h4>
    <p class="giveaway-subtext"><?php echo esc_html($giveaway['subtext']); ?></p>
  <?php endif; ?>

  <!-- FORM -->
<form class="giveaway-form" action="#" method="post">
  <div class="form-group">
    <label for="giveaway-name">First Name</label>
    <input type="text" id="giveaway-name" name="giveaway-name" placeholder="Enter your name" required>
  </div>

  <div class="form-group">
    <label for="giveaway-email">Email</label>
    <input type="email" id="giveaway-email" name="giveaway-email" placeholder="Enter your email" required>
  </div>

  <button type="submit" class="submit-button">Submit</button>
</form>


<?php if (have_rows('footer_badge_logos', 'option')): ?>
  <div class="footer-badge-logos">
    <?php while (have_rows('footer_badge_logos', 'option')): the_row();
      $badge = get_sub_field('badge_logo_image');
      if ($badge): ?>
        <img src="<?php echo esc_url($badge['url']); ?>" alt="<?php echo esc_attr($badge['alt']); ?>">
      <?php endif;
    endwhile; ?>
  </div>
<?php endif; ?>

  <!-- DYNAMIC PAYMENT LOGOS -->
<div class="payment-logos">
  <?php if (have_rows('payment_logos', 'option')): ?>
    <?php while (have_rows('payment_logos', 'option')): the_row(); ?>
      <?php $logo_image = get_sub_field('logo_image'); ?>
      <?php if ($logo_image): ?>
        <img src="<?php echo esc_url($logo_image['url']); ?>" alt="Payment Logo">
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
</div>
  </div>

  <!-- FOOTER BOTTOM STRIP -->
  <div class="footer-bottom container">
    <div class="footer-bottom-inner">
      <div class="footer-bottom-left">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'footer_bottom',
            'menu_class'     => 'footer-bottom-menu',
            'container'      => false
          ));
        ?>
      </div>

      <div class="footer-bottom-center">
        <?php if (have_rows('footer_payment_logos', 'option')) : ?>
    <div class="payment-logos">
        <?php while (have_rows('footer_payment_logos', 'option')) : the_row();
            $logo = get_sub_field('logo_image');
            if ($logo): ?>
                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
            <?php endif;
        endwhile; ?>
    </div>
<?php endif; ?>
      </div>

      <div class="footer-bottom-right">
  &copy; <?php echo date('Y'); ?>. <?php the_field('footer_copyright', 'option'); ?>
</div>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
