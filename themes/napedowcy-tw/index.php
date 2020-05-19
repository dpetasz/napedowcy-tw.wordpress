<?php get_header();
?>
<section class="page-baner">
    <picture>
        <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--high.jpg'); ?>" media="(min-width: 1981px)" />
        <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--large.jpg'); ?>" media="(min-width: 1441px)" />
        <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--medium.jpg'); ?>" media="(min-width: 990px)" />
        <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--small.jpg'); ?>" media="(min-width: 640px)" />
        <img src="<?php echo get_theme_file_uri('/dist/assets/images/stage--smaller.jpg'); ?>" alt="welcome" class="page-baner__image" />
    </picture>
    <div class="page-baner__text-content">
        <div class="wrapper">
            <h1 class="page-baner__title">Witamy!</h1>
            <h2 class="page-baner__subtitle">Napędzamy scenę główną</h2>
            <p class="page-baner__description">
                Teatru Wielkiego w Warszawie
            </p>
            <p>
                <a href="aboutUs.html" class="btn btn--large">Poznaj nas</a>
            </p>
        </div>
    </div>
</section>

<div class="main-section" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">
    <div class="main-section__container wrapper">
        <div class="main-section__article main-section--border">
            <div class="main-section__title">
                <h2>ostatnie przedstawienia</h2>
            </div>
            <?php 
            while(have_posts()){
                the_post(  ); ?>

            <div class="article">
                <div class="article__circle">
                    <p class="article__date"><?php the_time('d.m' ) ?></p>
                    <p class="article__date"><?php the_time('Y') ?></p>
                </div>
                <div class="article__text-content">
                    <h3><a href="<?php the_permalink(  ) ?>"><?php the_title( ) ?></a></h3>
                    <p>
                        <?php the_excerpt(  ) ?>

                    </p>
                    <p><?php the_category( ) ?></p>
                    
                </div>
            </div>
                
                <?php
            }
            ?>
            <div class="main-section__btn">
                <a href="performances.html" class="btn">wszystkie przedstawienia</a>
            </div>
            <div class="main-section__pagination">
                <?php  echo paginate_links();?>
            </div>

        </div>
        <div class="main-section__article">
            <div class="main-section__title">
                <h2>nasze urządzenia</h2>
            </div>
            <div class="article">
                <div class="article__circle">
                    <p class="article__acronym">z</p>
                </div>
                <div class="article__text-content">
                    <h3><a href="#">Zapadnie sceniczne</a></h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Eveniet molestias explicabo est doloremque quam qui fuga? Animi
                        amet maiores optio placeat quo maxime,
                    </p>
                </div>
            </div>
            <div class="article">
                <div class="article__circle">
                    <p class="article__acronym">o</p>
                </div>
                <div class="article__text-content">
                    <h3><a href="#">Scena obrotowa</a></h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Eveniet molestias explicabo est doloremque quam qui fuga? Animi
                        amet maiores optio placeat quo maxime,
                    </p>
                </div>
            </div>
            <div class="article">
                <div class="article__circle">
                    <p class="article__acronym">W</p>
                </div>
                <div class="article__text-content">
                    <h3><a href="#">Wózki sceniczne</a></h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Eveniet molestias explicabo est doloremque quam qui fuga? Animi
                        amet maiores optio placeat quo maxime,
                    </p>
                </div>
            </div>
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
    <div class="site-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/TW--large.jpg);') ?>);" data-slide>
        <div class="site-slider__content wrapper">
            <div class="site-slider__text-content scroll">
                <h2 class="site-slider__title">teatr wielki</h2>
                <h3 class="site-slider__subtitle">
                    poznaj historię techniki teatralnej
                </h3>

                <p>
                    <a href="#" class="btn">czytaj więcej</a>
                </p>
            </div>
        </div>
    </div>
    <div class="site-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/pod-zapadniami-1.jpg') ?>);" data-slide>
        <div class="site-slider__content wrapper">
            <div class="site-slider__text-content scroll">
                <h2 class="site-slider__title">teatr wielki</h2>
                <h3 class="site-slider__subtitle">
                    poznaj co kryje się pod zapadniami
                </h3>

                <p>
                    <a href="#" class="btn">czytaj więcej</a>
                </p>
            </div>
        </div>
    </div>
    <div class="site-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/pod-zapadniami-2.jpg') ?>);" data-slide>
        <div class="site-slider__content wrapper">
            <div class="site-slider__text-content scroll">
                <h2 class="site-slider__title">teatr wielki</h2>
                <h3 class="site-slider__subtitle">
                    poznaj więcej urządzeń sceniacznych
                </h3>

                <p>
                    <a href="#" class="btn">czytaj więcej</a>
                </p>
            </div>
        </div>
    </div>
    <div class="site-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/pod-zapadniami-3.jpg') ?>);" data-slide>
        <div class="site-slider__content wrapper">
            <div class="site-slider__text-content scroll">
                <h2 class="site-slider__title">teatr wielki</h2>
                <h3 class="site-slider__subtitle">
                    odkryj wiele tajników zaplecza sceny
                </h3>

                <p>
                    <a href="#" class="btn">czytaj więcej</a>
                </p>
            </div>
        </div>
    </div>
    <div class="site-slider__dots-container" data-dots-container></div>
</section>
<?php get_footer();
?>