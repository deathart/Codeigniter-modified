<?php
session_start();
if (empty($_SESSION['lang'])) { $_SESSION['lang'] = "en"; }
include ('lang/' . $_SESSION['lang'] . '/base.php');
include ('class/core.class.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
        <title>CM - Installation</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/jumbotron-narrow.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="assets/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <div class="pull-left"><h3 class="text-muted"><?php echo $lang['install']; ?></h3></div>
                <div class="pull-right">
                    <img src="assets/images/United-Kingdom.png" alt="England" class="langChoseEN" /> <img src="assets/images/France.png" alt="France" class="langChoseFR" />
                </div>
            </div>
            <span class="LoadingLang" style="display: none;">
                <div class="alert alert-warning text-center" role="alert"><?php echo $lang['loading']; ?></div>
            </span>
            <span class="successLang" style="display: none;">
                <div class="alert alert-success text-center" role="alert"><?php echo $lang['lang_success']; ?></div>
            </span>
            <span class="errorLang" style="display: none;">
                <div class="alert alert-danger text-center" role="alert"><?php echo $lang['lang_error']; ?></div>
            </span>
            <?php
            if(!empty($_GET['script'])) {
                if (strip_tags($_GET['script']) != "Home") {
                    echo $core->breadcrumbs(strip_tags($_GET['script']));
                }
            }
            ?>
            <div class="jumbotron">
                <?php
                if(!empty($_GET['script'])) {
                    switch(strip_tags($_GET['script'])) {
                        case 'Home':
                            require ('lang/' . $_SESSION['lang'] . '/home.php');
                            include ('pages/home.php');                   
                        break;
                    
                        case 'Require':
                            require ('lang/' . $_SESSION['lang'] . '/require.php');
                            include ('pages/require.php');
                        break;
                    
                        case 'File':
                            require ('lang/' . $_SESSION['lang'] . '/file.php');
                            include ('pages/file.php');
                        break;
                    
                        case 'Configuration':
                            require ('lang/' . $_SESSION['lang'] . '/config.php');
                            include ('pages/config.php');
                        break;
                    
                        case 'Database':
                            require ('lang/' . $_SESSION['lang'] . '/database.php');
                            include ('pages/database.php');
                        break;
                    
                        case 'Module':
                            require ('lang/' . $_SESSION['lang'] . '/module.php');
                            include ('pages/module.php');
                        break;
                    
                        case 'Finish':
                            require ('lang/' . $_SESSION['lang'] . '/finish.php');
                            include ('pages/finish.php');
                        break;
                    
                        default:
                            require ('lang/' . $_SESSION['lang'] . '/home.php');
                            include ('pages/home.php');                   
                        break;        
                    }
                } else {
                    require ('lang/' . $_SESSION['lang'] . '/home.php');
                    include ('pages/home.php');    
                }
                ?>
            </div>
            <footer class="footer">
                <p>&copy; 2015</p>
            </footer>
        </div> <!-- /container -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="assets/js/ajax.js"></script>
    </body>
</html>
