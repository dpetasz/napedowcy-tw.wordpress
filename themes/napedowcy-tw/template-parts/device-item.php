<div class="article">
    <div class="article__circle">
        <p class="article__acronym"><?php the_field('acronym') ?></p>
    </div>
    <div class="article__text-content">
        <h3><a href="<?php echo get_the_permalink() ?>"><?php the_title() ?></a></h3>
        <p>
            <?php 
            if(is_front_page()) echo wp_trim_words(get_the_content(), 25);
            else echo wp_trim_words(get_the_content(), 55);
             ?>
        </p>
    </div>
</div>