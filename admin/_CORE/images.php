<?php
//////////////////////////////////////////////////////////////
// Custom Background
/////////////////////////////////////////////////////////////

//add_theme_support( 'custom-background');


//////////////////////////////////////////////////////////////
// Feature Images (Post Thumbnails)
/////////////////////////////////////////////////////////////

add_theme_support('post-thumbnails');

set_post_thumbnail_size(350, 350, true);
add_image_size('poxy_post_thumb_big', 720, 220, true);
add_image_size('poxy_post_thumb_small', 150, 150, true);
add_image_size('poxy_post_thumb_tiny', 50, 50, true);
//add_image_size('w45_square_thumb_60', 60, 60, true);
add_image_size('poxy_square_thumb_350', 350, 350, true);
add_image_size('poxy_post_thumb', 150, 300, true);


new MultiPostThumbnails(array(
  'label' => 'Banner Image',
  'id' => 'background_image',
  'post_type' => 'page'
  )
);

new MultiPostThumbnails(array(
  'label' => 'Banner Image',
  'id' => 'background_image',
  'post_type' => 'product'
  )
);







//add_image_size('poxy_background_image_full', 3000, 30000);

// Hide MultiPostThumbnails Links in regular media upload page

function multi_post_thumbnail_links() {
   echo '<style type="text/css">
           .media-php .post-slidewhow_image-thumbnail{display: none;}
           .media-php .page-slidewhow_image-thumbnail{display: none;}
           .media-php .project-slidewhow_image-thumbnail{display: none;}
         </style>';
}

add_action('admin_head', 'multi_post_thumbnail_links');

function get_single_custom_background() { 
  global $wp_query;
  global $post;
  $post_type = get_post_type($post->ID);
  $is_tiled_bkg = get_post_meta($post->ID, "_poxy_background_tile_value", true);
  $custom_background_img = MultiPostThumbnails::get_the_post_thumbnail_url($post_type, "background_image", $post->ID, "poxy_background_image_full");
  return $custom_background_img;  
}

function get_single_custom_background_thumb() { 
  global $wp_query;
  global $post;
  $post_type = get_post_type($post->ID);
  $is_tiled_bkg = get_post_meta($post->ID, "_poxy_background_tile_value", true);
  $custom_background_img = MultiPostThumbnails::w45_get_the_post_thumbnail_url($post_type, "background_image", $post->ID, "w45_square_thumb_350");
  return $custom_background_img;  
}

function has_single_custom_background() { 
  if(get_single_custom_background()){
    return true;
  }
}


//////////////////////////////////////////////////////////////
// Auto Set First Image as Featured
/////////////////////////////////////////////////////////////
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  if (isset($matches[1][0])){
  $first_img = $matches[1][0];
  if(empty($first_img)) {
    return false;
  } else {
  return $first_img;
  }
}
}



?>