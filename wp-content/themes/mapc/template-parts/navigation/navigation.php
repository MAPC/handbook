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
<!--   <ul class="mapc-mobile-login usa-unstyled-list">
    <?php if ( is_user_logged_in() ): ?>
      <li>
        <span class="account-item"><?php echo $user->display_name; ?></span>
      </li>
      <li>
        <a class="usa-footer-primary-link account-item" href="<?php echo wp_logout_url() ?>">
          Log Out
        </a>
      </li>
    <?php else: ?>
      <li>
        <a class="usa-footer-primary-link account-item" href="<?php echo wp_login_url() ?>">
          Log In
        </a>
      </li>
    <?php endif; ?>
  </ul> -->
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

<!-- <nav role="navigation" class="mapc-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'mapc' ); ?>">
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
</nav> -->

