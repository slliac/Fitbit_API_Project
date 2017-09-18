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


$result = mysqli_query($db->con, "SELECT lastsync FROM user_detail WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));
// check for empty result
if ($result)
{

    // success
    $response["last_sync"] = $row["lastsync"];
    $response["success"] = 1;

    // echoing JSON response
}
else {

    $response["success"] = 0;
    // echo no users JSON
}
    echo json_encode($response);

?>
