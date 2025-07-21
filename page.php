<?php get_header(); ?>

<main class="site-main">
  <div class="container">
    <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_title('<h1 class="page-title">', '</h1>');
          
        endwhile;
      else :
        echo '<p>No content found.</p>';
      endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>


