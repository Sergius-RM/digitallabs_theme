<?php
/**
 * All sections and template of EasyE theme
 *
 */
?>

<?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows('sections' ) ) : the_row();
        if ( get_row_layout() == 'hero' ) :
            get_template_part('template-parts/sections/section', 'hero');

        elseif ( get_row_layout() == 'info_block' ) :
            get_template_part('template-parts/sections/section', 'info_block');

        elseif ( get_row_layout() == 'featured_benefits' ) :
            get_template_part('template-parts/sections/section', 'featured_benefits');

        elseif ( get_row_layout() == 'two_columns' ) :
            get_template_part('template-parts/sections/section', 'two_columns');

        elseif ( get_row_layout() == 'portfolio_slider' ) :
            get_template_part('template-parts/sections/section', 'portfolio_slider');

        elseif ( get_row_layout() == 'contactus' ) :
            get_template_part('template-parts/sections/section', 'contactus');

        elseif ( get_row_layout() == 'video' ) :
            get_template_part('template-parts/sections/section', 'video');

        elseif ( get_row_layout() == 'page_header' ) :
            get_template_part('template-parts/sections/section', 'page_header');

        elseif ( get_row_layout() == 'cta_block' ) :
            get_template_part('template-parts/sections/section', 'cta_block');

        elseif ( get_row_layout() == 'blog_grid' ) :
            get_template_part('template-parts/sections/section', 'blog_grid');

        elseif ( get_row_layout() == 'team' ) :
            get_template_part('template-parts/sections/section', 'team');

        elseif ( get_row_layout() == 'related_articles' ) :
            get_template_part('template-parts/sections/section', 'related_articles');

        elseif ( get_row_layout() == 'single_photo' ) :
            get_template_part('template-parts/sections/section', 'single_photo');

        elseif ( get_row_layout() == 'service_cards' ) :
            get_template_part('template-parts/sections/section', 'service_cards');

        elseif ( get_row_layout() == 'twin_blocks' ) :
            get_template_part('template-parts/sections/section', 'twin_blocks');

        elseif ( get_row_layout() == 'description_block' ) :
            get_template_part('template-parts/sections/section', 'description_block');

        elseif ( get_row_layout() == 'separator' ) :
            get_template_part('template-parts/sections/section', 'separator');

            ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
