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