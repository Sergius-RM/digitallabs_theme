<?php
$image = get_sub_field('header_background_img');
?>
<!-- < ?php if (get_sub_field( 'page_hero_index')): ?>hero_index_up< ?php endif;?> -->
<!-- Page Header Section Start -->
<section class="page_header_section" >
    <div class="page_header_container container-fluid" >
        <div class="container mx-auto">
            <?php if (get_sub_field( 'page_hero_index')): ?>
                <div class="wow fadeIn page_index_area">
                    <div class="page_index">
                        <?php echo get_sub_field('page_hero_index');?>
                    </div>
                </div>
            <?php endif;?>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 center-area">
                    <h1 class="wow bounceInLeft hero_title">
                        <?php echo get_sub_field('header_title_h1');?>
                    </h1>
                    <?php if (get_sub_field( 'content')): ?>
                        <span class="page_header_content d-block">
                            <?php echo get_sub_field('content');?>
                        </span>
                    <?php endif;?>

                    <?php if (get_sub_field( 'enable_cta_button')): ?>
                        <a class="cta_btn" <?php if (get_sub_field('hero_link_id')):?>id="<?php the_sub_field('hero_link_id'); ?>"<?php endif;?> href="<?php echo get_sub_field('hero_link_url');?>"><?php echo get_sub_field('hero_link_text');?></a>
                    <?php endif;?>

                </div>

                <?php if (get_sub_field( 'header_background_img')): ?>
                    <div class="wow bounceInUp col-sm-6 col-md-6 col-lg-6 header_image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="">
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<!-- Page Header Section End -->