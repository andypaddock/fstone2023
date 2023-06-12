<div class="testimonial-wrapper">

    <div class="testimonial-carousel">
        <?php $testSelect = get_sub_field('filter_testimonials'); ?>
        <?php if (have_rows('testimonial', 'options')) :
                    $testimonialType = get_sub_field('filter_testimonials');
                    while (have_rows('testimonial', 'options')) : the_row(); ?>
        <?php $testType = get_sub_field('testimonial_type', 'options'); if ($testType == $testSelect || $testSelect == 'all'):?>
        <div class="quote">
            <?php the_sub_field('quote'); ?>
            <p class="attrib"><?php the_sub_field('attrib'); ?></p>


        </div>
        <?php endif; ?>
        <?php endwhile;
                endif; ?>
    </div>
</div>