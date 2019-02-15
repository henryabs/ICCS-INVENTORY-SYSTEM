<!DOCTYPE html>
<html>
<head>
	<title>ICCS ASSET TRACKER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="//www.iconceptcontactsolutions.com/wp-content/uploads/2017/05/logo.fw_.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./design/main.css">
    <style type="text/css">
        body{
            background: #EDEEF3;
        }
    </style>
</head>
<body>
    <div class="container">
            <?php
            error_reporting(0);
            require './core/session.php';
            require './core/internal_connect.php';
            require './core/date.php';
            require './core/theme.php';
            require './inc/nav.php';    
            include './inc/content.php';
            ?>    
    </div>
	
</body>
</html>