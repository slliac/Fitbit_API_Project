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


$result = mysqli_query($db->con, "SELECT SUM(step) as steps, SUM(floors) as floors, SUM(distance) as distance FROM fitbit_summary WHERE name = '$fb_user_id'") or die(mysqli_error($db->con));



if (mysqli_num_rows($result) > 0)
{
        $response["success"] = 1;
        $response["steps"] = "0";
      	$response["floors"] = "0";
      	$response["distance"] = "0";

    while ($row = mysqli_fetch_array($result))
    {
    	$response["steps"] = $row["steps"];
    	$response["floors"] = $row["floors"];
    	$response["distance"] = $row["distance"];
    }


}
else{
      $response["steps"] = "0";
      $response["floors"] = "0";
      $response["distance"] = "0";
      $response["success"] = 0;
}

    echo json_encode($response);

?>
