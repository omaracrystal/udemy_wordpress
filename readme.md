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

###COMMENTS TEMPLATE
1. In ``single.php`` add this code below the ``</nav>`` = ``<?php comments_template(); ?>``
1. This above php function looks for a file called ``comments.php`` create that file now. 
1. Add in ``comments.php`` this code: The single _e just outputs the translated string whereas double __e will return the translated string to the language defined in wp-config.php
    ```
    <?php 

    if(comments_open()) {

    }else{
        _e('Comments are closed', 'udemy' );
    }
    ```
1. Within the if statement past the html markup of the comment form (remmember to close out php beore doing this and initiating it again for the else statement) such as:
```
    <?php
if(comments_open()) {
?>

    <h4>Leave a comment</h4>
    <form action="<php eco site_url('wp-comments-posts.php'); ?>" method="post" id="commentform">
        <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" id="comment_post_ID"></input>
        <div class="form-group">
            <label>Name / Alias (required)</label>
            <input type="text" name="author" class="form-control"></input>
        </div>
        <div class="form-group">
            <label>Email Address (required, not shown)</label>
            <input type="text" name="email" class="form-control"></input>
        </div>
        <div class="form-group">
            <label>Website (optional)</label>
            <input type="text" name="url" class="form-control"></input>
        </div>
        <div class="form-group">
            <label>Comment</label>
            <textarea rows="7" cols="60" name="comment" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
    </form>

<?php
}else{
    _e('Comments are closed', 'udemy' );
}
```
1. Adjust the markup to be wordpress compatible:
1. Within the ``<form>`` you need to set the action and **method** attributes. Action being **post** and action being the **url**
1. Next look at the input fields - the most important part is the name of the input field.
1. Also take note of ``$post`` in first input above. Here is a link to documentation: https://codex.wordpress.org/Function_Reference/$post which= "Contains data from the current post in The Loop."
1. The above form should now work, however we still need to add logic to output it to the DOM
1. Above all this code (above) include this comment wrapper=
```
    <div class="comments-wrap">
    <?php
    foreach($comments as $comment) {
        ?>
        <h4><a href="<?php comment_author_url(); ?>"<?php comment_author(); ?></a> - <small><?php comment_date(); ?></small></h4>
        <div class="comment-body">
            <p><?php comment_text(); ?></p>
        </div>
        <?php
    }
    ?>
    </div>
```


##PAGE TEMPLATE
1. create file in themes > udemy > ``page.php``
1. copy and paste info from single.php into this new folder
1. https://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
1. Include the main things and done

##404 PAGE
1. create file ``404.php``
1. Copy code from ``page.php`` and paste into the ``404.php``
1. Get rid of loop completely
1. Get rid of side-bar
1. Change ``class="col-sm-8"`` to ``"col-sm-12"`` on ``<section>`` tag
1. Customize template - done!
```
    <?php get_header(); ?>
        <section id="blog" class="section">
            <div class="container">
                <section id="blog-posts" class="col-sm-12">
                    <article class="card">
                        <div class="card-content">
                            <h1 class="text-center text-danger">
                                <i class="fa fa-frown-o"></i> <br>
                                <?php _e('404! Page not found!', 'udemy' ); ?>
                            </h1>
                        </div>
                    </article>
                </section>
            </div>
        </section>
    <?php get_footer(); ?>
```

##CATEGORY TEMPLATE
1. create file ``category.php``
1. copy and paste from ``index.php`` into ``category.php``
1. refresh page to see the category widget appear on the sidebar
1. On Dashboard go into one of the posts - on the right hand sidebar column you'll see Categories - add a new category then select it > update
1. This will then display posts by category


##SEARCH TEMPLATE
1. https://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
1. create ``search.php`` file
1. Key code within "card" class div tags from index.php template:
```
    <div class="card-content">
        <h3><?php _e('Search', 'udemy'); ?></h3>
        <?php get_search_form(); ?>
        <hr>
        <h4>
            <?php _e('Search Results for', 'myfirsttheme'); ?>:
            <span class="text-info"><?php the_search_query(); ?></span>
        </h4>
    </div>
```

