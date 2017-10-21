# CPT-Class
WordPress Custom Post Type Class written OOP Style.

# How to use
* Import the CPT-Class.php file into your theme directory.
* To apply, use add Singular Name, Plural Name, Menu Icon and Menu Position
* e.g. $customCPTClass = new CptClass( 'Publication', 'Publications', 'dashicons-book-alt', 18, 'text-domain' );
* This will instantiate the class and also make the CPT for you.

# Improvements to make
1. Better implementation of the instantiating class. Not proper OOP to use `_construct` class like that.
1. Make more options
1. Better Documentation
