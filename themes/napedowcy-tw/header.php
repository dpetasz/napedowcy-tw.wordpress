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
                        <li <?php if(is_front_page()) echo 'class="primary-nav--current"' ?>><a
                                href="<?php echo site_url( ) ?>">Home</a></li>
                        <li
                            <?php if(is_page( 'about-us' ) or wp_get_post_parent_id(0) == 6) echo 'class="primary-nav--current"' ?>>
                            <a href="<?php echo site_url( '/about-us' ) ?>">O nas</a>
                        </li>
                        <li
                            <?php if((is_page('performances') or get_post_type()=='performance') and !in_category(16) )   echo 'class="primary-nav--current"' ?>>
                            <a href="<?php echo site_url( '/performances' ) ?>">Przedstawienia</a>
                        </li>
                        <li
                            <?php if(is_page('devices') or  get_post_type()=='device') echo 'class="primary-nav--current"' ?>>
                            <a href="<?php echo site_url( '/devices' ) ?>">Urządzenia</a>
                        </li>
                        <li
                            <?php if(is_page('archival-performances') or  in_category(16))  echo 'class="primary-nav--current"' ?>>
                            <a href="<?php echo site_url( '/archival-performances' ) ?>">Archiwum</a>
                        </li>
                    </ul>
                </div>
                <div class="site-header__btn-container">
                    <a href="#" class="btn btn--small">zaloguj</a>
                </div>
                <a href="#" class="site-header__search" data-openSearch><i class="fa fa-search"
                        aria-hidden="true"></i></a>
            </div>
        </div>
    </section>