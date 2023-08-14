<?php

/**
 * Header
 *
 * @package ridgeway
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php 
        if ( is_home() ) {
            echo get_bloginfo( 'name' );
        } else {
            echo the_title();
        }?>
    </title>

    <link rel="stylesheet" href="https://use.typekit.net/lym5ipm.css">
    <!--TYPEKIT INJECT-->
    <script src="https://kit.fontawesome.com/3be7b1018b.js" crossorigin="anonymous"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.js"></script>


    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N3VK3CN');
    </script>
    <!-- End Google Tag Manager -->

    <script type="text/javascript">
    var _cgk = 'lUoFYsY8vr00fc2';

    (function() {
        var _cg = document.createElement('script');
        _cg.type = 'text/javascript';
        _cg.async = true;
        _cg.src = 'https://v2.clickguardian.app/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(_cg, s);
    })();
    </script>
    <meta name="google-site-verification" content="y6_t_N57APJGUgqXxdiI054xesSXOP5vcqhRLqUbcjU" />
</head>

<body <?php body_class(); ?>>
    <a class="skip-to-content-link" href="#main-content">
        Skip to content
    </a>

    <div class="mobile-message"><i class="fa-duotone fa-mobile"></i><span
            class="instructions"><?php the_field('rotate_instructions', 'options'); ?></span><span
            class="title"><?php the_field('rotate_title', 'options'); ?></span></div>




    <div class="mobile-header">
        <div class="header__inner">
            <?php if (!is_front_page()) : ?>
            <div class="burger-container">
                <div class="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <?php endif; ?>
            <div class="contact-button">
                <a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/mobilelogo"); ?></a>
                <?php
                $link = get_field('mobile_contact', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="mobile-nav">
        <div class="mobile-nav__menu">
            <nav class="nav">
                <? wp_nav_menu(array(
                    'theme_location' => 'mobile-menu',
                    'container_class' => 'mobile-menu'

                )); ?>
            </nav>
            <!-- <div class="social-icons">
                <?php if (have_rows('social_media_links', 'options')) : ?>
                <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>
                <div class="social-icon">
                    <?php
                        $link = get_sub_field('social_media_link', 'options');
                        if ($link) :
                    ?>
                    <a href="<?php echo esc_url($link); ?>"
                        target="_blank"><?php the_sub_field('social_media_icon', 'options'); ?></a>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div> -->
            <div class="mobile-portal-button">
                <?php
                $link = get_field('portal_link', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="font-display" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- <div class="mobile-nav__social">
            <div class="social-icons">
                <?php if (have_rows('social_media_links', 'options')) : ?>
                <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>
                <div class="social-icon">
                    <?php
                        $link = get_sub_field('social_media_link', 'options');
                        if ($link) :
                    ?>
                    <a href="<?php echo esc_url($link); ?>"
                        target="_blank"><?php the_sub_field('social_media_icon', 'options'); ?></a>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div> -->
    </div>

    <header id="navbar" class="navbar top-bar container">









        <div class="navbar__left">
            <nav class="left-nav">
                <? wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container_class' => 'main-menu'

                )); ?>

            </nav>
        </div>
        <div class="navbar__center">
            <div class="nav-logo">
                <a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/mobilelogo"); ?></a>
            </div>
        </div>
        <div class="navbar__right">
            <nav class="right-nav">
                <? wp_nav_menu(array(
                    'theme_location' => 'main-menu-right',
                    'container_class' => 'main-menu-right'

                )); ?>

            </nav>
            <div class="portal-link">
                <?php
                $link = get_field('portal_link', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="font-display" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>



    </header>

    <?php
    if ($post->post_parent) {
        $children = wp_list_pages(array(
            'title_li' => '',
            'child_of' => $post->post_parent,
            'echo'     => 0
        ));
    } else {
        $children = wp_list_pages(array(
            'title_li' => '',
            'child_of' => $post->ID,
            'echo'     => 0
        ));
    }

    if ($children) : ?>
    <div class="subpage-nav">
        <ul>
            <?php echo $children; ?>
        </ul>
    </div>
    <?php endif; ?>

    <main id="#main-content">
        <?php if (is_front_page()) : ?>
        <?php get_template_part("template-parts/homehero"); ?>
        <?php endif; ?>
        <!--closes in footer.php-->