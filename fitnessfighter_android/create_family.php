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
$familyName = $_POST['familyName'];
$name = $_POST['name'];
$isParent = $_POST['isParent'];
$fb_user_id = $_POST['fb_user_id'];


$result = mysqli_query($db->con, "SELECT * FROM family WHERE familyName = '$familyName'") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 2;
    echo json_encode($response);
}
else {
  $result = mysqli_query($db->con, "INSERT INTO family(name, isParents, familyName) VALUES('$name', '$isParent', '$familyName') ") or die(mysqli_error($db->con));
  $result = mysqli_query($db->con, "UPDATE user_detail SET familyName = '$familyName' WHERE fb_user_id = '$fb_user_id'");
  // check for empty result
  if ($result)
  {

      // success
      $response["success"] = 1;

  $result = mysqli_query($db->con, "DELETE FROM message WHERE name = '$name' AND type = 'family'") or die(mysqli_error($db->con));


      // echoing JSON response
  }
  else {

      $response["success"] = 0;
      // echo no users JSON
  }
      echo json_encode($response);
}





?>
