
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
  <?php
    // $model new model();
     if(isset($_GET['delete'])){
     $com_id = $_GET['com_id'] ?? null;
     $where = array('com_id' => $com_id);

       // print_r($_GET['com_id']);

       if($model->delete_record('comment', $where)){
       $model->redirect('?v=comment&msg= Record deleted Successfully');
      }
     
  }
  ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><b>Un-Approved Comments</b></h1>

           <div class="container-fluid">
                  <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped">                       
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>                            
                            <th>Date & Time</th>                            
                            <th>Comment</th> 
                           
                                            
                            <th>Approved</th>                            
                            <th>Delete Comment</th>
                            <th>Details</th>
                        </tr>
                </thead>
                <tbody>
                  <?php
                    $myrow = $model->fetch_record('comment');
                    foreach($myrow as $row){
                      ?>
                       <tr>
                    <td><?php echo $row['com_id'] ?></td>
                    <td><?php
                    $where = array('user_id' => $row['com_user_id']);
                    $myrow = $model->select_record('users', $where);
                    if($myrow){
                      foreach($myrow as $value){}
                      $user_id = $value['user_id'];
                      $user_name = $value['user_name'];

                      echo $user_name;
                    }else{
                      echo "Not set !";
                    }                   
                    ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['comment'] ?></td>
                    <td><a href="#" class="btn btn-success">Approved</a></td>
                    <td><a href="?v=comment&delete=1&com_id=<?php echo $row['com_id'] ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="?v=fullpost&view=1" class="btn btn-primary">Preview</a></td>
                    </tr>
                <?php }  ?>
                   
                </tbody>
             </table>
                  </div>
              </div>
            </div>
            <br><br>

            <!-- Approved Comment Section -->

            <h1 class="page-header" align="center"><b>Approved Comments</b></h1>

           <div class="container-fluid">
                  <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped">                       
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>                            
                            <th>Date & Time</th>                            
                            <th>Comment</th> 
                           
                            <th>Approved By</th>      
                            <th>Revert Approval</th>                            
                            <th>Delete Comment</th>
                            <th>Details</th>
                        </tr>
                </thead>
                <tbody>
                  <?php
                    $myrow = $model->fetch_record('comment');
                    foreach($myrow as $row){
                      ?>
                       <tr>
                    <td><?php echo $row['com_id'] ?></td>
                    <td><?php
                    $where = array('user_id' => $row['user_id']);
                    $myrow = $model->select_record('users', $where);
                    if($myrow){
                      foreach($myrow as $value){}
                      $user_id = $value['user_id'];
                      $user_name = $value['user_name'];

                      echo $user_name;
                    }else{
                      echo "Not set !";
                    }                   
                    ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['comment'] ?></td>
                    <td><a href="#" ></a></td>
                    <td><a href="#" class="btn btn-warning">Dis-Approved</a></td>
                    <td><a href="?v=comment&delete=1&com_id=<?php echo $row['com_id'] ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="?v=fullpost&view=1&post_id=<?php echo $row['com_id'] ?>" class="btn btn-primary">Preview</a></td>
                    </tr>
                <?php }  ?>
                   
                </tbody>
             </table>
                  </div>
              </div>
            </div>
      
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


 <!-- Comment Count Functions.
    ================================================== -->

    <?php

function CreateCommentRow($data){
  return '
  <div class="comment">
    <div class="user"> '.$values['user_name'].' <span class="time">'.$data['date'].'</span> </div>
    <div class="user_comment"> '.$data['comment'].'</div>
  </div>
  ';
}



if(isset($_POST['getAllComments'])){
  $start = $model->real_escape_string($_POST['start']);

  $response = "";
  $sql = $model->query(" SELECT com_user_id,comment, DATE_FORMAT( date, '%Y-%M-%D') AS date FROM comment INNER JOIN users ON comment.com_user_id = users.user_id ORDER BY comment.com_id DESC LIMIT $start, 10");
  while($data = $sql->fetch_assoc())
  $response .= CreateCommentRow($data); 

  exit($response);

  // <!-- SELECT com_user_id, comment, date FROM comment INNER JOIN users ON comment.com_user_id = users.user_id -->

}
?>


   <!-- Comment Count Functions.
    ================================================== -->

    <?php

function CreateCommentRow($data){
  return '
  <div class="comment">
    <div class="user"> '.$values['user_name'].' <span class="time">'.$data['date'].'</span> </div>
    <div class="user_comment"> '.$data['comment'].'</div>
  </div>
  ';
}



if(isset($_POST['getAllComments'])){
  $start = $model->real_escape_string($_POST['start']);

  $response = "";
  $sql = $model->query(" SELECT com_user_id,comment, DATE_FORMAT( date, '%Y-%M-%D') AS date FROM comment INNER JOIN users ON comment.com_user_id = users.user_id ORDER BY comment.com_id DESC LIMIT $start, 10");
  while($data = $sql->fetch_assoc())
  $response .= CreateCommentRow($data); 

  exit($response);
    
}
  
  ?>



    <!-- Comment Section -->
    <div class="row">
                  <div class="col-xs-6">
                    <h3>Comment</h3>
                    <?php                      
                    $where = array('post_com_id'=> $_GET['post_id'] );
                      $myrow = $model->select_record('comment', $where);                      
                      foreach($myrow as $row){
                        ?>
                        <div class="user_replies">
                          <div class="user">
                          <?php 
                          $where = array('user_id' => $row['com_user_id']);
                          $myrow = $model->select_record('users', $where);
                          if($myrow){
                            foreach($myrow as $value){}
                            $user_id = $value['user_id'];
                            $user_name = $value['user_name'];                             
                            echo $user_name;
                          }else{
                            echo "Nil";
                          }                     
                          
                          ?>&nbsp;&nbsp;
                          <span class="time"><?php echo $row['date'] ?></span></div>
                          <div class="reply"><?php echo nl2br($row['comment']); ?>   </div> <br>
                        </div>

                   <?php   }
                    ?>
    </div>
</div>