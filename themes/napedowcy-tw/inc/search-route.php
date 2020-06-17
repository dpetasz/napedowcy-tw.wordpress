<?php

add_action( 'rest_api_init', 'napedowcyRegisterSearch' );

function napedowcyRegisterSearch(){
    register_rest_route('napedowcy/v1', 'search', array(
        'methods'=> WP_REST_SERVER::READABLE,
        'callback' => 'napedowcySearchResults'
    ));
}
 function napedowcySearchResults($data){
    $performance = new WP_Query(array(
        'post_type' => 'performance',
        's' => sanitize_text_field( $data['term'] )
    ));
    $performanceResults = array();

    while($performance->have_posts()){
        $performance->the_post();
        array_push($performanceResults, array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
    }
    return $performanceResults;
}