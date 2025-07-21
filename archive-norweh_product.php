<?php get_header(); ?>

<section class="norweh-archive">
    <div class="container">
        <h1 class="page-title">Our Products</h1>

        <?php if (have_posts()) : ?>
            <div class="product-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="product-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>
                        <h2 class="product-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p><?php echo get_field('short_description'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>