<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$description_position = get_sub_field('position');
if ($description_position == 'right') {
    $dp_style = 'd-flex justify-content-end';
} else {
    $dp_style = '';
}

$title_size = get_sub_field('title_siz');
if ($title_size == 'large') {
    $ts_style = 'col-sm-7 title_large';
} else {
    $ts_style = 'col-sm-6 col-md-4 col-xl-4 title_small';
}

?>

<!-- Service Cart Area Start -->
<section class="service_card_lists_section">
    <div class="container">
        <div class="row">

            <div class="service_card_wrap">
                <div class="wow bounceInLeft service_head
                    <?php if (get_sub_field( 'index')): ?>
                        d-flex
                    <?php else:?>
                       head-line
                    <?php endif;?>">

                    <?php if (get_sub_field( 'index')): ?>
                        <div class="index">
                            <?php echo get_sub_field('index');?>
                        </div>
                    <?php endif;?>

                    <h2 class="col-xs-12 col-sm-8 col-md-6 col-xl-6"><?php the_sub_field('title');?></h2>
                </div>

                <img class="wow bounceInUp service_card_icon" src="<?php the_sub_field('icon');?>">

                <div class="<?php echo $dp_style;?>">
                    <div class="wow fadeInUpBig col-xs-12 <?php echo $ts_style;?> service_card_content">
                        <?php if (get_sub_field( 'subtitle')): ?>
                            <h4><?php the_sub_field('subtitle');?></h4>
                        <?php endif;?>
                        <?php if (get_sub_field( 'content')): ?>
                            <div class="content"><?php the_sub_field('content');?></div>
                        <?php endif;?>

                        <?php if (get_sub_field('enable_cta_button')):?>
                            <a class="button_link" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link');?>"><?php the_sub_field('button_text');?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Service Cart Area End -->