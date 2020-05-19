<!DOCTYPE html>
<html <?php language_attributes( ) ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <section class="site-header">
        <div class="site-header__main-content wrapper">
            <div class="site-header__logo">
                <img src="<?php echo get_theme_file_uri('/dist/assets/images/icons/Logo-Nap.svg'); ?>" />
            </div>
            <div class="site-header__menu-icon">
                <div class="site-header__menu-icon__middle"></div>
            </div>
            <div class="site-header__menu-content">
                <div class="primary-nav">
                
                    <ul>
                        <li <?php if(is_front_page()) echo 'class="primary-nav--current"' ?> ><a href="<?php echo site_url( ) ?>">Home</a></li>
                        <li <?php if(is_page( 'about-us' ) or wp_get_post_parent_id(0) == 6) echo 'class="primary-nav--current"' ?> >
                            <a href="<?php echo site_url( '/about-us' ) ?>" >O nas</a>
                        </li>
                        <li <?php if(is_page('performances') or wp_get_post_parent_id(0) == 8) echo 'class="primary-nav--current"' ?>>
                            <a href="<?php echo site_url( '/performances' ) ?>" >Przedstawienia</a>
                        </li>
                        <li <?php if(is_page('devices') or wp_get_post_parent_id(0) == 24) echo 'class="primary-nav--current"' ?>>
                        <a href="<?php echo site_url( '/devices' ) ?>" >Urządzenia</a>
                        </li>
                    </ul>
                </div>
                <div class="site-header__btn-container">
                    <a href="#" class="btn btn--small">zaloguj</a>
                </div>
            </div>
        </div>
    </section>