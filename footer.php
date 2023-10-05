<?php

/**
 * The template for displaying the footer
 * @package ridgeway
 */
?>
<!-- start modal-->
<div class="modal" id="speedbump" role="dialog">
    <div class="modal-dialog">
        <?php $externalLink = get_field('external_link_warning','options');?>
        <!-- Modal content-->
        <div class="modal-content">
            <a class="close-button">&times;</a>
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $externalLink['title']; ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo $externalLink['explanatory_text']; ?></p>
            </div>
            <div class="modal-footer text-center">
                <a type="button" title="continue" class="button continue-link" data-dismiss="modal">Continue</a>
            </div>
        </div>

    </div>
</div>
<!--end modal-->
</main>

<footer class="container footer">
    <div class="footer__left">
        <div class="footer-address">
            <?php the_field('address', 'options'); ?>
        </div>
        <div class="tab-port__menu">
            <? wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container_class' => 'footer-tab-port-menu'

            )); ?>
        </div>
        <div class="tab-port__social">

            <?php if (have_rows('social_media_links', 'options')) : ?>
            <ul class="social-links">
                <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>
                <li>
                    <?php
                            $link = get_sub_field('social_media_link', 'options');
                            if ($link) :
                            ?>
                    <a href="<?php echo esc_url($link); ?>"
                        target="_blank"><?php the_sub_field('social_media_icon', 'options'); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>

        </div>
        <div class="footer-regulator">
            <?php the_field('footer_reg_text', 'options'); ?>
        </div>

    </div>
    <div class="footer__center"><a class=""
            href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/feather"); ?></a>
    </div>
    <div class="footer__right">
        <div class="footer--contacts">
            <div class="text-links">

                <?php if (have_rows('contact_links', 'options')) : ?>
                <ul class="links">
                    <?php while (have_rows('contact_links', 'options')) : the_row(); ?>
                    <li>
                        <?php
                                $link = get_sub_field('link', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                        <a href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="social-links-wrapper">
                <?php if (have_rows('social_media_links', 'options')) : ?>
                <ul class="social-links">
                    <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>
                    <li>
                        <?php
                                $link = get_sub_field('social_media_link', 'options');
                                if ($link) :
                                ?>
                        <a href="<?php echo esc_url($link); ?>"
                            target="_blank"><?php the_sub_field('social_media_icon', 'options'); ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <? wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container_class' => 'footer-menu'

        )); ?>

    </div>

</footer>
<div class="mobile-toolbar">
    <div class="portal-link__mobile"> <?php
                                        $link = get_field('book_call', 'options');
                                        if ($link) :
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
        <a class="font-display" href="<?php echo esc_url($link_url); ?>"
            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
    </div>
    <div class="contact-link__mobile">

        <!--         <?php
        $link = get_field('call_button', 'options');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?> -->

        <a class="font-display" href="/contact-us" aria-label="Contact Us">contact us</a>

        <?php endif; ?>

    </div>
</div>
<?php wp_footer(); ?>

</body>

</html>