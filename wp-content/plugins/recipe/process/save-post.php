<?php

function cu_save_post_admin( $post_id, $post, $update ){
    if(!$update) {
        return;
    }

    $recipe_data = array();
    $recipe_data['ingredients'] = sanitize_text_field( $POST['cu_inputIngredients'] );
    $recipe_data['time'] = sanitize_text_field( $POST['cu_inputTime'] );
    $recipe_data['utensils'] = sanitize_text_field( $POST['cu_inputUtensils'] );
    $recipe_data['level'] = sanitize_text_field( $POST['cu_inputLevel'] );
    $recipe_data['meal_type'] = sanitize_text_field( $POST['cu_inputMealType'] );

    update_post_meta( $post_id, 'recipe_data', $recipe_data );
}

?>
