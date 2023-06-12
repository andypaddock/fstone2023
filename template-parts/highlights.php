<?php get_template_part('inc/img/format-select__highlight'); ?>
<div class="highlights">
    <?php
    $images = get_field('gallery');
    $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
    if ($images) : ?>
    <ul>
        <?php foreach ($images as $image_id) : ?>
        <li>
            <?php echo wp_get_attachment_image($image_id, $size); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>