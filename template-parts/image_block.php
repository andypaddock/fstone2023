<div class="single-image fmbottom">
    <?php
    $image = get_sub_field('image');
    if (!empty($image)) : ?>
    <a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fslightbox>
        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
    <?php endif; ?>
</div>