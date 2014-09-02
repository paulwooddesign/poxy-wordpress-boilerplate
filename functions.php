<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

////////////////////////////////////////////
// Options Framework
////////////////////////////////////////////
if ( !function_exists( 'optionsframework_init' ) ) {
    define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/bower_components/options-framework-theme/inc/');
    define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/bower_components/options-framework-theme/inc/' );
    require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}
/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('#example_showhidden').click(function() {
        jQuery('#section-example_text_hidden').fadeToggle(400);
    });

    if (jQuery('#example_showhidden:checked').val() !== undefined) {
        jQuery('#section-example_text_hidden').show();
    }

});
</script>

<?php
}

// Load Mr MetaBox
if(!class_exists('mrMetaBox')) {
  define('MRMETABOX_URL', STYLESHEETPATH . '/bower_components/mr-meta-box-master/');
  require_once(MRMETABOX_URL . 'mr-meta-box.php');
}



//require_once("admin/Tax-meta-class/Tax-meta-class.php");

// Install Theme Plugins, Menus,
require_once ('admin/_INSTALL/theme-install.php');

// Multiple Featured Images
require_once ('bower_components/multi-post-thumbnails-master/multi-post-thumbnails.php');

// Poxy Core Functions
require_once ('bower_components/poxy-wordpress-core/poxy-core-master.php');


////////////////////////////////////////////
// Load Core
////////////////////////////////////////////
require_once('admin/_CORE/bones.php'); // Clean up code output
require_once('admin/_CORE/admin.php'); // Dashboard admin stuff
require_once('admin/_CORE/menus.php'); // Menus
require_once('admin/_CORE/images.php'); // Images
require_once('admin/_CORE/header.php'); // Head scripts



////////////////////////////////////////////
// Load Theme Core
////////////////////////////////////////////
if (of_get_option('poxy_menu_type')) {
require_once('admin/_CORE/walkers/walker-'.of_get_option('poxy_menu_type').'.php');
} else {
require_once('admin/_CORE/walkers/walker.php');
}
require_once('admin/short-codes.php');
//require_once('admin/custom-post-types.php');
require_once('admin/pagination.php');
require_once('admin/plugins/breadcrumbs.php');

require_once('admin/plugins/product_ajax_loader.php');
require_once('admin/woocommerce_filters.php');

////////////////////////////////////////////
// Load Custom Post Type Custom Meta Classes
////////////////////////////////////////////
require_once('admin/Tax-meta-class/Tax-meta-class.php');


////////////////////////////////////////////
// Load Post Types
////////////////////////////////////////////
require_once('admin/plugins/post-type-slideshow.php');
require_once('admin/plugins/post-type-products.php');
//require_once('admin/plugins/projects.php');
//require_once('admin/plugins/post-type-vehicles.php');
//require_once('admin/plugins/post-type-author.php');
//require_once('admin/plugins/post-type-vip.php');
//require_once('admin/plugins/post-type-donor.php');

// Optional Post Types
if(of_get_option('poxy_faq_post_type')) {
require_once('admin/plugins/post-type-faq.php');
}

if(of_get_option('poxy_event_post_type')) {
require_once('admin/plugins/post-type-events.php');
}

if(of_get_option('poxy_staff_post_type')) {
require_once('admin/plugins/post-type-staff.php');
}

if(of_get_option('poxy_testimonial_post_type')) {
require_once('admin/plugins/post-type-testimonials.php');
}

if(of_get_option('poxy_locations_post_type')) {
require_once('admin/plugins/post-type-locations.php');
}


//require_once('admin/plugins/post-type-dealers.php');



// require_once('admin/plugins/post-type-testimonials.php');
// require_once('admin/plugins/post-type-staff.php');
// require_once('admin/plugins/post-type-events.php');
// require_once('admin/plugins/post-type-faq.php');



////////////////////////////////////////////
// Common Meta Boxes
////////////////////////////////////////////
require_once('admin/plugins/repeatable_fields.php');
require_once('admin/plugins/page_meta.php');

