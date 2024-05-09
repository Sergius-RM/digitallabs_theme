<?php
/**
 * Template name: Default Page
 *
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greative_WP_Theme
 */

get_header();
?>
<?php if ( get_field('enable_cta_button') == true ): ?>
    <?php get_template_part( 'template-parts/heroheader' ); ?>
<?php endif; ?>

<?php get_template_part( 'template-parts/main-sections' ); ?>

<?php
get_footer();
