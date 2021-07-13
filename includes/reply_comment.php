<?php
    include "../classes/model.class.php";
    session_start();
    $model = new model();
    $table_name= 'reply';
    $reply_text = $_POST['reply_text'];
    $com_id = $_POST['com_id'];
    $user_id = $_SESSION['user'];
   $time = date("y-m-d H:i:s" . strtotime($string));
    
    

   print_r($_POST);

    // $array = array(
    //     'comment'=> $reply_text,
    //     'com_id'=> $com_id,
    //     'user_id'=>$user_id,
    //     "time"=>  $time     
    // );
   

    // if($model->insert_record($table_name, $array)){
    //     $model->redirect('../?v=fullpost&view=1&com_id='.$com_id.'&msg=success');
    // }else{
    //     $model->redirect('../?v=home&msg=success');
    //  }