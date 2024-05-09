<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field('number_of_posts');
$orderby = get_sub_field('order_by');
$order = get_sub_field('sorting_order');
$set_name = get_sub_field('set_name');
$department = get_sub_field('from_dep');
$term_array = array($department);

if ($set_name) {
    $team_posts = get_posts(array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'           => $set_name
    ));
} elseif (get_sub_field('from_dep') == true) {
    $team_posts = get_posts(array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
        'order'          => $order,
        'tax_query'      => array(
            array(
                'taxonomy' => 'team_category',
                'field'    => 'tag_ID',
                'terms'    => $term_array[0],
            )
        )
    ));
} else {
    $team_posts = get_posts(array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
        'order'          => $order
    ));
}


if (get_sub_field('set_name') || $number == 1) {
    $cols = 8;
} else if ($number == 2) {
    $cols = 6;
} else {
    $cols = 4;
}

?>
<?php $is_teammates = 'off';?>
<!-- Contact US Section Start -->
<section class="contactus_section wrap_two_columns">
    <div class="container <?php if (get_sub_field('set_name') || $number == 1):?>full-contacts<?php endif?>">
        <div class="row">

            <?php if (get_sub_field('enable_teammates')):?>
            <?php $is_teammates = 'on';?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 contactus_team">
            <div class="row">
                <?php if ( $team_posts ): ?>
                    <?php
                    foreach ( $team_posts as $post ): setup_postdata($post); $thumb_src = null;
                    if ( has_post_thumbnail($post->ID) ) {
                        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                        $thumb_src = $src[0]; }
                    ?>

                        <div class="wow fadeInUpBig col-12 col-xs-6 col-sm-6 col-md-6 col-lg-<?php echo $cols;?>
                            <?php if (get_sub_field('set_name') || $number == 1):?> col-xs-<?php echo $cols;?> mx-auto
                            <?php else:?>
                                col-xs-6 col-sm-6 col-md-6 col-lg-<?php echo $cols;?>
                            <?php endif?>
                            member-item">
                            <div class="wow bounceIn team-member">
                                <div class="image">
                                    <?php if ( $thumb_src ): ?>
                                        <img src="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>, <?php the_field('team_job_title'); ?>">
                                    <?php endif; ?>
                                    <div class="overlay"></div>
                                </div>
                                <div class="member-designation">
                                    <?php if( get_field('team_first_name') ): ?>
                                        <h4><?php echo the_field('team_first_name'); ?> <?php echo the_field('team_last_name'); ?></h4>
                                    <?php endif; ?>

                                    <?php if( get_field('team_job_title') ): ?>
                                        <span><?php echo the_field('team_job_title'); ?></span>
                                    <?php endif; ?>

                                    <div class="content">
                                        <?php if( get_field('team_email_address') ): ?>
                                            <a href="mailto:<?php echo the_field('team_email_address'); ?>" class="team-cta-btn">
                                                <i class="bi bi-envelope-fill"></i> <?php echo the_field('team_email_address'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if( get_field('team_phone_number') ): ?>
                                            <a href="callto:<?php echo the_field('team_phone_number'); ?>" class="team-cta-btn">
                                                <i class="bi bi-telephone-fill"></i> <?php echo the_field('team_phone_number'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
                <?php wp_reset_query();?>
                </div>
            </div>
            <?php endif;?>

            <div class="wow bounceInUp col-12 col-xs-6 col-sm-6 col-md-6 col-lg-6 contactus_form <?php if ($is_teammates == 'off'):?>only_contactus_form mx-auto<?php endif;?>">
                <?php if (get_sub_field('contactus_shortcode_form')):?>
                    <?php $form_id = get_sub_field('contactus_shortcode_form');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Contact US Section End -->