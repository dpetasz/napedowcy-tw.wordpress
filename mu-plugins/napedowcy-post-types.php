<?php
function napedowcy_post_types(){
    register_post_type( 'device', array(
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Urządzenie',
            'add_new_item' => 'Dodaj nowe urządzenie',
            'edit_item' => 'Edytuj urządzenie',
            'all_items' => 'Wszystkie urządzenia',
            'singular_name' => 'Urządzenie',
        ),
        'menu_icon' => 'dashicons-image-rotate'
    ) );

    register_post_type( 'performance', array(
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Przedstawienie',
            'add_new_item' => 'Dodaj nowe przedstawienie',
            'edit_item' => 'Edytuj przedstawienie',
            'all_items' => 'Wszystkie przedstawienia',
            'singular_name' => 'Przedstawienie',
        ),'taxonomies'  => array( 'category' ),
        'menu_icon' => 'dashicons-format-audio'
    ) );
    register_post_type( 'slider', array(
        'supports' => array('title', 'thumbnail'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Slider',
            'add_new_item' => 'Dodaj nowy slider',
            'edit_item' => 'Edytuj slider',
            'all_items' => 'Wszystkie sliders',
            'singular_name' => 'Slider',
        ),
        'menu_icon' => 'dashicons-images-alt'
    ) );
}

add_action( 'init', 'napedowcy_post_types' );