
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

    <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 ">
          <h1 class="page-header"> Welcome <?php echo $total_record.' '. $values['user_name'] ?> </h1>
          <h2>Welcome to our blog page</h2>

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
                      <div class="col-md-8 post">
                        <?php 
                        if($row['post_image']){
                          echo '<img src="images/'.$row['post_image'] .'" class="img-responsive" alt="'.$row['post_image'] .'" />';
                         }
                        ?> <br>
                        <button class="btn btn-default" style="float:right"> Comments:
                            <?php
                                $where = array('post_com_id'=> $row['post_id']);
                                $myrow = $model->comment_count('comment', $where);
                                    if($myrow){
                                        echo $myrow;
                                    }else{
                                        echo "Nil";
                                    }
                               
                            ?>                            
                        </button>
                        <div class="user"><?php echo $values['user_name'] ?> &nbsp;&nbsp; <span><?php echo $row['post_date'] ?></span></div>
                        <h2>Category: <?php 
                            $where = array('cat_id'=>$row['post_cat_id']);
                            $myrow = $model->select_record('category', $where);
                            if($myrow){
                                foreach($myrow as $value){}
                                $cat_id = $value['cat_id'];
                                $cat_name = $value['cat_name'];

                                echo $cat_name;
                            }else{
                                echo "Nil";
                            }
                        ?></h2>
                        <h3>Post Title:<?php echo $row['post_title'] ?></h2>
                        <hr class="">
                        <p>Post: <br> <?php echo $row['post_content'] ?></p>

                       <a href="?v=fullpost&view=1&post_id=<?php echo $row['post_id']; ?>" class="btn btn-primary" style="float:right">Read More</a> <br><br> <br>
                      </div> 
               </div><br><br>
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
             

      </div>
 

      <?php
         include 'footer.php';
    ?>