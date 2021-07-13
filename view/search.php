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
          <h1 class="page-header">Search Result </h1>
          
        <div class="container">   
    <?php
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($connect, $_POST['search']);
            $sql = "SELECT * FROM comment WHERE comment LIKE '%$search%' OR date LIKE '%$search%' OR post_com_id LIKE '%$search%' ";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='col-md-8'>
                        <h3>".$row['comment']."</h3>
                        <h3>".$row['date']."</h3>
                        <h3>".$row['post_com_id']."</h3>
                    </div>";
                }
            }else{
                echo " There is no word that matches your search!";
            }
        }
    ?>
</div>