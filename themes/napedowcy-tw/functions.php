<?php
require get_theme_file_path( '/inc/search-route.php' );
require get_theme_file_path( '/inc/page-banner.php' );
require get_theme_file_path( '/inc/page-slider.php' );
require get_theme_file_path( '/inc/napedowcy-files.php' );




function napedowcy_title_tag()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'napedowcy_title_tag');

function napedowcy_features()
{
    // register_nav_menu( 'headerMenuLocation', 'Header Menu Location' );
    add_image_size('banner_home_page', 1920, 970, true);
    add_image_size('slider_home_page', 1920, 650, true);
    add_image_size('banner', 1920, 400, true);
    add_image_size('testimonial', 160, 160, true);
}
add_action('after_setup_theme', 'napedowcy_features');

//Redirect sdubscriber accounts out of admin and onto homepage

add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend(){
    $ourCorrentUser = wp_get_current_user();
    if(count($ourCorrentUser->roles) == 1 AND $ourCorrentUser->roles[0] == 'subscriber' ){
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){
    $ourCorrentUser = wp_get_current_user();
    if(count($ourCorrentUser->roles) == 1 AND $ourCorrentUser->roles[0] == 'subscriber'){
        show_admin_bar( false );
    }
}

//Customize Login Screen

add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl(){
    return esc_url(site_url('/'));
}

add_action( 'login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS(){
    wp_enqueue_style('napedowcy_main_styles', get_template_directory_uri() . '/dist/assets/css/styles.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto:wght@100;300;400;500;700&display=swap');
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
    return get_bloginfo('name');
}
function change_login_logo() {
    
}
add_action('login_head', 'change_login_logo');