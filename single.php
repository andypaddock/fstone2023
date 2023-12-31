<?php
/**
 * The template for displaying all single posts
 *
 * @package ridgeway
 */
get_header(); ?>



<section class="page-content">
    <div class="container content-wrapper">
        <div class="content-wrapper__left">
            <div class="content-holder">
                <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <ul class="breadcrumbs--wrapper">
                        <li class="breadcrumbs--item" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a class="breadcrumbs--link" href="/" itemprop="item">
                                <span itemprop="name">Home</span>
                            </a>
                            <meta itemprop="position" content="1">
                            <i class="fa-sharp fa-light fa-chevron-right"></i>
                        </li>
                        <li class="breadcrumbs--item" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a class="breadcrumbs--link" href="/news" itemprop="item">
                                <span itemprop="name">News</span>
                            </a>
                            <meta itemprop="position" content="2">
                            <i class="fa-sharp fa-light fa-chevron-right"></i>
                        </li>
                        <li class="breadcrumbs--item" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <span class="breadcrumbs--link"
                                itemprop="name"><?php echo mb_strimwidth(get_the_title(), 0, 20, '...');?></span>
                            <meta itemprop="position" content="3">
                        </li>
                    </ul>
                </div>

                <?php if (!get_field('remove_old')) : ?>
                <div class="old-content">
                    <h1 class="heading-1">
                        <?php the_title(); ?>
                    </h1>
                    <div class="meta"><?php the_date();?></div>
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
                <span id="filterscroll"></span>
                <div class="additional-news">
                    <h2 class="heading-1">
                        More News
                    </h2>
                    <div class="blog-post-feed">
                        <div id="ajax-posts" class="post-grid filter-grid flex-col">
                            <?php
            $postsPerPage = 2;
            // Get the current page ID
        $current_page_id = get_the_ID();
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postsPerPage,
                'post__not_in' => array($current_page_id), // Exclude the current page
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
            ?>
                            <?php get_template_part("partials/blog_content"); ?>
                            <?php
            endwhile;
            wp_reset_postdata();
            ?>
                        </div>
                        <div id="more_posts" class="btn"><button>Load More</button></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-wrapper__right"
            style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?>"></div>
    </div>

</section>

<?php get_footer(); ?>