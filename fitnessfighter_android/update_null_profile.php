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
 $fb_user_id = $_POST['fb_user_id'];
 $profile_image = $_POST['profile_image'];


 $result = mysqli_query($db->con,"UPDATE user_detail SET profile_image='$profile_image' WHERE fb_user_id='$fb_user_id'");

if($result)
{
      $response["success"] = 1;
}
else
{
    $response["success"] = 0;
}

    echo json_encode($response);

?>
