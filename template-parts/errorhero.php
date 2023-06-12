<?php
$errorImage = get_field('error_bg_image', 'options');
?>
<div class="hero-wrapper">
    <section class="container header imageoff-<?php the_field('mobile_offset', 'options'); ?>"
        style="background-image: url(<?php echo esc_url($errorImage['sizes']['hero-image']); ?>">
        <div class="header__logo-box fmtop">
            <h1 class="heading-1"><?php the_field('errortitle', 'options'); ?></h1>
        </div>
        <div class="header__text-box fmbottom">
            <?php
            $link = get_field('errorlink','options');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="heading-2 font-display" href="<?php echo esc_url($link_url); ?>"
                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </section>
</div>