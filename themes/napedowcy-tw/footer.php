<section class="site-footer">
    <div class="site-footer__container wrapper">
        <div class="site-footer__main">
            <div class="site-footer__logo">
                <img src="<?php echo get_theme_file_uri('/dist/assets/images/icons/Logo-Nap.svg'); ?>" />
            </div>
            <div class="site-footer__nav site-footer__order">
                <ul>
                    <li <?php if(is_front_page()) echo 'class="site-footer--current"' ?>><a
                            href="<?php echo site_url(  ) ?>">Home</a></li>
                    <li <?php if(is_page('about-us')) echo 'class="site-footer--current"' ?>>
                        <a href="<?php echo site_url( '/about-us' ) ?>">O nas</a>
                    </li>
                    <li
                        <?php if(is_page('performances') or get_post_type()=='performance') echo 'class="site-footer--current"' ?>>
                        <a href="<?php echo site_url( '/performances' ) ?>">Przedstawienia</a>
                    </li>
                    <li <?php if(is_page('devices')or get_post_type()=='device') echo 'class="site-footer--current"' ?>>
                        <a href="<?php echo site_url( '/devices' ) ?>">Urządzenia</a>
                    </li>
                    <li
                        <?php if(is_page('archival-performances')or   in_category(16)) echo 'class="site-footer--current"' ?>>
                        <a href="<?php echo site_url( '/archival-performances' ) ?>">Archiwum</a>
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

<div class='search' data-searchOverlay>
    <div class="search__top">
        <div class="search__container wrapper">
            <i class="fa fa-search search__icon" aria-hidden='true'></i>
            <input type="text" class='search-term' placeholder='Czego szukasz?' id='search-term'>
            <i class="fa fa-window-close search__close" aria-hidden='true' data-closeSearch></i>
        </div>
    </div>
    <div class="wrapper">
        <div id="search__results">

        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>