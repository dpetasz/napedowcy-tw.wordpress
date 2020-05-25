<?php get_header();
pageBanner(array(
    'title' => 'Teatr Wielki'
));
?>


<div class="main-section" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">
    <div class="main-section__container wrapper">
        <div class="main-section__article main-section--border">

            <?php
            while (have_posts()) {
                the_post();
                the_title();
            }
            ?>


        </div>

    </div>
</div>

<?php get_footer();
?>