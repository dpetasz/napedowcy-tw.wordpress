<?php get_header();


while (have_posts()) {
    the_post();

    pageBanner(array(
        'home-page' => true,
    ));
}
wp_reset_postdata();

?>
<div class="main-section"
    style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">
    <div class="main-section__container wrapper">
        <div class="main-section__article main-section--border">
            <div class="main-section__title">
                <h2><?php the_field('title_performance') ?></h2>
            </div>
            <?php

            $homepagePostsPerformances = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'performance',
                'category__not_in' => 16 ,
                'meta_key'=> 'premiere_date',
                'orderby'=>'meta_value_num'
                
            ));

            $homepagePostsDevices = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'device'
            ));
            $slider = new WP_Query(array(
                'posts_per_page' => 5,
                'post_type' => 'slider'
            ));

            while ($homepagePostsPerformances->have_posts()) {
                $homepagePostsPerformances->the_post(); 
                
                echo get_template_part('template-parts/performances', 'item');
            }
            wp_reset_postdata();

            ?>
            <div class="main-section__btn">
                <a href="<?php echo site_url('/performances') ?>"
                    class="btn"><?php the_field('button_performance') ?></a>
            </div>
        </div>
        <div class="main-section__article">
            <div class="main-section__title">
                <h2><?php the_field('title_device') ?></h2>
            </div>
            <?php
            while ($homepagePostsDevices->have_posts()) {
                $homepagePostsDevices->the_post(); 
                echo get_template_part('template-parts/device', 'item'); 
                } wp_reset_postdata(); ?>

            <div class="main-section__btn">
                <a href="<?php echo site_url('/devices') ?>" class="btn"><?php the_field('button_device') ?></a>
            </div>
        </div>
    </div>
</div>
<section class="site-slider" data-slider>
    <div class="site-slider__btn-container wrapper">
        <div class="site-slider__btn site-slider__btn--prev" data-btn-prev></div>
        <div class="site-slider__btn site-slider__btn--next" data-btn-next></div>
    </div>
    <?php while ($slider->have_posts()) {
        $slider->the_post();
        pageSlider(array(
            'btn-link' => get_permalink()
        ));
    } ?>
    <div class="site-slider__dots-container" data-dots-container></div>
</section>
<?php get_footer();
?>