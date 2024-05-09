<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Two Columns Section Start -->
<section class="two_columns_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_content">
                <?php if (get_sub_field('header_subtitle')):?>
                    <h4><?php the_sub_field('header_subtitle'); ?></h4>
                <?php endif;?>

                <h2><?php the_sub_field('h2_header'); ?></h2>

                <?php if (get_sub_field('content')):?>
                    <div class="content">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endif;?>

                <?php if( have_rows('feature_list') ): ?>
                    <ul>
                    <?php while( have_rows('feature_list') ) : the_row(); ?>
                        <li class="wow bounceInLeft d-flex align-items-center">
                            <img src="/wp-content/themes/miami-labs/assets/images/icons/checkmark_circle.svg">
                            <p><?php the_sub_field('item'); ?></p>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

            <div class="wow fadeInUpBig col-sm-6 col-md-6 col-lg-6 two_columns_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if ( get_sub_field('image') ):?>
                    <?php $info_block_image = get_sub_field('image');?>
                    <img src="<?php echo $info_block_image;?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Two Columns Section End -->