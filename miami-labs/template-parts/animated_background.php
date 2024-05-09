<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
function generateCss($values) {
    $border_radius = implode('% ', $values) . '%';
    $border_radius_slash = $values[1] . '% ' . $values[3] . '% ' . $values[2] . '% ' . $values[0] . '%';

    return 'border-radius: ' . $border_radius . '/' . $border_radius_slash . ';';
}
?>

<!-- Settings Background for a single page -->
<?php if (get_field('enable_page_animated_background')):?>

    <div class="body-multi-bg">
    <?php if( have_rows('background_item') ): ?>
        <?php $bg_itemid = '1'?>
        <?php while( have_rows('background_item') ) : the_row(); ?>

        <?php
            $width = get_sub_field('width');
            $height = get_sub_field('height');
            $margin_top = get_sub_field('margin_top');
            $blur = get_sub_field('blur');
            $opacity = get_sub_field('opacity');
            $shadow_color = get_sub_field('shadow_color');

            $position = get_sub_field('position');
            if ($position == 'left') {
                $side_position = 'left: -' . get_sub_field('width') / 3 . 'vh';
            } else {
                $side_position = 'left: calc(100% - ' . get_sub_field('width') / 2 . 'vh)';
            }

            $gradient_animation_speed = get_sub_field('gradient_animation_speed');
            $swing_animation_speed = get_sub_field('swing_animation_speed');

            $color_or_gradient = get_sub_field('color_or_gradient');

            if ($color_or_gradient == 'color') {
                $background_color = get_sub_field('background_color');
            } else {
                if (have_rows('background_gradient_colors')) {
                    $gradient_colorId = '1';
                    $gradient_colors = array();
                    while (have_rows('background_gradient_colors')) {
                        the_row();
                        $gradient_color = get_sub_field('gradient_color');
                        $gradient_colors[] = $gradient_color;
                    }
                    $gradient_colors_string = implode(',', $gradient_colors);
                }
            }

            if (have_rows('floating_border_sizes')) {
                $border_widths = array();
                $border_widthId = 1;
                while (have_rows('floating_border_sizes')) {
                    the_row();
                    $border_width = get_sub_field('border_width');
                    $border_widths[] = $border_width;
                }
                $border_radius = 'border-radius: ' . $border_widths[0] . '% ' . $border_widths[1] . '% ' . $border_widths[2] . '% ' . $border_widths[3] . '%/' . $border_widths[0] . '% ' . $border_widths[3] . '% ' . $border_widths[1] . '% ' . $border_widths[2] . '%;';

                $value_1 = $border_widths[0];
                $value_2 = $border_widths[1];
                $value_3 = $border_widths[2];
                $value_4 = $border_widths[3];

                $initial_values = array($value_1, $value_2, $value_3, $value_4);
                $state_0_values = $initial_values;
                $state_25_values = array();
                $state_50_values = array();
                $state_75_values = array();

                foreach ($initial_values as $index => $value) {
                    $state_25_values[$index] = ($value > 50) ? round($value / 2) : round($value * 2.8);
                    $state_50_values[$index] = ($value > 50) ? round($value * 1.9) : round($value * 1.4);
                    $state_75_values[$index] = ($value > 50) ? round($value * 0.8) : round($value * 1.3);
                }

                $css_state_0 = generateCss($state_0_values);
                $css_state_25 = generateCss($state_25_values);
                $css_state_50 = generateCss($state_50_values);
                $css_state_75 = generateCss($state_75_values);
            }

        ?>

    <script>
        var screenWidth = window.screen.availWidth;
        var screenHeight = window.screen.availHeight;

        var mobileSizes = {
        small: 541,
        medium: 769,
        large: 981
        };

        if (screenWidth < mobileSizes.small) {
        document.write('<style>.body-patch-' + <?php echo $bg_itemid; ?> + ' { width: ' + <?php echo ($width * 5); ?> + 'px !important; height: ' + <?php echo ($height * 6); ?> + 'px !important; top: ' + <?php echo ($margin_top + 2); ?> + '% !important; <?php if ($position == 'left'):?>left: -' + <?php echo (get_sub_field('width')) * 3; ?> + 'px !important;<?php elseif ($position == 'right'):?>left: calc(100% - ' + <?php echo (get_sub_field('width')) / 0.5; ?> + 'px) !important;<?php endif;?> filter: blur(' + <?php echo ($blur * 7); ?> + 'px) !important; }</style>');
        } else if (screenWidth < mobileSizes.medium) {
            //
        document.write('<style>.body-patch-' + <?php echo $bg_itemid; ?> + ' { width: ' + <?php echo ($width * 5); ?> + 'px !important; height: ' + <?php echo ($height * 6); ?> + 'px !important; top: ' + <?php echo ($margin_top + 1.5); ?> + '% !important; <?php if ($position == 'left'):?>left: -' + <?php echo (get_sub_field('width')) / 1.5; ?> + 'px !important;<?php elseif ($position == 'right'):?>left: calc(100% - ' + <?php echo (get_sub_field('width')) / 0.3; ?> + 'px) !important;<?php endif;?> filter: blur(' + <?php echo ($blur * 7); ?> + 'px) !important; }</style>');
        } else if (screenWidth < mobileSizes.large) {
            //
        document.write('<style>.body-patch-' + <?php echo $bg_itemid; ?> + ' { width: ' + <?php echo ($width * 6); ?> + 'px !important; height: ' + <?php echo ($height * 6); ?> + 'px !important; top: ' + <?php echo ($margin_top + 1.2); ?> + '% !important; <?php if ($position == 'left'):?>left: -' + <?php echo (get_sub_field('width')) / 1.5; ?> + 'px !important;<?php elseif ($position == 'right'):?>left: calc(100% - ' + <?php echo (get_sub_field('width')) / 0.3; ?> + 'px) !important;<?php endif;?> filter: blur(' + <?php echo ($blur * 7); ?> + 'px) !important; }</style>');
        }
    </script>

