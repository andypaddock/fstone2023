<?php if (have_rows('news_items')) : ?>
    <div class="text-block news-links">
        <?php while (have_rows('news_items')) : the_row(); ?>
            <h3 class="heading-3"><?php the_sub_field('headline'); ?></h3>
            <a href="<?php the_sub_field('news_link'); ?>" aria-label="Click to read about <?php the_sub_field('headline'); ?>" target="_blank">Read more here...</a>
        <?php endwhile; ?>
    </div>
<?php endif; ?>