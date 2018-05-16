<?php
/**
 * The page template file
 */
?>

<?php get_header(); ?>

<div class="usa-overlay"></div>
<main class="usa-grid usa-section usa-content usa-layout-docs" id="main-content">
  <?php get_sidebar(); ?>
  <div class="usa-width-three-fourths">
    <?php
      if ( !is_front_page() ) {
        get_template_part( 'template-parts/page/breadcrumb' );
      }
    ?>
    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/page/content' );

    endwhile; // End of the loop.
    ?>
  </div>
</main>

<?php get_footer(); ?>
