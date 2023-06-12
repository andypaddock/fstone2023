<?php if (have_rows('events')) : ?>
<div class="text-block events">
    <?php while (have_rows('events')) : the_row();?>
    <h4 class="heading-4"><?php the_sub_field('event_title'); ?></h4>
    <?php the_sub_field('details'); ?>
    <?php endwhile; ?>
</div>
<?php endif; ?>