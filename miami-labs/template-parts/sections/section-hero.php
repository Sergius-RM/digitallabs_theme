<?php
$image_or_shortcode = get_sub_field('image_or_shortcode');
$image = get_sub_field('hero_img');
?>

<!-- Hero Section Start -->
<section class="hero-section" >
    <div class="hero-container container">
        <div class="row">

            <div class=" col-sm-8 col-md-8 col-lg-6">
                <?php if (get_sub_field( 'header_ander_title')): ?>
                    <h4>
                        <?php echo get_sub_field('header_ander_title');?>
                    </h4>
                <?php endif;?>

                <h1 class="wow bounceInRight hero_title mx-auto">
                    <?php echo get_sub_field('header_title');?>
                </h1>

                <?php if (get_sub_field( 'content')): ?>
                    <span class="hero-content d-block mx-auto">
                        <?php echo get_sub_field('content');?>
                    </span>
                <?php endif;?>

                <!-- CTA Button Start -->
                <?php if (get_sub_field( 'enable_cta_button')): ?>
                    <a class="cta_btn" <?php if (get_sub_field('hero_link_id')):?>id="<?php the_sub_field('hero_link_id'); ?>"<?php endif;?> href="<?php echo get_sub_field('hero_link_url');?>"><?php echo get_sub_field('hero_link_text');?></a>
                <?php endif;?>
                <!-- END CTA Button -->

                <!-- Logo Area Start -->
                <?php if( have_rows('header_logo_area') ): ?>
                    <div class="wow flipInX container d-flex header_logo_area">
                    <?php while( have_rows('header_logo_area') ) : the_row(); ?>
                        <?php if (get_sub_field( 'url')): ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>"><?php endif; ?>
                            <img src="<?php the_sub_field('logo_img'); ?>">
                        <?php if (get_sub_field( 'url')): ?>
                        </a><?php endif; ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <!-- END Logo Area -->

            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 header_image">
                <?php if ($image_or_shortcode == 'img'):?>
                    <?php if (get_sub_field( 'hero_img')): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="">
                    <?php endif;?>
                <?php elseif($image_or_shortcode == 'short'):?>
                    <?php if (get_sub_field( 'hero_shortcode')): ?>
                        <?php echo get_sub_field('hero_shortcode');?>
                    <?php endif;?>
                <?php endif;?>
            </div>

        </div>

    </div>
</section>
<!-- Hero Section End -->