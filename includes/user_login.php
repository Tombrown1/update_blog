<?php
    include "../classes/model.class.php";

    $model = new model();
    $table_name= 'users';
    $user_email= $_POST['user_email'];
    $user_pass = $_POST['user_pass'];    

    // print_r($_POST)

    $where = array(
        'user_email'=> $user_email,
        'user_pass'=> $user_pass
    );

    if($model->select_login_record($table='users', $where)){
        $user_login_record = $model->select_login_record($table='users', $where);
        foreach($user_login_record as $value){}
            $model->start_session();

            // echo $_SESSION['user'];
       
      $model->session_value($value['user_id']);
         $model->redirect('../?v=home&msg=success$u'. $value['user_id']);
 }
   else{
        $model->redirect('../?v=registration&msg=success');
    }
    
   

?>