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
$type_id = $_POST['type_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$complete = $_POST['complete'];
$accepted = $_POST['accepted'];
$type = $_POST['type'];
$confirm = $_POST['confirm'];

// check for empty result
$result = mysqli_query($db->con, "SELECT challenge_id FROM challenge ORDER BY challenge_id DESC LIMIT 1") or die(mysqli_error($db->con));
$count = 1;
if($result)
{
  while ($row = mysqli_fetch_array($result)) {
     $count = $row["challenge_id"] + 1;
  }
}
else{

}


  $result = mysqli_query($db->con, "INSERT INTO challenge(challenge_id, fb_user_id, type_id, start_date, end_date ,complete, accepted, type, confirm) VALUES('$count', '$fb_user_id', '$type_id', '$start_date' , '$end_date' ,  '$complete', '$accepted', '$type', '$confirm')") or die(mysqli_error($db->con));
  // check if row inserted or not
  if ($result)
  {
      $response["success"] = 1;
      $response["count"] = $count;
  }
  else
  {
      // failed to insert row
      $response["success"] = 0;
      // echoing JSON response
  }


    echo json_encode($response);

?>
