<?php
/**
 * Actions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Malicious URL Protection
if (strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") || strpos($_SERVER['REQUEST_URI'], "base64")) {
  @header("HTTP/1.1 400 Bad Request");
  @header("Status: 400 Bad Request");
  @header("Connection: Close");
  @exit;
}

// Automatic spam protection
function true_stop_spam($commentdata)
{
  // we will hide the usual comment field using CSS
  $fake = trim($_POST['comment']);
  // filling it with robots will result in an error, the comment will not be sent
  if (!empty($fake)) {
      wp_die('spam comment!');
  }
  // then we will assign it the value of the comment field, which for people
  $_POST['comment'] = trim($_POST['true_comment']);

  return $commentdata;
}

add_filter('pre_comment_on_post', 'true_stop_spam');

// Prohibition of pingbacks and trackbacks on yourself
function true_disable_self_ping(&$links)
{
  foreach ($links as $l => $link) {
      if (0 === strpos($link, get_option('home'))) {
          unset($links[$l]);
      }
  }
}

add_action('pre_ping', 'true_disable_self_ping');

// Hiding the WordPress Version
function true_remove_wp_version_wp_head_feed()
{
  return '';
}

add_filter('the_generator', 'true_remove_wp_version_wp_head_feed');

// Allow download svg
function allow_type($type) {
  $type['svg'] = 'image/svg+xml';
  return $type;
}
add_filter('upload_mimes', 'allow_type');

function my_customize_register( $wp_customize ) {
  $wp_customize->add_setting('header_logo', array(
      'default' => '',
      'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(
      'section' => 'title_tagline',
      'label' => 'Darck Logo'
  )));

  $wp_customize->selective_refresh->add_partial('header_logo', array(
      'selector' => '.header-logo',
      'render_callback' => function() {
          $logo = get_theme_mod('header_logo');
          $img = wp_get_attachment_image_src($logo, 'full');
          if ($img) {
              return '<img src="' . $img[0] . '" alt="">';
          } else {
              return '';
          }
      }
  ));
}
add_action( 'customize_register', 'my_customize_register' );

add_filter('category_link', function($a){
  return str_replace( 'category/', '', $a );
}, 99 );

add_action( 'admin_init', '\\Miami\\WP_Term_Image::init' );


remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', function() {
    return null;
});
wp_clear_scheduled_hook( 'wp_update_plugins' );
