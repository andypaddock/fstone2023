<?php $footerImage = get_field('background_image', 'options'); ?>
<div class="popup" id="<?php the_sub_field('section_id'); ?>">
    <div class="popup__content" style="background-image: url(<?php echo esc_url($footerImage['url']); ?>)">
        <div class="popup__main">
            <a href="#section-tours" class="popup__close">&times;</a>
            <h2 class="heading-1 heading-1--light"><?php the_sub_field('popup_title'); ?></h2>
            <div class="modal-form">
                <?php
                if (get_sub_field('form_shortcode')) {
                    echo do_shortcode(get_sub_field('form_shortcode'));
                    $test = get_sub_field('form_shortcode');
                }
                ?>
            </div>
            <div id="brochure" class=" brochure-link">
                <?php
                $link = get_sub_field('link');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><i
                        class="fa-duotone fa-file-arrow-down"></i><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
            <div class="modal-text">
                <?php the_sub_field('popup_text'); ?></div>
        </div>
    </div>
</div>
<script>
mc4wp.forms.on('success', function(form, data) {
    //console.log("Form with ID 223 successfully submitted.");
    const subscribed = document.getElementById("brochure");
    const classes = subscribed.classList;
    classes.add("visible");
});
</script>