<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table

$fb_user_id = $_GET['fb_user_id'];



// check for empty result
$result = mysqli_query($db->con, "SELECT * FROM challenge WHERE fb_user_id = '$fb_user_id' AND complete ='0'") or die(mysqli_error($db->con));

if($result)
{

  $response["challenge"] = array();
  while ($row = mysqli_fetch_array($result)) {
     $challenge["challenge_id"] = $row["challenge_id"];
     $challenge["fb_user_id"] = $row["fb_user_id"];
     $challenge["type_id"] = $row["type_id"];
     $challenge["start_date"] = $row["start_date"];
     $challenge["end_date"] = $row["end_date"];
     $challenge["complete"] = $row["complete"];
     $challenge["accepted"] = $row["accepted"];
     $challenge["type"] = $row["type"];
     $challenge["confirm"] = $row["confirm"];
     array_push($response["challenge"], $challenge);

  }
             $response["success"] = 1;
}
else{
           $response["success"] = 0;
}




    echo json_encode($response);

?>
