<?php get_header();

while (have_posts()) {
    the_post();
    pageBanner(array(
        'photo'=> get_field('default_img_banner')['sizes']['banner']));
       
?>
<div class="main-section" style="background-image: url(<?php echo get_field('default_img_main')['url'] ?>);">
    <div class="main-section__container wrapper">
        <div class="main-section__article main-section--border">
            <div class="main-section__title">
                <h2>Opera</h2>
            </div>
            <?php
                 $homepagePostsOpera = new WP_Query(array(
                    'paged'=> get_query_var( 'paged', 1 ),
                    'posts_per_page' => 10,
                    'post_type' => 'performance',
                    'category__not_in' => array(16, 6),
                    'orderby'=> 'title',
                    'order'=> 'ASC' 
                    
                ));
                while ($homepagePostsOpera->have_posts()) {
                    $homepagePostsOpera->the_post(); 
                    
                    echo get_template_part('template-parts/performances', 'item');
                    
                } wp_reset_postdata();?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total'=> $homepagePostsOpera->max_num_pages
                ));?></div>





        </div>
        <div class="main-section__article">
            <div class="main-section__title">
                <h2>Balet</h2>
            </div>
            <?php
                 $homepagePostsBalet = new WP_Query(array(
                    'posts_per_page' => 10,
                    'paged'=> get_query_var( 'paged',1),
                    'post_type' => 'performance',
                    'category__not_in' => array(16, 4),
                    'orderby'=> 'title',
                    'order'=> 'ASC'  
                    
                ));
                while ($homepagePostsBalet->have_posts()) {
                    $homepagePostsBalet->the_post(); 
                    
                    echo get_template_part('template-parts/performances', 'item');
                }
                wp_reset_postdata();
            ?>
            <div class="pagination">
                <?php
            echo paginate_links(array(
                'total'=> $homepagePostsBalet->max_num_pages
            ));?></div>


        </div>
    </div>
</div>



<?php }

get_footer(); ?>