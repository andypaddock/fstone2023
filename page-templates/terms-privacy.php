<?php
/**
 * ============== Template Name: Terms and Privacy
 *
 * @package ridgeway
 */
get_header();?>

<div class="container">
    <div class="section section__narrow">

        <h1 class="heading heading__lg slow-fade mt2"><?php the_field("page_heading"); ?></h1>
    </div>
    <div class="section section__narrow legal-block">


        <?php the_field("main_body_text"); ?>

    </div>

</div>

<?php get_footer();?>