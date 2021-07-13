<?php
    // error_reporting(0);
    include_once "classes/model.class.php";    
    $model = new model();
    
    $model->start_session();


    if(isset($_GET['v'])){
        $page = $_GET['v'];

    if($page=="dashboard"){
        include 'view/dashboard.php';
        
    }elseif($page=="home"){
        include 'view/home.php';
        
    }elseif($page=="add_new_post"){
        include 'view/add_new_post.php';

    }elseif($page=="registration"){
        include 'view/registration.php';

    }elseif($page=="delete_record"){
        include 'includes/delete_record.php';
    }
    elseif($page=="post_update"){
        include 'includes/post_update.php';

    }elseif($page== "reply"){
        include 'view/reply.php';    
    
    }elseif($page=="category"){
        include 'view/add_category.php';

    }elseif($page=="login"){
        include 'view/login.php';
        
    }elseif($page=="comment"){
        include 'view/approve_comment.php';

    }elseif($page=="fullpost"){
        include 'view/fullpost.php';

    }elseif($page=="manage_admin"){
        include 'view/manage_admin.php';

    }elseif($page== "search"){
        include 'view/search.php';
        
    }elseif($page=="logout"){
        if($model->logout()){
         $model->redirect($page='?v=login');
        }
    }else{
        include 'view/home.php';
    }
    
    
}

?>