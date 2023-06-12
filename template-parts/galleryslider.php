<div class="highlights">
    <?php
    $images = get_sub_field('gallery');
    $first_img = $images[0];
    if ($images) : ?>
    <ul class="highlight-gallery owl-carousel owl-theme">
        <?php foreach ($images as $image) : ?>
        <li> <a data-fslightbox="gallery" href="<?php echo esc_url($image['url']); ?>"
                data-caption="<?php echo esc_attr($image['caption']); ?>">
                <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" />
            </a><span class="caption"><?php echo esc_attr($image['caption']); ?></span></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
<div class="format-switch">
    <a data-fslightbox="gallery" href="<?php echo esc_url($first_img['url']); ?>">
        <?php get_template_part('inc/img/format-select__highlight'); ?></a>
</div>