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
 $user_id = $_POST['fb_user_id'];
 $gcm = $_POST['gcm'];


 $result = mysqli_query($db->con,"UPDATE user_detail SET gcm_token = NULL WHERE gcm_token = '$gcm'");

if($result)
{
      $response["success"] = 1;
}
else
{
    $response["success"] = 0;
}


$result = mysqli_query($db->con,"UPDATE user_detail SET gcm_token = '$gcm' WHERE fb_user_id = '$user_id'");

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
