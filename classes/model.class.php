<?php
    include "database.class.php";

    class model extends database{

        public function insert_record($table, $fields){
        $query ="";
        $query .= "INSERT INTO " . $table;
        $query .= " (". implode(" ,", array_keys($fields)). ") VALUES ";
        $query .= "('". implode("','", array_values($fields))."')";

        $result = mysqli_query($this->connect, $query);
        if($result){
            return true;
        }else{
            return false;
        }

        }
        

        // Pagination for Blog display
        public function count_record($table,$order){
            // $per_page = 3;
            // $start_from = ($page-1) * $per_page;
            // $per_page = (int)$per_page;

            $sql = "SELECT * FROM $table ".$order;
            $query = mysqli_query($this->connect, $sql);
            $counter = mysqli_num_rows($query);
            // if(mysqli_num_rows($query)> 0){
            //     $pagi = "";
            //     $tot = ceil($counter/3);
            //     for ($i=1; $i <=$tot; $i++) { 
            //         if($page== $i){
            //             $pagi ."";
            //         }
            //     }
            // }
                return $counter;
        }

        // Comment Count Per Post
      public function comment_count( $table, $where ){
            $rec =" SELECT * FROM " . $table;
            
// check if the record should be filtered according the record from the database
// e.g. select * from where id = 1

            if($where){
                $rec .= " WHERE ";
            foreach($where as $key => $values){
            $rec.=" ".$key."= '".$values."' AND ";
            }
        }
            $query=rtrim($rec," AND ");
            $result=mysqli_query($this->connect, $query);
            $counter = mysqli_num_rows($result);
            return $counter;
        } 


        // Select Record Function

        public function select_record( $table, $where ){
            $rec =" SELECT * FROM " . $table;
            
// check if the record should be filtered according the record from the database
// e.g. select * from where id = 1

            if($where){
                $rec .= " WHERE ";
            foreach($where as $key => $values){
            $rec.=" ".$key."= '".$values."' AND ";
            }
        }
            $query=rtrim($rec," AND ");
            $result=mysqli_query($this->connect, $query);
                while($row=mysqli_fetch_array($result)){
                    $array[]=$row;
                     
                    //return $array;                   
                }
            return $array;
        } 
        
        public function select_login_record($table, $where){
            $rec ="";
            $condition ="";
            foreach($where as $key => $value){
                $condition .= $key . "='" . $value. "' AND ";
            }
            $condition= substr($condition, 0, -5);
            $rec= "SELECT * FROM ". $table . " WHERE " .$condition;
            $result = mysqli_query($this->connect, $rec);
            while($row=mysqli_fetch_array($result)){
                $array[]=$row;
                return $array;
            }            
        }


        public function get_record($table,$order){
            $query = "SELECT * FROM ". $table.$order;
            $array = array();
            $result = mysqli_query($this->connect, $query);
            while($row=mysqli_fetch_assoc($result)){
                $array[]= $row;
            }
            return $array;
        }

        public function fetch_record2($table,$order){
            $query = "SELECT * FROM ". $table.$order;         
           $array = array();
            $result = mysqli_query($this->connect, $query);
            while($row=mysqli_fetch_assoc($result)){
                $array[]= $row;
            }
            return $array;
        }

        public function fetch_record($table){
            $query = "SELECT * FROM ".$table;
            $array = array();
            $result = mysqli_query($this->connect, $query);
            while($row=mysqli_fetch_assoc($result)){
                $array[]= $row;
            }
            return $array;
        }

        public function update_record($table, $where, $fields){
            $sql= "";
            $condition= "";
            foreach($where as $key =>$value){
            $condition .= $key. "= '" . $value. "' , AND";
            }
            $condition = substr($condition, 0, -5);
            foreach($fields as $key => $value){
                $sql .= $key. "= '" . $value. "', ";
            }
            $sql = substr($sql, 0, -2);
            $sql = " UPDATE ". $table. " SET " .$sql. " WHERE " . $condition;
            // echo $sql;
            if(mysqli_query($this->connect, $sql)){
                return true;
            }else{
                return false;
            }            
        }

        public function delete_record($table, $where){
            $sql="";
            $condition="";
            foreach($where as $key => $value){
            $condition .= $key ."='" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -5);
            $sql= "DELETE FROM ". $table. " WHERE " . $condition;
            if(mysqli_query($this->connect, $sql)){
                return true;
            }
        }

        public function redirect($page){
            return header("Location:" .$page);
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


        // Session Start Begins Here!
        public function start_session(){
            return session_start();
        }
//check who is logged in and assign his login id to a session variable called $_SESSION['user']
        public function session_value($value){
            return $_SESSION['user'] = $value;
        }
//check if the session variable is set
        public function login_status($value){
            if(isset($value)){
                return true;
            }else{
                return false;
            }
        }
//this check if the login user is active and if true the user will have access to the content else the user 
//will be redirected to login 
        public function check_login($value, $page){
            if($this->login_status($value)){
                return true;
            }else{
              return  $this->redirect($page);
            }
        }

         //this is used to loggout the user 
//it first distroy the session id then unset the user session variable 
        public function logout(){
           session_destroy();
           unset($_SESSION['user']);
           return true;
        }

    }


?>