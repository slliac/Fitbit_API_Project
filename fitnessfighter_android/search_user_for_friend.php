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
$sender = $_GET['sender'];

$result = mysqli_query($db->con, "SELECT user_detail.name, fb_user_id, profile_image, message.post_name, friend.name AS friend_name, message.ID  FROM user_detail LEFT OUTER JOIN message ON message.name = user_detail.name LEFT OUTER JOIN friend ON message.name = friend.friend_name AND message.type = 'friend_request' WHERE user_detail.name LIKE '$name' AND user_detail.name <> '$sender'") or die(mysqli_error($db->con));
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
       $members["post_name"] = $row["post_name"];
       $members["friend_name"] = $row["friend_name"];
       $members["ID"] = $row["ID"];
        // push single product into final response array
        array_push($response["members"], $members);
    }
    // success
    $response["success"] = 1;
    $response["message"] = $name;

    // echoing JSON response
    $result = mysqli_query($db->con, "SELECT friend_name FROM friend WHERE name = '$sender'") or die(mysqli_error($db->con));
    $response["friends"] = array();
    if (mysqli_num_rows($result) > 0)
    {
        // looping through all results

        while ($row = mysqli_fetch_array($result)) {
            $friends["name"] = $row["friend_name"];

        array_push($response["friends"], $friends);
        }

    }



}
else {

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
