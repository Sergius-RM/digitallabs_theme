<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Quick Order Section Start -->
<section class="info_block_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-xs-12 col-md-8 col-lg-8 info_block_content text-center mx-auto">
                <h3><?php the_sub_field('h2_header'); ?></h3>
                <?php the_sub_field('content'); ?>
            </div>

        </div>
    </div>
</section>
<!-- Quick Order Section End -->