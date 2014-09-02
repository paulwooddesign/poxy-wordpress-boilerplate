<?php
//////////////////////////////////////////////////////////////
// Install Pages
/////////////////////////////////////////////////////////////
add_action('after_setup_theme', 'poxy_after_theme_setup');

function poxy_after_theme_setup(){

    poxy_create_pages();

}


/**
 * Create a page
 *
 * @access public
 * @param mixed $slug Slug for the new page
 * @param mixed $option Option name to store the page's ID
 * @param string $page_title (default: '') Title for the new page
 * @param string $page_content (default: '') Content for the new page
 * @param int $post_parent (default: 0) Parent for the new page
 * @return void
 */
function poxy_create_page( $slug, $option, $page_title = '', $page_content = '', $post_parent = 0 ) {
    global $wpdb;

    $option_value = get_option( $option );

    if ( $option_value > 0 && get_post( $option_value ) )
        return;

    $page_found = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM " . $wpdb->posts . " WHERE post_name = %s LIMIT 1;", $slug ) );
    if ( $page_found ) {
        if ( ! $option_value )
            update_option( $option, $page_found );
        return;
    }

    $page_data = array(
        'post_status'       => 'publish',
        'post_type'         => 'page',
        'post_author'       => 1,
        'post_name'         => $slug,
        'post_title'        => $page_title,
        'post_content'      => $page_content,
        'post_parent'       => $post_parent,
        'comment_status'    => 'closed'
    );
    $page_id = wp_insert_post( $page_data );

    update_option( $option, $page_id );
}


/**
 * Create pages that the plugin relies on, storing page id's in variables.
 *
 * @access public
 * @return void
 */
function poxy_create_pages() {

    // Shop page
    //poxy_create_page( esc_sql( _x( 'home', 'page_slug', 'poxy' ) ), 'poxy_home_page_id', __( 'Home', 'poxy' ), '' );

    // Cart page
    //poxy_create_page( esc_sql( _x( 'about', 'page_slug', 'poxy' ) ), 'poxy_about_page_id', __( 'About', 'poxy' ), '' );

    // Checkout page
    //poxy_create_page( esc_sql( _x( 'contact', 'page_slug', 'poxy' ) ), 'poxy_checkout_page_id', __( 'Contact', 'poxy' ), '' );

    // My Account page
    //poxy_create_page( esc_sql( _x( 'blog', 'page_slug', 'poxy' ) ), 'poxy_myaccount_page_id', __( 'Blog', 'poxy' ), '' );

    // // Lost password page
    // poxy_create_page( esc_sql( _x( 'lost-password', 'page_slug', 'poxy' ) ), 'poxy_lost_password_page_id', __( 'Lost Password', 'poxy' ), '[poxy_lost_password]', poxy_get_page_id( 'myaccount' ) );

    // // Edit address page
    // poxy_create_page( esc_sql( _x( 'edit-address', 'page_slug', 'poxy' ) ), 'poxy_edit_address_page_id', __( 'Edit My Address', 'poxy' ), '[poxy_edit_address]', poxy_get_page_id( 'myaccount' ) );

    // // View order page
    // poxy_create_page( esc_sql( _x( 'view-order', 'page_slug', 'poxy' ) ), 'poxy_view_order_page_id', __( 'View Order', 'poxy' ), '[poxy_view_order]', poxy_get_page_id( 'myaccount' ) );

    // // Change password page
    // poxy_create_page( esc_sql( _x( 'change-password', 'page_slug', 'poxy' ) ), 'poxy_change_password_page_id', __( 'Change Password', 'poxy' ), '[poxy_change_password]', poxy_get_page_id( 'myaccount' ) );

    // // Logout page
    // poxy_create_page( esc_sql( _x( 'logout', 'page_slug', 'poxy' ) ), 'poxy_logout_page_id', __( 'Logout', 'poxy' ), '', poxy_get_page_id( 'myaccount' ) );

    // // Pay page
    // poxy_create_page( esc_sql( _x( 'pay', 'page_slug', 'poxy' ) ), 'poxy_pay_page_id', __( 'Checkout &rarr; Pay', 'poxy' ), '[poxy_pay]', poxy_get_page_id( 'checkout' ) );

    // // Thanks page
    // poxy_create_page( esc_sql( _x( 'order-received', 'page_slug', 'poxy' ) ), 'poxy_thanks_page_id', __( 'Order Received', 'poxy' ), '[poxy_thankyou]', poxy_get_page_id( 'checkout' ) );
}











