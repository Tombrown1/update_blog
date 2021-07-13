
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

      if(isset($_GET['delete'])){
        $admin_id = $_GET['admin_id'] ?? null;
        $where = array('admin_id'=> $admin_id);    

        if($model->delete_record('manage_admin', $where)){
           $model->redirect('?v=manage_admin&msg= Record deleted Successfully');
        }
        
    }
  ?>
  

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Manage Admin Access ! </h1>
          
        <div class="container">
            <div class="col-md-6"> 
                  <form action="includes/admin.php" method="POST" role="form">
                    <div class="form-group">
                        <?php
                            if(isset($_GET['msg']) && $_GET['msg'] == 'success!'){
                                echo "submitted sucessfully!";
                            }
                        ?>
                    <div class="form-group">
                    <input type="hidden" name="admin_id" class="form-control">
                    </div>
                    <label for="admin_username">Username: </label>
                    <input type="text" name="admin_username" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="admin_email">Email Address: </label>
                    <input type="email" name="admin_email" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="admin_pass">Password: </label>
                    <input type="password" name="admin_pass" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create Admin</button>
              </form> <br><br><br><br><br>

              
                  
            </div>  
                   
            
            

                <div class="col-md6">
                </div>            
            </div> 
            
            <div class="container">
                <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Date & Time</th>
                            <th>Admin Name</th>
                            <th>Added by</th>                        
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <?php
                            $myrow = $model->fetch_record("manage_admin");
                            foreach($myrow as $row){
                                  //breaking point
                                ?>
                            <tr>
                                <td><?php echo $row['admin_id']?></td>                                                                  
                                <td><?php echo $row['admin_date'] ?></td>
                                <td><?php echo $row['admin_username'] ?></td>                                
                                 <td>
                                 <?php
                                 $where = array('user_id' => $row['admin_added_by']);
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
                                 
                                 <td><a href="?v=manage_admin&delete=1&admin_id=<?php echo $row['admin_id'] ?> "class="btn btn-danger" title="click to delete" onclick="return confirm('Sure to delete ?')">Delete</a></td>
                            </tr>
                          <?php }?>                          
                            

                    </table>
                </div>
                </div>
            </div>
            
            </div>
            
        </div>     
     
                                
      
    </div>

    <?php
         include 'footer.php';
    ?>
