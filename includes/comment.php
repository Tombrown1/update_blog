<?php
    include "../classes/model.class.php";
    session_start();
    $model = new model();
    $table_name= 'comment';
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    $com_user_id = $_SESSION['user'];
    $date = date("Y-m-d h:i:s");
    
    

    // print_r($_POST);

    $array = array(
        'comment'=> $comment,
        'post_com_id'=> $post_id,
        'com_user_id'=>$com_user_id,
        "date"=>  $date     
    );
   

    if($model->insert_record($table_name, $array)){
        $model->redirect('../?v=fullpost&view=1&post_id='.$post_id.'&msg=success');
    }else{
        $model->redirect('../?v=home&msg=success');
     }