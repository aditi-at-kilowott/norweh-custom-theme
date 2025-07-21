<?php
/* Template Name: Contact */
get_header();
?>

<main class="site-main contact-page">
  <div class="contact-container">

   <!-- Left Side: Contact Details -->
<div class="contact-details">
  <h2>GET IN TOUCH</h2>

  <?php if (function_exists('have_rows') && have_rows('contact_info_blocks', 'option')): ?>
    <?php while (have_rows('contact_info_blocks', 'option')): the_row(); ?>
      <div class="info-block">
        <div class="icon-circle">
          <?php $icon = get_sub_field('icon_image'); ?>
          <?php if (!empty($icon['url'])): ?>
            <img src="<?php echo esc_url($icon['url']); ?>" alt="icon" />
          <?php endif; ?>
        </div>
        <p><?php the_sub_field('text_line_1'); ?></p>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No contact info found. Please add some from Theme Settings → Contact Info Blocks.</p>
  <?php endif; ?>
</div>


    <!-- Right Side: Contact Form -->
    <div class="contact-form-wrapper">
      <h2>FILL THIS FORM</h2>

      <?php
      // Handle form submission
      if ( isset($_POST['cf-submitted']) ) {
        $name    = sanitize_text_field($_POST['cf-name']);
        $email   = sanitize_email($_POST['cf-email']);
        $phone   = sanitize_text_field($_POST['cf-phone']);
        $option  = sanitize_text_field($_POST['cf-option']);
        $message = sanitize_textarea_field($_POST['cf-message']);

        $attachment_url = '';
        if ( ! empty($_FILES['cf-file']['name']) ) {
          require_once(ABSPATH . 'wp-admin/includes/file.php');
          $uploaded = media_handle_upload('cf-file', 0);
          if (!is_wp_error($uploaded)) {
            $attachment_url = wp_get_attachment_url($uploaded);
          }
        }

        $to = get_option('admin_email');
        $subject = 'New Contact Form Submission';
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        $body = "
          <strong>Name:</strong> $name<br>
          <strong>Email:</strong> $email<br>
          <strong>Phone:</strong> $phone<br>
          <strong>Pavilion Option:</strong> $option<br>
          <strong>Message:</strong> $message<br>
        ";
        if ($attachment_url) {
          $body .= "<br><strong>Attachment:</strong> <a href='$attachment_url' target='_blank'>View File</a>";
        }

        if (wp_mail($to, $subject, $body, $headers)) {
          echo '<div class="cf-success">✅ Thank you! Your form was submitted successfully.</div>';
        } else {
          echo '<div class="cf-error">❌ Oops! Something went wrong. Please try again.</div>';
        }
      }
      ?>

      <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data">
        <p>
          <label for="cf-name">Your Name</label>
          <input type="text" id="cf-name" name="cf-name" required>
        </p>
        <p>
          <label for="cf-email">Email</label>
          <input type="email" id="cf-email" name="cf-email" required>
        </p>
        <p>
          <label for="cf-phone">Phone</label>
          <input type="tel" id="cf-phone" name="cf-phone">
        </p>
        <p>
          <label for="cf-option">Pavilions</label>
          <select id="cf-option" name="cf-option">
            <option value="Pavilion">Pavilion</option>
            <option value="Pergola">Pergola</option>
            <option value="Premium">Premium</option>
          </select>
        </p>
        <p>
          <label for="cf-file">Attach a photo</label>
          <input type="file" id="cf-file" name="cf-file">
        </p>
        <p>
          <label for="cf-message">Additional Information</label>
          <textarea id="cf-message" name="cf-message"></textarea>
        </p>
        <p>
          <input type="submit" name="cf-submitted" value="Submit" class="submit-btn">
        </p>
      </form>
    </div>

  </div>
</main>

<?php get_footer(); ?>
