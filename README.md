# CPT-Class
WordPress Custom Post Type Class written OOP Style.

#How to use
1. Import the CPT-Class.php file into your theme directory.
1. To apply, use add Singular Name, Plural Name, Menu Icon and Menu Position e.g. $customCPTClass = new CptClass( 'Publication', 'Publications', 'dashicons-book-alt', 18 );
* This will instantiate the class and also make the CPT for you.

#Improvements
1. Better implementation of the instantiating class. Not proper OOP to use `_construct` class like that.
1. Make more options
