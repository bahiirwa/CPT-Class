# CPT-Class

WordPress Custom Post Type Class written OOP Style with REST API support.

# How to use

- Import the CPT-Class.php file into your theme directory such as `require get_template_directory() . '/inc/Custom/Custom.php';`
- Add the code below after import of class. Simply add more arrays of the arguments to make more CPTs;

```
 /**
 * TODO: Need to fix the $supports array() to work properly in class - multidimensional arrays :-(
 */
$customPosts = array (
	array(
		'singular' => 'Artist',
		'plural' => 'Artists',
		'menu_icon' => 'dashicons-user',
		'menu_position' => 18,
		'text_domain' => 'text-domain',
		'supports' => array( 'title', /*'editor', 'thumbnail' , 'excerpt', 'author', 'comments'*/ )
	),
	array(
		'singular' => 'Location',
		'plural'  => 'Locations',
		'menu_icon' => 'dashicons-book-alt',
		'menu_position' => 18,
		'text_domain' => 'text-domain',
		'supports' => array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', /*'comments'*/ )
	)
);


foreach ( $customPosts as $customPost ) {
	new CptClass( $customPost['singular'], $customPost['plural'], $customPost['menu_icon'], $customPost['menu_position'], $customPost['text_domain'], $customPost['supports'] );
}
```

- This will instantiate the class and also make the CPT for you.

# Improvements to make

- [ ] Better implementation of the instantiating class. Not proper OOP to use `_construct` class like that.
- [ ] Need to fix the $supports array() to work properly in class - multidimensional arrays :-(
- [ ] Make more options
- [ ] Better Documentation
