<?php get_header();

while (have_posts()) {
    the_post();

    $theParent = wp_get_post_parent_id( get_the_ID());
?>


    <div class="page-baner">
        <picture>
            <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--high-1920-500.jpg'); ?>" media="(min-width: 1981px)" />
            <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--large-1920-500.jpg'); ?>" media="(min-width: 1441px)" />
            <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--medium-1450-600.jpg'); ?>" media="(min-width: 990px)" />
            <source srcset="<?php echo get_theme_file_uri('/dist/assets/images/stage--small-980-500.jpg'); ?>" media="(min-width: 640px)" />
            <img src="<?php echo get_theme_file_uri('/dist/assets/images/stage--smaller-650-400.jpg'); ?>" alt="welcome" class="page-baner__image" />
        </picture>

        <div class="page-baner__text-content">
            <div class="wrapper">
                <div class="wrapper__text-content">
                    <h3 class="page-baner__title page-baner__title-subpage"><?php the_title( ) ?></h3>
                    <p class="page-baner__description page-baner__description-subpage">
                        Kim jesteśmy i co tak naprawdę robimy
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="subpage-section" style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">
        <div class="subpage-section__container wrapper">
            <div class="subpage-section__main-content">
                <div class="subpage-section__links-content">
                    <?php 
                    $testArray = get_pages( array(
                        'child_of' => get_the_ID()
                    ) );

                    if($theParent or $testArray) { ?>
                    <div class="page-links">
                        <h2 class="page-links__title">
                            <a href="<?php echo get_permalink( $theParent ) ?>"><?php echo get_the_title( $theParent ); ?></a>
                        </h2>
                        <ul>
                            
                            <?php 
                            if($theParent){
                                $findChildrenOf = $theParent;
                            }else {
                                $findChildrenOf = get_the_ID();
                            }
                            wp_list_pages( array(
                                'title_li' => NULL,
                                'child_of' => $findChildrenOf,
                                'sort_column' => 'menu_order'
                            ) );
                            ?>
                        </ul>
                    </div>
                            <?php } ?>
                </div>
                <div class="subpage-section__text-content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    </div>



<?php }

get_footer(); ?>