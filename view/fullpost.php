
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
 //thought
  ?> 
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Share your comment about this post and reply others comment as well  </h3>

        <div class="container-fluid">     

             <div class="row">
            <?php          
                    
              if(isset($_GET['view'])){
              $post_id = $_GET['post_id'] ?? null;
              $where = array('post_id' => $post_id);
              // $row = $model->select_record('post', $where);
              // foreach($row as $value){}               
              ?>
               <?php  
                $myrow = $model->select_record('post', $where);
                foreach($myrow as $value){
                  $post_image=$value['post_image'];
                  $post_id=$value['post_id'];
                  $post_title=$value['post_title'];
                  $post_content=$value['post_content'];
                  $post_date=$value['post_date'];
                  ?>
                     <div class="row">                      
                      <div class="col-md-8">
                        <div class="post_image">
                        <?php 
                        if($post_image){
                          echo '<img src="images/'.$post_image .'" class="img-responsive" alt="'.$post_image .'" />';
                         }
                        ?> <br>                    
                      </div> 
                        <div class="user"><?php //echo $value['user_name']; ?> &nbsp;  &nbsp;<span class="time"> <?php echo $post_date ?></span></div><br>
                          <div class="title"><b style="color:blue"><?php echo $post_title ?> </b></div>                                 
                          <div class="Userpost"> <?php echo $post_content ?></div>
                      </div>
                </div>
              <?php  }?>
                          <!-- Comment Section -->
              <div class="row">
                  <div class="col-md-6">
                    <h3>Comment No: <?php 
                        $where = array('post_com_id' => $post_id);
                        $myrow = $model->comment_count('comment', $where);
                        if($myrow){
                          echo $myrow;
                        }else{
                          echo "Nil";
                        }
                    ?></h3>
                    <?php                      
                      $where1 = array('post_com_id' => $post_id, 'status' => 1);
                      $myrow1 = $model->select_record('comment', $where1); 
                      
                    //  print_r($myrow1); 

                      foreach($myrow1 as $comment_list){
                       $l_comment= $comment_list['comment'];
                       $l_date=$comment_list['date'];
                       $l_com_user_id=$comment_list['com_user_id'];
                      //  echo $post_id;
                        ?>
                        <div class="user_comments">
                          <div class="user">
                          <?php 
                          $where = array('user_id' => $l_com_user_id);
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
                          <span class="time"><?php echo $l_date ?></span>
                          </div>
                          <div class="comment"><?php echo $l_comment //($row['comment']); ?>   </div>
                        </div> 
                        <!-- Reply Comment Section -->         
                          <a href="?v=comment_reply&reply=1" class="btn btn-info">Reply</a>
                   <?php   } ?>
                   
                  </div>
              </div>
           
                          <!-- Commment Form Begins here -->
              <div class="col-md-6"> 
                <form action="includes/comment.php" method="POST" role="form">
                        <div class="form-group">
                        <label for="post_id"></label>
                        <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>" class="form-control">
                        </div>                   
                        <div class="form-group">
                        <label for="comment"> Share Comment </label>
                        <textarea class="form-control" placeholder="Add public comment" name="comment" cols="10" rows="5"></textarea> <br>
                        <button type="submit" class="btn btn-primary" style="float:right">Add Comment</button> <br> <br>                  
                    </form>               

            <?php  } ?> 
        



          
             
     
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
