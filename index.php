<?php get_header(); ?>

<main class="site-main container">
  <?php if (have_posts()) : ?>

    <!-- Blog Hero Section -->
    <section class="blog-hero">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-page.png" alt="Blog Banner" class="blog-banner">
      <h1 class="blog-title">Blog</h1>
    </section>

    <!-- Blog Posts Listing -->
    <section class="post-listing">
      <?php while (have_posts()) : the_post(); ?>
        <article class="post-card">
          <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="post-excerpt"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>
    </section>

    <!-- Pagination -->
    <div class="pagination">
      <?php the_posts_pagination(); ?>
    </div>

  <?php else : ?>
    <p>No posts found.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>