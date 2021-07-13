  <?php
    // $model= new model();
    // $model->check_login($_SESSION['user'],$page="?v=login");
    // $where= array( 
    //   'user_id'=> $_SESSION['user']
    // );

    // $user_details = $model->select_login_record($table='users', $where);
    //   foreach($user_details as $values ){
    //     $username = $values['user_id'];
    //   }
  
  ?>

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
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      /*post*/
.post { border: 1px solid #ccc; margin-top: 10px; }
/*comments*/
.comments-section { margin-top: 10px; border: 1px solid #ccc; }
.comment { margin-bottom: 10px; }
    </style>
    <!-- <script>
        function getAllcomments(start, max){
          if(start > max){
            return;
          }

        $.ajax({
          url: 'index.php',
          method: 'post',
          datatype: 'text',
          data: {
            getAllcomments: 1,
            start: start
          }, success: function (response){
            $(".usercomments").append(response);
            getAllcomments((start+10), max);
          }
        });
          
        }
    </script> -->
  </head>

  <body>

  <?php
    include 'navbar.php'; 
    include 'sidebar.php';   
  ?>