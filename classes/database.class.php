<?php

    class database{

        public $connect;

        public function __construct(){
            $this->connect = mysqli_connect("localhost", "root", "", "update_blog"); 

            if($this->connect){
            // return $this->connect . "Connect Successfully!";
        }else{
            // return die("Failed to connect" . mysqli_connect_error());
        }

     }
}
       
?>