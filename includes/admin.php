<?php
    include "../classes/model.class.php";

    $model = new model();
    session_start();
    $table_name= 'manage_admin';
    $admin_added_by = $_SESSION['user'];
    $admin_id = $_POST['admin_id'];
    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_date = date("y-m-d H:i:s" . strtotime($string));
   // $date = date("y-m-d H:i:s" . strtotime($string));
   
    // print_r($_POST);

    

    $array = array(
        'admin_id'=> $admin_id,
        'admin_username'=> $admin_username,
        'admin_email'=> $admin_email,
        'admin_pass'=> $admin_pass,
        'admin_added_by'=> $admin_added_by,
        'admin_date' => date("y-m-d H:i:s" . strtotime($string))     
    );
         
    if($model->insert_record($table_name="manage_admin", $array)){
        $model->redirect('../?v=manage_admin&msg=success');
    }else{
        $model->redirect('../?v=manage_admin&msg=success');
     }