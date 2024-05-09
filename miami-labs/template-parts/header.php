<?php
/**
 * The template for displaying header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>
<?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows('sections' ) ) : the_row();
        if ( get_row_layout() == 'hero' || get_row_layout() == 'page_header') :
            $color_mode = 'lightmode';
            $navbar_style = 'navbar-light';
        ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php else:?>
    <?php
        $color_mode = 'darkmode';
        $navbar_style = 'navbar-dark';
    ?>
<?php endif; ?>

<?php
$page_index = "no sections";
if ( have_rows( 'sections' ) ) :
    while ( have_rows('sections' ) ) : the_row();
        if ( get_row_layout() == 'page_header' ) {
            if (get_sub_field('page_hero_index')) {
                $page_index = "pageindex_on";
            } else {
                $page_index = "pageindex_off";
            }
        }
    endwhile;
else:
    $page_index = "no sections";
endif;
?>

<!-- Start main Header -->
<header class="header_area full-width <?php if (is_singular('portfolio')):?>in_portfolio<?php endif;?>" role="banner">
    <!--Header-Upper-->

    <div class="site-header">
        <div class="site-branding d-flex">

            <!-- Main Menu -->
            <div class="navbar <?php print $navbar_style;?>">

                <?php if (is_singular('portfolio')):?>
                    <a class="back_link" href="<?php echo esc_url( wp_get_referer() ); ?>">
                        <img src="/wp-content/themes/miami-labs/assets/images/icons/left-arrow.svg" alt="">
                    </a>
                <?php else:?>
                    <span class="navbar-brandlogo_area">
                        <span class="header-header-logo-darkmode-darkmode">
                            <?php the_custom_logo();?>
                        </span>
                    </span>
                <?php endif;?>

<nav class="navbar">
  <div class="collapse navbar-collapse modal_menu" id="navbarToggleExternalContent">
    <ul class="navbar-nav">
      <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'navbar-nav' ) ); ?>
    </ul>

    <!-- <div class="reating-arkows zatujgdsanuk">
        <input id="e" type="checkbox">
        <label for="e">
            <div class="trianglesusing" data-checked="Light" data-unchecked="Dark"></div>
            <div class="moresharpened"></div>
        </label>
    </div> -->

  </div>
</nav>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <span class="navbar-toggler-line"></span>
      <span class="navbar-toggler-line"></span>
      <span class="navbar-toggler-line"></span>
    </span>
  </button>
            </div>
            <!-- Main Menu End-->

        </div>
    </div>
    <!--End Header Upper-->
</header>
