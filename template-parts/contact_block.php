<?php $bgColor = get_sub_field('switch_bg'); ?><section
    class="container section-contact <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                            endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div id="contact-form" class="contact-form">
            <h2 class="heading-2 text-cent mb-md"><?php the_sub_field('form_title'); ?></h2>
            <div class="contact-details mb-md">
                <?php
                $link = get_field('phone_number', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="phone">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="phone-detail"><a href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                </div>
                <?php endif; ?>
                <?php
                $link = get_field('email', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="email">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="email-detail">
                        <a href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <!-- <div class="address-details">
                <p><?php the_field('address', 'options'); ?></p>
            </div> -->
            <div class="form-section">

                <h2 class="heading heading__7 mb1"><?php the_sub_field('heading'); ?></h2>
                <p class="mb1"><?php the_sub_field('copy'); ?></p>
                <?php
                if (get_sub_field('form_shortcode')) {
                    echo do_shortcode(get_sub_field('form_shortcode'));
                    $test = get_sub_field('form_shortcode');
                }
                ?>
            </div>

        </div>
    </div>

</section>