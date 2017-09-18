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

$award = $_POST['award'];
$fb_user_id = $_POST['fb_user_id'];
$type = $_POST['type'];


// check for empty result
$result = mysqli_query($db->con, "SELECT cumulated_exp FROM user_character WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));

if($result)
{
  while ($row = mysqli_fetch_array($result)) {
     $exp = $row["cumulated_exp"] + $award;
  }


  $result = mysqli_query($db->con, "SELECT challenge_id FROM challenge WHERE fb_user_id = '$fb_user_id' AND type = '$type' AND complete = '0'") or die(mysqli_error($db->con));

  if($result)
  {
      while ($row = mysqli_fetch_array($result)) {
         $challenge_id = $row["challenge_id"];
      }

      $result = mysqli_query($db->con, "UPDATE challenge SET complete = '1' WHERE challenge_id = '$challenge_id'") or die(mysqli_error($db->con));
      $result = mysqli_query($db->con, "UPDATE user_character SET cumulated_exp = '$exp' WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
      // check if row inserted or not
      if ($result)
      {
          $response["success"] = 1;
      }
      else
      {
          // failed to insert row
          $response["success"] = 0;
          // echoing JSON response
      }

  }


}
else{
      $response["success"] = 0;
}




    echo json_encode($response);

?>
