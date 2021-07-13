<?php
    include "../classes/model.class.php";
    session_start();
    $model = new model();   
    $table_name= 'category';
    if(isset($_POST['edit'])){
        $cat_id= $_POST['cat_id'];
        $add_by = $_SESSION['user'];
        $where = array('cat_id' => $cat_id);

        $array= array(
        'cat_id'=> $_POST['cat_id'],
        'cat_name'=> $_POST['cat_name'],
        'add_by' => $_POST['add_by'],
        //'date' =>  date("y-m-d H:i:s" . strtotime($string))
        'date' => date("y-m-d H:i:s" . strtotime($string))
        );

        //print_r($array);

        if($model->update_record('category', $where, $array )){
            $model->redirect('../?v=category&msg=success');
        }
        
    }
     
    

    // print_r($_POST);

    // $array = array(
    //     'post_user_id'=> $post_user_id,
    //     'post_cat_id'=> $post_cat_id,
    //     "post_title" => $post_title,
    //     'post_content'=> $post_content,
    //     'post_image'=> $post_image,
    //     "post_date"=>  $post_date,     
    // );
   

    // if($model->insert_record($table_name, $array)){
    //     
    // }else{
    //     $model->redirect('../?v=home&msg=success');
    //  }