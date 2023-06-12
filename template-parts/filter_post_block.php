<span id="filterscroll"></span>
<div class="blog-post-feed">

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