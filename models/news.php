<?php

    class News{

        private $conn;
        private $table_name;
        public $category;
        public $title;
        public $body;
        public $image_url;
        public $time;
        public $id;

        public function __construct($db){
            $this->conn = $db;
            $this->table_name = "news";
        }
        
        public function get_all_data(){

            $sql_query = "SELECT * FROM ".$this->table_name;

            $news_obj = $this->conn->prepare($sql_query);

            $news_obj->execute();

            return $news_obj->get_result();
        }
    }

?>