<style>
        @keyframes custom_bg_ramka {
            0% {
                <?php echo $border_radius;?>
            }
            25% {
                <?php echo $css_state_25;?>
            }
            50% {
                <?php echo $css_state_50;?>
            }
            75% {
                <?php echo $css_state_75;?>
            }
        }
        @keyframes custom_bg_anim {
            0% {
                background-position: 0% 50%;
            }
            25% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            75% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Стили для устройств Apple */
        @media only screen and (max-width: 845px) and (-webkit-min-device-pixel-ratio: 2),
            only screen and (max-width: 845px) and (min-resolution: 192dpi),
            only screen and (max-width: 845px) and (min-resolution: 2dppx),
            (device-width: 768px) and (-webkit-device-pixel-ratio: 2),
            (device-width: 768px) and (min-resolution: 192dpi),
            (device-width: 768px) and (min-resolution: 2dppx) {
        /* Стили, применяемые только на устройствах Apple */
        .custom_bg {
            opacity: 0.7 !important;
        }
        }
    </style>
            <div style="width: <?php echo $width;?>vh;
                        height: <?php echo $height;?>vh;
                        top: <?php echo $margin_top;?>%;
                        <?php echo $side_position;?>;
                        filter: blur(<?php echo $blur;?>rem);
                        opacity: <?php echo $opacity;?>;
                        <?php echo $border_radius;?>
                        box-shadow: 15px 15px 150px <?php echo $shadow_color;?>;
                        <?php if ($color_or_gradient == 'color'):?>
                            background-color: <?php echo $background_color;?>;
                        <?php else:?>
                            background: linear-gradient(-45deg,<?php echo $gradient_colors_string;?>);
                            background-size: 300% 300%;
                        <?php endif;?>
                        animation: custom_bg_anim <?php echo $gradient_animation_speed;?>s ease infinite, custom_bg_ramka <?php echo $swing_animation_speed;?>s ease infinite;"
                class="body-patch-<?php echo $bg_itemid;?> position-<?php echo $position;?> custom_bg"></div>

            <?php $bg_itemid++?>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>

<!-- General Site Background Settings -->
<?php elseif (get_field('enable_generic_animated_bg', 'option')):?>

    <div class="body-multi-bg">
    <?php if( have_rows('background_item', 'option') ): ?>
        <?php $bg_itemid = '1'?>
        <?php while( have_rows('background_item', 'option') ) : the_row(); ?>

        <?php
            $width = get_sub_field('width');
            $height = get_sub_field('height');
            $margin_top = get_sub_field('margin_top');
            $blur = get_sub_field('blur');
            $opacity = get_sub_field('opacity');
            $shadow_color = get_sub_field('shadow_color');

            $position = get_sub_field('position');
            if ($position == 'left') {
                $side_position = 'left: -' . get_sub_field('width') / 3 . 'vh';
            } else {
                $side_position = 'left: calc(100% - ' . get_sub_field('width') / 2 . 'vh)';
            }

            $gradient_animation_speed = get_sub_field('gradient_animation_speed');
            $swing_animation_speed = get_sub_field('swing_animation_speed');

            $color_or_gradient = get_sub_field('color_or_gradient');

            if ($color_or_gradient == 'color') {
                $background_color = get_sub_field('background_color');
            } else {
                if (have_rows('background_gradient_colors', 'option')) {
                    $gradient_colorId = '1';
                    $gradient_colors = array();
                    while (have_rows('background_gradient_colors', 'option')) {
                        the_row();
                        $gradient_color = get_sub_field('gradient_color');
                        $gradient_colors[] = $gradient_color;
                    }
                    $gradient_colors_string = implode(',', $gradient_colors);
                }
            }

            if (have_rows('floating_border_sizes', 'option')) {
                $border_widths = array();
                $border_widthId = 1;
                while (have_rows('floating_border_sizes', 'option')) {
                    the_row();
                    $border_width = get_sub_field('border_width');
                    $border_widths[] = $border_width;
                }
                $border_radius = 'border-radius: ' . $border_widths[0] . '% ' . $border_widths[1] . '% ' . $border_widths[2] . '% ' . $border_widths[3] . '%/' . $border_widths[0] . '% ' . $border_widths[3] . '% ' . $border_widths[1] . '% ' . $border_widths[2] . '%;';

                $value_1 = $border_widths[0];
                $value_2 = $border_widths[1];
                $value_3 = $border_widths[2];
                $value_4 = $border_widths[3];

                $initial_values = array($value_1, $value_2, $value_3, $value_4);
                $state_0_values = $initial_values;
                $state_25_values = array();
                $state_50_values = array();
                $state_75_values = array();

                foreach ($initial_values as $index => $value) {
                    $state_25_values[$index] = ($value > 50) ? round($value / 2) : round($value * 2.8);
                    $state_50_values[$index] = ($value > 50) ? round($value * 1.9) : round($value * 1.4);
                    $state_75_values[$index] = ($value > 50) ? round($value * 0.8) : round($value * 1.3);
                }

                $css_state_0 = generateCss($state_0_values);
                $css_state_25 = generateCss($state_25_values);
                $css_state_50 = generateCss($state_50_values);
                $css_state_75 = generateCss($state_75_values);
            }

        ?>

    <script>
        var screenWidth = window.screen.availWidth;
        var screenHeight = window.screen.availHeight;

        var mobileSizes = {
        small: 541,
        medium: 769,
        large: 981
        };

        if (screenWidth < mobileSizes.small) {
        document.write('<style>.body-patch-' + <?php echo $bg_itemid; ?> + ' { width: ' + <?php echo ($width * 6); ?> + 'px !important; height: ' + <?php echo ($height * 6); ?> + 'px !important; top: ' + <?php echo ($margin_top + 2); ?> + '% !important; <?php if ($position == 'left'):?>left: -' + <?php echo (get_sub_field('width')) * 3; ?> + 'px !important;<?php elseif ($position == 'right'):?>left: calc(100% - ' + <?php echo (get_sub_field('width')) / 0.5; ?> + 'px) !important;<?php endif;?> filter: blur(' + <?php echo ($blur * 7); ?> + 'px) !important; }</style>');
        } else if (screenWidth < mobileSizes.medium) {
            //
        document.write('<style>.body-patch-' + <?php echo $bg_itemid; ?> + ' { width: ' + <?php echo ($width * 5); ?> + 'px !important; height: ' + <?php echo ($height * 6); ?> + 'px !important; top: ' + <?php echo ($margin_top + 1.5); ?> + '% !important; <?php if ($position == 'left'):?>left: -' + <?php echo (get_sub_field('width')) / 1.5; ?> + 'px !important;<?php elseif ($position == 'right'):?>left: calc(100% - ' + <?php echo (get_sub_field('width')) / 0.3; ?> + 'px) !important;<?php endif;?> filter: blur(' + <?php echo ($blur * 9); ?> + 'px) !important; }</style>');
        } else if (screenWidth < mobileSizes.large) {
            //
        document.write('<style>.body-patch-' + <?php echo $bg_itemid; ?> + ' { width: ' + <?php echo ($width * 6); ?> + 'px !important; height: ' + <?php echo ($height * 6); ?> + 'px !important; top: ' + <?php echo ($margin_top + 1.2); ?> + '% !important; <?php if ($position == 'left'):?>left: -' + <?php echo (get_sub_field('width')) / 1.5; ?> + 'px !important;<?php elseif ($position == 'right'):?>left: calc(100% - ' + <?php echo (get_sub_field('width')) / 0.3; ?> + 'px) !important;<?php endif;?> filter: blur(' + <?php echo ($blur * 9); ?> + 'px) !important; }</style>');
        }
    </script>
    <style>
        @keyframes custom_bg_ramka {
            0% {
                <?php echo $border_radius;?>
            }
            25% {
                <?php echo $css_state_25;?>
            }
            50% {
                <?php echo $css_state_50;?>
            }
            75% {
                <?php echo $css_state_75;?>
            }
        }
        @keyframes custom_bg_anim {
            0% {
                background-position: 0% 50%;
            }
            25% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            75% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

            /* Стили для устройств Apple */
            @media only screen and (max-width: 845px) and (-webkit-min-device-pixel-ratio: 2),
            only screen and (max-width: 845px) and (min-resolution: 192dpi),
            only screen and (max-width: 845px) and (min-resolution: 2dppx),
            (device-width: 768px) and (-webkit-device-pixel-ratio: 2),
            (device-width: 768px) and (min-resolution: 192dpi),
            (device-width: 768px) and (min-resolution: 2dppx) {
        /* Стили, применяемые только на устройствах Apple */
        .custom_bg {
            opacity: 0.7 !important;
        }
        }
    </style>
            <div style="width: <?php echo $width;?>vh;
                        height: <?php echo $height;?>vh;
                        top: <?php echo $margin_top;?>%;
                        <?php echo $side_position;?>;
                        filter: blur(<?php echo $blur;?>rem);
                        opacity: <?php echo $opacity;?>;
                        <?php echo $border_radius;?>
                        box-shadow: 15px 15px 150px <?php echo $shadow_color;?>;
                        <?php if ($color_or_gradient == 'color'):?>
                            background-color: <?php echo $background_color;?>;
                        <?php else:?>
                            background: linear-gradient(-45deg,<?php echo $gradient_colors_string;?>);
                            background-size: 300% 300%;
                        <?php endif;?>
                        animation: custom_bg_anim <?php echo $gradient_animation_speed;?>s ease infinite, custom_bg_ramka <?php echo $swing_animation_speed;?>s ease infinite;"
                class="position-<?php echo $position;?> body-patch-<?php echo $bg_itemid;?> custom_bg"></div>
        <?php $bg_itemid++?>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>

<?php else:?>
    <div class="body-multi-bg">
        <div class="body-patch-1 spot_bg ramka-1"></div>
        <div class="body-patch-2 spot_bg ramka-1"></div>
        <div class="body-patch-3 spot_bg ramka-1"></div>
        <div class="body-patch-4 spot_bg ramka-1"></div>
        <div class="body-patch-5 spot_bg ramka-1"></div>
    </div>
<?php endif;?>