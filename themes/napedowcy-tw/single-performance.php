<?php get_header();

while (have_posts()) {
  the_post();
  pageBanner(array(
    'performance-page' => true,
    'title'=> get_the_title()
  ));
  $theParent = wp_get_post_parent_id(get_the_ID());
?>




<div class="site-performance"
    style="background-image: url(<?php echo get_theme_file_uri('/assets/images/kurtyna--small.jpg') ?>);">

    <div class="site-performance__container wrapper">
        <div class="site-performance__main-content">
            <div class="site-performance__top-content">
                <h2>
                    <a href="<?php  echo site_url( '/performances') ?>">Przedstawienia</a>
                </h2>
                <p><?php the_title() ?></p>
            </div>
            <div class="site-performance__links-content">
                <div class="page-links">
                    <h2>
                        Straszny dwór
                    </h2>
                    <ul>
                        <li class="" data-btnBefore>
                            <a> Przed przedstawieniem</a>
                        </li>
                        <li class="page-links--current" data-btnAtThe>
                            <a> Na przedstawieniu</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php echo get_template_part('template-parts/performance', 'before');
            echo get_template_part('template-parts/performance', 'atThe');
             ?>
        </div>
    </div>


    <?php }

get_footer(); ?>