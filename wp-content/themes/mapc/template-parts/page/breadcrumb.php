<?php
  if ( $post->post_parent ) {
    $root_id = $post->post_parent;
  } else {
    $root_id = $post->ID;
  }
  $post_status = current_user_can('read_private_pages')
      ? 'publish,private'
      : 'publish';
  $root = get_page( $root_id, array('post_status' => $post_status) );
?>
<div class="mapc-breadcrumb">
  <span>
    <?php echo apply_filters( 'the_title', $root->post_title, $root->ID ); ?>
  </span>
</div>
