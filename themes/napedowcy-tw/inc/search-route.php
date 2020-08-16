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
        'post_type' => array('performance', 'device', 'post', 'page','composer', 'director'),
        's' => sanitize_text_field( $data['term'] )
    ));
    $results = array(
        'generalInfo' =>array(),
        'performances'=>array(),
        'devices'=>array(),
        'performances_archival' => array(),
        'composers' => array(),
        'directors' => array(),
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
            if(!get_field('archive')){
                array_push($results['performances'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'premiere_day_month' => $premiereDate->format('d.m'),
                    'premiere_year' => $premiereDate->format('Y'),
                    'description' => $description,
                    'directors' => get_field('director_performance'),
                    'composers' => get_field('composer_performance')
        
                ));
            } else {
                array_push($results['performances_archival'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'premiere_day_month' => $premiereDate->format('d.m'),
                    'premiere_year' => $premiereDate->format('Y'),
                    'description' => $description,
                    'directors' => get_field('director_performance'),
                    'composers' => get_field('composer_performance')
        
                ));
            }
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
            'permalink' => get_the_permalink(),
            'id' => get_the_ID()
        ));
        }
        if(get_post_type() == 'director' ){
            array_push($results['directors'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'id' => get_the_ID()
        ));
        }
       
        if($results['directors'] or $results['composers'] ){
        $performanceMetaQuery = array('relation' => 'or');
        foreach($results['directors'] as $item){
                array_push($performanceMetaQuery, 
                array(
                    'key' => 'director_performance',
                    'compare'=> 'LIKE',
                    'value' => '"'.$item['id'].'"'
            ));}
        foreach($results['composers'] as $item){
                    array_push($performanceMetaQuery, 
                    array(
                        'key' => 'composer_performance',
                        'compare'=> 'LIKE',
                        'value' => '"'.$item['id'].'"'
        ));}
            
        
        $performanceRelationshipQuery = new WP_Query(array(
            'post_type' => 'performance',
            'meta_query' => $performanceMetaQuery
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
                if(!get_field('archive')){
                    array_push($results['performances'], array(
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'premiere_day_month' => $premiereDate->format('d.m'),
                        'premiere_year' => $premiereDate->format('Y'),
                        'description' => $description,
                        'directors' => get_field('director_performance'),
                        'composers' => get_field('composer_performance')
            
                    ));
                } else {
                    array_push($results['performances_archival'], array(
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'premiere_day_month' => $premiereDate->format('d.m'),
                        'premiere_year' => $premiereDate->format('Y'),
                        'description' => $description,
                        'directors' => get_field('director_performance'),
                        'composers' => get_field('composer_performance')
            
                    ));
                }
            }
        }
    }

    $results['performances'] = array_values(array_unique($results['performances'], SORT_REGULAR));
    $results['performances_archival'] = array_values(array_unique($results['performances_archival'], SORT_REGULAR));
}
    return $results;
}