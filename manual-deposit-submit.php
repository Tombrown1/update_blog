<?php
   $model = new model;
  // $model->start_session();strip_tag()
############ Configuration ##############
$thumb_square_size 		= 600; //Thumbnails will be cropped to 200x200 pixels
$max_image_size 		= 800; //Maximum image size (height and width)
$thumb_prefix			= "thumb_"; //Normal thumb Prefix
$destination_folder		= "assets/uploads/"; //upload directory ends with / (slash)
$jpeg_quality 			= 100; //jpeg quality
##########################################
   $amount= stripslashes(trim($_POST['amount']));
   $images= $_FILES['image'];

if(empty($amount)){
$error['error']='error';
}
if(empty($images)){
$error['error']='error';
}

if(!$error){

    // ud_id`, `ud_user_id`, `ud_amount`, `ud_type`, `ud_status`, `ud_date

    $record= array(
        'ud_user_id'=> $_SESSION['user'],
        'ud_amount'=> $amount,
        'ud_type'=> 'btc',
        'ud_date'=> date('Y-m-d')
        
    );
       if($model->insert($table='user_deposit', $record)){ 
$where_record= array('ud_user_id'=> $_SESSION['user']);
$get_record=$model->select_record($table='user_deposit',$where_record,$order=' ORDER BY ud_id DESC LIMIT 1 ');
foreach($get_record as $depo){
$ud_id=$depo['ud_id'];
}
           $activity= array(
        'uah_by'=> $_SESSION['user'],
        'uah_to'=> $_SESSION['user'],
        'uah_type'=> 'deposit',
        'uah_activity'=> $ud_id,
        'uah_date'=> date('Y-m-d')
        
    );
    $model->insert($table='user_activity_history', $activity);
        //    print_r($_FILES['image']);
        //   foreach($_FILES['image'] as $file){
              
            //   echo '</p>';
           // check $_FILES['ImageFile'] not empty
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
case 'image/jpeg': case 'image/pjpeg':
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
    
        


$get_record= array(
        'ud_user_id'=> $_SESSION['user']
    );
      $get_deposit=$model->select_record($table='user_deposit', $get_record,$order=' ORDER BY ud_id DESC LIMIT 1 ');
        foreach($get_deposit as $deposit){
           $deposit_id= $deposit['ud_id'];
        }

       

        // `uu_id`, `uu_cont_id`, ``, `uu_file_name`, `uu_path`, `uu_comment`, `uu_type`, `uu_status`, `uu_date`
         $record= array(
        'uu_cont_id'=> $deposit_id,
        'uu_user_id'=> $_SESSION['user'],
        'uu_file_name'=> $new_file_name,
        'uu_path'=> $destination_folder,
        'uu_comment'=> $_POST['message'],
        'uu_type'=> 'deposit',
        'uu_date'=> date('Y-m-d')
        
    );

    $model->insert($table='user_uploads', $record);

imagedestroy($image_res); //freeup memory

$model->redirect('?page=deposit-history&id='.$plan_id.'&msg=done');    
}
    }
    //    }
    }

    

    // `, ``, `up_status`, `up_date`, `up_amount`, `up_benefit
    

}
else{
    $model->redirect('?page=deposit&id='.$plan_id.'&msg=unexpected_error'); 
}
