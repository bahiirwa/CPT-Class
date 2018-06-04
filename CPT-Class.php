<?php

/**
 * Basic WordPress Custom Post Type Class written OOP Style.
 * @package CptClass
 */

 class CptClass
 {
     /**
    * Add variables to make them dynamic from user.
    * Are private to make sure they are applied to one class alone.
    */
    private $singular;
    private $plural;
    private $menu_icon;
    private $menu_position;
    private $text_domain;
    private $supports;

  /**
    * Add the variables into the class.
    * Run all the needed actions on class instantiation.
    */
    public function __construct( string $singular, string $plural, $menu_icon, int $menu_position, string $text_domain, array $supports )
    {
      $this->singular = $singular;
      $this->plural = $plural;
      $this->menu_icon = $menu_icon;
      $this->menu_position = $menu_position;
      $this->text_domain = $text_domain;
      $this->supports = $supports;

      add_action( 'init', array( &$this, 'custom_post_type'), 10 , 4 );
      add_action( 'after_switch_theme', array( &$this, 'rewrite_flush') );
    }

  /**
    * Create Custom Post Types
    * @return The registered post type object, or an error object
    */
    public function custom_post_type()
    {
      $labels = array(
        'name'               => _x( $this->plural, 'post type general name', $this->text_domain ),
        'singular_name'      => _x( $singular, 'post type singular name', $this->text_domain ),
        'menu_name'          => _x( $this->plural, 'admin menu', $this->text_domain ),
        'name_admin_bar'     => _x( $this->singular, 'add new on admin bar', $this->text_domain ),
        'add_new'            => _x( 'Add New ' . $this->singular, ' awps' ),
        'add_new_item'       => __( 'Add New ' . $this->singular, ' awps' ),
        'new_item'           => __( 'New ' . $this->singular, ' awps' ),
        'edit_item'          => __( 'Edit ' . $this->singular, ' awps' ),
        'view_item'          => __( 'View ' . $this->singular, ' awps' ),
        'view_items'         => __( 'View ' . $this->plural, ' awps' ),
        'all_items'          => __( 'All ' . $this->plural, ' awps' ),
        'search_items'       => __( 'Search' . $this->plural, ' awps' ),
        'parent_item_colon'  => __( 'Parent ' . $this->plural, ' awps' ),
        'not_found'          => __( 'No ' . $this->plural . ' found.', $this->text_domain ),
        'not_found_in_trash' => __( 'No ' . $this->plural . ' found in Trash.', $this->text_domain )
      );
      $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', $this->text_domain ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => $this->menu_icon,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => strtolower( $this->plural ) ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => $this->menu_position, // below post
        'supports'           => $this->$supports
      );
      register_post_type( strtolower( $this->plural ), $args );
    }

  /**
    * Flush Rewrite on CPT activation
    * @return empty
    */
    public function rewrite_flush()
    {
        // call the CPT init function
        $this->custom_post_type();
        // Flush the rewrite rules only on theme activation
        flush_rewrite_rules();
    }
 }
