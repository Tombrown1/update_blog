
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
      
      $total_record = $model->count_record($table='post', $order='');
  ?>  

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"> Welcome <?php echo $total_record.' '. $values['user_name'] ?> </h1>
          <h2 class="font-style:italic text-center";>Welcome to our blog page</h2>

          <?php
          
              $limit=3;
                if(isset($_GET['page'])){
                  $page=$_GET['page'];
                }else {
                  $page=1;
                 
                }
                $start =($page-1) * $page;
                $myrow = $model->get_record($table='post', $order=' ORDER BY post_id DESC LIMIT '. $start.', '.$limit );
                foreach($myrow as $row){
                  ?>
               <div class="container">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 post">
                        <?php 
                        if($row['post_image']){
                          echo '<img src="images/'.$row['post_image'] .'" class="img-responsive" alt="'.$row['post_image'] .'" />';
                         }
                        ?> <br>
                        <div class="user"><?php echo $values['user_name'] ?> &nbsp;&nbsp; <span><?php echo $row['post_date'] ?></span></div>
                        <h2><?php echo $row['post_title'] ?></h2>
                        <p><?php echo $row['post_content'] ?></p>
                      </div>

                      <div class="col-md-6 col-md-offset-3 comments-section">
                          <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
                          <?php if(isset($_SESSION['user'])): ?>
                            <form action="includes/comment.php" method="POST" role="form">
                        <div class="form-group">                       
                        <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>" class="form-control">                                          
                        <textarea class="form-control" placeholder="Add public comment" name="comment" cols="10" rows="5"></textarea> <br>
                        <button type="submit" class="btn btn-primary" style="float:right">Add Comment</button> <br> <br>                  
                    </form>
                        <!-- <form action="includes/comment.php" class="clearfix" method="post" id="comment_form" > 
                          <textarea name="comment" id="comment" class="form-control" cols="15" rows="3"></textarea>
                          <button class="btn btn-primary btn-sm pull-right" type="submit" id="submit_comment">Submit comment</button>
                          </form> -->
                      </div>
                <?php else: ?>
                        <div class="well" style="margin-top: 20px;">
                        <h4 class="text-center"><a href="#">Sign in</a> to post a comment</h4>
                        </div>
                    <?php endif ?>
                  </div>
               </div>
              <?php  } 
              if($total_record>3){
              ?>
              <ul>
              <?php
              $total = ceil($total_record/$limit);
              for($i=1; $i <=$total; $i++) { 
                  if($page== $i){
                      $pagi ='<li>'.$i.'</li>';
                  }else{
                    $pagi = '<li><a href="?v=home.php&page='.$i.'">'.$i .'</a></li>';
                  }
                  echo $pagi;
              ?>
              
              <?php } ?>
              </ul>
            <?php }?>
            <!-- <div class="row">
                      <div class="comment-box"></div>
                      <div class="col-md-8">                         
                          <div class="userpost">                            
                            <div class="post"> 
                                <div class="UserPost"> <?php //echo $row['post_content']?></div> 
                                <div class="user"><?php //echo $values['user_name']; ?><span class="time"> <?php //echo $row['date'] ?></span></div> 
                                <div class="UserPost"> <?php// echo $row['post_content']?></div> 
                                <div class="replies"><b><a href="#">Reply</a></b>
                                  <textarea name="reply" type="submit" class="form-control" id="" cols="5" rows="2"></textarea> -->
                              <!-- </div><br>
                            </div>
                          </div>
                      </div>
                </div> --> 

      </div>
 

      <?php
         include 'footer.php';
    ?>