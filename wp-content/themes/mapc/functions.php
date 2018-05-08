<?php
/**
 * MAPC functions and definitions
 */

function mapc_setup() {
  register_nav_menus( array(
    'primary'    => __( 'Primary Menu', 'mapc' ),
  ) );
}
add_action( 'after_setup_theme', 'mapc_setup' );


/* Customize login page ----------------------------------------------------- */

function my_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/mapc-logo.png);
      height: 5rem;
      width: 320px;
      background-size: auto 5rem;
      background-repeat: no-repeat;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function disable_password_reset() {
  return false;
}
add_filter( 'allow_password_reset', 'disable_password_reset');

function remove_lost_your_password($text) {
  return str_replace( array('Lost your password?', 'Lost your password'), '', trim($text, '?') );
}
add_filter( 'gettext', 'remove_lost_your_password'  );
add_filter( 'login_redirect', function( $url, $query, $user ) {
  return home_url();
}, 10, 3 );


/* Heading anchors ---------------------------------------------------------- */

/**
 * Automatically add IDs to headings such as <h2></h2>
 */
function auto_id_headings( $content ) {
  $content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
    if ( ! stripos( $matches[0], 'id=' ) ) {
      $heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link"></a>';
      $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $matches[3] . $matches[4];
    }
    return $matches[0];
  }, $content );
  return $content;
}
add_filter( 'the_content', 'auto_id_headings' );

function get_heading_links ( $content ) {
  $links = array();
  $matches = array();
  preg_match_all( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', $content, $matches);
  foreach ( $matches[3] as $id => $match ) {
    $links[$match] = sanitize_title( $match );
  }
  return $links;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


/* Strip "Protected" and "Private" from page headings ----------------------- */

function the_title_trim($title) {

  $title = attribute_escape($title);

  $findthese = array(
    '#Protected:#',
    '#Private:#'
  );

  $replacewith = array(
    '', // What to replace "Protected:" with
    '' // What to replace "Private:" with
  );

  $title = preg_replace($findthese, $replacewith, $title);
  return $title;
}
add_filter('the_title', 'the_title_trim');


/* Navigation styling ------------------------------------------------------- */

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'usa-current ';
    }
    return $classes;
}

add_filter( 'nav_menu_link_attributes', function($atts) {
  $atts['class'] = "usa-nav-link";
  return $atts;
}, 100, 1 );


/* Customize page editor ---------------------------------------------------- */

function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');

function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'editor-style.css' );
  add_editor_style( 'uswds/css/uswds.css' );
  add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


/* Limit page hierarchy depth ----------------------------------------------- */

function limit_hierarchy_depth($a) {
  $a['depth'] = 1;
  return $a;
}
add_action('page_attributes_dropdown_pages_args','limit_hierarchy_depth');
