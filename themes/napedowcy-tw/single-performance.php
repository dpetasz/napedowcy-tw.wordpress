<?php get_header();

while (have_posts()) {
  the_post();
  pageBanner(array(
    'performance-page' => true,
    'title'=> get_the_title(),
    'photo' => get_field('performance_banner_background_image')['sizes']['banner']
  ));
  $theParent = wp_get_post_parent_id(get_the_ID());
?>




<div class="site-performance"
    style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">

    <div class="site-performance__container wrapper">
        <div class="site-performance__main-content">
            <div class="site-performance__top-content">
                <h2>
                    <?php if(!in_category(16)){?>
                    <a href="<?php  echo site_url( '/performances') ?>">Przedstawienia</a>
                    <?php } else {?>
                    <a href="<?php  echo site_url( '/archival-performances') ?>">Archiwum</a>
                    <?php } ?>
                </h2>
                <p><?php the_title() ?></p>
                <p><?php the_field('type_of_performance') ?></p>
                <?php if(get_field('archive')){?><p> Przedstawienie archiwalne </p><?php }  ?>
            </div>
            <?php ?>
            <?php if(is_user_logged_in()){  
                echo get_template_part('template-parts/performance', 'before');
                echo get_template_part('template-parts/performance', 'atThe');
            } else{
                echo get_template_part('template-parts/userNotLogged');
            }
             ?>
        </div>
    </div>
</div>

<?php }

get_footer(); ?>