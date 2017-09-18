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


$result = mysqli_query($db->con, "SELECT profile_image FROM user_detail WHERE user_detail.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
// check for empty result
if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {

        // temp user_detail array
       $response["profile_image"] = $row["profile_image"];


    }
    // success
    $response["success"] = 1;





    // echoing JSON response
}
else {

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