require_once('admin/plugins/page_photo_gallery.php');

////////////////////////////////////////////
// Widgets
////////////////////////////////////////////
require_once ('admin/widgets.php');





////////////////////////////////////////////
// Load Scripts
////////////////////////////////////////////
add_action('wp_enqueue_scripts', 'poxy_load_scripts');

function poxy_load_scripts() {
    //wp_enqueue_style('poxy', get_bloginfo('template_url').'/poxy.css', false, '1.0', 'all' );


    wp_deregister_script('jquery');
    //wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1');
    wp_register_script('jquery', '//code.jquery.com/jquery-2.0.0.min.js', false, '2.0.0');
    //wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0');


    wp_register_script( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', false, '2.6.2' );
    wp_enqueue_script( 'modernizr');
    wp_enqueue_script('jquery');

    $poxy_dev_styles = of_get_option('poxy_dev_styles');
    if($poxy_dev_styles == false) {
        global $user_ID;
        if( $user_ID ) {
            if( current_user_can('level_10') ) {
            wp_enqueue_style('dev_css', get_bloginfo('template_url').'/assets/dev.css', false, '1.0', 'all' );
            //wp_enqueue_script('ggs_grid', get_bloginfo('template_url').'/admin/_DEV/GGS.js', array('jquery'), '1.0.0', true);
            }
        }
    }

    //wp_enqueue_script('easing', get_bloginfo('stylesheet_directory').'/js/lib/jquery.easing.1.3.js', array('jquery'), '1.3', true);

    // wp_enqueue_script('classie', get_bloginfo('stylesheet_directory').'/js/lib/classie.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('mlpushmenu', get_bloginfo('stylesheet_directory').'/js/lib/mlpushmenu.js', array('jquery'), '1.0', true);

    // wp_enqueue_script('jquery_custom_ui', get_bloginfo('stylesheet_directory').'/js/lib/jquery-ui-1.8.20.custom.min.js', array('jquery'), NULL, true);
    // wp_enqueue_script('accordion', get_bloginfo('stylesheet_directory').'/js/lib/jquery.accordion-a-1.1.js', array('jquery'), NULL, true);
    //wp_enqueue_script('accordion', get_bloginfo('stylesheet_directory').'/js/lib/jquery.scrollTo.min.js', array('jquery'), NULL, true);
    // wp_enqueue_script('instafeed', get_bloginfo('stylesheet_directory').'/assets/js/lib/instafeed.min.js', array('jquery'), NULL, true);
    // wp_enqueue_script('slick_carousel', get_bloginfo('stylesheet_directory').'/assets/js/lib/slick.min.js', array('jquery'), NULL, true);
    // wp_enqueue_script('royalslider', get_bloginfo('stylesheet_directory').'/assets/js/lib/royalslider/jquery.royalslider.min.js', array('jquery'), NULL, true);


    //Mighty Slider
    // wp_enqueue_script('just_touch', get_bloginfo('stylesheet_directory').'/assets/js/lib/jquery.mobile.just-touch.js', array('jquery'), '1.3', true);
    // wp_enqueue_script('easing', get_bloginfo('stylesheet_directory').'/assets/js/lib/jquery.easing.1.3.js', array('jquery'), '1.3', true);
    // wp_enqueue_script('mightyslider', get_bloginfo('stylesheet_directory').'/assets/js/lib/mightyslider.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('custom', get_bloginfo('stylesheet_directory').'/assets/js/lib/custom.js', array('jquery'), '1.0', true);


    //Parallax Nav
    //wp_enqueue_script('visual_nav', get_bloginfo('stylesheet_directory').'/assets/js/lib/jquery.visualNav.min.js', array('jquery'), NULL, true);

     //wp_enqueue_script('toggle_tabs', get_bloginfo('stylesheet_directory').'/assets/js/lib/jquery.cbpContentSlider.js', array('jquery'), '1.0', true);

    //Load Minified Styles / lower HTTP reqests this way
    wp_enqueue_script('poxy_js', get_bloginfo('stylesheet_directory').'/assets/scripts-ck.js', array('jquery'), '1.0', true);
    //wp_enqueue_script('poxy_js', get_bloginfo('stylesheet_directory').'/js/scripts.js', array('jquery'), '1.0', true);
    wp_localize_script( 'poxy_js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );


}



/* ADD IE 8/9 FIX TO HEADER */
function poxy_add_ieFix () {
   $ie_alpha_css = get_template_directory_uri() .'/assets/poxy_alpha.css';
    $ie_beta_css = get_template_directory_uri() .'/assets/poxy_beta.css';
    $ie_gamma_css = get_template_directory_uri() .'/assets/poxy_gamma.css';
    $ie_delta_css = get_template_directory_uri() .'/assets/poxy_delta.css';
    $ie_epsilon_css = get_template_directory_uri() .'/assets/poxy_epsilon.css';
    echo '<!--[if lt IE 9]>';
    echo '<link rel="stylesheet" type="text/css" href="'.$ie_alpha_css.'">';
    echo '<link rel="stylesheet" type="text/css" href="'.$ie_beta_css.'">';
    echo '<link rel="stylesheet" type="text/css" href="'.$ie_gamma_css.'">';
    echo '<link rel="stylesheet" type="text/css" href="'.$ie_delta_css.'">';
    echo '<link rel="stylesheet" type="text/css" href="'.$ie_epsilon_css.'">';
    echo '<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'poxy_add_ieFix');

///////////////////////////////////////////////////////////
// Optimize WooCommerce Scripts
// Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
///////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
    //remove generator meta tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

    //first check that woo exists to prevent fatal errors
    if ( function_exists( 'is_woocommerce' ) ) {
        //dequeue scripts and styles
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }

}

////////////////////////////////////////////
// Load Footer Scripts Scripts
////////////////////////////////////////////
//add_action('wp_footer','poxy_footer');

function poxy_footer() {
    wp_reset_query();
    global $wp_query;
    global $post;

     if (!is_page('home')) return;
    include(TEMPLATEPATH . '/assets/js/php/slideshow.php');
}


////////////////////////////////////////////
// Load Dev UI
////////////////////////////////////////////
add_action('wp_footer','poxy_dev_ui');
function poxy_dev_ui() {
    $poxy_dev_styles = of_get_option('poxy_dev_styles');
    if($poxy_dev_styles == false) {
        global $user_ID;
        if( $user_ID ) {
            if( current_user_can('level_10') ) {
                get_template_part('admin/_DEV/dev');
            }
        }
    }
}








////////////////////////////////////////////
// Show Future Posts
////////////////////////////////////////////
add_filter('the_posts', 'show_all_future_posts');

function show_all_future_posts($posts)
{
   global $wp_query, $wpdb;

   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }

   return $posts;
}

//////////////////////////////////////////////////////////////
// Comments
/////////////////////////////////////////////////////////////

function poxy_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="li-comment-<?php comment_ID() ?>">

        <div class="comment <?php echo get_comment_type(); ?>" id="comment-<?php comment_ID() ?>">

            <?php echo get_avatar($comment,'70',get_bloginfo('template_url').'/images/default_avatar.png'); ?>

            <h5><?php comment_author_link(); ?></h5>
            <span class="date"><?php comment_date(); ?></span>

            <?php if ($comment->comment_approved == '0') : ?>
                <p><span class="message"><?php _e('Your comment is awaiting moderation.', 'poxy'); ?></span></p>
            <?php endif; ?>

            <?php comment_text() ?>

            <?php
            if(get_comment_type() != "trackback")
                comment_reply_link(array_merge( $args, array('add_below' => 'comment','reply_text' => '<span>'. __('Reply', 'poxy') .'</span>', 'login_text' => '<span>'. __('Log in to reply', 'poxy') .'</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'])))

            ?>

        </div><!-- end comment -->

<?php
}

function poxy_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
        <li class="comment" id="comment-<?php comment_ID() ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php
}


?>
