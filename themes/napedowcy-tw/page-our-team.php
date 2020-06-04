<?php get_header();

while (have_posts()) {
    the_post();

    $theParent = wp_get_post_parent_id(get_the_ID());
    $testimonials = new WP_Query(array(
        'posts_per_page' => 6,
        'post_type' => 'ourTeam'
    ));
    pageBanner();
?>



<div class="subpage-section"
    style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">
    <div class="subpage-section__container wrapper">
        <div class="subpage-section__main-content">
            <div class="subpage-section__links-content">
                <?php
                    $testArray = get_pages(array(
                        'child_of' => get_the_ID()
                    ));

                    if ($theParent or $testArray) { ?>
                <div class="page-links">
                    <h2 class="page-links__title">
                        <a href="<?php echo get_permalink($theParent) ?>"><?php echo get_the_title($theParent); ?></a>
                    </h2>
                    <ul>

                        <?php
                                if ($theParent) {
                                    $findChildrenOf = $theParent;
                                } else {
                                    $findChildrenOf = get_the_ID();
                                }
                                wp_list_pages(array(
                                    'title_li' => NULL,
                                    'child_of' => $findChildrenOf,
                                    'sort_column' => 'menu_order'
                                ));
                                ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="subpage-section__text-content">
                <?php the_content(); ?>
            </div>
            <div class="subpage-section__container">
                <div class="subpage-section__container-items">
                    <?php

                        while ($testimonials->have_posts()) {
                            $testimonials->the_post(); ?>
                    <div class="testimonial scroll">
                        <div class="testimonial__photo">
                            <img src="<?php $img = get_field('img')['sizes']['testimonial'];
                                                echo $img; ?>" alt="" />
                        </div>
                        <div class="testimonial__text-content">
                            <h3><?php the_field('name') ?></h3>
                            <p><?php the_content() ?></p>
                        </div>
                    </div>
                    <?php
                        }
                        ?>

                </div>
            </div>
        </div>
    </div>
</div>



<?php }

get_footer(); ?>