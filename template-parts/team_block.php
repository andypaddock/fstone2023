<?php $bgColor = get_sub_field('switch_bg'); ?>
<div id="teamblock" class="team-image-block">
    <?php if (have_rows('team_members')) :
        $counter = 0; ?>

    <?php while (have_rows('team_members')) : the_row(); ?>
    <div class="team-member tile">
        <?php
                $image = get_sub_field('image');
                ?>
        <div class="team-member__image">
            <a href="#team<?php echo ($counter); ?>"> <img
                    src="<?php echo wp_get_attachment_image_url($image, 'large'); ?>"
                    alt="<?php the_sub_field('name'); ?>" class="team-member__img"></a>

        </div>
        <div class="team-caption">
            <a href="#team<?php echo ($counter); ?>">
                <h2 class="heading-3"><?php the_sub_field('name'); ?></h2>
            </a>
            <div class="team-position font-display">
                <a class="decor" href="#team<?php echo ($counter); ?>">read bio
                </a>
            </div>
        </div>

    </div>
    <div class="popup popup-team" id="team<?php echo ($counter); ?>">
        <div class="popup__content">
            <div class="popup__left">
                <div class="left-block">
                    <img src="<?php echo wp_get_attachment_image_url($image, 'large'); ?>"
                        alt="<?php the_sub_field('name'); ?>" class="team-member__img">
                    <h2 class="heading-2 font-display"><?php the_sub_field('name'); ?></h2>
                    <p class="position"><?php the_sub_field('position'); ?></p>

                    <?php if (have_rows('contact_links')) : ?>
                    <?php while (have_rows('contact_links')) : the_row(); ?>
                    <?php
                                    $link = get_sub_field('link');
                                    if ($link) :
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                    <a class="contact-link" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>



                </div>
            </div>
            <div class="popup__right">

                <a href="#teamblock" class="popup__close">&times;</a>
                <div class="right-block">
                    <?php the_sub_field('bio'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $counter++;
        endwhile; ?>


    <?php endif; ?>
</div>