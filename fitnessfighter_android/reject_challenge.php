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
$sender_name = $_POST['sender_name'];

$result = mysqli_query($db->con, "SELECT a.challenge_id FROM challenge a JOIN challenge b ON a.challenge_id = b.challenge_id AND b.fb_user_id = (SELECT fb_user_id FROM user_detail WHERE name = '$sender_name') AND a.complete = '0' WHERE a.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {
       $challenge_id = $row["challenge_id"];

    }
    $response["success"] = 1;

}
else
{
    $response["success"] = 0;

    // echo no users JSON
}

$result = mysqli_query($db->con, "DELETE FROM challenge WHERE challenge_id = '$challenge_id'") or die(mysqli_error($db->con));

$result = mysqli_query($db->con, "DELETE FROM message WHERE post_name = '$sender_name' AND type = 'challenge'") or die(mysqli_error($db->con));

if ($result)
{
    $response["success"] = 1;
}
else{
      $response["success"] = 0;

}

  echo json_encode($response);


?>
