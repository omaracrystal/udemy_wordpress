<?php

function cu_create_metaboxes() {
    add_meta_box(
        'cu_recipe_options_mb', //ID
        __( 'Recipe Options', 'recipe' ), //Type
        'r_recipe_options_mb', //Name of the function that will be called when this metabox is displayed
        'recipe', //Post Type
        'normal', //Context (where will the metabox appear on default). There 3 choices: {'normal': below wysiwyg editor, 'advanced' above wysiwyg editor: , 'side': metabox appears on the sidebar}
        'high' //priority, 4 types ['high', 'core', 'low', 'default']
    )
}
