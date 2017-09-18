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
$last_sync = $_POST['last_sync'];

$result = mysqli_query($db->con, "UPDATE user_detail SET lastsync = '$last_sync' WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));

$result = mysqli_query($db->con, "UPDATE user SET lastsync = '$last_sync' WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));

// check for empty result
if ($result)
{

    // success
    $response["success"] = 1;

    // echoing JSON response
}
else {

    $response["success"] = 0;
    // echo no users JSON
}
    echo json_encode($response);

?>
