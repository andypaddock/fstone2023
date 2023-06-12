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
                <?php if (get_row_layout() == 'title') : ?>
                <?php get_template_part('template-parts/title'); ?>
                <?php elseif (get_row_layout() == 'image_block') : ?>
                <?php get_template_part('template-parts/image_block'); ?>
                <?php elseif (get_row_layout() == 'text_block') : ?>
                <?php get_template_part('template-parts/text_block'); ?>
                <?php elseif (get_row_layout() == 'section_tabbed') : ?>
                <?php get_template_part('template-parts/section_tabbed'); ?>
                <?php elseif (get_row_layout() == 'triple_image') : ?>
                <?php get_template_part('template-parts/triple_image_block'); ?>
                <?php elseif (get_row_layout() == 'testimonial') : ?>
                <?php get_template_part('template-parts/testimonial'); ?>
                <?php elseif (get_row_layout() == 'hero_image') : ?>
                <?php get_template_part('template-parts/hero'); ?>
                <?php elseif (get_row_layout() == 'text_image_block') : ?>
                <?php get_template_part('template-parts/text_image_block'); ?>
                <?php elseif (get_row_layout() == 'post_block') : ?>
                <?php get_template_part('template-parts/filter_post_block'); ?>
                <?php elseif (get_row_layout() == 'modal_box') : ?>
                <?php get_template_part('template-parts/modal_box'); ?>
                <?php elseif (get_row_layout() == 'map_block') : ?>
                <?php get_template_part('template-parts/map'); ?>
                <?php elseif (get_row_layout() == 'table_block') : ?>
                <?php get_template_part('template-parts/table_block'); ?>
                <?php elseif (get_row_layout() == 'team_block') : ?>
                <?php get_template_part('template-parts/team_block'); ?>
                <?php elseif (get_row_layout() == 'contact_block') : ?>
                <?php get_template_part('template-parts/contact_block'); ?>
                <?php elseif (get_row_layout() == 'reuse_triple') : ?>
                <?php get_template_part('template-parts/reuse_triple'); ?>
                <?php elseif (get_row_layout() == 'page_title') : ?>
                <?php get_template_part('template-parts/page_title'); ?>
                <?php elseif (get_row_layout() == 'faqs') : ?>
                <?php get_template_part('template-parts/accordion'); ?>
                <?php elseif (get_row_layout() == 'blockquote') : ?>
                <?php get_template_part('template-parts/blockquote'); ?>
                <?php elseif (get_row_layout() == 'company_logo') : ?>
                <?php get_template_part('template-parts/company_logo'); ?>
                <?php elseif (get_row_layout() == 'event_block') : ?>
                <?php get_template_part('template-parts/event_block'); ?>
                <?php elseif (get_row_layout() == 'in_news') : ?>
                <?php get_template_part('template-parts/in_press'); ?>
                <?php elseif (get_row_layout() == 'cta') : ?>
                <?php get_template_part('template-parts/cta'); ?>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
        <div class="content-wrapper__right"
            style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?>"></div>
    </div>

</section>
<?php endif; ?>





<?php get_footer(); ?>