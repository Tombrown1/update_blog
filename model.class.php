<?php
    class model extends db{
        // public function insert(){
        //     $query = "INSERT INTO 
        //users(user_id, user_name, user_address, user_phone,user_email other_user_details) 
        //VALUES('1','tom','eliozu','08069071539','tom@gmail.com','student')";
        // }

        // public function insert($table, $fields){
        //     $query='INSERT INTO '.$table;
        //     $query .= ' ('.implode(',', array_keys($fields)).') ';
        //     $query .= " VALUES ('".implode(" ',' ", array_values($fields))."') ";
        //     echo $query;
        // }
        // $rowcount=mysqli_num_rows($result);
public $date;         
public function date(){
  return  $this->date = date('Y-m-d');
}

        public function insert($table, $fields){
            // "INSERT INTO table_name (, ,) VALUES ('name','qty')";

    $sql="";
    $sql .= "INSERT INTO ".$table;
    $sql .= " (". implode(" ,", array_keys($fields)).") VALUES ";
    $sql .= "('".implode("','", array_values($fields))."')";
//    echo $sql;
    $query = mysqli_query($this->con,$sql);
    if($query){
        return true;
    }else{
        return false;
    }
}

    public function fetch_record($table,$order){
        $sql = "SELECT  * FROM ".$table.$order;
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row=mysqli_fetch_assoc($query)){
            $array[]= $row;
        }
        return $array;
    }

    public function search_record($table,$where,$search_clause,$between,$order){
        if($between){
            $between_clause='';
            foreach ($between as $key => $value) {
            // id= '5' AND name= "something"
            $between_clause .= $key ."'". $value."' ";
        }

        $between_clause=substr($between_clause, 0, -1);
        }else{
            $between_clause='';
        }
        
        if($search_clause){
        $clause = "";
        foreach ($search_clause as $key => $value) {
            // id= '5' AND name= "something"
            $clause .= $key . " LIKE '" . $value. "' OR ";
        }
        $clause = substr($clause, 0, -4);
    }else{
        $clause ='';
    }
    $sql = "";
        $condition = "";
        if($where){
        foreach ($where as $key => $value) {
            // id= '5' AND name= "something"
            $condition .= $key . "='" . $value. "' AND ";
        }
        $condition = substr($condition, 0, -5);
    }
        $sql = "SELECT * FROM ". $table . " WHERE " .$condition.$clause.$between_clause.$order;
        // echo $sql;
        $query = mysqli_query($this->con, $sql);
        while($row=mysqli_fetch_array($query)){
            $array[]=$row;
        }
        return $array;
        // return $sql;
    }
    public function select_record($table,$where,$order){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id= '5' AND name= "something"
            $condition .= $key . "='" . $value. "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "SELECT * FROM ". $table . " WHERE " .$condition.$order;
        //echo $sql;
        $query = mysqli_query($this->con, $sql);
        // $row= mysqli_fetch_array($query);
        while($row=mysqli_fetch_array($query)){
            $array[]=$row;
        }
        return $array;
    }
    public function get_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id= '5' AND name= "something"
            $condition .= $key . "='" . $value. "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "SELECT * FROM ". $table . " WHERE " .$condition;
        // echo $sql;
        $query = mysqli_query($this->con, $sql);
        //$row= mysqli_fetch_array($query);
        while($row=mysqli_fetch_array($query)){
            $array[]=$row;
        }
        return $array;
    }
