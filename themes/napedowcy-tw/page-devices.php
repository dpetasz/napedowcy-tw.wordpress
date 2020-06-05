<?php get_header();

while (have_posts()) {
    the_post();
    pageBanner();
    $homepagePostsDevices = new WP_Query(array(
        'paged'=> get_query_var( 'paged', 1 ),
        'posts_per_page' => 10,
        'post_type' => 'device'
    ));     
?>
<div class="main-section" style="background-image: url(<?php echo get_field('default_img_main')['url'] ?>);">
    <div class="main-section__container wrapper">

        <div class="main-section__article-devices">
            <div class="main-section__title">
                <h2><?php the_field('title_device') ?></h2>
            </div>
            <?php
            while ($homepagePostsDevices->have_posts()) {
                $homepagePostsDevices->the_post(); 
                echo get_template_part('template-parts/device', 'item'); 
                } wp_reset_postdata(); ?>
            <div class="pagination">
                <?php
                    echo paginate_links(array(
                        'total'=> $homepagePostsDevices->max_num_pages
                    ));?>
            </div>
        </div>
    </div>
</div>



<?php }

get_footer(); ?>