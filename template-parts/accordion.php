<div class="toggle-block block">

    <?php if (have_rows('question_answer')) : ?>
    <?php while (have_rows('question_answer')) : the_row(); ?>
    <div class="block__item">
        <div class="block__title">
            <h3 class="heading"><?php the_sub_field('title'); ?>
            </h3>
        </div>
        <div class="block__text">
            <?php the_sub_field('text_area'); ?>
        </div>

    </div>
    <?php endwhile; ?>
    <?php endif; ?>

</div>