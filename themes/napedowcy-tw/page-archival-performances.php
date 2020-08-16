<?php get_header();

while (have_posts()) {
    the_post();
    pageBanner(array(
        'photo'=> get_field('default_img_banner')['sizes']['banner']));
       
?>
<div class="main-section" style="background-image: url(<?php echo get_field('default_img_main')['url'] ?>);">
    <div class="main-section__container wrapper">

        <div class="main-section__article-devices">
            <div class="main-section__title">
                <h2>Przedstawienia archiwalne</h2>
            </div>
            <?php
                 $homepagePostsOpera = new WP_Query(array(
                    'paged'=> get_query_var( 'paged', 1 ),
                    'posts_per_page' => 10,
                    'post_type' => 'performance',
                    'orderby'=> 'title',
                    'order'=> 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'archive',
                            'compare'=> 'LIKE',
                            'value' => true
                        )
                    ) 
                    
                ));
                while ($homepagePostsOpera->have_posts()) {
                    $homepagePostsOpera->the_post(); ?>

            <?php
                    echo get_template_part('template-parts/performances', 'item');
                    
                } wp_reset_postdata();?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total'=> $homepagePostsOpera->max_num_pages
                ));?></div>





        </div>

    </div>
</div>



<?php }

get_footer(); ?>