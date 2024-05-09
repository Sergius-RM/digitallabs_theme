<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$type_content = get_sub_field('type_content');
?>

<!-- Featured Benefits Section Start -->
<section class="featured_benefits_section">
    <div class="container">
        <div class="row align-items-center mx-auto">

            <div class="col-sm-6 col-lg-6 featured_benefits_list">
                <?php if( have_rows('benefits') ): ?>
                    <ul>
                    <?php while( have_rows('benefits') ) : the_row(); ?>
                        <li class="wow bounceInLeft d-flex align-items-center">
                            <?php if ( get_sub_field('icon') ):?>
                                <?php $info_block_image = get_sub_field('icon');?>
                                <img src="<?php echo $info_block_image;?>">
                            <?php endif; ?>
                            <h4><?php the_sub_field('name'); ?></h4>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="wow fadeInUpBig col-sm-6 col-lg-6 featured_benefits_content">
                <?php if ($type_content == 'text'):?>
                    <?php if (get_sub_field('header_subtitle')):?>
                        <h4><?php the_sub_field('header_subtitle'); ?></h4>
                    <?php endif; ?>
                    <?php if (get_sub_field('h2_header')):?>
                        <h2><?php the_sub_field('h2_header'); ?></h2>
                    <?php endif; ?>
                    <?php if (get_sub_field('content')):?>
                        <div class="content"><?php the_sub_field('content'); ?></div>
                    <?php endif; ?>
                <?php elseif ( $type_content == 'img'):?>
                    <?php $featured_benefits_image = get_sub_field('image');?>
                    <img src="<?php echo $featured_benefits_image;?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Featured Benefits Section End -->