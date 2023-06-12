<div class="team-member tile">
    <?php
    $image = get_sub_field('image');
    ?>
    <figure class="team-member__image">
        <img src="<?php echo wp_get_attachment_image_url($image, 'large'); ?>" alt="<?php the_sub_field('name'); ?>"
            class="team-member__img">
        <figcaption class="team-caption">
            <h2 class="heading-2"><?php the_sub_field('name'); ?></h2>
        </figcaption>
    </figure>
    <div class="team-bio">
        <?php the_sub_field('bio'); ?>
    </div>
</div>