##CUSTOM TEMPLATES
1. create php template whatever you want ``name-of-template.php``
1. add file header within comments after ``<?php`` tag
```
/*
    * Template Name: Name of Template
*/
```

##Title
1. ``<title><?php wp_title(); ?></title>``
2. in ``functions.php`` file add ``add_theme_support('title-tag');``
3. Change logo, you can use ``<?php bloginfo(); ?>`` This function takes in a string which is what piece of information we want. Go to https://developer.wordpress.org/reference/functions/bloginfo/ for parameter suggestions. 

##WORDPRESS APIs
1. https://codex.wordpress.org/WordPress_APIs
2. Available for plugins and or themes
3. in ``functions.php`` add a hook ``add_action( 'after_switch_theme', 'cu_activate')
4. Within the   ``includes.php`` folder create a file ``activate.php`` add a function for ``cu_activate`` :
    ```
    function cu_activate () {
        if( version_compare( get_bloginfo( 'version' ), '4.2, '<' ) {
            wp_die(__('You must have a minimum version of 4.2 to use this theme.') );
        }
        //add theme options api (see below)
    }
    ```
5. Include the above file withing the ``function.php`` file:
    ``include( get_template_directory() . '/includes/activate.php' );``
6. Both ``version_compare()`` vs ``compare()`` and ``get_bloginfo`` vs ``bloginfo()`` are built in Wordpress functions. The ``get`` will return the value and the no get function will output the value. This is the first perameter for the ``cu_activate`` function. Second perameter is the minimum value of the version. The third perameter is the comparitive operator "<" less than. ``wp_die`` kills the script and outputs message
7. Activate it by switching the Appearance theme on the Dashboard from one back to the original. 

###OPTIONS API
1. https://codex.wordpress.org/Options_API
2. What is it? The Options API is a simple and standardized way of storing data in the database. The API makes it easy to create, access, update, and delete options. All the data is stored in the wp_options table under a given custom name. This page contains the technical documentation needed to use the Options API. A list of default options can be found in the Option Reference.
3. within the ``activate.php`` file add theme options then test to make sure their aren't any errors by toggling themes within Apperance. Then test one last time in phpMyAdmin, from there navigate to ``wp_options`` table under "structure" tab. Navigate to the last row in the table to see the "option_name" have the one you just created "cu_opts"
    ```
    function cu_activate () {
        if( version_compare( get_bloginfo( 'version' ), '4.2, '<' ) {
            wp_die(__('You must have a minimum version of 4.2 to use this theme.') );
        }
        $theme_opts         =   get_option( 'cu_opts' );

        if( !$theme_opts ){
            $opts           = array(
                'facebook'  =>  '',
                'twitter'   =>  '',
                'youtube'   =>  '',
                'logo_type' =>  1,
                'logo_img'  =>  '',
                'footer'    =>  ''
            );

            add_option( 'cu_opts', $opts );

        }
    }
    ```

