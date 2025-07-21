<?php get_header(); ?>

<main class="site-main" style="padding: 60px 20px; max-width: 900px; margin: auto;">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      <h1 style="font-size: 32px; color: #111;"><?php the_title(); ?></h1>
      
      <?php if (has_post_thumbnail()) : ?>
        <div style="margin: 30px 0;">
          <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto; border-radius: 8px;']); ?>
        </div>
      <?php endif; ?>

      <div style="font-size: 17px; color: #333; line-height: 1.7;">
        <?php the_content(); ?>
      </div>

    <?php endwhile;
  endif;
  ?>
</main>

<?php get_footer(); ?>