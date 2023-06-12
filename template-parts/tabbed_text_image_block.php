<?php $bgColor = get_sub_field('switch_bg'); ?><div
    class="section-text-image <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                            endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="text-image-wrapper image-<?php the_sub_field('image_position'); ?>">
            <div class="text-block">
                <?php the_sub_field('text_block'); ?>
            </div>
            <div class="text-image">
                <?php
                $image = get_sub_field('image');
                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>