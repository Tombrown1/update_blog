
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
          <h1 class="page-header">Share your thought about this post </h1>
<?php
$post_c=array(
  'post_com_id'=>$_GET['post_id'],
  'status'=>1
);
$post_cont=$model->select_record2('comment', $post_c,$order=' ORDER BY com_id DESC LIMIT 20 ');
foreach($post_cont AS $view_com){
  echo $view_com['comment'];
}
// print_r($post_cont);
?>
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8" align="center" style="margin-top:20px; margin-bottom:20px;">
                    <img src="images/cloudoffice247(1).jpg" height="500px" width="700px" alt="Blog Image">
                </div>
            </div>

             <div class="row">
            <?php          
                    




              if(isset($_GET['view'])){
              $post_id = $_GET['post_id'] ?? null;
              $where = array('post_id' => $post_id);
              $row = $model->select_record('post', $where);
              foreach($row as $value){}               
              ?>
               <?php  
                $myrow = $model->select_record('post', $where);
                foreach($myrow as $row){
                  ?>
                     <div class="row">                      
                      <div class="col-md-8">                         
                          <div class="usercomment">                            
                            <div class="comment">
                            <div class="user"><?php echo $values['user_name']; ?> &nbsp;  &nbsp;<span class="time"> <?php echo $row['post_date'] ?></span></div><br>
                                <div class="title"><?php echo $value['post_title'] ?> </div>                                 
                                <div class="UserComment"> <?php echo $value['post_content']?></div>                                
                            </div>
                          </div>
                      </div>
                </div>
              <?php  }?>

              <div class="row">
                  <div class="col-xs-6">
                    <h3>Comment</h3>
                    <?php
                    $where1 = array(
                      'post_com_id'=> $_GET['post_id']
                    );
                    $c=1;
                      $s = $model->select_record(' comment ', $where1);
                      //echo $s;
                      foreach($s as $r){
                        echo $c++;
                        echo $r['comment'];
                        ?>
                        <div class="user_replies">
                          <div class="user">
                          <?php 
                          $where = array('user_id' => $r['user_id']);
                          $myrow = $model->select_record('users', $where);
                          if($myrow){
                            foreach($myrow as $value){}
                            $user_id = $value['user_id'];
                            $user_name = $value['user_name'];
                             
                            echo $user_name;
                          }else{
                            echo "Nil";
                          }                       
                          
                          ?>
                          <?php echo $r['comment']; ?><span class="time"><?php echo $r['date'] ?></span></div>
                          <div class="reply"></div> <br>
                        </div>

                   <?php   }
                    ?>
                  </div>
              </div>
            

              <div class="col-md-8"> 
                <form action="includes/comment.php" method="POST" role="form">
                        <div class="form-group">
                        <label for="post_user_id"></label>
                        <input type="hidden" name="post_user_id" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="post_id"></label>
                        <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>" class="form-control">
                        </div>                   
                        <div class="form-group">
                        <label for="comment">Comment </label>
                        <textarea class="form-control" placeholder="Add public comment" name="comment" cols="10" rows="5"></textarea> <br>
                        <button type="submit" class="btn btn-primary" style="float:right">Add Comment</button>   <br> <br>                  
                    </form>               

            <?php  } ?> 
            <div class="replies"><b><a href="#">Reply</a></b>
                                  <!-- <textarea name="reply" type="submit" class="form-control" id="" cols="5" rows="2"></textarea> -->
                              </div>        
             
                </div>            
            </div>          
              
            <?php 
$post_c=array(
    'post_com_id'=>21,
    'status'=>1
  );
  $post_cont=$model->select_record2('comment', $post_c,$order=' ORDER BY com_id DESC LIMIT 20 ');
  foreach($post_cont AS $view_com){
    echo $view_com['comment'];
  }
                    ?>



          
             
     
           <!-- <div class="container">
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
                            <th  colspan="2">Action</th>
                            <th>Details</th>
                        </tr>
                </thead>
             </table>
                  </div>
              </div>
            </div> -->
      
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
