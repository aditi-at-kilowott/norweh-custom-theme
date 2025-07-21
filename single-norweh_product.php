<?php get_header(); ?>

<main class="norweh-product-single">
  <?php while (have_posts()) : the_post(); ?>

    <!-- Product Hero Section -->
    <section class="product-hero">
      <div class="product-image">
        <?php 
          $image = get_field('product_image');
          if ($image): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        <?php endif; ?>
      </div>

      <div class="product-content">
        <h1><?php the_title(); ?></h1>
        <p class="rating">⭐️⭐️⭐️⭐️⭐️ 167 reviews</p>

        <?php if (get_field('full_description_copy')): ?>
          <div class="sale-banner-wrapper">
            <?php the_field('full_description_copy'); ?>
          </div>
        <?php endif; ?>

        <?php if (get_field('short_description')): ?>
          <p class="short-desc"><?php the_field('short_description'); ?></p>
        <?php endif; ?>

        <?php if (get_field('delivery_info')): ?>
          <p class="delivery">🚚 <?php the_field('delivery_info'); ?></p>
        <?php endif; ?>

        <?php if (get_field('warranty')): ?>
          <p class="warranty">🛡️ Warranty: <?php the_field('warranty'); ?></p>
        <?php endif; ?>

        <?php if (get_field('price')): ?>
          <p class="price">💰 Price: ₹<?php the_field('price'); ?></p>
        <?php endif; ?>

        <a href="#contact" class="cta-button">Request a Quote</a>
      </div>
    </section>

    <!-- Full Description Section -->
    <?php if (get_field('full_description')): ?>
      <section class="full-description">
        <?php the_field('full_description'); ?>
      </section>
    <?php endif; ?>

    <!-- Key Features Section -->
    <?php if (have_rows('features')): ?>
      <section class="features">
        <h2>Key Features</h2>
        <ul>
          <?php while (have_rows('features')): the_row(); ?>
            <li><?php the_sub_field('feature_item'); ?></li>
          <?php endwhile; ?>
        </ul>
      </section>
    <?php endif; ?>

    <!-- Accordion Section -->
    <section class="product-info-accordion">
      <div class="norweh-accordion">



        <!-- Dynamic Accordions from ACF Repeater -->
        <?php if (have_rows('product_info_accordion')): ?>
          <?php while (have_rows('product_info_accordion')): the_row(); ?>
            <div class="accordion-item">
              <button class="accordion-toggle" type="button">
                <span><?php the_sub_field('accordion_title'); ?></span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-content">
                <div class="centered-content">
                  <?php the_sub_field('accordion_content'); ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </section>

  <?php endwhile; ?>
</main>

<!-- Accordion Toggle Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".accordion-toggle");

    toggles.forEach((toggle) => {
      toggle.addEventListener("click", function () {
        const item = this.closest(".accordion-item");
        const icon = this.querySelector(".accordion-icon");

        document.querySelectorAll(".accordion-item").forEach((el) => {
          if (el !== item) {
            el.classList.remove("active");
            el.querySelector(".accordion-icon").textContent = "+";
          }
        });

        item.classList.toggle("active");
        icon.textContent = item.classList.contains("active") ? "−" : "+";
      });
    });
  });
</script>

<?php get_footer(); ?>
