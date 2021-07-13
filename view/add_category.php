
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
        $cat_id = $_GET['cat_id'] ?? null;
        $where = array('cat_id'=> $cat_id);

        // print_r($_GET['post_id'])

        if($model->delete_record('category', $where)){
           $model->redirect('?v=category&msg= Record deleted Successfully');
        }
        
    }


  ?>
  

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Manage Category! </h1>
          
        <div class="container">
            <div class="col-md-6"> 
                    <?php
                if(isset($_GET['update'])){
                  $cat_id = $_GET['cat_id'] ?? null;
                  $where = array('cat_id'=>$cat_id);
                  $row= $model->select_record('category', $where);
                  foreach($row as $value){}
                 ?>
                 <form action="includes/update_cat.php" method="POST" role="form">
                  <?php
                            if(isset($_GET['msg']) && $_GET['msg'] == 'success!'){
                                echo "submitted sucessfully!";
                            }
                        ?>
                     <div class="form-group">
                    <input type="hidden" name="cat_id" value="<?php echo $value['cat_id'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="cat_name">Category </label>
                    <input type="text" name="cat_name" value="<?php echo $value['cat_name'] ?>" class="form-control">
                    </div>
                    <div class="form-group">                    
                    <input type="hidden" name="add_by" value="<?php echo $_SESSION['user'] ?>" class="form-control">
                    </div>
                    <button type="submit" name="edit" value="update" class="btn btn-primary btn-block">Add</button>
              </form> <br><br><br><br><br> 
                <?php }else{?>

                  <form action="includes/category.php" method="POST" role="form">
                    <div class="form-group">
                        <?php
                            if(isset($_GET['msg']) && $_GET['msg'] == 'success!'){
                                echo "submitted sucessfully!";
                            }
                        ?>
                    <label for="cat_name">Add Category: </label>
                    <input type="cat_name" name="cat_name" class="form-control">
                    </div>
                    <div class="form-group">
                   
                    <input type="hidden" name="add_by"  class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
              </form> <br><br><br><br><br>

               <?php }?>
                  
            </div>  
                   
            
            

                <div class="col-md6">
                </div>            
            </div> 
            
            <div class="container">
                <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <caption style="font-size:20px"><b>Created Category</b></caption>
                        <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Created by</th>
                            <th>Category Name</th>                            
                            <th>Date & Time</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <?php
                            $myrow = $model->fetch_record("category");
                            foreach($myrow as $row){
                                  //breaking point
                                ?>
                            <tr>
                                <td><?php echo $row['cat_id']?></td>
                                <td>
                                <?php                                
                               $where = array('user_id'=> $row['add_by']);
                               $myrow = $model->select_record($table='users', $where);
                               if($myrow){
                                   foreach($myrow as $uvalue){}
                                       $user_id = $uvalue['user_id'];
                                       $user_name = $uvalue['user_name'];

                                       echo $user_name;
                                   }else{
                                       echo "Not set!";
                                   }
                                ?>    
                                </td>
                                 <td><?php echo $row['cat_name'] ?></td>                                  
                                 <td><?php echo $row['date'] ?></td>
                                 <td><a href="?v=category&update=1&cat_id=<?php echo $row['cat_id']?> " class="btn btn-primary" title="click to edit" onclick="return confirm('Sure to Edit ?')" >Edit</a></td>
                                 <td><a href="?v=category&delete=1&cat_id=<?php echo $row['cat_id'] ?>" class="btn btn-danger"title="click to delete" onclick="return confirm('Sure to Delete ?')">Delete</a></td>
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