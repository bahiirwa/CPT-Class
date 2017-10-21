<?php
/**
 * CPT Taxonomy Custom Meta
 * To apply use add Taxonomy Name, Singular CPT Name
 * e.g. $customTaxClass = new custom_taxonomy_class( 'Genre', 'Book' );
 */
class custom_taxonomy_class
{

 private $taxo_name;
 private $CPT_name;

 public function __construct( $taxo_name, $CPT_name )
 {
    $this->taxo_name = $taxo_name;
    $this->CPT_name = strtolower( $CPT_name );

    add_action( 'init', array($this, 'register_custom_fields_taxonomy'), 0 );

 }

 public function register_custom_fields_taxonomy() {

     $labels = array(
       'name' => _x( $this->taxo_name . ' Categories', 'taxonomy general name' ),
       'singular_name' => _x( $this->taxo_name . ' Category', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search ' . $this->taxo_name . ' Categories' ),
       'all_items' => __( 'All ' . $this->taxo_name . ' Categories' ),
       'parent_item' => __( 'Parent ' . $this->taxo_name . ' Category' ),
       'parent_item_colon' => __( 'Parent ' . $this->taxo_name . ' Category:' ),
       'edit_item' => __( 'Edit ' . $this->taxo_name . ' Category' ),
       'update_item' => __( 'Update ' . $this->taxo_name . ' Category' ),
       'add_new_item' => __( 'Add New ' . $this->taxo_name . ' Category' ),
       'new_item_name' => __( 'New ' . $this->taxo_name . ' Category Name' ),
       'menu_name' => __( $this->taxo_name . ' Categories' ),
     );

   // Now register the taxonomy

     register_taxonomy(
         $this->CPT_name . '_categories',
         $this->CPT_name, //CPT name
         array(
               'hierarchical' => true,
               'labels' => $labels,
               'show_ui' => true,
               'show_admin_column' => true,
               'query_var' => true,
               'rewrite' => array(
                   'slug' => $this->CPT_name . '_categories'
               ),
           )
     );

   } //end register_custom_fields_taxonomy()

} //End Class
