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
$familyName = $_GET['FamilyName'];

// check for empty result


$result = mysqli_query($db->con, "SELECT user_detail.name, profile_image, fb_user_id FROM user_detail LEFT JOIN familydetail ON user_detail.familyName = familydetail.familyName WHERE user_detail.familyName = '$familyName'") or die(mysqli_error($db->con));

$response["family_members"] = array();

if (mysqli_num_rows($result) > 0)
{
        $response["success"] = 1;

    while ($row = mysqli_fetch_array($result)) {
	$family_member["name"] = $row["name"];
	$family_member["profile_image"] = $row["profile_image"];
	$family_member["fb_user_id"] = $row["fb_user_id"];

        array_push($response["family_members"], $family_member);



}


}
else{
      $response["success"] = 0;
}

    echo json_encode($response);

?>
