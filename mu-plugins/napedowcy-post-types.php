<?php
function napedowcy_post_types(){
    register_post_type( 'device', array(
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Urządzenia',
            'add_new_item' => 'Dodaj nowe urządzenie',
            'edit_item' => 'Edytuj urządzenie',
            'all_items' => 'Wszystkie urządzenia',
            'singular_name' => 'Urządzenie',
        ),
        'menu_icon' => 'dashicons-image-rotate'
    ) );

    register_post_type( 'performance', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Przedstawienia',
            'add_new_item' => 'Dodaj nowe przedstawienie',
            'edit_item' => 'Edytuj przedstawienie',
            'all_items' => 'Wszystkie przedstawienia',
            'singular_name' => 'Przedstawienie',
        ),
        'menu_icon' => 'dashicons-format-audio'
    ) );
}

add_action( 'init', 'napedowcy_post_types' );