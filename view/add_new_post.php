
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
          <h1 class="page-header">Update Post Here! </h1>
          
        <div class="container">

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                  </thead>
                </table>
            </div>
          </div> 

<!-- Add new Post form begins here! -->
            <div class="col-md-6"> 
              <?php
                if(isset($_GET['update'])){
                  $post_id = $_GET['post_id'] ?? null;
                  $where = array('post_id'=>$post_id);
                  $row= $model->select_record('post', $where);
                  foreach($row as $value){}
                 ?> 
                  <!-- Form for updating of post -->
                 <form action="includes/post_update.php" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="form-group">                    
                    <input type="hidden" name="post_id" value="<?php echo $value['post_id'] ?>" class="form-control">
                    </div>
                    <label for="post_cat_id">Select Category </label>
                    <select name="post_cat_id" >
                        <option value=""><?php echo $value['post_cat_id'] ?></option> 
                        <?php
                            $myrow= $model->fetch_record("category");
                            foreach($myrow as $nvalue){
                                $cat_id = $nvalue['cat_id'];
                                $cat_name = $nvalue['cat_name'];                                
                         ?>
                          <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                           <?php } ?>                          
                    </select>
                    <!-- <input type="text" name="post_cat_id" class="form-control"> -->
                    <div class="form-group">
                    <label for="post_title">Post Title </label>
                    <input type="post_title" name="post_title" value="<?php echo $value['post_title'] ?>" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="post_content">What is your post opinion </label>
                   <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $value['post_content'] ?> </textarea>
                    </div>
                    <div class="form-group">
                    <label for="post_image">Upload Photo</label>
                    <input type="file" name="image" id="post_image" style="display:none" value="<?php echo $value['post_image'] ?>">
                    </div>
                    <button type="submit" name="edit" value="update" class="btn btn-primary btn-block">Update record</button>
                </form>  
                 <?php 
               }else{ ?>
      <!-- Form for making of new post -->
  <form action="includes/post.php" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                    
                    </div>
                    <div class="form-group">
                    <label for="post_cat_id">Select Category </label>
                    <select name="post_cat_id" class="form-control">
                        <option value="">Select Category</option> 
                        <?php
                            $myrow= $model->fetch_record("category");
                            foreach($myrow as $nvalue){
                                $cat_id = $nvalue['cat_id'];
                                $cat_name = $nvalue['cat_name'];                                
                         ?>
                          <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                           <?php } ?>                          
                    </select><br>
                    <!-- <input type="text" name="post_cat_id" class="form-control"> -->
                    <div class="form-group">
                    <label for="post_title">Post Title </label>
                    <input type="post_title" name="post_title" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="post_content">What is your post opinion </label>
                   <textarea name="post_content" id="" cols="15" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="post_image">Upload Photo</label>
                    <input type="file" id="post_image" style="display:none;" name="image" >
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form> 

              <?php } ?>
             
            
                        
            </div>
            
            </div>
            
        </div>     
     
          
      
    </div>
    <?php
         include 'footer.php';
    ?>