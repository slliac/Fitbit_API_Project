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


// check for empty result
$result = mysqli_query($db->con, "SELECT * FROM job_picture ORDER BY ID ASC") or die(mysqli_error($db->con));

if($result)
{

  $response["jobs"] = array();
  while ($row = mysqli_fetch_array($result)) {
     $jobs["job_name"] = $row["job_name"];
     $jobs["job_icon"] = $row["job_icon"];
     $jobs["job_figure"] = $row["job_figure"];
     $jobs["job_walk"] = $row["job_walk"];
     $jobs["job_attack"] = $row["job_attack"];

     array_push($response["jobs"], $jobs);

  }
             $response["success"] = 1;
}
else{
           $response["success"] = 0;
}




    echo json_encode($response);

?>
