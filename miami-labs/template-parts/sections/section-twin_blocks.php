<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$style = get_sub_field('style');

if ($style == 'white style') {
    $title_style = 'white';
} else {
    $title_style = 'orange';
}

?>

<!-- Twin Blocks Section Start -->
<section class="twin_blocks_section wrap_two_columns">
    <div class="container">
        <div class="row section_two_columns">

            <div class="col-sm-7 col-md-7 col-lg-7 twin_blocks_content <?php echo $title_style;?>">
                <h2><?php the_sub_field('h2_header'); ?></h2>
            </div>

            <?php if( have_rows('twin_сolumns') ): ?>
                <div class="row">
                <?php while( have_rows('twin_сolumns') ) : the_row(); ?>
                    <div class="wow bounceIn col-sm-6 col-md-6 col-lg-6 twin_blocks_image">
                        <?php if ( get_sub_field('image') ):?>
                            <?php $twin_сolumns_image = get_sub_field('image');?>
                            <img src="<?php echo $twin_сolumns_image;?>">
                        <?php endif; ?>
                        <h3><?php the_sub_field('header_subtitle'); ?></h3>
                        <div class="twin_сolumns_content"><?php the_sub_field('content'); ?></div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- Twin Blocks  Section End -->