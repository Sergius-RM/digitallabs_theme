<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$style = get_sub_field('style');

if ($style == 'large_title') {
    $title_style = 'large_title';
} else {
    $title_style = 'small_title';
}

?>

<!-- Single Photo Area Start -->
<section class="single_photo_section">
    <div class="container">
        <div class="row">
            <?php if (get_sub_field('title')):?>
                <h2 class="wow bounceInLeft col-12 col-lg-8 <?php if (get_sub_field('title')):?><?php echo $title_style;?><?php endif;?>"><?php the_sub_field('title'); ?></h2>
            <?php endif;?>
        </div>

        <?php if (get_sub_field('single_photo')):?>
            <div class="wow bounceInUp single_photo_item">
                <img src="<?php the_sub_field('single_photo'); ?>">
            </div>
        <?php endif;?>

    </div>
</section>
<!-- Single Photo Area End -->