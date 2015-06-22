<?php
session_start();
include ('class/core.class.php');
$core = new core();
$Page_Now = $_GET['script'];
require ('lang/' . $_SESSION['lang'] . '.php');
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
        <title>Installation</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
        <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <div class="pull-left"><h3 class="text-muted">Install</h3></div>
                <div class="pull-right">
                    <img src="assets/images/United-Kingdom.png" alt="England" class="langChoseEN" /> <img src="assets/images/France.png" alt="France" class="langChoseFR" />
                </div>
            </div>
            <?php
            if(!empty($Page_Now)) {
                if (strip_tags($Page_Now) != "Home") {
                    echo $core->breadcrumbs(strip_tags($Page_Now));
                }
            }
            ?>
            <div class="jumbotron">
                <?php
                if(!empty($Page_Now)) {
                    switch(strip_tags($Page_Now)) {
                        case 'Home':
                            include ('pages/home.php');                   
                        break;
                    
                        case 'Require':
                            include ('pages/require.php');
                        break;
                    
                        case 'File':
                            include ('pages/file.php');
                        break;
                    
                        case 'Configuration':
                            include ('pages/config.php');
                        break;
                    
                        case 'Database':
                            include ('pages/database.php');
                        break;
                    
                        case 'Finish':
                            include ('pages/finish.php');
                        break;
                    
                        default:
                            include ('pages/home.php');                   
                        break;        
                    }
                } else {
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
