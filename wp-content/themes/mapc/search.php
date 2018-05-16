<?php
/**
 * The search template file
 */
?>

<div class="mapc-content-wrapper">
  <?php get_header(); ?>

  <div class="usa-overlay"></div>
  <main class="usa-grid usa-section usa-content usa-layout-docs mapc-search-results" id="main-content">
    <div class="usa-width-four-fourths usa-layout-docs-main_content">
      <header>
        <h1>Search</h1>
        <p>Showing results for "<span class="query"><?php echo get_search_query(); ?></span>"</p>
      </header>
      <?php
      if ( have_posts() ) :

        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/page/excerpt');
        endwhile;

        the_posts_pagination( array(
          'prev_text' => '<span class="screen-reader-text">' . __( 'Previous page', 'mapc' ) . '</span>',
          'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'mapc' ) . '</span>',
          'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mapc' ) . ' </span>',
        ) );

      else : ?>

        <p>Sorry, nothing matches those search terms.</p>
      <?php endif; ?>
    </div>
  </main>
</div>

<?php get_footer(); ?>
