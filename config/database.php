<?php

    class DataBase {
        
        private $hostname;
        private $dbname;
        private $username;
        private $password;
        private $conn;

        public function connect(){
            $this->hostname = "localhost";
            $this->dbname = "blog_db";
            $this->username = "admin";
            $this->password ="FkclnGckxcDeMxdl";

            $this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);

            
            if($this->conn->connect_errno){
                print_r($this->conn->connect_errno);
                 exit;
            }else{
                return $this->conn;
            }
        }


    }

?>