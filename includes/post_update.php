<?php
    include "../classes/model.class.php";

    $model = new model();
    $model->start_session();
    $table_name= 'post';
    if(isset($_POST['edit'])){
        $post_id= $_POST['post_id'];
        $where = array('post_id' => $post_id);

                    ############ Configuration ##############
            $thumb_square_size 		= 600; //Thumbnails will be cropped to 200x200 pixels
            $max_image_size 		= 800; //Maximum image size (height and width)
            $thumb_prefix			= "thumb_"; //Normal thumb Prefix
            $destination_folder		= "../images/"; //upload directory ends with / (slash)
            $jpeg_quality 			= 100; //jpeg quality
            ##########################################
            $images= $_FILES['image'];
            if(!isset($_FILES['image']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
                die('Image file is Missing!'); // output error when above checks fail.
            }

//uploaded file info we need to proceed
$image_name = $_FILES['image']['name']; //file name
$image_size = $_FILES['image']['size']; //file size
$image_temp = $_FILES['image']['tmp_name']; //file temp
//$jiffy_id=$jiffye_user_id;

$image_size_info 	= getimagesize($image_temp); //get image size

if($image_size_info){
$image_width 		= $image_size_info[0]; //image width
$image_height 		= $image_size_info[1]; //image height
$image_type 		= $image_size_info['mime']; //image type
}else{
die("Make sure image file is valid!");
}
//$valid_formats = array("jpg", "png", "gif", "JPG", "bmp");
//switch statement below checks allowed image type 
//as well as creates new image from given file 
switch($image_type){
    case 'image/png':
        $image_res =  imagecreatefrompng($image_temp); break;
    case 'image/gif':
        $image_res =  imagecreatefromgif($image_temp); break;			
    case 'image/jpeg': case 'image/jpeg':
        $image_res = imagecreatefromjpeg($image_temp); break;
        case 'image/JPG': case 'image/JPG':
        $image_res = imagecreatefromjpeg($image_temp); break;
        case 'image/jpg': case 'image/jpg':
        $image_res = imagecreatefromjpeg($image_temp); break;
        case 'image/bmp': case 'image/bmp':
        $image_res = imagecreatefromjpeg($image_temp); break;
    default:
        $image_res = false;
    }
    

    if($image_res){
        //Get file extension and name to construct new file name 
        $image_info = pathinfo($image_name);
        $image_extension = strtolower($image_info["extension"]); //image extension
        $image_name_only = strtolower($image_info["filename"]);//file name only, no extension
        
        //create a random name for new image (Eg: fileName_293749.jpg) ;
        $new_file_name = $image_name_only. '_' .  rand(0, 9999999999) . '.' . $image_extension;
        
        //folder path to save resized images and thumbnails
        $thumb_save_folder 	= $destination_folder . $thumb_prefix . $new_file_name; 
        $image_save_folder 	= $destination_folder . $new_file_name;
        $stor_thumb=$thumb_prefix . $new_file_name; 
        
        //call normal_resize_image() function to proportionally resize image
        if($model->normal_resize_image($image_res, $image_save_folder, $image_type, $max_image_size, $image_width, $image_height, $jpeg_quality))
        {
            //call crop_image_square() function to create square thumbnails
            if(!$model->crop_image_square($image_res, $thumb_save_folder, $image_type, $thumb_square_size, $image_width, $image_height, $jpeg_quality))
            {
            
                die('Error Creating thumbnail');
            }
            $thumb_image=$thumb_prefix . $new_file_name;
        }
            // print_r($_POST);

        $array= array(
        'post_id'=>$_POST['post_id'],
        'post_user_id'=> $_SESSION['user'],
        'post_cat_id' => $_POST['post_cat_id'],
        'post_title' => $_POST['post_title'],
        'post_content' => $_POST['post_content'],
        'post_image' => $new_file_name,
        'post_date' => date("y-m-d H:i:s" . strtotime($string))         
        );

        if($model->update_record('post', $where, $array )){
            imagedestroy($image_res); //freeup memory
            $model->redirect('../?v=dashboard&msg=success');
        }
        
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