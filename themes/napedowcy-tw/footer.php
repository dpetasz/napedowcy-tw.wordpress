<section class="site-footer">
    <div class="site-footer__container wrapper">
        <div class="site-footer__main">
            <div class="site-footer__logo">
                <img src="<?php echo get_theme_file_uri('/dist/assets/images/icons/Logo-Nap.svg'); ?>" />
            </div>
            <div class="site-footer__nav site-footer__order">
                <ul>
                    <li <?php if(is_front_page()) echo 'class="site-footer--current"' ?> ><a href="<?php echo site_url(  ) ?>">Home</a></li>
                    <li <?php if(is_page('about-us')) echo 'class="site-footer--current"' ?> >
                        <a href="<?php echo site_url( '/about-us' ) ?>">O nas</a>
                    </li>
                    <li <?php if(is_page('performances')) echo 'class="site-footer--current"' ?> >
                    <a href="<?php echo site_url( '/performances' ) ?>" >Przedstawienia</a>
                    </li>
                    <li <?php if(is_page('devices')) echo 'class="site-footer--current"' ?> >
                    <a href="<?php echo site_url( '/devices' ) ?>" >Urządzenia</a>
                    </li>
                </ul>
            </div>

            <div class="site-footer__contact">
                <p>
                    Kontakt z nami: <br />tel. 22 6920457 <br />
                    napedowcy@teatrwielki.pl
                </p>
            </div>
        </div>
        <div class="site-footer__copyright">
            <p>
                Copyright &copy; 2020 dpetasz@gmail.com
            </p>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>

</html>