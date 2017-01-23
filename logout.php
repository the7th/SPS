<?php
session_start();
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px;
      }
    </style>
<!--    <link href="css/bootstrap-responsive.css" rel="stylesheet">-->
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top navbar-default">
    <div class="navbar-header"><a class="navbar-brand" href="#">School Performance System</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
        </button>
    </div>
    <div class="container">
        <div class="container">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a>
                    </li>
                    <li><a href="#user-guide">User Guide</a>
                    </li>
                    <li><a href="index.php">Log In</a>
                    </li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
             <h1>You have logged out of the system.</h1>
             <h3><a href="index.php">Click here</a> to return to the main page.</h3>
        </div>
    </div>
</div>

    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
