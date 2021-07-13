
  <?php
    include 'header.php';

    $model= new model();
    $model->check_login($_SESSION['user'],$page="?v=login");
    $where= array( 
      'user_id'=> $_SESSION['user']
    );

    $user_details = $model->select_login_record($table='users', $where);
      foreach($user_details as $values ){
        $username = $values['user_name'];
      }
  ?>  

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"> Welcome <?php echo $values['user_name'] ?> </h1>

          <?php
              $limit = 3;
              if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                $page = 1;
              }
             $start_from = ($page-1) * $limit;
             $result = mysqli_query('SELECT  * FROM post ORDER BY  post_id ASC LIMIT $start_from, $limit ');
            ?>
            <div class="container">
              <div class="row">
                    <div class="col-md-6 com-md-offset-3 post">
                    
                    </div>
              </div>
            </div>
            
            
      </div>
 

      <?php
         include 'footer.php';
    ?>