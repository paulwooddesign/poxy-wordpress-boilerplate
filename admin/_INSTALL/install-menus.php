<?php

//////////////////////////////////////////////////////////////
// Install Menus
// http://chelladuraii.wordpress.com/2013/07/19/create-menu-on-theme-activation-wordpress/
/////////////////////////////////////////////////////////////
//add_action('after_switch_theme', 'poxy_install_menus', 10 ,  2);

function poxy_install_menus ($oldname, $oldtheme = false) {
/* Create header and footer menus */
  $menus = array(
  'Primary Menu'  => array(
    'home'  => 'Home',
    'about'  => 'About',
    'blog'  => 'Blog'
  ),

  'Top Menu' => array(
    'home' => 'Home',
    'contact' => 'Contact'
  ),
  'Footer Menu' => array(
    'contact' => 'Contact'
    //'terms-of-use' => 'Terms of Use',
    //'privacy-policy' => 'Privacy Policy'
  ),
  'Footer Small Menu' => array(
    'contact' => 'Contact'
    //'terms-of-use' => 'Terms of Use',
    //'privacy-policy' => 'Privacy Policy'
  ),
  'Mobile Menu' => array(
    'contact' => 'Contact'
    //'terms-of-use' => 'Terms of Use',
    //'privacy-policy' => 'Privacy Policy'
  )
);
foreach($menus as $menuname => $menuitems) {
  $menu_exists = wp_get_nav_menu_object($menuname);
  // If it doesn't exist, let's create it.
  if ( !$menu_exists) {
    $menu_id = wp_create_nav_menu($menuname);
    foreach($menuitems as $slug => $item) {
      wp_update_nav_menu_item(
      $menu_id, 0, array(
            'menu-item-title'  => $item,
            'menu-item-object'  => 'page',
            'menu-item-object-id'  => get_page_by_path($slug)->ID,
            'menu-item-type' => 'post_type',
            'menu-item-status'  => 'publish'
        )
      );
    }
  }
}

}

add_action('after_switch_theme', 'poxy_asign_menu_locations', 20 ,  2);
function poxy_asign_menu_locations () {


  function wp_menu_id_by_name( $name ) {
      $menus = get_terms( 'nav_menu' );

      foreach ( $menus as $menu ) {
          if( $name === $menu->name ) {
              return $menu->term_id;
          }
      }
      return false;
  }

  $menu_id = wp_menu_id_by_name( 'Primary Menu' );
  if($menu_id) {
    $locations = get_theme_mod('nav_menu_locations');
    $locations['main'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

  $menu_id = wp_menu_id_by_name( 'Primary Menu' );
  if($menu_id) {
    $locations = get_theme_mod('nav_menu_locations');
    $locations['main_small'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

  $menu_id = wp_menu_id_by_name( 'Top Menu' );
  if($menu_id) {
    $locations = get_theme_mod('nav_menu_locations');
    $locations['header'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

  $menu_id = wp_menu_id_by_name( 'Footer Menu' );
  if($menu_id) {
    $locations = get_theme_mod('nav_menu_locations');
    $locations['footer'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

  $menu_id = wp_menu_id_by_name( 'Footer Small Menu' );
  if($menu_id) {
    $locations = get_theme_mod('nav_menu_locations');
    $locations['footer_small'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

  $menu_id = wp_menu_id_by_name( 'Mobile Menu' );
  if($menu_id) {
    $locations = get_theme_mod('nav_menu_locations');
    $locations['mobile'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

}
