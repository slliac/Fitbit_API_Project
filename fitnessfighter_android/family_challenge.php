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
             $response["success"] = 1;
}
else{
           $response["success"] = 0;
}


  $result = mysqli_query($db->con, "SELECT fb_user_id FROM user_detail WHERE familyName = (SELECT familyName FROM user_detail WHERE fb_user_id = '$fb_user_id')") or die(mysqli_error($db->con));
  $user_id = array();
  if($result)
  {
    while ($row = mysqli_fetch_array($result))
    {
       array_push($user_id, $row["fb_user_id"]);
    }

    for ($i=0; $i<sizeof($user_id); $i++)
    {
      $uid = $user_id[$i];
      $result = mysqli_query($db->con, "INSERT INTO challenge(challenge_id, fb_user_id, type_id, start_date, end_date ,complete, accepted, type, confirm) VALUES('$count', '$uid', '$type_id', '$start_date' , '$end_date' ,  '$complete', '$accepted', '$type', '$confirm')") or die(mysqli_error($db->con));
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
    // failed to insert row
    $response["success"] = 0;
    // echoing JSON response
  }





    echo json_encode($response);

?>
