<?php

function recipe_admin_init( $post ) {
        $recipe_data = get_post_meta( $post->ID, 'recipe_data', true );

    ?>
    <div class="form-group">
        <label>Ingredients</label>
        <input type="text" class="form-control" name="cu_inputIngredients" value="<?php echo $recipe_data['ingredients']; ?>"></input>
    </div>
    <div class="form-group">
        <label>Cooking Time</label>
        <input type="text" class="form-control" name="cu_inputTime" value="<?php echo $recipe_data['time']; ?>"></input>
    </div>
    <div class="form-group">
        <label>Cooking Utensils</label>
        <input type="text" class="form-control" name="cu_inputUtensils" value="<?php echo $recipe_data['utensils']; ?>"></input>
    </div>
    <div class="form-group">
        <label>Cooking Level</label>
        <select class="form-control" name="cu_inputLevel">
            <option value="Beginner" <?php echo $recipe_data['level'] == "Beginner" ? 'SELECTED' : '' ?>>Beginner</option>
            <option value="Intermediate" <?php echo $recipe_data['level'] == "Intermediate" ? 'SELECTED' : '' ?>>Intermediate</option>
            <option value="Expert" <?php echo $recipe_data['level'] == "Expert" ? 'SELECTED' : '' ?>>Expert</option>
        </select>
    </div>
    <div class="form-group">
        <label>Meal Type</label>
        <input type="text" class="form-control" name="cu_inputMealType" value="<?php echo $recipe_data['meal_type']; ?>"></input>
    </div>
    <?php
    }
?>
