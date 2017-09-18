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
$username = $_GET['fb_user_id'];

$result = mysqli_query($db->con, "SELECT user_detail.*, family.isParents FROM user_detail JOIN family ON user_detail.name = family.name WHERE fb_user_id = '$username' UNION SELECT *, '0' FROM user_detail WHERE fb_user_id = '$username' AND user_detail.familyName IS NULL") or die(mysqli_error($db->con));
// check for empty result

if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {
        $response["members"] = array();
        // temp user_detail array
       $members["name"] = $row["name"];
       $members["dob"] = $row["dob"];
       $members["job"] = $row["user_job"];
       $members["height"] = $row["height"];
       $members["weight"] = $row["weight"];
       $members["image"] = $row["profile_image"];
       $members["background_image"] = $row["background_image"];
       $members["lastSync"] = $row["lastsync"];
       $members["memberSince"] = $row["memberSince"];
       $members["gender"] = $row["gender"];
       $members["last_login_date"] = $row["last_login_date"];
       $members["family_name"] = $row["familyName"];
       $members["isParents"] = $row["isParents"];
        // push single product into final response array
        array_push($response["members"], $members);
    }
    // success
    $response["success"] = 1;
    $response["user"] = $username;
    $today = date("Y-m-d");


    $result = mysqli_query($db->con, "UPDATE user_detail SET last_login_date = '$today' WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));
    $result = mysqli_query($db->con, "SELECT familyphoto,family_background FROM user_detail, familydetail WHERE user_detail.familyName = familydetail.familyName AND fb_user_id = '$username'") or die(mysqli_error($db->con));


    while ($row = mysqli_fetch_array($result)) {
      $response["familyphoto"] = $row["familyphoto"];
      $response["familybackground"] = $row["family_background"];
    }



    // echoing JSON response
}
else {

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
