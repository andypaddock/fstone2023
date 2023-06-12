<?php
$heroType = get_sub_field('hero_type_select');
$heroImage = get_sub_field('hero_image');
$heroVideo = get_sub_field('hero_video');
?>

<?php if ($heroType == 'image') : ?>
<div class="sub-page hero-wrapper">
    <section
        class="container header imageoff-<?php the_field('mobile_offset'); ?> <?php the_sub_field('hero_height'); ?>  anchor-<?php the_sub_field('image_anchor'); ?>"
        style="--mobile-image: url(<?php if ($heroImage) : ?><?php echo $heroImage['sizes']['hero-image']; ?><?php else : ?><?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?><?php endif ?>">
        <!-- <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div> -->
    </section>
</div>
<?php elseif ($heroType == 'video') : ?>
<div class="sub-page hero-wrapper">
    <section class="container header  <?php the_sub_field('hero_height'); ?>">
        <video playsinline autoplay muted loop poster="placeholder.jpg" id="bgvideo" width="x" height="y">
            <source src="<?php echo $heroVideo['url']; ?>" type="video/mp4">
        </video>
        <!-- <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div> -->
    </section>
</div>
<?php elseif ($heroType == 'slider') : ?>
<div class="sub-page hero-wrapper">
    <section class="container header  <?php the_sub_field('hero_height'); ?>">
        <div class="hero-slider">


            <?php
                $images = get_sub_field('hero_slider');
                if ($images) : ?>

            <?php foreach ($images as $image) : ?>

            <div class="slider-image" style="background-image: url(<?php echo esc_url($image['url']); ?>)"></div>

            <?php endforeach; ?>

            <?php endif; ?>







        </div>
        <!-- <div class="center-wrapper">
            <div class="center bounce">
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </div>
        </div> -->
    </section>
</div>
<?php endif; ?>