###ADDING A MENU PAGE TO WORDPRESS ADMIN
1.  ``add_menu_page`` : https://developer.wordpress.org/reference/functions/add_menu_page/
2.  It is recommended to use the hook ``admin_menu`` so in ``functions.php`` : ``add_action( ('admin_menu', 'ju_admin_menus' ) );
3.  Create ``admin`` folder within the ``includes`` folder and add the file ``menus.php``
4.  Then include the file within the ``functions.php`` file : ``include( get_template_directory() . '/includes/admin/menus.php' );``
5.  Within the ``menus.php`` file add the function ``add_menu_page`` which takes the following parameters: (title of this page, name that appears in sidebar, capability = : https://codex.wordpress.org/Roles_and_Capabilities (what a user can and can't do) (6 defaults roles and you can view the "Capabiliy vs Role" section under contents) ). Forth parameter is menu_slug basically the url - should be unique. The 5th paramenter is the function that will be called.
    ```
    <?php

    function ju_admin_menus(){
        add_menu_page(
            'Udemy_Theme_Options',
            'Theme_Options',
            'edit_theme_options',
            'cu_theme_opts',
            'cu_theme_opts_page',
        )
    }
    ```
6. For the 5th parameter we need the file that matches. Create a file ``options-page.php`` under the ``admin`` folder
7. Next include the file in ``functions.php`` = ``include( get_template directory( . '/includes/admin/options-page.php'))``
8. Last let's define the function within the ``options-page.php`` file: 
    ```
    <?php
    function cu_thme_opts_page(){
    ?>
        <div class="wrap"> //boostrap class
            <h1>Hello!</h1>
        </div>
    <?php
    }
    ```

###Enqueueing Styles and Scripts in the Admin
1. Wordpress have two enque hooks, one for the front end and one for the backend. As of right now ``bootstrap`` isn't loading in the admin side of wordpress. 
2. In ``functions.php`` add the hook ``add_action( 'admin_init', 'cu_admin_init' );`` It is important to call this action AFTER the ``add_action( 'admin_menu', cu_admin_menus' );`` hook. 
3. Create a new file ``init.php`` within the ``admin`` folder under ``includes`` folder
4. Within the ``init.php`` file define the ``cu_admin_init()`` function:
    ```
    function cu_admin_init() {
        include( 'enqueue.php' );
        add_action( 'admin_enque_scripts', 'cu_admin_enqueue' );
    }
    ```
5. Create a file ``enqueue.php`` within ``admin`` folder. Within the function you see we included this file. 
6. In ``enqueue.php`` we add:
    ```
    function cu_admin_enqueue() {
        if(!isset($_GET['page']) || $_GET['page'] != "cu_theme_opts"){
            return;
        }
        wp_register_style( 'cu_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
        wp_enqueue_style( 'cu_bootstrap' );

        wp_register_script( 'cu_options', get_template_directory_uri() . '/assets/scripts/cu_options.js');
        wp_enqueue_script( 'cu_options' );
    }
    ```
7. The if statement above queries the url string - refresh page and make sure no errors are in console.

##Setting Up a Form in the Admin
1. https://codex.wordpress.org/Function_Reference/wp_nonce_field
2. The following markup can be found in admin > options-page.php
3. The function ``cu_theme_opts_page ()`` wraps the markup
4. Note the following: 
    * Form ``input`` value for each option created when the theme was activated
    * All text is translatable with the ``_e()``function
    * The name attribute for each ``input`` is prefixed with ``cu``
5. How do you get forms to submit correctly? Within the ``<form>`` tag add ``<form method="post" action="admin-post.php">`` 
6. Two problems to face: 
    * Not the only one posting to ``admin-post.php`` 
        - answer = create a hidden ``input`` field under the ``<form>`` tag that wordpress will search for:
        - ``<input type="hidden" name="action" value="cu_save_options">``
    * XSS injections = The form can be easily recreated and submitted without permission
        - answer = create a field with a unique key that is created when we visit this page. Then we can validate this key when the form is submitted. Wordpress provides some functions for this:
        - See link above for ``wp_nonce_field()`` it protects by checking that the form request came from the current site and not somewhere else. It protects in most cases. Nonce stands for **once** a key is generated once everytime. 
        - Add beneath the ``hidden`` input field:
        - ``<?php wp_nonce_field('cu_options_verify'); ?>``
        - refresh page and check in console to see if the ``id='_wpnonce'`` is generated to make sure it worked

##Saving our Settings
1. https://codex.wordpress.org/Plugin_API/Action_Reference/admin_post_(action)
1. ``action_post_(action)`` :
    ```
    This hook allows you to create custom handlers for your own custom GET and POST requests. The admin_post_ hook follows the format "admin_post_$youraction", where $youraction is your GET or POST request's 'action' parameter.
    ```
1. We created this function before in ``value="cu_save_options"``
1. Within the file ``init php`` add: ``add_action( 'admin_post_cu_save_options', 'cu_save_options' );`` > you don't have to call it the same name, but it helps to name it consistently to not run into any confusion. (*Note: doesn't need to be called in ``functions.php``)
1. For files that store data we will make a new folder under the theme ``udemy`` called ``process`` (this is not required by wordpress, but is recommended to stay more organized)
1. Create file ``save-options.php`` within the ``process`` folder and define the function ``cu_save_options``:
1. Now we need to include the file, however we are not going to include it in the ``init.php`` function, but in the ``functions.php`` file: ``include( get_template_directory() . '/includes/save-options.php' );``
1. In ``save-options.php`` add the function to test:
    ```
    function cu_save_options() {
        echo '<pre>';
        print_r($_POST);
        die();
    }
    ```
1. Refresh page to see the form within the admin dashboard under Theme Options
1. Fill out form, submit it, you should see the data being returned
1. Final two steps to make sure the form is being submited by a trusted user:
    * Check user's current capabilities. 
        - Add condition if statement to the ``cu_save_options`` function, and use Wordpress built in function: ``current_user_can( )`` - it will check that current user's capabilities to see if they are able to perform a certain cabability you assign to that user. 
        - Adding the built in Wordpress function ``check_admin_referer`` will check the Nonce function ``cu_options_verify`` and the page that was referred. (don't put in conditional statement)
        - We now start processing the form data and save it under this function. Pull the form that we will override. First option to update is the Twitter option (equivilant to the name field of that field = ``cu_inputTwitter)``. We add the function ``sanitize_text_field`` to remove any ``<html>`` where malicious code be and leave only text.
        - The ``absint()`` function returns an integer and is an absolulte value
        - For the footer because we don't want to sanitize the data, we would like to allow html markup - do not include this function. But it's important to know that the **options api** will sanitize info anyway. This will get us a weird result. 
        - ``updation_options()`` and ``wp_redirect( admin_url('*checks for status and redirects to the status page*') )`` to close out the saving form
```
    function cu_save_options() {
        if( !current_user_can( 'edit_theme_options' ) ){
            wp_die(__('You are not allowed to be on this page.') );
        }

        check_admin_referer( 'cu_options_verify' );

        $opts               =   get_option( 'cu_opts' );
        $opts['twitter']    =   sanitize_text_field($_POST( 'cu_inputTwitter'));
        $opts['facebook']    =   sanitize_text_field($_POST( 'cu_inputFacebook'));
        $opts['youtube']    =   sanitize_text_field($_POST( 'cu_inputYoutube'));
        $opts['logo_type']    =   absint( $_POST('ju_inputLogoType') );
        $opts['footer']    =   $_POST('cu_inputFooter');

        update_option( 'cu_opts', $opts );
        wp_redirect( admin_url('admin.php?page=cu_theme_opts&status=1') ); 
    }
```

** Now we face 3 more problems:**
    1. Fields not showing updated values
    2. No successs message for users
    3. Can't upload logos

##Displaying the Updated Setting Values
1. Displaying the options and values. First we assigne the variable ``$theme_opts``  to the ``get_option('ju_opts')``. Within ``save-options.php`` add:
    ```
    <?php
    function ju_theme_opts_page(){
        $theme_opts             =       get_option( 'cu-opts' );
    }
    ?>
    ```
1. Now we set the ``value`` fields for each corresponding key in our options input: ``value="<?php echo $theme_opts[ 'twitter' ] ?>"`` etc. etc
1. Add condititional for the logo type: ``<option value="2"><?php echo $theme_opts['logo_type'] == 2 ? 'SELECTED' : ''; ?><?php _e('Image', 'udemy'); ?></option>``
1. For the footer area add: ``  <textarea class="form-control" name="cu_inputFooter"><?php echo $theme_opts['footer']; ?></textarea>``
1. *Note after refresing page there is a problem with the some characters... the ``test<a href=\"#">test</a>``  The options api will santize the data. To solve this issue we add the function ``stripsslashes_deep( )`` : `` <textarea class="form-control" name="cu_inputFooter"><?php echo stripslashes_deep($theme_opts['footer']); ?></textarea>`` now the new information in the form after saving is this: ``test<a href="#">test</a>``
1. Last we want a success message to display once the form is saved. Above the ``<form method="post"...`` add:
    ```
     <?php
        if(isset($_GET['statue']) && $_GET['status'] == 1) {
            ?>
            <div class="alert alert-success">Success!</div>
            <?php
        }
    ?>
    ```
1. Refresh page to see success message

##Uploading Logo Image with the Media Uploader
1. https://codex.wordpress.org/Data_Validation
1. First we need to **enqueue** it within the ``admin > enqueue.php`` file: ``wp_enqueue_media( );`` This media uploader is a modal that appears on an event.
1. Now we can go to ``options-page.php`` and grab two important variables to call in order to fire this function through an event: **name** and **id** 
1. With the **name**:``cu_inputLogoImg`` and **id** : ``cu_uploadLogoImgBtn`` in ``assets > scripts > options.js`` file we add (file is already enqueue):
    ```
    jQuery(function($){
        var frame = wp.media({
            title: Select or upload logo',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });

        $('#cu_uploadLogoImgBtn').on('click', function(e){
            e.preventDefault();
            frame.open();
        })

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            $('input[name=cu_inputLogoImg]').val(attachment.url); 
        })
    });
    ```
1. We want to make sure this uploaded image is saved. So in the ``save-options.php`` folder we are going to add this parameter: ``$opts['logo_img']   =   esc_url_raw($_POST('cu_inputLogoImg'));`` here we also added the sanatizer ``esc_url_raw()`` 
1. Finally we want to include this variable within the ``options-page.php`` by adding the value to the imput for the logo = (line 46) : ``value="<?php echo $theme_opts['logo_img']; ?>"``

##Finalizing the front end and using the options API
1. Start using the options on the frontend. Within ``header.php`` file we will add the php code to call the options ``<?php $theme_opts = get_option('cu_opts'); ?>``
1. Add conditional statement right before the ``<li>`` tags to make sure that the following fields were not empty and to display the social icons correctly with the correct corresponding links. ie:
    ```
     <?php 
        if(!empty( $theme_opts['twitter'] ) ) {
            ?><li><a href="https://twitter.com/<?php echo $theme_opts['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
        }
    ?>
    ```
1. Next in ``footer.php`` we want to do the same thing:
    ```
    <footer class="footer">
    <div class="container">
       <?php
           theme_opts   =      get_option('cu_opts');
           echo stripcslashes_deep($theme_opts['footer']);
       ?>
    </div>
    </footer>

    <?php wp_footer( ); ?>
    </body>
    </html>
    ```
1. Within the ``header.php`` we add the conditional to look for the logo image
    ```
     <div class="navbar-header">
        <?php
        if($theme_opts['logo_type'] == 1){
            ?><a class="navbar-brand rippler" href="index.html"><?php bloginfo( 'name' );?></a><?php
        }else{
            ?><a class="navbar-brand rippler" href="index.html"><img src="<?php echo $theme_opts( 'logo_img' );?></a><?php
        }
        ?>
    </div>
    ```

#Creating Plugins

##What are Plugins?
1. Code that extends the core of WordPress
1. How does Wordpress load plugins?
    1. Configuration File is loaded
    2. Functions and Classes loaded
    3. Plugins are loaded
    4. Process all code and requests
    5. Load Translations
    6. Load Theme
    7. Load Page Content
1. https://codex.wordpress.org/Editing_wp-config.php Most important and the heart of the Wordpress site is the ``wp-config.php`` file - contains all the core settings such as: database login details, security hashes/ salts, and other various settings you can set
1. The default settings are fine for this particular site as it stands. Just change one thing. line 80: change false to true for WP_DEBUG ``define('WP_DEBUG', true)`` It is recommended to always to set this up during the development phase, then place it back to **false** during **production** 

##Creating a Plugin File Header
1. Create a sub-folder ``recipe`` within the ``plugins`` folder under ``wp-content`` Then add ``index.php`` (or name it after the folder) file to that folder
1. Add a File Header in this file and then refresh to see the plugin appear on the Dashboard under Plugins: https://codex.wordpress.org/File_Header (finish adding header information that you would want)
    ```
    <?php
    /**
     - Plugin Name: Recipe
     */
    ```

##Activating Our Plugin
1. (make sure it's not activated before adding the following)
1. Within the recipe > index.php we set up 4 things: Setup, Includes, Hooks and Shortcodes: 
    ```
    // Setup

    // Includes

    // Hooks

    // Shortcodes
    ```
1. Under **Hooks** section we add ``register_activation_hook()`` this function is called when the plugin is activated. It has two parameters... ``register_activation_hook( __FILE__, 'cu_activate_plugin' );`` ... ``__FILE__`` is the full path and filename of the file. If used inside an include, the name of the included file is returned. 
1. Next we want to define ``cu_activate_plugin`` create a folder within the recipe folder called ``includes`` then add the file ``activate.php`` Then go back into the ``includes`` folder and remember to **Include** this new file ... ``includes
1. In ``activate.php`` define the function. First set up a conditional to check the version of php to make sure the plugin will render correctly... if not kill the function, and translate the message. 
    ```
    function cu_activate_plugin() {
        if( version_compare(get_bloginfo('version'), '4.2', '<') ){
            wp_die(__('You must update WordPress to use this plugin.', 'recipe') )
        }
    }
    ```

##Simple Trick to Secure a Plugin
1. How do you protect your plugin from hakers? This helps in most cases. Open the ``index.php`` within the plugin's folder (being ``receipe``) and above the **//Setup** comment add this conditional statement to check if wordpress is loading the plugin or (if a hacker is):
    ```
    if (!function_exists( 'add_action' ) ){
        echo 'Not allowed!';
        exit();
    }
    ```
1. Akismet folder has this same function

##Creating a Custom Post Type
1. https://codex.wordpress.org/Post_Types
1. https://codex.wordpress.org/Function_Reference/register_post_type
1. In  ``index.php`` under **//Hooks** add ``add_action( 'init', 'recipe_init' );`` Create the file within the ``includes`` folder and include it under **//Includes** 
1. On the ``register_post_type`` link above, find the **init** function and add this to the ``init.php`` file under the ``includes`` folder. Here you will notice a new way of traslating; instead of ``__()`` you will see ``_x()`` This function; it's the same as ``__()`` except the second parameter allows for you to add a **context** This is useful when you have two words that are the same.
1. Find all **Book** and replace with **Recipe** then find all **your-plugin-textdomain** and replace with the name of your plugin **recipe**. Now because we don't need any context for translation for this plugin, remove all ``_x()`` and corresponding **contexts**_
1. Next in the ``$args`` array, this is a list of settings for our custom post type. Under th **'description'** tag add the discription of the plugin such as: **A custom post type for recipes.** For the **'rewrite'** key change the ``'slug' => 'book'`` to ``'slug' => 'recipe'``. For the **'menu_position'** key replace **null** with **20** for now. This can be any number. The lower the number the lower the position. The last key **'supports'** is very important to set this array. We want to keep all default settings except **excerpt & comments**. Then add **taxonomies** to the end of the ``$args`` array. The key value will be an array of categories and tags. ``array( 'category', 'post_tag')``. These are built into Wordpress and help with SEO
1. Save and Refresh - and see on the dashboard everything that is added. And you can see that you can now add Recipes using the Wordpress built in UI.

##Metadata and Metaboxes
1. https://codex.wordpress.org/Metadata_API
1. https://developer.wordpress.org/reference/functions/add_meta_box/
1. So far your Recipe Posts you can add: create content, add tags, and a feature image. We would like to now extent this post type, by adding custom fields such as: ``["How long it take to cook", "Cooking Utilcils Required", "Cooking Experience", "Meal Type"]``
1. Normally you could create a table in the DB to store this information. However, Wordpress proves **Metadata API** to do this for you. There are 4 functions you can use: ``[ add_metadata(), delete_metadata(), get_metadata(), update_metadata()]`` However, we are not going to use any of these functions. If you look into Wordpress's documentations for you will notice it warns against using these functions "directly by plugins or themes. Instead, use the corresponding meta functions for the object type you're working with."
    ```
    The Metadata API is a simple and standarized way for retrieving and manipulating metadata of various WordPress object types. Metadata for an object is a represented by a simple key-value pair. Objects may contain multiple metadata entries that share the same key and differ only in their value.
    ```
1. In order to use a **Metadata API** function that will work with our plug in we first need to create a **Meta Box**. Meta boxes are all the boxes/ text areas you can click and drag within your post section of the dashboard. We don't have to use a meta box, but it will become convienent at some point. In order to add a **Meta Box we first need to add a hook to when Wordpress initializes the admin** See below.
1. In recipe > index.php add the hook ``add_action( 'admin_init', 'recipe_admin_init' );`` Create an ``admin`` folder within the ``includes`` folder, and add ``init.php`` within that folder. Then remember to **//Include** the file within the ``index.php`` : ``include( 'includes/index.php' );``
1. In admin > ``init.php`` define the function for that hook. Notice that we call another action to add the **Meta Boxes** ('recipe' can be anything )...The function we want to call is custom. Add this file now (**create-metaboxes**) to the **admin** folder. Then define the **cu_create_metaboxes** function. Remember to include it too (see below).
    ```
    function recipe_admin_init() {
        include( 'create-metaboxes.php' );

        add_action( 'add_meta_boxes_recipe', 'cu_create_metaboxes' );
    }
    ```
1. https://developer.wordpress.org/reference/functions/add_meta_box/ has:
    ```
    function cu_create_metaboxes() {
        add_meta_box(
            'cu_recipe_options_mb', //ID
            __( 'Recipe Options', 'recipe' ), //Type
            'cu_recipe_options_mb', //Name of the function that will be called when this metabox is displayed (define in recipe-options.php)
            'recipe', //Post Type
            'normal', //Context (where will the metabox appear on default). There 3 choices: {'normal': below wysiwyg editor, 'advanced' above wysiwyg editor: , 'side': metabox appears on the sidebar}
            'high' //priority, 4 types ['high', 'core', 'low', 'default']
        )
    }
    ```
1. Last we need to create a new file called **recipe-options.php** then define the function **cu_recipe_options_mb** which will contain the **metabox function** echo a message to see it appear in the dashboard. 
    ```
    function recipe_admin_init() {
        echo 'Hello';
    }
    ```
...
    ```
    function recipe_admin_init() {
        include( 'create-metaboxes.php' );
        include( 'recipe-options.php' );

        add_action( 'add_meta_boxes_recipe', 'cu_create_metaboxes' );
    }
    ```
1. All that's left is to create the field and save the data


##Enqueueing Files
1. https://codex.wordpress.org/Function_Reference/plugins_url
1. Download and paste ``assets`` folder to the recipe folder. This is the same ``assests`` folder in the theme > udemy area. Why have include it twice? Because that's what you have to do for all plugins in addition to all themes. 
1. in includes > admin > init add the action hook: ``add_action( 'admin_equeue_scripts', 'cu_admin_enqueue' );`` Then create the **enqueue.php** file within the **admin** folder
1. Within this **enqueue** function we are going to **enqueue** and **register** the bootstrap's css. We don't need any js at the moment. 
1. One thing that is different about plugins, how do we get the url to our plugins asset's folder? Well, Wordpress provides a functions called **plugins_url( $path, $plugin);** : https://codex.wordpress.org/Function_Reference/plugins_url using this Wordpress function add it to the second parameter for the **register and enqueue** functions:
1. The two parameters **plugins_url( $path, $plugin);**
    - **$path** the direct path realitive to this file
    - **$plugin** the location of the plugin. You can use ``__FILE__`` or ``dirname(__FILE__)`` for nested folders. There is a more dynamic and easier way to include this though. Under **includes > index.php** under **Setup** add ``define('RECIPE_PLUGIN_URL', __FILE__ );`` Now we don't have to worry about nesting. We can just use the constant **RECIPE_PLUGIN_URL**
1. There is one last thing, we only want these assests to appear on our post type pages. Since this is a post type, we can take advantage of a **gobal** variable called **$typenow;**. This variable is created by Wordpress and the value is set to current to post type the user is in. This variable is only available in the **admin** side of Wordpress. So we simply check to see if this variable is set to Recipe. If it isn't we want to exit the function so no styles are loaded. 
    ```
    function cu_admin_enqueue() {
        golbal $typenow;

        if( $typenow !== 'recipe' ) {
            return;
        }

        wp_register_style( 'cu_bootstrap', plugins_url( '/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL ));
        wp_enqueue_style( 'cu_bootstrap' );
    }
    ```


##Working with Meta Data
1. First let add some form markup with boostrap to the **admin > recipe-options** folder.
1. Save and refresh to see this form appear in the admin dashboard
1. Next create a hook within the recipe > index.php that will save the forms information... ``add_action( 'save_post_recipe', 'cu_save_posts_admin', 10, 3 );`` 
    - notice the 3rd and 4th parameters. The **10** is the number of priority (order of being fired) -- (this is also the default) and the **3** is the number of arguments are sent to our function. What does this actual mean? Well, action hooks can provide our functions with extra information about the action currently happening. Not every action provides this but the **save_post()** does. By default this value is always **1**, however, the **save_post()** hook provides three arguments. So we set it to **3**.
1. Create a folder called ``process``. Just like last time we want to keep all file that process data in a seperate folder. Create a file called **save-post.php** within this folder and define the **cu_save_post_admin( $post_id, $post, $update )** function here which takes **3** arguments. 
1. First check if **$update** is **false** which mean the post is **new**
1. Second lets test to see what is being pulled from the form by publishing this function within cu_save_post_admin:
    ```
    function cu_save_post_admin( $post_id, $post, $update ){
        if(!$update) {
            return;
        } 

        echo '<pre>';
        print_r($_POST);
        die();
    }
    ```
1. You will notice alot of information being pulled. Scroll towards the bottom to review the **meta data** being: ~ ``['cu_inputIngredients, cu_inputTime, cu_Utensils, cu_inputLevel, cu_inputMealType']`` ~ Now that we can see the data being sent - we can **processes it and save it**
1. We can now create an array of how to pull this information then finally attach this data to the post by using the built in function and pass through **3** arguments **update_post_meta( $post_id, 'unique key', $value_of_meta_data );**
    - https://codex.wordpress.org/Function_Reference/update_post_meta
    - **update_post_meta( $post_id, 'recipe_data', $recipe_data );**
1. Save and refesh - you will see that after publishing it saves but the fields don't contain the meta-data though. So lets change that:
1. We go into the **meta box** ``process > recipe-options.php`` to pass ``$post`` into the function. This **$post** argument is an object that holds properties related to the current post. Some of these properties include in this order:
    - 1. the **ID** ``$post->ID``
    - 2. **Name of the meta data's key** ``'recipe_data'`` 
    - 3. The third value is sort of odd. You can pass in an list or a single item. Arrays count as a single item. 99% of the time you want this parameter to be **true**
    - Add this variable to the **meta box** = ``$recipe_data = get_post_meta( $post->ID, 'recipe_data', true );``
    - FINALLY we set up all the **input's values** to the corresponding values... such as: 
```
    <option value="Beginner" <?php echo $recipe_data['level'] == "Beginner" ? 'SELECTED' : '' ?>>Beginner</option>
    <option value="Intermediate" <?php echo $recipe_data['level'] == "Intermediate" ? 'SELECTED' : '' ?>>Intermediate</option>
    <option value="Expert" <?php echo $recipe_data['level'] == "Expert" ? 'SELECTED' : '' ?>>Expert</option>
```
1. Next in ``process > recipe-options.php`` you 





