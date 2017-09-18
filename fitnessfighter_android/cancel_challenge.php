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
$type = $_POST['type'];
$title = $_POST['title'];

$result = mysqli_query($db->con, "SELECT challenge_id FROM challenge WHERE fb_user_id = '$fb_user_id' AND type_id = '$type_id' AND type = '$type'") or die(mysqli_error($db->con));

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


$result = mysqli_query($db->con, "UPDATE game_family SET money = money + 500 WHERE familyName IN (SELECT familyName FROM user_detail WHERE fb_user_id IN (SELECT challenge.fb_user_id FROM challenge WHERE challenge_id = '$challenge_id' AND accepted = '1'))") or die(mysqli_error($db->con));

$result = mysqli_query($db->con, "DELETE FROM challenge WHERE challenge_id = '$challenge_id'") or die(mysqli_error($db->con));

if ($result)
{
    $response["success"] = 1;
    $result = mysqli_query($db->con, "DELETE FROM message WHERE title = '$title' AND type = 'challenge' AND post_name = (SELECT name FROM user_detail WHERE fb_user_id = '$fb_user_id')") or die(mysqli_error($db->con));
}
else{
      $response["success"] = 0;

}

  echo json_encode($response);


?>
