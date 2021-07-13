<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Updated Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Updated Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?v=registration">Register</a></li>
            <li><a href="?v=login">Log in</a></li>         
          </ul>
        </div>
      </div>
    </nav>
    
        <div class="container-fluid">
        <br>
            <div class="jumbotron">

            </div>
        </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Login Here!</h1>

      
      <div class="container">
          <div class="col-md-6">            
              <form action="includes/user_login.php" method="POST" role="form">              
                  <div class="form-group">
                      <label for="user_email">Email Address</label>
                      <input type="email" name="user_email"  class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="user_pass">Password</label>
                      <input type="text" name="user_pass"  class="form-control" required>
                  </div>
                  <br>
                  <div class="form-group" style="float:right">
                    <!-- <label for="ResetButton">Reset button</label> -->
                    <input type="reset" name="ResetButton" class="btn btn-info" value="Reset Form" >
                    </div>
                  <button type="submit" class="btn btn-success"> Login</button> or 
                  <a href="?v=registration" class="btn btn-primary">Register</a>
              </form>
          </div>
          <div class="col-md-6">

          </div>

      </div>
 </div>


 <?php
         include 'footer.php';
  ?>