public function get_record_clause($table,$where,$clause,$order){
        $sql = "";
        $condition = "";
        $or_condition="";
        if($where){
        foreach ($where as $key => $value) {
           
             $condition .= $key . "='" . $value. "' AND ";
            // id= '5' AND name= "something"
            
        } 
    }
        if($clause){
        foreach ($clause as $key => $value) {
           // $add_clause=" OR "
            $or_condition .= $key . "='" . $value. "' OR ";
        }
            // id= '5' AND name= "something"
        }
        // $condition = substr($condition, 0, -5);
        $or_condition = substr($or_condition, 0, -4);
        $sql = "SELECT * FROM ". $table . " WHERE " .$condition.''.$or_condition.$order;
        // echo $sql;
        $query = mysqli_query($this->con, $sql);
        //$row= mysqli_fetch_array($query);
        while($row=mysqli_fetch_array($query)){
            $array[]=$row;
        }
        return $array;
    }
    public function update_record($table, $where, $fields){
        $sql= "";
        $condition= "";
        foreach ($where as $key => $value) {
            // id ='5' AND name = 'something'
            $condition .= $key ."='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //  UPDATE table set name = "", qty="", WHERE id="" ;
            $sql .= $key . "='" .$value. "', ";                    
        }
        
        $sql = substr($sql, 0, -2);
        $sql =" UPDATE ". $table. " SET " .$sql. " WHERE ". $condition;
        // echo $sql;
        if(mysqli_query($this->con, $sql)){
            return true;
        }
        
    }
 public function operator($table, $where, $fields,$operator){
        $sql= "";
        $condition= "";
        foreach ($where as $key => $value) {
            // id ='5' AND name = 'something'
            $condition .= $key ."='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //  UPDATE table set name = "", qty="", WHERE id="" ;
            $sql .= $key . "$operator'" .$value. "', ";                    
        }
        
        $sql = substr($sql, 0, -2);
        $sql =" UPDATE ". $table. " SET " .$sql. " WHERE ". $condition;
        // echo $sql;
        if(mysqli_query($this->con, $sql)){
            return true;
        }
        
    }
    public function delete_record($table, $where){
        $sql = "";
        $condition= "";
        foreach ($where as $key => $value) {
        $condition .= $key ."='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "DELETE FROM ". $table. " WHERE " .$condition;
        if(mysqli_query($this->con, $sql)){
            return true;
        }
    }

    public function redirect($page){
        return header("Location:" .$page);
    }

// Session Start Begins Here!

public function start_session(){
return session_start();
}

public function session_value($value){
return $_SESSION['user'] =$value;
}


public function login_status($value){
if(isset($value)){
    return true;
}else{
    return false;
}
}
public function check_login($value,$page){
    if($this->login_status($value)){
        return true;
    }else{
        return $this->redirect($page);
    }
    }
public function check_access($value,$page){
    if($value>0){
        return true;
    }else{
        return $this->redirect($page);
    }
    }
public function logout(){
    session_destroy();
    unset($_SESSION['user']);
    return true;
    }
    public function generateRandomString($length = 5) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function get_code(){
        $user_code= $this->generateRandomString();
        $confirm_table = "user_confirmation";
        $check_code_exist=array(
            'uc_code'=> $user_code
        );
        //check if the generated code exist or is assigned to another user
    if($this->get_record($confirm_table, $check_code_exist)){
      return  $this->get_code();
        }
        else{
        return $user_code;
        }
    }

public function send_mail($email,$emailTo,$name,$subject,$body){
    $headers  = "MIME-Version: 1.1" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
        $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
        $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
        $headers .= "From: " . "=?UTF-8?B?".base64_encode($name)."?=" . "<$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
        $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;
    mail($emailTo, "=?utf-8?B?" . base64_encode($subject) . "?=", $body, $headers);
}


#####  This function will proportionally resize image ##### 
public function normal_resize_image($source, $destination, $image_type, $max_size, $image_width, $image_height, $quality){
	
	if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize
	
	//do not resize if image is smaller than max size
	if($image_width <= $max_size && $image_height <= $max_size){
		if($this->save_image($source, $destination, $image_type, $quality)){
			return true;
		}
	}
	
	//Construct a proportional size of new image
	$image_scale	= min($max_size/$image_width, $max_size/$image_height);
	$new_width		= ceil($image_scale * $image_width);
	$new_height		= ceil($image_scale * $image_height);
	
	$new_canvas		= imagecreatetruecolor( $new_width, $new_height ); //Create a new true color image
	
	//Copy and resize part of an image with resampling
	if(imagecopyresampled($new_canvas, $source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height)){
		$this->save_image($new_canvas, $destination, $image_type, $quality); //save resized image
	}

	return true;
}

##### This function corps image to create exact square, no matter what its original size! ######
public function crop_image_square($source, $destination, $image_type, $square_size, $image_width, $image_height, $quality){
	if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize
	
	if( $image_width > $image_height )
	{
		$y_offset = 0;
		$x_offset = ($image_width - $image_height) / 2;
		$s_size 	= $image_width - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($image_height - $image_width) / 2;
		$s_size = $image_height - ($y_offset * 2);
	}
	$new_canvas	= imagecreatetruecolor( $square_size, $square_size); //Create a new true color image
	
	//Copy and resize part of an image with resampling
	if(imagecopyresampled($new_canvas, $source, 0, 0, $x_offset, $y_offset, $square_size, $square_size, $s_size, $s_size)){
		$this->save_image($new_canvas, $destination, $image_type, $quality);
	}

	return true;
}

##### Saves image resource to file ##### 
public function save_image($source, $destination, $image_type, $quality){
	switch(strtolower($image_type)){//determine mime type
		case 'image/png': 
			imagepng($source, $destination); return true; //save png file
			break;
		case 'image/gif': 
			imagegif($source, $destination); return true; //save gif file
			break;          
		case 'image/jpeg': case 'image/pjpeg': 
			imagejpeg($source, $destination, $quality); return true; //save jpeg file
			break;
		default: return false;
	}
}


public function activity_status_report($pram, $result){
    $title=array(
        'email_exist'=>'Email Exist',
        'invalide_email'=>'Invalid email format',
        'username_exist'=>'Username Exist',
        'pass_mismatch'=>'Password Mismatch',
        'phone_number_exist'=>'Phone Number Exist',
        'user-added'=>'Done Adding Account',
        'deleted'=>'Delete'
    );
    $message=array(
        'email_exist'=>'The email you supplied is used by another user. Kindly change to another email and try again.',
        'invalide_email'=>'Make sure you type your email correctly. ',
        'username_exist'=>'The username is used by another account. ',
        'pass_mismatch'=>'Check your password and try again.',
        'phone_number_exist'=>'The phone number is used by another account.',
        'user-added'=>'Account Created Successfully',
        'deleted'=>'Done Deleting record'
    );
if($result){
  if($result=='title'){
if(array_key_exists($pram,$title)){
    return $title[$pram];
}else{
    return false;
}
}
else{
if(array_key_exists($pram,$message)){
    return $message[$pram];
}else{
    return false;
}   
}
}
else{
return false;
}


// if(array_keys($pram)==="msg"){

// }elseif(array_keys($pram)==="error"){

// }else{

// }
}
}

