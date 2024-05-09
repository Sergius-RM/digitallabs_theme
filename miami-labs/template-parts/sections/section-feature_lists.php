<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<!-- Feature Lists Area Start -->
<section class="feature_lists_section">
    <div class="container">
        <div class="row">

        <?php if( have_rows('feature_lists_cols') ): ?>
            <?php while( have_rows('feature_lists_cols') ) : the_row(); ?>

                <div class="col-sm-6 col-md-4 col-xl-4 mx-auto feature_lists_cols">

                    <?php if (have_rows('feature_items')) { ?>
                        <ul>
                        <?php while (have_rows('feature_items')) {
                            the_row(); ?>
                                <li class="align-items-center feature_item">
                                    <div class="feature_icon">
                                        <img src="<?php the_sub_field('icon');?>">
                                    </div>
                                    <span><?php the_sub_field('content');?></span>
                                </li>
                        <?php } ?>
                        </ul>
                    <?php } ?>

                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        </div>
    </div>
</section>
<!-- Feature Lists Area End -->