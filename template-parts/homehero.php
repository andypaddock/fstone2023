<?php
$heroImage = get_field('hero_image', 'options');
$heroMobile = get_field('hero_image_mobile', 'options');
?>

<div class="hero-wrapper" style="--desktop: url(<?php echo $heroImage; ?>">
    <section class="container header imageoff-<?php the_field('mobile_offset', 'options'); ?>"
        style="--mobile:url(<?php echo $heroMobile; ?>">
        <div class="header__logo-box fmtop">
            <div class="section section__narrow">
                <a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/fulllogo"); ?></a>
            </div>
        </div>
        <div class="header__text-box fmbottom">
            <h1 class="heading-1"><?php the_field('hero_title', 'options'); ?></h1>
        </div>
        <div class="mobile-home-nav">

            <div class="mobile-menu">
                <?php if (have_rows('mobile_home_links', 'options')) : ?>
                <ul>
                    <?php while (have_rows('mobile_home_links', 'options')) : the_row(); ?>
                    <?php
                            $link = get_sub_field('links');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                    <li><a href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></li>
                    <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="mobile-home-title">
            <?php if (have_rows('mobile_headlines', 'options')) : ?>
            <?php while (have_rows('mobile_headlines', 'options')) : the_row(); ?>
            <h2 class="heading-1 fmbottom"><?php the_sub_field('headline'); ?>
            </h2>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</div>