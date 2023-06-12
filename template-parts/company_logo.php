<div class="company-logo">
    <?php
    $images = get_sub_field('gallery');
    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
    if ($images) : ?>

    <?php foreach ($images as $image_id) : ?>
    <div class="company-logo__image tile">
        <?php echo wp_get_attachment_image($image_id, $size); ?></div>

    <?php endforeach; ?>

    <?php endif; ?>
</div>