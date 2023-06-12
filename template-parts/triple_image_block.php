<?php $bgColor = get_sub_field('switch_bg'); ?><section
    class="container section-triple-image <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                                endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="triple-image-block">
            <?php if (have_rows('image_link')) : ?>

            <?php while (have_rows('image_link')) : the_row();?>
            <?php get_template_part('partials/imageblock'); ?>

            <?php endwhile; ?>

            <?php endif; ?>
        </div>
    </div>

</section>