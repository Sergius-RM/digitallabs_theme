<?php
/**
 * Template Name: Blog Post
 * Template Post Type: post
 * The template for displaying all single posts
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- Blog Wigets Area Start -->
<?php if ( have_rows( 'current_portfolio_sections' ) ) : ?>
    <?php while ( have_rows('current_portfolio_sections' ) ) : the_row();
        if ( get_row_layout() == 'portfolio_header' ) :
            get_template_part('template-parts/blocks-blogs/section', 'portfolio_header');

        ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Blog Wigets Area End -->

<!-- start of the loop -->
<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/blocks-blogs/section-single_portfolio' ); ?>

<?php endwhile; ?>
<!-- end of the loop -->

<!-- Blog Wigets Area Start -->
<?php if ( have_rows( 'current_portfolio_sections' ) ) : ?>
    <?php while ( have_rows('current_portfolio_sections' ) ) : the_row();
        if ( get_row_layout() == 'cta_block' ) :
            get_template_part('template-parts/sections/section', 'cta_block');

        elseif ( get_row_layout() == 'portfolio_related' ) :
            get_template_part('template-parts/blocks-blogs/section', 'portfolio_related');
        ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Blog Wigets Area End -->


<?php get_footer();