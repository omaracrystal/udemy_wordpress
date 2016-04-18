<?php
    $theme_opts         =         get_option('cu_opts');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="ico/favicon.png" />

    <title>Udemy Static Template</title>

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <?php
            if($theme_opts['logo_type'] == 1){
                ?><a class="navbar-brand rippler" href="index.html"><?php bloginfo( 'name' );?></a><?php
            }else{
                ?><a class="navbar-brand rippler" href="index.html"><img src="<?php echo $theme_opts( 'logo_img' );?></a><?php
            }
            ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav navbar-nav'
            ));
            ?>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!empty( $theme_opts['twitter'] ) ) {
                    ?><li><a href="https://twitter.com/<?php echo $theme_opts['twitter']; ?>"><i class="fa fa-twitter"></i></a></li><?php
                }
                if(!empty( $theme_opts['facebook'] ) ) {
                    ?><li><a href="https://facebook.com/<?php echo $theme_opts['twitter']; ?>"><i class="fa fa-facebook"></i></a></li><?php
                }
                if(!empty( $theme_opts['youtube'] ) ) {
                    ?><li><a href="https://youtube.com/user/<?php echo $theme_opts['twitter']; ?>"><i class="fa fa-youtube"></i></a></li><?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
