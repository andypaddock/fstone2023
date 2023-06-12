<?php
$heroType = get_field('hero_type_select', 'options'); 
$heroImage = get_field('hero_image', 'options'); 
$heroVideo = get_field('hero_video', 'options');
?>

<?php if($heroType == 'image'):?>
<div class="hero-wrapper">
<section class="header" style="background-image: url(<?php echo $heroImage;?>">
    <div class="container header__logo-box">
        <div class="section section__narrow">
            <?php get_template_part("inc/img/logo");?>
        </div>
    </div>
</section>
<?php elseif ($heroType == 'video'):?>
<section class="header">
    <video playsinline autoplay muted loop poster="placeholder.jpg" id="bgvideo" width="x" height="y">
        <source src="<?php echo $heroVideo['url'];?>" type="video/mp4">
    </video>
    <div class="container header__logo-box">
        <div class="section section__narrow">
            <?php get_template_part("inc/img/logo");?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="hero-text">
    <div class="container">
        <div class="section section__extranarrow">
            <div class="header__text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary--main">An exciting new events venue set in the rolling
                        Wiltshire countryside</span>
                </h1>
                <a href="#section-intro" class="more">Find Out More</a>
            </div>
        </div>
    </div>
</section>
</div>