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
$name = $_GET['name'];
$familyName = $_GET['familyName'];

$result = mysqli_query($db->con, "SELECT user_detail.name ,fb_user_id, profile_image FROM friend JOIN user_detail ON friend.friend_name = user_detail.name JOIN game_family ON game_family.familyName = user_detail.familyName AND user_detail.familyName != '$familyName' AND friend.name = '$name'") or die(mysqli_error($db->con));
// check for empty result
if (mysqli_num_rows($result) > 0)
{
    // looping through all results
        $response["members"] = array();
    while ($row = mysqli_fetch_array($result)) {

        // temp user_detail array
       $members["name"] = $row["name"];
       $members["profile_image"] = $row["profile_image"];
       $members["fb_user_id"] = $row["fb_user_id"];

        // push single product into final response array
        array_push($response["members"], $members);
    }
    // success
    $response["success"] = 1;
    $response["message"] = $name;

    // echoing JSON response
}
else {

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
