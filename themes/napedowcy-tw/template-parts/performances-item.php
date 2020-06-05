<?php $date = new DateTime(get_field('premiere_date'));?>
<div class="article">
    <div class="article__circle">
        <p class="article__date"><?php echo $date->format('d.m') ?></p>
        <p class="article__date"><?php echo $date->format('Y') ?></p>
    </div>
    <div class="article__text-content">
        <h3><a href="<?php echo get_the_permalink() ?>"><?php the_title() ?></a></h3>
        <p>
            <?php if(is_page( 'archival-performances' )) echo wp_trim_words(get_the_content(), 35); else echo wp_trim_words(get_the_content(), 25); ?>
        </p>
    </div>
</div>