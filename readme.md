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
1. **Double underscore __** is a built in function in word press. It allows for text to be translated into various languages. Wordpress comes with function that translates various strings. Double underscore is one of the more common functions to use which takes two arguments:
        1. The **string** you would like to translate i.e. ``‘Primary Menu’``
        1. The **text domain** that translation is using. The text domain is basically the name of the theme folder i.e.: ``‘udemy’`` (or see it as an ID)
    ```
    function cu_setup_theme () {
        register_nav_menu( 'primary', __( 'Primary Menu', 'udemy') );
    }
    ```
        * https://developer.wordpress.org/reference/functions/wp_nav_menu/
1. **Display the menu**
    * ``wp_nav_menu ( array $args = array( ) )``
    * https://developer.wordpress.org/reference/functions/wp_nav_menu/
    *Very powerful and flexible. This function allows us to render the menu wherever we call it in code.*
    * ``index`` > find ``<nav>`` tags… highlight and replace the ``<ul>`` with ``class="nav navbar-nav”`` :

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
    * ``Appearance > Menus >`` and create a menu > assign **theme location**
    * **make sure that within the functions.php the setup.php and any other files are included**
    * ``include( get_template_directory() . '/includes/setup.php' );``


###CREATING HEADERS AND FOOTERS
1. create file ``header.php`` in ``themes`` folder
1. create file ``footer.php``
1. Call these files within the ``index.php``
    * ``<?php get_header(); ?>``
    * ``<?php get_footer(); ?>``
1. *NOTE* if you want to name your header.php something else that's fine, just make sure that **header** is within the name such as ``header-about.php.`` Then when you are calling the header you write ``<?php get_header('about'); ?>``

###CREATING WIDGET AREAS
####SIDEBAR
1. register_sidebar
    * https://codex.wordpress.org/Function_Reference/register_sidebar
    *This site recommends adding the action **'widgets_init'*
1. In ``functions.php`` under the ``//Action & Filter Hooks`` comment add:
    ```
    add_action( 'widgets_init', cu_widgets' );
    ```
1. Add file ``widgets.php`` under the ``includes`` folder
1. Include this file ^ it in the ``functions.php`` file
1. Define the function within ``widgets.php`` file
    ```
    function ju_widgets() {
        register_sidebar(array(
            'name' => __( 'My First Theme Sidebar', 'udemy'),
            'id' => 'cu_sidebar', //note be careful to use unique id (not something already used in wordpress)
            'description' => __( 'Sidebar for the theme Udemy', 'udemy'),
            'class' => '',
        ))
    }
    ```
1. Go to ``Dashboard > Appearance > Widgets`` the item should appear. Then drag and drop the widgets in to the sidebar on the right.
1. Refresh page, but still not there! Well that's because we need to call the function within the template. So let's create a ``sidebar.php`` just like the ``header.php`` and ``footer.php``
    * Add ``<?php get_sidebar(); ?>`` wherever you would like to call the template. 
1. Within the ``sidebar.php`` 
        ```
        <?php

        if( is_active_sidebar('cu_sidebar') ){
            dynamic_sidebar('cu_sidebar');
        }
        ```
1. HTML doesn't go well with theme - so we can fix that!
    * Within the ``widgets.php`` file we can add **four** more keys to the ``register_sidebar`` function. 
    ```
    <?php $args = array(
        'name'          => __( 'My First Theme Sidebar', 'udemy'),
        'id'            => 'cu_sidebar',
        'description'   => __( 'Sidebar for the theme Udemy', 'udemy'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="card %2$s">',
        'after_widget'  => '</div></div></div>',
        'before_title'  => '<div class="card-header bg-primary"><span class="card-title">',
        'after_title'   => '</span></div><div class="card-content"><div class="widget">'
        )); 
    ?>
    ```

####SEARCH BAR
1. Add ``searchform.php`` file under ``udemy`` theme folder
1. Add markup:
    ```
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
        <div class="input-group">
            <input type="text" placeholder="Search" class="input-sm form-control" name="s" id="search" value="<?php the_search_query(); ?>">
            <span class="input-group-btn"><button type="button" class="btn btn-sm btn-primary rippler rippler-default btn-flat with-border">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </form>
    ```
1. read more: https://developer.wordpress.org/reference/functions/get_search_form/
1. Breaking down the search html markup
    * make sure it's wrapped in ``<form>`` tags and that the **id** and **class** are labeled ``searchform`` so this allows any plugins to hook into this form if needed. 
        * **method** should always be ``get`` (this is recommended by wordpress)
        * the **action** attribute should be the **url** to the home page. The ``home_url()`` function is built into wordpress.
    * The **name** of the ``<input>`` should always be ``s`` - wordpress uses this name called the ``loop`` 
        * the **id** should be ``search``
        * the **value** shoule call the built in wordpress function ``the_search_query()``

###The Loop
1. https://codex.wordpress.org/The_Loop
1. The Loop is PHP code used by WordPress to display posts. Using The Loop, WordPress processes each post to be displayed on the current page, and formats it according to how it matches specified criteria within The Loop tags. Any HTML or PHP code in the Loop will be processed on each post.
1. Add **theme support** within the ``functions.php`` file under ``//Set up``
    ``add_theme_support( 'post-thumbnails' );``
