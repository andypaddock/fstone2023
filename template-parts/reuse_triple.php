<?php $bgColor = get_sub_field('switch_bg'); ?><section
    class="container section-triple-image <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                                endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="triple-image-block">
            <?php if (have_rows('triple_image_links', 'options')) : ?>
            <?php while (have_rows('triple_image_links', 'options')) : the_row(); ?>
            <div class="image-link-block tile">
                <?php
                        $image = get_sub_field('image', 'options');
                        $link = get_sub_field('link', 'options');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                <a class="text-link" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>">
                    <h3 class="heading-1"><?php echo esc_html($link_title); ?></h3>
                </a>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>