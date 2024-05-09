<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// получаем ID термина на странице термина
$term_id = get_queried_object_id();
// получим ID картинки из метаполя термина
$image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
// ссылка на полный размер картинки по ID вложения
$tax_image = wp_get_attachment_image_url( $image_id, 'full' );

if ( wp_get_attachment_image_url( $image_id, 'full' )) {
    $header_image = $tax_image;
} else if ( is_tax('category') && get_field( 'category_header_image', 'option') ) {
    $header_image = get_field('category_header_image', 'option');
} else {
    $header_image = '/wp-content/themes/miami-labs/assets/images/hero_head_img.jpg';
}

?>

<!-- Archive Hero Section Start -->
<section class="archive_head_section" >
    <div class="archive_head_container container-fluid" style="background: url('<?php echo $header_image;?>') 50% 50% no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center">
            <div class=" col-sm-10 col-md-8 col-lg-8 center-area">
                <h1 class="wow bounceInLeft hero_title mx-auto">
                    <?php single_cat_title();?>
                </h1>
                <span class="archive_head_content d-block">
                    <?php echo category_description();?>
                </span>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Archive Hero Section End -->
