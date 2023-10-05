<?php

/**
 * ============== Template Name: Contact Page
 *
 * @package ridgeway
 */
get_header(); ?>

<section class="page-content">
    <div class="container content-wrapper">
        <div class="content-wrapper__full">
            <div class="contact-title">
                <h1 class="heading-1 text-cent"><?php the_title(); ?></h1>
            </div>
            <div class="address-wrapper__form">
                <div class="address-wrapper__links">
                    <?php
                    $link = get_field('call_button', 'options');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="booking-link">
                        <a class="button" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"
                            aria-label="<?php echo esc_html($link_title); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php
                    $link = get_field('email_link', 'options');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="email-link">
                        <a class="button text-link" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"
                            aria-label="<?php echo esc_html($link_title); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="form-wrapper">
                    <!-- <?php
                if (get_field('form_shortcode', 'options')) {
                    echo do_shortcode(get_field('form_shortcode', 'options'));
                }
                ?> -->
                    <div class="embed-form">
                        <?php the_field('embed_code','options');?>
                    </div>
                </div>


            </div>

            <div class="address-wrapper">
                <div class="address-wrapper__address">
                    <?php
                    $addressOne = get_field('address_block', 'options');
                    if ($addressOne) : ?>

                    <div class="address-title"><?php echo $addressOne['address_title']; ?></div>
                    <div class="address-block"><?php echo $addressOne['address']; ?></div>
                    <div class="address-w3w"><a href="<?php echo esc_url($addressOne['w3w_link']['url']); ?>"
                            target="_blank"><?php echo esc_html($addressOne['w3w_link']['title']); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if (have_rows('address_block_links', 'options')) : ?>
                    <ul class="address-links">
                        <?php while (have_rows('address_block_links', 'options')) : the_row(); ?>
                        <li>
                            <?php
                                    $link = get_sub_field('links', 'options');
                                    if ($link) :
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                            <a class="button text-link" href="<?php echo esc_url($link_url); ?>"
                                target="<?php echo esc_attr($link_target); ?>"
                                aria-label="<?php echo esc_html($link_title); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>

                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>




                </div>

                <div class="address-wrapper__address">


                    <?php
                    $addressTwo = get_field('address_block_two', 'options');
                    if ($addressTwo) : ?>

                    <div class="address-title"><?php echo $addressTwo['address_title']; ?></div>
                    <div class="address-block"><?php echo $addressTwo['address']; ?></div>
                    <div class="address-w3w"><a href="<?php echo esc_url($addressTwo['w3w_link']['url']); ?>"
                            target="_blank"><?php echo esc_html($addressTwo['w3w_link']['title']); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if (have_rows('address_two_links', 'options')) : ?>
                    <ul class="address-links">
                        <?php while (have_rows('address_two_links', 'options')) : the_row(); ?>
                        <li>
                            <?php
                                    $link = get_sub_field('links', 'options');
                                    if ($link) :
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                            <a class="button text-link" href="<?php echo esc_url($link_url); ?>"
                                target="<?php echo esc_attr($link_target); ?>"
                                aria-label="<?php echo esc_html($link_title); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>

                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>


                </div>
            </div>



        </div>
    </div>

</section>

<?php get_footer(); ?>