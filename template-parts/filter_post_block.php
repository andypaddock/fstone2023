<?php $bgColor = get_sub_field('switch_bg');
$noMobile = get_sub_field('hide_on_mobile'); ?>
<section
    class="container post-block <?php if ($bgColor == true) : echo 'alt-bg';
                                        endif; ?> <?php the_sub_field('margin_size'); ?>  mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <span id="filterscroll"></span>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <!-- <div class="controls">
            <ul>
                <?php $all_categories = get_categories(array(
                    'hide_empty' => true
                )); ?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach ($all_categories as $category) : ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div> -->

        <div id="ajax-posts" class="post-grid filter-grid flex-col">
            <?php
            $postsPerPage = 6;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postsPerPage,
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
        <div id="more_posts" class="btn">Load More</div>

    </div>
    </div>
</section>