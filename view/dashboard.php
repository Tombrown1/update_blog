
<?php
    include 'header.php';

$model= new model();
$model->check_login($_SESSION['user'], $page="?v=login");
$where= array( 
    'user_id'=> $_SESSION['user']
);

$user_details = $model->select_login_record($table='users', $where);
    foreach($user_details as $values ){
    $username = $values['user_name'];
    }

?>
  
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Admin Dashboard </h1>
          <div class="container-fluid">
            <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-striped">                       
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Post Title</th>                            
                            <th>Date & Time</th>                            
                            <th>Author</th> 
                            <th>Category</th>
                            <th>Banner</th>                 
                            <th>Comment</th>                            
                            <th  colspan="2">Action</th>
                            <th>Details</th>
                        </tr>
            </thead>
                <tbody>
                    <?php
                    $myrow = $model->fetch_record2("post", $order = ' ORDER BY post_date DESC');
                            foreach($myrow as $row){
                                // Breaking Point
                                ?>
                            <tr>
                                <td><?php echo $row['post_id'] ?></td>
                                <td><?php echo $row['post_title'] ?></td>
                                <td><?php echo $row['post_date'] ?></td>
                                <td>
                                <?php                                
                               $where = array('user_id'=> $row['post_user_id']);
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
                                <td>
                                <?php                                 
                                   $where = array('cat_id'=> $row['post_cat_id']);                                                                
                                $myrow = $model->select_record($table="category", $where);
                                if($myrow){
                                    foreach($myrow as $value){}
                                    $cat_id = $value['cat_id'];
                                    $cat_name = $value['cat_name'];
                                    echo $cat_name;
                                }else{
                                    echo "Nil";
                                }
                                ?>
                                </td>
                                <td>
                                <?php 
                        if($row['post_image']){
                          echo '<img src="images/'.$row['post_image'] .'" class="img-responsive" alt="'.$row['post_image'] .'" height="50px" width="50px" />';
                         }
                        ?>
                                </td>
                                <td>
                                <?php
                                $where = array('post_com_id'=> $row['post_id']);
                                $myrow =$model->comment_count('comment', $where);
                                if($myrow){
                                    echo $myrow;                              
                                }else{
                                    echo "Nil";
                                }                                
                                
                                ?>
                                
                                </td>                               
                               
                                <td><a href="?v=add_new_post&update=1&post_id=<?php echo $row['post_id'] ?>" class="btn btn-warning" title="click to edit" onclick="return confirm('Sure to edit ?')" >Edit</a></td>
                                <td><a href="?v=delete_record&delete=1&post_id=<?php echo $row['post_id'] ?>" class="btn btn-danger" title="click to delete" onclick="return confirm('sure to delete ?')" >Delete</a></td>
                                <td> <a href="?v=fullpost&view=1&post_id=<?php echo $row['post_id']?>" class="btn btn-primary"> Live Preview</a> </td>
                            </tr>
                          <?php  } ?>
                    
                </tbody>

                    </table>
                </div>
            </div>
          </div>
    </div>

        
<?php
        include 'footer.php';
?>