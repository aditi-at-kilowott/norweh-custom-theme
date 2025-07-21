<?php
/*
Template Name: Blog
*/
get_header(); 
?>

<main class="site-main">

  <!-- Blog Header Banner -->
  <div class="blog-header">
    <h1 class="blog-header-title">Blog</h1>
  </div>

  <!-- Blog Cards Loop -->
  <section class="blog-listing-section">

    <?php
    $blog_query = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => -1
    ]);

    if ($blog_query->have_posts()) :
      while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

        <div class="blog-card">

          <div class="blog-image-wrapper">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large', ['class' => 'blog-thumbnail']); ?>
              <span class="badge">BLOG</span>
            <?php endif; ?>
          </div>

          <div class="blog-content">
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <a href="<?php the_permalink(); ?>">READ MORE »</a>
          </div>

        </div>

      <?php endwhile;
      wp_reset_postdata();
    else :
      echo '<p>No blog posts found.</p>';
    endif;
    ?>
</main> 
   <?php get_footer(); ?>