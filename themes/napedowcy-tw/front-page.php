<?php get_header();


while(have_posts()){
    the_post();
    
pageBanner(array(
    'home-page' => true,
)); } wp_reset_postdata();
            
            ?>
<div class="main-section" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">
    <div class="main-section__container wrapper">
        <div class="main-section__article main-section--border">
            <div class="main-section__title">
                <h2>ostatnie przedstawienia</h2>
            </div>
            <?php 
            
            $homepagePostsPerformances = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'performance'
            ));

            $homepagePostsDevices = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'device'
            ));
            $slider = new WP_Query(array(
                'posts_per_page' => 5,
                'post_type' => 'slider'
            ));

            while($homepagePostsPerformances->have_posts()){
                $homepagePostsPerformances->the_post();?>

            <div class="article">
                <div class="article__circle">
                    <p class="article__date"><?php the_time( 'd.m' ) ?></p>
                    <p class="article__date"><?php the_time( 'Y' ) ?></p>
                </div>
                <div class="article__text-content">
                    <h3><a href="<?php echo get_the_permalink()?>"><?php the_title() ?></a></h3>
                    <p>
                    <?php echo wp_trim_words( get_the_content(), 25 ) ?>
                    </p>
                </div>
            </div>

                <?php
            } wp_reset_postdata();
            
            ?>
            <div class="main-section__btn">
                <a href="<?php echo site_url( '/blog') ?>" class="btn">wszystkie przedstawienia</a>
            </div>
        </div>
        <div class="main-section__article">
            <div class="main-section__title">
                <h2>nasze urządzenia</h2>
            </div>
            <?php 
            while($homepagePostsDevices->have_posts()){
                $homepagePostsDevices->the_post();?>

            <div class="article">
                <div class="article__circle">
                    <p class="article__acronym"><?php echo get_the_excerpt( ) ?></p>
                </div>
                <div class="article__text-content">
                    <h3><a href="<?php echo get_the_permalink()?>"><?php the_title(); ?></a></h3>
                    <p>
                    <?php echo wp_trim_words( get_the_content(), 25 )  ?>
                    </p>
                </div>
            </div>

            <?php
            }
            ?>
            
            <div class="main-section__btn">
                <a href="devices.html" class="btn">wszystkie urządzenia</a>
            </div>
        </div>
    </div>
</div>
<section class="site-slider" data-slider>
    <div class="site-slider__btn-container wrapper">
        <div class="site-slider__btn site-slider__btn--prev" data-btn-prev></div>
        <div class="site-slider__btn site-slider__btn--next" data-btn-next></div>
    </div>
    <?php while($slider->have_posts()){
                $slider->the_post();
                pageSlider(array(
                    'btn-link' => get_permalink()
                ));
                } ?>
    <div class="site-slider__dots-container" data-dots-container></div>
</section>
<?php get_footer();
?>