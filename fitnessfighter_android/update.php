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


if(isset($_POST['height']) && isset($_POST['weight']))
{
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $fb_user_id = $_POST['fb_user_id'];

  if(isset($_POST['image']))
  {
    $profile_image = $_POST['image'];
    $result = mysqli_query($db->con, "UPDATE user_detail SET height = '$height', weight = '$weight', profile_image = '$profile_image' WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
  }
  else if(isset($_POST['background_image']))
  {
    $background_image = $_POST['background_image'];
    $result = mysqli_query($db->con, "UPDATE user_detail SET height = '$height', weight = '$weight', background_image = '$background_image' WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
  }


  if ($result) {
      // successfully inserted into database
      $response["success"] = 1;
      // echoing JSON response
  } else {
      // failed to insert row
      $response["success"] = 0;
      // echoing JSON response
  }

}

else{

  $response["success"] = 0;
}



    echo json_encode($response);

?>
