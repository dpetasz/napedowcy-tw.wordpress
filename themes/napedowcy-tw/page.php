<?php get_header();

while (have_posts()) {
    the_post();

    $theParent = wp_get_post_parent_id(get_the_ID());
    pageBanner();
?>
<div class="subpage-section"
    style="background-image: url(<?php if(get_field('default_img_main')) echo get_field('default_img_main')['url']; else echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg'); ?>);">
    <div class="subpage-section__container wrapper">
        <div class="subpage-section__main-content">
            <div class="subpage-section__links-content">

                Strona
            </div>
            <div class="subpage-section__text-content">
                <?php the_content() ?>
            </div>
        </div>
    </div>
</div>



<?php }

get_footer(); ?>