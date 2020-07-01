<?php

add_action( 'rest_api_init', 'napedowcyRegisterSearch' );

function napedowcyRegisterSearch(){
    register_rest_route('napedowcy/v1', 'search', array(
        'methods'=> WP_REST_SERVER::READABLE,
        'callback' => 'napedowcySearchResults'
    ));
}
 function napedowcySearchResults($data){
    $mainQuery = new WP_Query(array(
        'post_per_page' => -1,
        'post_type' => array('performance', 'device', 'post', 'page','composer', 'director', 'type_performance'),
        's' => sanitize_text_field( $data['term'] )
    ));
    $results = array(
        'generalInfo' =>array(),
        'performances'=>array(),
        'devices'=>array(),
        'performances_archival' => array(),
        'composers' => array(),
        'directors' => array(),
        'type_performances' => array(),
    );

    while($mainQuery->have_posts()){
        $mainQuery->the_post();
        if(get_post_type() == 'post' || get_post_type() == 'page'){
            array_push($results['generalInfo'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
        }
        if(get_post_type() == 'performance'){
            $premiereDate = new DateTime(get_field('premiere_date'));
            $description = null;
            if (has_excerpt()) {
            $description = wp_trim_words(get_the_excerpt(), 18);
            } else {
            $description = wp_trim_words(get_the_content(), 18);
            }
            array_push($results['performances'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'premiere_day_month' => $premiereDate->format('d.m'),
            'premiere_year' => $premiereDate->format('Y'),
            'description' => $description,
            'director' => get_field('director'),
            'composer' => get_field('composer'),
            'type_of_performance' => get_field('type_of_performance')

        ));
        }
        
        if(get_post_type() == 'device' ){
            array_push($results['devices'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
        }
        if(get_post_type() == 'composer' ){
            array_push($results['composers'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
        }
        if(get_post_type() == 'director' ){
            array_push($results['directors'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
        }
        if(get_post_type() == 'type_performance' ){
            array_push($results['type_performances'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'id' => get_the_ID()
        ));
        }
        
        $performanceRelationshipQuery = new WP_Query(array(
            'post_type' => 'performance',
            'meta_query' => array(
                array(
                    'key' => 'type_of_performance',
                    'compare'=> 'LIKE',
                    'value' => 'balet'
                )
            )
        ));

        while($performanceRelationshipQuery->have_posts()){
            $performanceRelationshipQuery->the_post();
            $premiereDate = new DateTime(get_field('premiere_date'));
            $description = null;
            if (has_excerpt()) {
            $description = wp_trim_words(get_the_excerpt(), 18);
            } else {
            $description = wp_trim_words(get_the_content(), 18);
            }
            if(get_post_type() == 'performance'){
                array_push($results['performances'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'premiere_day_month' => $premiereDate->format('d.m'),
                    'premiere_year' => $premiereDate->format('Y'),
                    'description' => $description,
                    'director' => get_field('director'),
                    'composer' => get_field('composer'),
                    'type_of_performance' => get_field('type_of_performance')
                ));
            }
        }
    }

    $results['performances'] = array_values(array_unique($results['performances'], SORT_REGULAR));

    return $results;
}