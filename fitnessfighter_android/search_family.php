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


$result = mysqli_query($db->con, "SELECT id, familyName, familyphoto FROM familydetail WHERE familyName LIKE '$name'") or die(mysqli_error($db->con));
// check for empty result
if (mysqli_num_rows($result) > 0)
{
    // looping through all results
        $response["families"] = array();
    while ($row = mysqli_fetch_array($result)) {

        // temp user_detail array
       $families["ID"] = $row["id"];
       $families["name"] = $row["familyName"];
       $families["image"] = $row["familyphoto"];

        // push single product into final response array
        array_push($response["families"], $families);
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
