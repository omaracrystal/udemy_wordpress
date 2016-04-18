<?php
function cu_theme_opts_page () {

    $theme_opts                 =               get_option('cu_opts');

?>

<div class="wrap">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><?php _e('Udemy Theme Settings', 'udemy' ); ?></h3>
        </div>
        <div class="panel-body">
            <?php
                if(isset($_GET['statue']) && $_GET['status'] == 1) {
                    ?>
                    <div class="alert alert-success">Success!</div>
                    <?php
                }
            ?>
            <form method="post" action="admin-post.php">
                <input type="hidden" name="action" value="cu_save_options">
                <?php wp_nonce_field('cu_options_verify'); ?>
                <h4><?php _e('Social Icons', 'udemy'); ?></h4>
                <div class="form-group">
                    <label><?php _e('Twitter', 'udemy'); ?></label>
                    <input type="text" class="form-control" name="cu_inputTwitter" value="<?php echo $theme_opts['twiiter']; ?>">
                </div>
                <div class="form-group">
                    <label><?php _e('Facebook', 'udemy'); ?></label>
                    <input type="text" class="form-control" name="cu_inputFacebook" value="<?php echo $theme_opts['facebook']; ?>">
                </div>
                <div class="form-group">
                    <label><?php _e('YouTube', 'udemy'); ?></label>
                    <input type="text" class="form-control" name="cu_inputYoutube" value="<?php echo $theme_opts['youtube']; ?>">
                </div>
                <h4><?php _e('Logo', 'udemy'); ?></h4>
                <div class="form-group">
                    <label><?php _e('Logo Type', 'udemy'); ?></label>
                    <select class="form-control" name="cu_inputLogoType">
                        <option value="1"><?php _e('Site Name', 'udemy'); ?></option>
                        <option value="2"><?php echo $theme_opts['logo_type'] == 2 ? 'SELECTED' : ''; ?><?php _e('Image', 'udemy'); ?></option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Logo Image" name="cu_inputLogoImg" value="<?php echo $theme_opts['logo_img']; ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="cu_uploadLogoImgBtn"><?php _e('Upload', 'udemy'); ?></button>
                        </span>
                </div>
                <h4><?php _e('Footer', 'udemy'); ?></h4>
                <div class="form-group">
                    <label><?php _e('Footer Text (HTML Allowed)', 'udemy'); ?></label>
                    <textarea class="form-control" name="cu_inputFooter"><?php echo stripslashes_deep($theme_opts['footer']); ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?php _e('Update', 'udemy'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
}
?>
