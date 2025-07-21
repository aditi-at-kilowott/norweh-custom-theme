<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="header-container">

    <!-- Logo -->
    <div class="logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Norweh-Logo.png" alt="Norweh Logo" class="logo-img">
      </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="main-navigation">
      <ul class="nav-menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'items_wrap'     => '%3$s', // Output <li> only
          'container'      => false
        ));
        ?>

       
  </div>
</header>

<!-- Toggle Script -->
<script>
  function toggleProductsDropdown() {
    const dropdown = document.getElementById("productsDropdown");
    dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
  }

  document.addEventListener('click', function (e) {
    const menu = document.querySelector('.products-toggle');
    const dropdown = document.getElementById("productsDropdown");
    if (!menu.contains(e.target)) {
      dropdown.style.display = "none";
    }
  });
</script>

<?php wp_footer(); ?>
</body>
</html>