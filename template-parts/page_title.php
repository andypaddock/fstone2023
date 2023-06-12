<?php $useTitle = get_sub_field('page_title'); ?>
<?php if ($useTitle == true): ?>
<h1 class="heading-1">
    <?php if (get_sub_field('alt_title')) : ?><?php the_sub_field('alt_title'); ?><?php else : ?><?php the_title(); ?><?php endif ?>
</h1>
<?php else: ?>
<h2 class="<?php the_sub_field('title_size'); ?>">
    <?php the_sub_field('title'); ?>
</h2>
<?php endif; ?>