<?php
$image = get_sub_field('header_background_img');
?>

<!-- Page Header Section Start -->
<section class="portfolio_header_section" >
    <div class="portfolio_header_container container-fluid" style="<?php if (get_sub_field( 'header_background_img')): ?>background-image: url('<?php echo esc_url($image['url']); ?>');<?php endif;?>">
        <div class="container mx-auto">

            <div class="row align-items-center">
                <div class="col-sm-10 col-md-10 col-lg-6 center-area">

                    <div class="header_top_links">
                        <?php
                        $category = get_the_terms( $post->ID, 'portfolio_category' );
                        if ( $category && ! is_wp_error( $category ) ) :
                        $category_links = array();
                        foreach ( $category as $cat ) {
                            $category_links[] = '<a class="header_top_links_item" href="' . esc_url( get_term_link( $cat->term_id, 'portfolio_category' ) ) . '">' . esc_html( $cat->name ) . '</a>';
                        }
                        $category_list = join( ', ', $category_links );
                        ?>
                        <div class="entry-categories">
                            <?php echo esc_html__( '', 'text-domain' ); ?><?php echo $category_list; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <h1 class="wow bounceInLeft hero_title">
                        <?php echo get_sub_field('header_title_h1');?>
                    </h1>
                    <?php if (get_sub_field( 'content')): ?>
                        <span class="portfolio_header_content d-block">
                            <?php echo get_sub_field('content');?>
                        </span>
                    <?php endif;?>

                    <?php if (get_sub_field( 'enable_cta_button')): ?>
                        <a class="read_more_link" <?php if (get_sub_field('hero_link_id')):?>id="<?php the_sub_field('hero_link_id'); ?>"<?php endif;?> href="<?php echo get_sub_field('hero_link_url');?>"><?php echo get_sub_field('hero_link_text');?></a>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Header Section End -->