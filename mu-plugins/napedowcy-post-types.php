<?php
function napedowcy_post_types(){
    register_post_type( 'composer', array(
        'capability_type'=> 'kompozytor',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title','editor'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Kompozytor',
            'add_new_item' => 'Dodaj nowego kompozytora',
            'edit_item' => 'Edytuj kompozytora',
            'all_items' => 'Wszyscy kompozytorzy',
            'singular_name' => 'kompozytor',
        ),
        'menu_icon' => 'dashicons-businessman'
    ) );
    register_post_type( 'director', array(
        'capability_type'=> 'rezyser',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title','editor'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Reżyser',
            'add_new_item' => 'Dodaj nowego reżysera',
            'edit_item' => 'Edytuj reżysera',
            'all_items' => 'Wszyscy reżyserzy',
            'singular_name' => 'Reżyser',
        ),
        'menu_icon' => 'dashicons-businessperson'
    ) );
    register_post_type( 'type_performance', array(
        'show_in_rest' => true,
        'supports' => array('title'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Typ przedstawienia',
            'add_new_item' => 'Dodaj nowy typ przedstawienia',
            'edit_item' => 'Edytuj typ przedstawienia',
            'all_items' => 'Wszystkie typy przedstawienia',
            'singular_name' => 'Typ przedstawienia',
        ),
        'menu_icon' => 'dashicons-book'
    ) );
    register_post_type( 'device', array(
        'capability_type'=> 'urzadzenie',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Urządzenie',
            'add_new_item' => 'Dodaj nowe urządzenie',
            'edit_item' => 'Edytuj urządzenie',
            'all_items' => 'Wszystkie urządzenia',
            'singular_name' => 'Urządzenie',
        ),
        'menu_icon' => 'dashicons-image-rotate',
    ) );

    register_post_type( 'performance', array(
        'capability_type'=> 'przedstawienie',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Przedstawienie',
            'add_new_item' => 'Dodaj nowe przedstawienie',
            'edit_item' => 'Edytuj przedstawienie',
            'all_items' => 'Wszystkie przedstawienia',
            'singular_name' => 'Przedstawienie',
        ),
        'menu_icon' => 'dashicons-format-audio'
    ) );
    register_post_type( 'slider', array(
        'capability_type'=> 'slider',
        'map_meta_cap' => true,
        'supports' => array('title', 'thumbnail','editor'),
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
    register_post_type( 'ourTeam', array(
        'capability_type'=> 'ourTeam',
        'map_meta_cap' => true,
        'show_in_rest'=> true,
        'supports' => array('title', 'thumbnail','editor'),
        'public'=> true,
        'labels'=> array(
            'name' => 'Pracownik',
            'add_new_item' => 'Dodaj nowego pracownika',
            'edit_item' => 'Edytuj pracownika',
            'all_items' => 'Wszyscy pracownicy',
            'singular_name' => 'Pracownik',
        ),
        'menu_icon' => 'dashicons-universal-access-alt'                         
    ) );
}

add_action( 'init', 'napedowcy_post_types' );