<?php
function pageSlider($args = NULL)
{
    if (!$args['title']) {
        if (get_field('banner_title')) $args['title'] = get_field('banner_title');
        else $args['title'] = get_the_title();
    }
    if (!$args['subtitle']) $args['subtitle'] = get_field('banner_subtitle');
    if (!$args['photo']) {
        if (get_field('banner_background_image')) {
            if ($args['home-page']) $args['photo'] = get_field('banner_background_image')['sizes']['slider_home_page'];
            else $args['photo'] = get_field('banner_background_image')['sizes']['slider_home_page'];
        } 
        else {
            $args['photo'] = get_theme_file_uri('/dist/assets/images/stage--high.jpg');
        }
    }
    if (!$args['btn-title']) {
        $args['btn-title'] = get_field('banner_button');
    }
    if (!$args['btn-link']) {
        $args['btn-link'] = get_permalink();
    }
    ?>
<div class="site-slider__slide" style="background-image: url(<?php echo $args['photo'] ?>);" data-slide>
    <div class="site-slider__content wrapper">
        <div class="site-slider__text-content scroll">
            <h2 class="site-slider__title"><?php echo $args['title'] ?></h2>
            <h3 class="site-slider__subtitle">
                <?php echo $args['subtitle'] ?>
            </h3>

            <p>
                <a href="<?php echo $args['btn-link'] ?>" class="btn"><?php echo $args['btn-title'] ?></a>
            </p>
        </div>
    </div>
</div>
<?php
}