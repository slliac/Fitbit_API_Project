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
 $user_id = $_POST['user_id'];
 $name = $_POST['name'];
 $dob = $_POST['dob'];
 $gender = $_POST['gender'];
 $job = $_POST['job'];
 $weight = $_POST['weight'];
 $height = $_POST['height'];
 $peronal_info = $_POST['peronal_info'];

 $result = mysqli_query($db->con,"UPDATE user_detail SET name='$name', dob='$dob', gender='$gender', user_job='$job', weight='$weight', height='$height', message='$personal_info' WHERE fb_user_id='$user_id'");

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
