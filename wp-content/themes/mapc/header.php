<?php
/**
 * The header for the MAPC theme
 */
$user = wp_get_current_user();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/uswds/css/uswds.min.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> class="layout-demo">
  <a class="usa-skipnav" href="#main-content">Skip to main content</a>
  <header class="usa-header usa-header-basic mapc-header" role="banner">
    <?php get_template_part( 'template-parts/header/gov-banner'); ?>
    <div class="usa-nav-container">

      <div class="usa-navbar">
        <div class="usa-logo" id="logo">
          <em class="usa-logo-text">
            <a href="/" accesskey="1" title="Home" aria-label="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
          </em>
        </div>
        <nav class="mapc-login-nav">
          <ul class="usa-unstyled-list">
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
          </ul>
        </nav>
        <button class="usa-menu-btn">Menu</button>
      </div>
    </div>
  </header>
  <?php get_template_part( 'template-parts/navigation/navigation'); ?>
