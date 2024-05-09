<?php
// Register Team Post Type
function create_team_post_type() {
    $labels = array(
      'name' => __( 'Team' ),
      'singular_name' => __( 'Team' ),
      'add_new' => __( 'New Member' ),
      'add_new_item' => __( 'Add New Member' ),
      'edit_item' => __( 'Edit Employee' ),
      'new_item' => __( 'New Member' ),
      'view_item' => __( 'View Member' ),
      'search_items' => __( 'Search teammate' ),
      'not_found' =>  __( 'No teammate Found' ),
      'not_found_in_trash' => __( 'No teammate found in Trash' ),
      );
    $args = array(
      'labels' => $labels,
      'has_archive' => true,
      'public' => true,
      'hierarchical' => false,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-cart',
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      'supports' => array(
        'title',
        'excerpt',
        'custom-fields',
        'thumbnail',
        'author',
        'page-attributes'
        ),
      );
    register_post_type( 'team', $args );
  }
  add_action( 'init', 'create_team_post_type' );

  function team_register_taxonomy() {
    register_taxonomy( 'team_category', 'team',
      array(
        'labels' => array(
          'name'              => 'Departments',
          'singular_name'     => 'Department Member',
          'search_items'      => 'Search Department',
          'all_items'         => 'All Departments',
          'edit_item'         => 'Edit Department',
          'update_item'       => 'Update Departments',
          'add_new_item'      => 'Add New Departments',
          'new_item_name'     => 'New Department Member',
          'menu_name'         => 'Department Member',
          ),
        'hierarchical' => true,
        'sort' => true,
        'args' => array( 'orderby' => 'term_order' ),
        'show_admin_column' => true
        )
      );
  }
  add_action( 'init', 'team_register_taxonomy' );


// Register Portfolio Post Type
function create_portfolio_post_type() {
  $labels = array(
    'name' => __( 'Portfolio' ),
    'singular_name' => __( 'Portfolio' ),
    'add_new' => __( 'New Example' ),
    'add_new_item' => __( 'Add New Example' ),
    'edit_item' => __( 'Edit Employee' ),
    'new_item' => __( 'New Example' ),
    'view_item' => __( 'View Member' ),
    'search_items' => __( 'Search Example' ),
    'not_found' =>  __( 'No Example Found' ),
    'not_found_in_trash' => __( 'No Example found in Trash' ),
    );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-cart',
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_icon'           => 'dashicons-art',
    'can_export'          => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'supports' => array(
      'title',
      'excerpt',
      'custom-fields',
      'thumbnail',
      'author',
      'page-attributes'
      ),
    );
  register_post_type( 'portfolio', $args );
}
add_action( 'init', 'create_portfolio_post_type' );

function portfolio_register_taxonomy() {
  register_taxonomy( 'portfolio_category', 'portfolio',
    array(
      'labels' => array(
        'name'              => 'Category',
        'singular_name'     => 'Category',
        'search_items'      => 'Search Category',
        'all_items'         => 'All Categories',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Categories',
        'add_new_item'      => 'Add New Categories',
        'new_item_name'     => 'New Category',
        'menu_name'         => 'Categories',
        ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
      )
    );
}
add_action( 'init', 'portfolio_register_taxonomy' );