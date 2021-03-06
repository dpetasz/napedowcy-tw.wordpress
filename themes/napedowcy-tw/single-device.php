<?php get_header();

while (have_posts()) {
  the_post();
  pageBanner(array(
    'device-page' => true,
    'photo' => get_field('device_banner_background_image')['sizes']['banner'],
    'subtitle'=> get_field('type_of_devices'),
    'title' => get_field('device_name')
  ));
  $theParent = wp_get_post_parent_id(get_the_ID());
?>




<div class="site-performance"
    style="background-image: url(<?php echo get_theme_file_uri('/dist/assets/images/kurtyna--small.jpg') ?>);">

    <div class="site-performance__container wrapper">
        <div class="site-performance__main-content">
            <div class="site-performance__top-content">
                <h2>

                    <a href="<?php  echo site_url( '/devices') ?>">Urządzenia</a>


                </h2>
                <p><?php the_title() ?></p>
                
            </div>

            <div class="site-performance__text-content" data-performanceAtThe>
                <?php if(is_user_logged_in()){ the_content();
                wp_link_pages(); 
                } else {
                    echo get_template_part('template-parts/userNotLogged');
                }?>
            </div>
        </div>
    </div>
</div>



<?php }

get_footer(); ?>