<?php
    include "../classes/model.class.php";

    $model = new model();
    $table_name= 'users';
    $user_name= $_POST['user_name'];
    $user_email= $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_phone = $_POST['user_phone'];
    $user_image = $_POST['user_image'];
    $date_time = date("y-m-d H:i:s" . strtotime($string));
    

    // print_r($_POST)

    $array = array(
        'user_name'=> $user_name,
        'user_email'=> $user_email,
        'user_pass'=> $user_pass,
        'user_phone'=> $user_phone,
        'user_image'=> $user_image,
        "date_time"=>  $date_time
    );
   

    if($model->insert_record($table_name, $array)){
        $model->redirect('../?v=home&msg=success');
    }else{
        $model->redirect('../?v=home&msg=success');
    }

?>