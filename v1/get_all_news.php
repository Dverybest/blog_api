<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    
    include_once ('../config/database.php');
    include_once ('../models/news.php');

    $db = new Database();
    $connection = $db->connect();
    $news = new News($connection);

    if($_SERVER['REQUEST_METHOD'] ==="GET"){
        
       $result = $news->get_all_data();
       $data["news"] = array();

       if($result->num_rows>0) {
           
            while ($row = $result->fetch_assoc()) {
               array_push($data["news"],$row);
            }
            http_response_code(200);
            echo json_encode(array(
                "status"=>1,
                "data"=>$data["news"]
            ));
       }

    } else {
        
      http_response_code(503);
      echo json_encode(array(
              "status"=>0,
              "message"=>"Access Denied"
      ));
    }

?>