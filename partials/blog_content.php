<?php $terms = get_the_category($post->ID);
$mainImage = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
<div class="post-grid--item tile <?php foreach ($terms as $term) echo ' ' . $term->slug; ?>">
    <a href="<?php echo get_permalink($post->ID); ?>">
        <div class="post-image" style="background-image: url(<?php echo $mainImage; ?>)">

        </div>
    </a>
    <div class="post-text">
         <div class="meta"><?php the_date(); ?></div>
        <h2 class="heading-4">
           
            <a href="<?php echo get_permalink($post->ID); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <!-- <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p> -->
    </div>
    <div class="post-link">
        <a class="overscores" href="<?php echo get_permalink($post->ID); ?>">
            Read more <i class="fa-sharp fa-light fa-chevron-right"></i>
        </a>
    </div>
</div>