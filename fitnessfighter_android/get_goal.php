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
$username = $_GET['fb_user_id'];
$date = $_GET['date'];
$result = mysqli_query($db->con, "SELECT * FROM fitbit_goal WHERE name = '$username' AND date = '$date'") or die(mysqli_error($db->con));
// check for empty result

if (mysqli_num_rows($result) > 0)
{
    // looping through all results


        while ($row = mysqli_fetch_array($result)) {
        $response["goals"] = array();
        // temp user_detail array
       $steps = $row["steps"];
       $floors = $row["floors"];
       $distance = $row["distance"];
       $activeMinutes = $row["activeMinutes"];
       $calories = $row["calories"];
       $members["steps"] = $row["steps"];
       $members["floors"] = $row["floors"];
       $members["distance"] = $row["distance"];
       $members["activeMinutes"] = $row["activeMinutes"];
       $members["calories"] = $row["calories"];
        // push single product into final response array
        array_push($response["goals"], $members);
      }


    // echoing JSON response
}
else {

    $response["success"] = 0;
    // echo no users JSON
}
    echo json_encode($response);

?>
