<?php
/**
 * Displays top navigation
 */
$user = wp_get_current_user();
?>

<nav role="navigation" class="usa-nav mapc-nav">
  <button class="usa-nav-close">
    <img src="<?php echo get_bloginfo('template_directory'); ?>/uswds/img/close.svg" alt="close">
  </button>
  <div class="usa-nav-container">
    <div class="mapc-nav-row">
      <div class="mapc-nav-menu">
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
      <form role="search" class="usa-search usa-search-small" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div>
          <label class="usa-sr-only" for="search-field-small">Search small</label>
          <input id="search-field-small" type="search" name="s" value="<?php echo get_search_query(); ?>">
          <button type="submit">
            <span class="usa-sr-only">Search</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</nav>