1. Find within the ``index.php`` (or whatever file) and find the ``<section>`` with the ``id="blog-posts"`` this is where we will want to run **the loop**
1. Add markup:
    ```
    <?php

    if( have_posts() {
        while(have_posts()) {
            the_post();
            ?>
            <article class="card" ... > //how it is to be rendered
            <?php>
        }
    })
    ```
1. On **Dashboard** Within ``Settings > Reading`` set the limit of the "**Blog pages show at most**" to 4 (to set up pagination in a little bit), and chose radio bullet "**Summary**" for this exercise. This is display a short hand of the **excerpt** portion for the post. By default wordpress will have [...] to show this. With **Filters** we can get rid of these **brackets** []. 
1. Functons you can use within the loop: https://codex.wordpress.org/Template_Tags such as:
    * in place of ``<img>`` tags ``<?php the_post_thumbnail(); ?>``
    * The ``the_post_thubnail()`` function can take two arguments= Size and array of attributes
        - ``<?php the_post_thumbnail( 'full', array('class => 'img-responsive)); ?>``
        - https://codex.wordpress.org/Post_Thumbnails
    * Note not all posts will have images so you should wrap the code with a conditonal ``if()`` statement.
    ```
        <?php
            if( has_post_thumbnail() ) {
        ?>
            <div class="card-image">
                <?php the_post_thumbnail( 'full', array('class => 'img-responsive)); ?>
            </div>
        <?php>
            }
        ?>
    ```

###Template tags inside the Loop 
**making the post more dynamic!**

1. Time and Date
    * https://codex.wordpress.org/Formatting_Date_and_Time
    * ``<span class"date"><?php the_time( 'd M' ); ?></span>``
    * ``<span class="time"><?php the_time( ' g:i a'); ?></span>``
1. Title
    * ``<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>``
1. Category
    * ``<span class="tag"><?php the_category(); ?></span>``
    * By default if no argument is passed into ``the_category()`` function - wordpress will render the categories as an unordered list ``<ul>``
    * ``the_category(',')`` this will now seperate them with a comma instead.
1. Author
    * ``<span class="post-author">by<a href="<php the_author_link(); ?>"><?php the_author(); ?></a></span>``
1. Excerpt
    * ``<p class="post-excerpt"></p>`` 

###Pagination
1. https://codex.wordpress.org/Pagination
    ```
    <nav class="text-center">
        <ul class="pagination">
            <li>
                <?php previous_posts_link('<i class"fa fa-chevron-left"></i>' ); ?>
            </li>
            <li>
                <?php next_posts_link('<i class"fa fa-chevron-right"></i>' ); ?>
            </li>
        </ul>
    </nav>
    ```

###Template Hierarchy
1. https://developer.wordpress.org/themes/basics/template-hierarchy/
![alt text](https://developer.wordpress.org/files/2014/10/template-hierarchy.png)

###Single Posts
1. When you click on a post wordpress automatically beings you to a seperate page that only shows that post... however the excerpt is still being cut off from previous conditions. We can add logic to indicate when it's a single post to avoid that OR just creat a whole new template. Which is what we will do:
1. Create ``single.php`` under the theme folder ``udemy``
1. Copy and paste the template from index then edit the following
    * delete the tags for the **"Read More"** button
    * delete ``<p>`` tag with the **excerpt** function
    * **CONTENT** replace the above with ``<?php the_content(); ?>``
    * **TAGS** add below content ^ ``<?php the_tags(); ?>``
    * Refresh page (tags are not displayed but that's because we can **Edit** the post and add them)
1. On upper bar click ``edit post`` add tags (right column) Add and Save!
1. Read up on Single Posts: https://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29 ]
1. **Quick tags**... within Wordpress under Edit Post switch from **Visual** tab to **Text** tab
    * inserting the following comment code within the template on Wordpress will tell where Pagination will take place
        ``<!--nextpage-->``
    * The above will not work right away - that's because we need to call the ``wp_link_pages()`` function from the Single Posts documentation recommendation: https://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29 ]
    * Call this function within the ``the_content()`` and ``the_tags()`` functions within ``single.php``
    **BEFORE**
    ```
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
    <?php the_tags(); ?>
    ```
    * https://codex.wordpress.org/Function_Reference/wp_link_pages
    * Some suggestions include adding and **Edit** option - but because it's already there for this particular post - it's not needed to add. 
    **text-center AFTER for pagination**
```
    <?php the_content(); ?>
    <?php wp_link_pages(array (
        'before'           => '<p class="text-center">' . __( 'Pages:' ),
    ); ?>
    <?php the_tags(); ?>
</div>
<nav class="text-center">
    <ul class="pagination">
        <li>
            <?php previous_post_link('%link', '<i class"fa fa-chevron-left"></i> %title' ); ?>
        </li>
        <li>
            <?php next_post_link('%link', '%title <i class"fa fa-chevron-right"></i>' ); ?>
        </li>
    </ul>
</nav>
```

* **PAGINATION** *note that the previous and next post links are now singular and not plural as listed above (posts vs post)* ``single.php`` 
