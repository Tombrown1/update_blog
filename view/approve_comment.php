
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

<?php
// Update and Approved Comment
     if(isset($_GET['update'])){
     $com_id = $_GET['com_id'] ?? null;
     $where = array('com_id' => $com_id);
      $field = array('status' => 1);
      if($model->update_record('comment', $where, $field)){
       $model->redirect('?v=comment&msg= Record Updated Successfully');
      }
     
  }
  ?>

  <!-- Comment count logic -->
  <?php 
      //  $commentquery = connect()->prepare("SELECT COUNT(postid) as commmentno FROM comments WHERE postid = :postid");
      //  $commentquery->execute(array(':postid' => $id)); 
      //  $commentnos = $commentquery->fetch();

      //  echo $commentnos['commentno'];
  ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><b>Approved Comments</b></h1>

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
                  
                    $myrow = $model->fetch_record2('comment', $order =' ORDER BY date DESC');
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
                    <td><a href="?v=comment&update=1&com_id=<?php echo $row['com_id'] ?>" class="btn btn-success">Approved</a></td>
                    <td><a href="?v=comment&delete=1&com_id=<?php echo $row['com_id'] ?>" class="btn btn-danger" title="click for delete" onclick="return confirm('sure to delete ?')">Delete</a></td>
                    <td><a href="?v=fullpost&view=1&post_id=<?php echo $row['post_com_id'] ?>" class="btn btn-primary">Preview</a></td>
                    </tr>
                   <?php }?>                                 
                </tbody>                
             </table>
                  </div>
              </div> <br><br>
                    <div class="col-md-12">
                    <h1 class="page-header"><b>Un-Approved Comments</b></h1>
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
                          $myrow = $model->fetch_record('comment', $where )
                        ?> 
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                            </table>
                        </div>
                    </div>
            </div>
           
            <!-- Approved Comment Section -->
       
      
    </div>

    <?php
         include 'footer.php';
    ?>