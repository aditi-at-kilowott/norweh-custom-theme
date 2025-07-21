<?php
/* Template Name: About Us */
get_header(); 
?>

<main class="site-main about-page">
  <?php
    while ( have_posts() ) : the_post();
      the_content();
    endwhile;
  ?>
</main>

<?php get_footer(); ?>
