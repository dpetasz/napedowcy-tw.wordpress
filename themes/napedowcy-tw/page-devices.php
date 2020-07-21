<?php get_header();


    pageBanner();
    while (have_posts()) {
        the_post();
    $homepagePostsDevicesStationary = new WP_Query(array(
        'paged'=> get_query_var( 'paged', 1 ),
        'posts_per_page' => 10,
        'post_type' => 'device',
        'meta_query' => array(
            array(
                'key' => 'type_of_devices',
                'compare'=> 'LIKE',
                'value' => 'stacjonarne'
            )
        )
    ));     
    $homepagePostsDevicesMobile = new WP_Query(array(
        'paged'=> get_query_var( 'paged', 1 ),
        'posts_per_page' => 10,
        'post_type' => 'device',
        'meta_query' => array(
            array(
                'key' => 'type_of_devices',
                'compare'=> 'LIKE',
                'value' => 'mobilne'
            )
        )
    ));     
?>
<div class="main-section" style="background-image: url(<?php echo get_field('default_img_main')['url'] ?>);">
    <div class="main-section__container wrapper">

        <div class="main-section__article main-section--border">
            <div class="main-section__title">
                <h2>Stacjonarne</h2>
            </div>
            <?php
            while ($homepagePostsDevicesStationary->have_posts()) {
                $homepagePostsDevicesStationary->the_post(); 
                echo get_template_part('template-parts/device', 'item'); 
                } wp_reset_postdata(); ?>
            <div class="pagination">
                <?php
                    echo paginate_links(array(
                        'total'=> $homepagePostsDevicesStationary->max_num_pages
                    ));?>
            </div>
        </div>
        <div class="main-section__article">
            <div class="main-section__title">
                <h2>Mobilne</h2>
            </div>
            <?php
            while ($homepagePostsDevicesMobile->have_posts()) {
                $homepagePostsDevicesMobile->the_post(); 
                echo get_template_part('template-parts/device', 'item'); 
                } wp_reset_postdata(); ?>
            <div class="pagination">
                <?php
                    echo paginate_links(array(
                        'total'=> $homepagePostsDevicesMobile->max_num_pages
                    ));?>
            </div>
        </div>
    </div>
</div>



<?php }

get_footer(); ?>