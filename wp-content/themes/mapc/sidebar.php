<?php
/**
 * The sidebar containing the main widget area
 */
?>
<?php
  if ($post->post_parent) {
    $root_id = $post->post_parent;
  } else {
    $root_id = $post->ID;
  }
  $post_status = current_user_can('read_private_pages')
      ? 'publish,private'
      : 'publish';
  $root = get_page( $root_id, array('post_status' => $post_status) );
  if ( is_front_page() ) {
    $sidebar_pages = array_merge(
      array( $root_id => $root ),
      get_pages( array( 'parent' => null, 'exclude' => $root_id,'post_status' => $post_status ) )
    );
  } else {
    $sidebar_pages = array_merge(
      array( $root_id => $root ),
      get_pages( array( 'parent' => $root_id, 'post_status' => $post_status ) )
    );
  }

?>

<aside class="usa-width-one-fourth usa-layout-docs-sidenav">
  <ul class="usa-sidenav-list">
    <?php
      function sidebar_menu($hierarchy_pages, $post_id) {
        $output = '';
        foreach ( $hierarchy_pages as $id => $pg ) {
          if ( $id == $root_id ) {
            $title = 'Overview';
          } else {
            $title = apply_filters( 'the_title', $pg->post_title, $pg->ID );
          }
          $link = get_page_link($pg->ID);
          $output .= '<li>';
          if ( $post_id == $pg->ID ) {
            $output .= '<a class="usa-current" href="'.$link.'"">'.$title.'</a>';
            $anchors = get_heading_links(apply_filters( 'the_content', $pg->post_content, $id ));

            if ( count($anchors ) ) {
              $output .= '<ul class="usa-sidenav-sub_list">';
              foreach ( $anchors as $a_title => $a_link ) {
                $output .= '<a href="#'.$a_link.'"">'.$a_title.'</a>';
              }
              $output .= '</ul>';
            }
            // $children = get_pages( array( 'parent' => $pg->ID ) );
            // if ( count($children ) ) {
            //   $output .= '<ul class="usa-sidenav-sub_list">';
            //   foreach ( $children as $c_id => $c_pg ) {
            //     $c_title = apply_filters( 'the_title', $c_pg->post_title, $c_id );
            //     $c_link = get_page_link($c_pg->ID);
            //     $output .= '<a href="'.$c_link.'"">'.$c_title.'</a>';
            //   }
            //   $output .= '</ul>';
            // }
          } else {
            $output .= '<a href="'.$link.'"">'.$title.'</a>';
          }
          $output .= '</li>';
        }
        return $output;
      }
      echo sidebar_menu($sidebar_pages, $post->ID);
    ?>
  </ul>
</aside>
