<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$copyright_data = get_field('copyright_data', 'option');

?>

<!-- Footer Area Start -->
<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container-fluid footer-wrap">
        <div class="row">

            <!-- Branding Area Start -->
            <div class="col-sm-12 col-md-4 col-xl-4 site-branding">

                <?php
                $header_logo = get_theme_mod('header_logo');
                $img = wp_get_attachment_image_src($header_logo, 'full');
                if ($img) :
                    ?>
                    <img src="<?php echo $img[0]; ?>" alt="">
                <?php endif; ?>

                <!-- Contacts Info Area Start -->
                    <div class="row footer_contact_wiget">
                        <?php if( have_rows('contact_wiget', 'option') ): ?>
                            <?php while( have_rows('contact_wiget', 'option') ) : the_row(); ?>

                                <div class="footer_contacts">

                                    <?php if (have_rows('topbaremails', 'option')) { ?>
                                        <?php while (have_rows('topbaremails', 'option')) {
                                            the_row(); ?>
                                                <a href="mailto:<?php the_sub_field('top_bar_email_link');?>" target="_blank">
                                                    <i class="bi bi-envelope-fill"></i> <?php the_sub_field('top_bar_email');?></a>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (have_rows('topbarphones', 'option')) { ?>
                                        <?php while (have_rows('topbarphones', 'option')) {
                                            the_row(); ?>
                                                <a href="tel:<?php the_sub_field('top_bar_phone_link');?>" target="_blank">
                                                    <i class="bi bi-telephone-fill"></i><?php the_sub_field('top_bar_phone');?></a>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (have_rows('physical_adress', 'option')) {
                                        while (have_rows('physical_adress', 'option')) {
                                            the_row(); ?>
                                                <div class="physical_adress"><i class="bi bi-geo-alt-fill"></i> <?php the_sub_field('short_physical_adress');?></div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <!-- END Contacts Info Area -->
            </div>
            <!-- END Branding Area -->

            <!-- Footer Widget Area 1 Start -->
            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 footer_info">
                <?php dynamic_sidebar( 'footer_1' ); ?>
            </div>
            <!-- END Footer Widget Area 1 -->

            <!-- Footer Widget Area 2 Start -->
            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 mx-auto footer_nav" role="navigation">
                <?php dynamic_sidebar( 'footer_2' ); ?>
            </div>
            <!-- END Footer Widget Area 2 -->

            <!-- Ordering Area Start -->
            <div class="footer_entrepreneurs d-flex">
                <?php if( have_rows('footer_logo_area', 'option') ): ?>
                    <?php while( have_rows('footer_logo_area', 'option') ) : the_row(); ?>
                        <?php if (get_sub_field( 'url')): ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>"><?php endif; ?>
                            <img src="<?php the_sub_field('logo_img'); ?>" alt="footer_entrepreneurs logo">
                        <?php if (get_sub_field( 'url')): ?>
                        </a><?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Ordering Area -->

        </div>
    </div>

    <!-- START Copyright Area -->
    <div class="container-fluid footer_copyright">
        <div class="row align-items-center">
            <div class="col-12 col-sm-4 col-xl-4 footer_copyright_menu">
                <?php dynamic_sidebar( 'footer_bottom' ); ?>
            </div>
            <div class="col-12 col-sm-4 col-xl-4 text-center copyright_data">
                <?php echo $copyright_data;?>
            </div>
            <div class="col-12 col-sm-4 col-xl-4 text-end footer_copyright_menu">
                <?php dynamic_sidebar( 'footer_bottom_right' ); ?>
            </div>
        </div>
    </div>
    <!-- END Copyright Area -->

</footer>
 <!-- Footer Area End -->

