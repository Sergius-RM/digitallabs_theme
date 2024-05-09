<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title_position = get_sub_field('title_position');
if ($title_position == 'left') {
    $tp_style = 'title-ml';
} else {
    $tp_style = 'd-flex justify-content-end';
}

$title_color = get_sub_field('title_color');
if ($title_color == 'white') {
    $tc_style = 'white';
} else {
    $tc_style = 'orange';
}

$title_size = get_sub_field('title_size');
if ($title_size == 'large') {
    $ts_style = 'col-sm-7 title_large';
} else {
    $ts_style = 'col-sm-6 col-md-4 title_small';
}

$title_overlay = get_sub_field('title_overlay');
if ($title_overlay == 'above') {
    $to_style = 'above';
} else if ($title_overlay == 'over') {
    $to_style = 'over';
} else {
    $to_style = '';
}

$description_position = get_sub_field('position');
if ($description_position == 'right') {
    $dp_style = 'd-flex justify-content-end';
} else {
    $dp_style = '';
}

?>

<!-- Custom description block Area Start -->
<section class="description_block_section">
    <div class="container">
        <div class="row">

            <div class="description_block_wrap">
                <div class="description_head <?php echo $tp_style;?> <?php echo $to_style;?>">
                    <h2 class="wow bounceInLeft col-xs-12 <?php echo $ts_style;?> <?php echo $tc_style;?>"><?php the_sub_field('title');?></h2>
                </div>

                <?php if (get_sub_field('enable_parallax')):?>
                    <div class="parallax_background" style="<?php if (get_sub_field('icon')): ?>background: url('<?php the_sub_field('icon');?>') 50% 50% no-repeat; background-size: contain;<?php endif;?>">
                    <div class="parallax_container">
                        <div class="parallax_box">
                        <div class="parallax_content">
                            <?php the_sub_field('parallax_content');?>
                        </div>
                        </div>
                    </div>
                    </div>

                <?php else:?>
                    <img class="wow bounceInUp description_block_icon" src="<?php the_sub_field('icon');?>">
                <?php endif;?>

                <?php if( have_rows('description_blocks') ): ?>
                    <div class="row <?php echo $dp_style;?>">
                    <?php $blocks_index = '1'?>
                    <?php while( have_rows('description_blocks') ) : the_row(); ?>

                        <?php $font_size = get_sub_field('font_size'); ?>
                        <?php if ($font_size == 'large') {
                            $ts_style = 'title_large';
                        } else {
                            $ts_style = '';
                        } ?>

                        <div class="wow bounceInRight col-xs-12 col-sm-6
                            <?php if ($font_size == 'large'):?>
                                col-md-6 col-xl-6
                            <?php else:?>
                                col-md-4 col-xl-4
                            <?php endif;?> description_block_content
                            <?php echo $ts_style;?>
                            <?php if ( $blocks_index == 1):?>offset-sm-3<?php endif;?>">
                            <?php if (get_sub_field( 'subtitle')): ?>
                                <h4><?php the_sub_field('subtitle');?></h4>
                            <?php endif;?>
                            <?php if (get_sub_field( 'content')): ?>
                                <div class="content"><?php the_sub_field('content');?></div>
                            <?php endif;?>
                        </div>
                        <?php $blocks_index++; ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>


            </div>

        </div>
    </div>
</section>
<!-- Custom description block Area End -->