<span id="filterscroll"></span>
<div class="blog-post-feed">
    <div id="ajax-posts" class="post-grid filter-grid flex-col">
        <?php
            $postsPerPage = 4;
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