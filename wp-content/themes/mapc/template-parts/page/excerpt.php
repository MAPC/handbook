<?php
/**
 * Template part for displaying page excerpt in search.php
 */
?>

<article id="post-<?php the_ID(); ?>" class="" <?php post_class(); ?>>
  <a href="<?php echo the_permalink(); ?>">
    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
  </a>
  <?php the_excerpt(); ?>
</article>
