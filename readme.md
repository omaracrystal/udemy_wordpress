# WordPress-UDEMY

**Side Notes**
1. ``debugging print_r(get_defined_vars( ) )exit( )``


###Steps to creating a wordpress site:
1. Download MAMP, Wordpress, MySQL and phpAdmin
1. Create new folder “udemy" within htdocs; unzip and paste Wordpress content into it 
1. Go to http://localhost:8888/phpMyAdmin and create a new database under the name "udemy" with the ``utf8_general_ci`` as the collation
1. Go to http://localhost:8888/udemy to set and configure Wordpress.
    * Once signed into Wordpress set up permalink to be post. Go to ``Settings > Permalinks``
1. Go to into ``htdocs`` under ``udemy > wp_content > themes`` and create a ``udemy`` theme folder with a ``style.css`` and ``index.php`` within it
1. Go onto dashboard of Wordpress and select the new theme: ``udemy`` under > ``Appearance > Themes > udemy``
1. Go to http://localhost:8888/udemy/ to see your layout. 
1. Add/ edit code in the ``index.php`` file to make sure it renders
1. Go back into ``style.css`` and add the meta information -- follow along on https://codex.wordpress.org/File_Header
    * The theme URI is a link where the users can view the where the theme can be found officially - going to remove it for now (usually under the **Theme Name: Udemy**)
    * **Author URI**: is the url to your personal (author’s) site
    * **Text Domain** is important to specify since it’s the “ID” if you will for your page… it’s best practice to name it the same as your folder
1. You can have a screen shot for the theme and paste in the same folder as Screenshot.png recommended size is 880px by 660px

```
/*
Theme Name: Udemy
Author: Crystal
Author URI: http://omaracrystal.com
Description: A simple bootrap wordpress theme
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: bootstrap, responsive, flat, simple, mobile ready
Text Domain: udemy

Extra notes just in case
*/
```

###FILE STRUCTURE
1. create a folder called ``assets`` and unzip the contents of the theme’s static template information and paste it into the ``assets`` folder
1. Copy and paste info from index.html into the index.php up one folder… the page is broken because the links to the css files are now off. We could go through manually and fix all of this or utilize some built in functions within Wordpress to handle this. Create a function.php file within the same area where index.php is.
1. echo a message just to make sure it is coming through
1. Delete the echo message and follow these comments:
    ```
    <?php 
    // Set up
    // Includes
    // Action & Filter Hooks
    // Shortcuts
    ```
1. There are many many hooks to choose from… here we will explore our options: http://codex.wordpress.org/Plugin_API/Hooks - There are two types of Hooks: Action and Filter 
1. ``wp_enqueue_scripts`` is the proper hook to use when **enqueuing** items that are meant to appear on the **frontend**. Despite the name, it is used for enqueuing both **scripts and styles**.
1. Under the ``//Action & Filter`` Hooks comment add (cu = crystal udemy):
``add_action('wp_enqueue_scripts', ‘cu_enqueue’);``
    * Takes up to 4 parameters: 
        1. ``$tag`` (string, Required):
            - The name of the action to with the $function_to_add is hooked
        1. ``$function_to_add`` (callable, Required):
            - The name of the function you wish to be called
        1. ``$priority`` (int, Optional):
            - Used to specify the order in which the functions associated with a particular action are executed. Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action. 
            *Default Value: 10*
        1. ``$accepted_args`` (int, Optional). 
            - The number of arguments the function accepts. *Default Value: 1*
    * more info: https://developer.wordpress.org/reference/functions/add_action/
    * add_action ( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )
1. Create folders/files under ``udemy > includes > front > enqueue.php``
1. Under ``enqueue.php`` we call the action within the ``functions.php`` file:
``<?php function cu_enqueue( ) { }``
1. Under ``//Includes`` comment in ``functions.php`` we include the above file:
``include( get_template_directory() . '/includes/front/enquue.php' );``

###ADDING STYLES THROUGH HOOKS
**Only 2 steps to required to add styles to your pages**

1. Register style:
    *  ``wp_enqueue_scripts`` action ``$handle`` ``$src``
    * https://codex.wordpress.org/Function_Reference/wp_register_style
    * ``wp_register_style( 'cu_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');``
1. Then enqueue the style:
    * ``wp_enqueue_style( 'cu_bootstrap' );``
    * add php to html after ``<title></title>`` tags
    * ``<?php wp_head(); ?>``
1. Add remaining styles and any font urls if needed

###ADDING SCRIPTS THROUGH HOOKS
1. Add in html right above closing tags for ``</body>`` and ``</html>``
    * ``<?php wp_footer( ); ?>``
    * Add scripts same way as styles by **Registering** them then **Enqueue**

1. **Register**: 
    ```
    wp_register_script( 'cu_fastclick', get_template_directory_uri() . '/assets/vendor/fastclick/fastclick.js' );
    wp_register_script( 'cu_bootstrap', get_template_directory_uri() . '/assets/scripts/bootstrap.min.js', array(), false, true );
    ```

1. **Enqueue** *(note ‘jquery')*:
    * ``wp_enqueue_script( 'jquery’);``
    * https://developer.wordpress.org/reference/functions/wp_register_script/
    ```
    wp_enqueue_script('cu_fastclick’);
    wp_enqueue_script('cu_bootstrap’);
    ```

###ADDING DUMMY CONTENT
1. ``Dashboard > Plugins > Add New > FakerPress``
1. ``Fakerpress > posts >`` choose **quantity** (6/12) and **featured image rate** (100) ``Page > Add New > About > Publish``

###ADD THEME SUPPORT
1. **Register** the menu: 
    * https://codex.wordpress.org/Function_Reference/add_theme_support
    * **Setup** under ``functions.php`` > ``add_theme_support( 'menus' );``
    * **create file** under ``includes > setup.php ``
1. Double underscore __ is a built in function in word press. It allows for text to be translated into various languages. Wordpress comes with function that translates various strings. Double underscore is one of the more common functions to use which takes two arguments:
        1. The **string** you would like to translate i.e. ``‘Primary Menu’``
        1. The **text domain** that translation is using. The text domain is basically the name of the theme folder i.e.: ``‘udemy’`` (or see it as an ID)
```
function cu_setup_theme () {
    register_nav_menu( 'primary', __( 'Primary Menu', 'udemy') );
}
```
    - https://developer.wordpress.org/reference/functions/wp_nav_menu/
1. **Display the menu**
```
wp_nav_menu ( array $args = array( ) )
```
    - https://developer.wordpress.org/reference/functions/wp_nav_menu/
    *Very powerful and flexible. This function allows us to render the menu wherever we call it in code.*
``index`` > find ``<nav>`` tags… highlight and replace the ``<ul>`` with ``class="nav navbar-nav”`` :

```
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'nav navbar-nav'
    ));
    ?>
```

*if left empty default is used*
1. Refresh page and nothing! Well that’s because we need to let Wordpress know to render it by going to:
``Appearance > Menus >`` and create a menu > assign **theme location**
**make sure that within the functions.php the setup.php and any other files are included**
```
include( get_template_directory() . '/includes/setup.php' );
include( get_template_directory() . '/includes/widgets.php' );
``` 

