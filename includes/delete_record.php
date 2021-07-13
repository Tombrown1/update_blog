<?php
    include "../classes/model.class.php";

   // $model = new model();
    if(isset($_GET['delete'])){
        $post_id = $_GET['post_id'] ?? null;
        $where = array('post_id'=> $post_id);

        // print_r($_GET['post_id'])

        if($model->delete_record('post', $where)){
           $model->redirect('?v=dashboard&msg= Record deleted Successfully');
        }
        
    }

    //$model = new model();
   //  if(isset($_GET['delete'])){
   //      $cat_id = $_GET['cat_id'] ?? null;
   //      $where = array('cat_id'=> $cat_id);

   //      // print_r($_GET['post_id'])

   //      if($model->delete_record('category', $where)){
   //         $model->redirect('?v=category&msg= Record deleted Successfully');
   //      }
        
   //  }

   // $model = new model();
   //  if(isset($_GET['delete'])){
   //      $admin_id = $_GET['admin_id'] ?? null;
   //      $where = array('admin_id'=> $admin_id);    

   //      if($model->delete_record('manage_admin', $where)){
   //         $model->redirect('?v=manage_admin&msg= Record deleted Successfully');
   //      }
        
   //  }

      

    