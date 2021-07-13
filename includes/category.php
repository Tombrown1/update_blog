<?php
    include "../classes/model.class.php";
        session_start();
    $model = new model();
    $table_name= 'category';
    $cat_name= $_POST['cat_name'];
    $add_by = $_SESSION['user'];
    $date = date("y-m-d H:i:s" . strtotime($string));
    
    

    // print_r($_POST);

    $array = array(
        'cat_name'=> $cat_name,
        'add_by'=> $add_by,
        "date"=>  $date,     
    );
   

    if($model->insert_record($table_name, $array)){
        $model->redirect('../?v=category&msg=success');
    }else{
        $model->redirect('../?v=category&msg=success');
     }