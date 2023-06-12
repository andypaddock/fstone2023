<?php $bgColor = get_sub_field('switch_bg'); ?><section
    class="container section-tabs <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                        endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>






    <?php if (have_rows('tabs')) :
        $count = 1; ?>
    <div class="tab-labels">
        <ul id="tabs-nav">
            <?php while (have_rows('tabs')) : the_row(); ?>
            <li id="tab<?php echo $count; ?>">
                <a href="#tab-<?php echo $count; ?>"><?php the_sub_field('tab_title'); ?></a>
            </li>
            <?php $count++; ?>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if (have_rows('tabs')) :
        $count = 1; ?>
    <div id="tabs-content" class="tabs-content">
        <?php while (have_rows('tabs')) : the_row(); ?>
        <div id="tab-<?php echo $count; ?>" class="tab-content container">
            <?php if (have_rows('tab_content')) : ?>
            <?php while (have_rows('tab_content')) : the_row(); ?>
            <?php if (get_row_layout() == 'paragraph') : ?>
            <div class="tabbed-text">
                <div class="text-block <?php the_sub_field('columns'); ?> <?php the_sub_field('centre_text'); ?>">
                    <?php the_sub_field('text'); ?>
                </div>
            </div>
            <?php elseif (get_row_layout() == 'faqs') : ?>
            <?php get_template_part('partials/accordion'); ?>
            <?php elseif (get_row_layout() == 'gallery_slider') : ?>
            <?php get_template_part('template-parts/galleryslider'); ?>
            <?php elseif (get_row_layout() == 'text_image_block') : ?>
            <?php get_template_part('template-parts/tabbed_text_image_block'); ?>
            <?php elseif (get_row_layout() == 'table_block') : ?>
            <?php get_template_part('template-parts/table_block'); ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php $count++; ?>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>




</section>