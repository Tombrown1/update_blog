<div class="container-fluid">
    <div class="row">
    <?php
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'] ?? null;   
        
        $myrow = $model->fetch_record('comment');
        if($myrow){
            foreach($myrow as $row){}        
       }?>
      <div class="user_comment">
            <div class="user_name"><?php echo $row['com_user_id'] ?> <span class="time"> <?php echo $row['date'] ?></span> </div>
            <div class="comment">
            <?php 
            $where = array('post_com_id'=> $post_id);
            $myrow = $model->select_record('comment', $where);
            foreach($myrow as $row){
            echo $row['comment']; 
            }
            ?></div>           
      </div> 

   <?php }   

?>
    </div>
       


</div>