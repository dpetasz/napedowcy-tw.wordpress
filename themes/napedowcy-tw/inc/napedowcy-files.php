<?php
function napedowcy_files()
{
    wp_enqueue_script('main-napedowcy-js', get_theme_file_uri('/dist/assets/js/main.js'), NULL, microtime(), true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto:wght@100;300;400;500;700&display=swap');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('napedowcy_main_styles', get_template_directory_uri() . '/dist/assets/css/styles.css', array(), '1.0.0', 'all');
    wp_localize_script( 'main-napedowcy-js', 'napedowcyData', array(
            'root_url' => get_site_url()

    ) );
}
add_action('wp_enqueue_scripts', 'napedowcy_files');