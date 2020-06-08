<?php

function pageBanner($args = NULL)
{

    if (!$args['title']) {
        if (get_field('banner_title')) $args['title'] = get_field('banner_title');
        else $args['title'] = get_the_title();
    }
    if (!$args['subtitle']) $args['subtitle'] = get_field('banner_subtitle');
    if (!$args['photo']) {
        if (get_field('banner_background_image')) {
            if ($args['home-page']) $args['photo'] = get_field('banner_background_image')['sizes']['banner_home_page'];
            else $args['photo'] = get_field('banner_background_image')['sizes']['banner'];
        } 
        
        else {
            $args['photo'] = get_field('default_img_banner')['sizes']['banner'];
        }
    }
    if ($args['home-page']) {
        if (!$args['description']) {
            $args['description'] = get_field('banner_description');
        }
        if (!$args['btn-title']) {
            $args['btn-title'] = get_field('banner_button');
        }
        if (!$args['btn-link']) {
            $args['btn-link'] = site_url('/about-us');
        }
        $args['title'] = get_field('banner_title');
?>
<section class="page-banner page-banner__home-page">
    <div class="page-banner__img" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__text-content">
        <div class="wrapper">
            <h3 class="page-banner__title "><?php echo $args['title']; ?></h3>

            <h2 class="page-banner__subtitle"><?php echo $args['subtitle']; ?></h2>



            <p class="page-banner__description">
                <?php echo $args['description']; ?>
            </p>
            <p>
                <a href="<?php echo $args['btn-link']; ?>" class="btn btn--large"><?php echo $args['btn-title']; ?></a>
            </p>
        </div>
    </div>
</section>
<?php
    } elseif ($args['performance-page']) {

        if (!$args['composer']) {
            $args['composer'] = get_field('composer');
        }
        if (!$args['director']) {
            $args['director'] = get_field('director');
        }
        if (!$args['premiere_date']) {
            $args['premiere_date'] = new DateTime(get_field('premiere_date')) ;
        }
    ?>

<section class="page-banner">
    <div class="page-banner__img" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__text-content">
        <div class="wrapper">
            <div class="wrapper__text-content">
                <h3 class="page-banner__title page-banner__title-subpage">
                    <?php echo $args['title']; ?>
                </h3>
                <p class="page-banner__subtitle-subpage ">
                    <?php echo $args['composer']; ?>
                </p>
                <p class="page-banner__description-performance ">
                    <strong></strong> <br />
                    Reżyser: <strong><?php echo $args['director']; ?></strong> <br />
                    Premiera: <strong><?php echo $args['premiere_date']->format('d.m.Y').' r.'; ?></strong>
                </p>
            </div>
        </div>
    </div>
</section>
<?php
    } elseif ($args['device-page']) {
    ?>

<section class="page-banner">
    <div class="page-banner__img" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__text-content">
        <div class="wrapper">
            <div class="wrapper__text-content">
                <h3 class="page-banner__title page-banner__title-subpage">
                    <?php echo $args['title']; ?>
                </h3>

            </div>
        </div>
    </div>
</section>
<?php
    } else {
    ?>

<section class="page-banner">
    <div class="page-banner__img" style="background-image: url(<?php echo $args['photo']; ?>);"> </div>
    <div class="page-banner__text-content">
        <div class="wrapper">
            <div class="wrapper__text-content">
                <h3 class="page-banner__title page-banner__title-subpage">
                    <?php echo $args['title']; ?>
                </h3>
                <?php if ($args['subtitle']) { ?>
                <p class="page-banner__subtitle-subpage">
                    <?php echo $args['subtitle']; ?>
                </p> <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php

    }
}
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
function napedowcy_files()
{
    wp_enqueue_script('main-napedowcy-js', get_theme_file_uri('/dist/assets/js/main.js'), NULL, microtime(), true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto:wght@100;300;400;500;700&display=swap');
    wp_enqueue_style('napedowcy_main_styles', get_template_directory_uri() . '/dist/assets/css/styles.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'napedowcy_files');

function napedowcy_title_tag()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'napedowcy_title_tag');

function napedowcy_features()
{
    // register_nav_menu( 'headerMenuLocation', 'Header Menu Location' );
    add_image_size('banner_home_page', 1920, 970, true);
    add_image_size('slider_home_page', 1920, 650, true);
    add_image_size('banner', 1920, 400, true);
    add_image_size('testimonial', 160, 160, true);
}
add_action('after_setup_theme', 'napedowcy_features');