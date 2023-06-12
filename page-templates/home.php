<?php
/**
 * ============== Template Name: Home Page
 *
 * @package ridgeway
 */
get_header();?>

<div class="container">
    <div id="section-intro" class="nav-section section section__extranarrow introduction paragraph text-block">

        <?php the_field('intro_copy');?>

        <p></p>

        <?php get_template_part('template-parts/seemore');?>

    </div>
    <div id="gallery" class="nav-section section gallery">
        <h1 class="heading-primary">Gallery</h1>

        <?php get_template_part('template-parts/fixed-gallery');?>
    </div>


    <?php get_template_part('template-parts/directory');?>

    <div id="testimonials" class="nav-section section section__extranarrow testimonials">
        <h1 class="heading-primary slide-up">Testimonials</h1>

        <?php get_template_part('template-parts/testimonial');?>
    </div>

    <div id="faq" class="nav-section section section__narrow faq">
        <h1 class="heading-primary slide-up">FAQ</h1>

        <?php get_template_part('template-parts/accordian');?>

    </div>
    <div id="contact-form" class="nav-section section section__narrow contact">
        <h1 class="heading-primary slide-up">Contact</h1>
        <div class="contact-details">
            <div class="phone">
                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                <div class="phone-detail"><a
                        href="tel:<?php the_field('phone_number', 'options');?>"><?php the_field('phone_number', 'options');?></a>
                </div>
            </div>
            <div class="email">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <div class="email-detail"><a
                        href="mailto:<?php the_field('email_general', 'options');?>"><?php the_field('email_general', 'options');?></a>
                </div>
            </div>
        </div>
        <div class="address-details">
            <p><?php the_field('address', 'options');?></p>
        </div>
        <div class="form-section">

            <h2 class="heading heading__7 mb1"><?php the_sub_field('heading');?></h2>
            <p class="mb1"><?php the_sub_field('copy');?></p>
            <?php echo do_shortcode('[contact-form-7 id="88" title="Contact Form"]');?>

        </div>

    </div>

</div>
<div id="location" class="nav-section">
    <?php get_template_part('template-parts/map');?>
</div>

<?php get_footer();?>