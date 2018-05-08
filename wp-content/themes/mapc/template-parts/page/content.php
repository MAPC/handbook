<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" class="usa-layout-docs-main_content" <?php post_class(); ?>>
  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  <?php
    the_content();

    wp_link_pages( array(
      'before' => '<div class="page-links">' . __( 'Pages:', 'mapc' ),
      'after'  => '</div>',
    ) );
  ?>
</article><!-- #post-## -->
