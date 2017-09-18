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
$type = $_POST['type'];

// check for empty result

  $result = mysqli_query($db->con, "SELECT challenge_id FROM challenge WHERE fb_user_id = '$fb_user_id' AND type = '$type' AND complete = '0'") or die(mysqli_error($db->con));


if($result)
{
  while ($row = mysqli_fetch_array($result)) {
     $challenge_id = $row["challenge_id"];
  }

  if($type == "family")
  {
      $result = mysqli_query($db->con, "UPDATE challenge SET complete = '1' WHERE challenge_id = '$challenge_id'") or die(mysqli_error($db->con));
  }
  else {
      $result = mysqli_query($db->con, "UPDATE challenge SET complete = '1' WHERE challenge_id = '$challenge_id' AND fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
  }


}
else{
      $response["success"] = 0;
}




    echo json_encode($response);

?>
