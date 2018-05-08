<?php
/**
 * Displays top navigation
 */

?>

<nav role="navigation" class="mapc-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'mapc' ); ?>">
  <div class="usa-nav-container">
    <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_class' => 'usa-nav-primary usa-accordion',
        'link_before' => '<span>',
        'link_after' => '</span>',
        'depth' => 1,
       ) );
    ?>
  </div>
</nav>

