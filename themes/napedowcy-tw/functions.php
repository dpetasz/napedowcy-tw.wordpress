<?php
function napedowcy_files()
{
    wp_enqueue_script('main-napedowcy-js', get_theme_file_uri('/dist/assets/js/main.js'), NULL, microtime(), true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto:wght@100;300;400;500;700&display=swap');
    wp_enqueue_style('napedowcy_main_styles', get_template_directory_uri().'/dist/assets/css/styles.css', array(), '1.0.0' , 'all');
}
add_action('wp_enqueue_scripts', 'napedowcy_files');

function napedowcy_title_tag(){
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'napedowcy_title_tag' );


