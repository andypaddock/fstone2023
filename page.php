<?php

/**
 * The template for displaying all single posts
 *
 * @package ridgeway
 */
get_header(); ?>

<?php if (!is_front_page()) : ?>
<section class="page-content">
    <div class="container content-wrapper">
        <div class="content-wrapper__left">
            <div class="content-holder">
                <?php if (!get_field('remove_old')) : ?>
                <div class="old-content">
                    <?php the_content(); ?>
                </div>
                <?php endif; ?>
                <?php if (have_rows('page_elements')) : ?>
                <?php while (have_rows('page_elements')) : the_row(); ?>
                <?php get_template_part('template-parts/flexible'); ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>


        </div>
        <div class="content-wrapper__right <?php if (!have_rows('left_elements')) : echo 'sticky-image'; endif;?>"
            style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?>">

        </div>
    </div>

    <div class="container content-wrapper">
        <div class="content-wrapper__left additional content-holder">
            <?php if (have_rows('left_elements')) : ?>
            <div class="additional-left">
                <?php while (have_rows('left_elements')) : the_row(); ?>
                <?php get_template_part('template-parts/flexible'); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="content-wrapper__right no-break content-holder">
            <?php if (have_rows('full_elements')) : ?>
            <div class="additional-right">
                <?php while (have_rows('full_elements')) : the_row(); ?>
                <?php get_template_part('template-parts/flexible'); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>


        </div>
    </div>


</section>
<?php endif; ?>





<?php get_footer(); ?>