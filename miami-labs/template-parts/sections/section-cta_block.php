<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Podcast Section Start -->
<section class="cta_block_section">
    <div class="container">
        <div class="row">

            <div class="wow bounceIn col-sm-12 col-md-7 col-lg-7 text-center mx-auto cta_block_item" data-wow-delay="0.5s">
                <?php if (get_sub_field('header_subtitle')):?>
                    <h6><?php the_sub_field('header_subtitle'); ?></h6>
                <?php endif;?>
                <h3><?php the_sub_field('h2_header'); ?></h3>
                <div class="content">
                    <?php the_sub_field('content'); ?>
                    <?php if ( get_sub_field('use_form') == true ):?>
                        <div class="col-sm-12 col-md-8 col-lg-8 mx-auto contactus_form">
                            <?php $form_id = get_sub_field('add_form');?>
                            <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                        </div>
                        <h4 class="tai">tai</h4>
                    <?php endif;?>
                </div>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" <?php if (get_sub_field('button_link')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Podcast Section End -->