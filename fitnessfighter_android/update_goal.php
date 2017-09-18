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
$username = $_POST['fb_user_id'];
$steps = $_POST['steps'];
$floors = $_POST['floors'];
$distance = $_POST['distance'];
$calories = $_POST['calories'];
$activeMinutes = $_POST['activeMinutes'];
$today = date("Y-m-d");


$result = mysqli_query($db->con, "UPDATE user_goal SET steps = '$steps',  floors = '$floors', distance = '$distance', calories = '$calories', activeMinutes = $activeMinutes  WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));
// check for empty result

if ($result)
{
    $result = mysqli_query($db->con, "UPDATE fitbit_goal SET steps = '$steps',  floors = '$floors', distance = '$distance', calories = '$calories', activeMinutes = $activeMinutes  WHERE name = '$username' AND date = '$today'") or die(mysqli_error($db->con));

    if($result)
    {
        $response["success"] = 1;
    }
    else
    {
        $response["success"] = 0;
    }

    // success



    // echoing JSON response
}
else {

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
