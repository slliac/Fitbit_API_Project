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

$result = mysqli_query($db->con, "SELECT * FROM fitbit_activity WHERE name = '$username' AND date = '$date'") or die(mysqli_error($db->con));
// check for empty result

if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {
        $response["activity"] = array();
        // temp user_detail array
       $activity["name"] = $row["name"];
       $activity["date"] = $row["date"];
       $activity["veryActive"] = $row["veryActive"];
       $activity["moderatelyActive"] = $row["moderatelyActive"];
       $activity["lightlyActive"] = $row["lightlyActive"];
       $activity["sedentaryActive"] = $row["sedentaryActive"];

        // push single product into final response array
        array_push($response["activity"], $activity);
    }
    // success
    $response["success"] = 1;


    // echoing JSON response
}
else {
    $response["activity"] = array();
    // temp user_detail array
   $activity["name"] = $username;
   $activity["date"] = $date;
   $activity["veryActive"] = 0;
   $activity["moderatelyActive"] = 0;
   $activity["lightlyActive"] = 0;
   $activity["sedentaryActive"] = 0;

    // push single product into final response array
    array_push($response["activity"], $activity);
    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
