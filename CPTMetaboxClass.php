<?php

/**
 * Still in Development
 * 
 */

 
/**
 * 
 * Custom
 * use it to write your custom functions.
 */
class CustomMeta
{
	/**
    * Add variables to make them dynamic from user.
    * Are private to make sure they are applied to one class alone.
    */
    private $post_type;
    private $post_id;
    private $box_id;
    private $box_title;

  /**
    * Add the variables into the class.
    * Run all the needed actions on class instantiation.
    */
    public function __construct( $post_type, $post_id, $box_id, $box_title )
    {
        $this->post_type    = $post_type;
        $this->$post_id     = $post_id;
        $this->$box_id      = $box_id;
        $this->box_title    = $box_title;

        /*--------Designation Metabox----- */
        add_action( 'add_meta_boxes', 'register_custom_box' );
        /*------ Saves the value for the box content---------- */
        add_action( 'save_post', 'custom_box_save_postdata' );
    }

  /**
    * Create Custom Post Types
    * @return The registered post type object, or an error object
    */
    public function register_custom_box() {
        $screens = array( 'post', $this->post_type );
        foreach ( $screens as $screen ) {
            add_meta_box(
                $this->$box_id . '_id',            // Unique ID 'custom_box_id'
                $this->box_title,      // Box title
                'custom_box',  // Content callback
                $screen                      // post type
            );
        }
    }

    /*---------- Prints the box content------------------ */
    public function custom_box() 
    {
    ?>
        <!--<label for="myplugin_field">staff"s Website Link</label>-->
        <input name="<php echo $this->$box_id . '_field'; ?>" id="<php echo $this->$box_id . '_field'; ?>" class="widefat" 
        value="<?php echo get_post_meta( $this->$post_id, $this->box_ID . '_meta_value_key', true ); ?>" />
        <?php
    }

    public function custom_box_save_postdata() {
        if ( array_key_exists($this->box_ID . '_field', $_POST ) ) {
            update_post_meta( $post_id,
            $this->box_ID . '_meta_value_key',
                $_POST[$this->box_ID . '_field']
            );
        }
    }

}