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


$result = mysqli_query($db->con, "SELECT name FROM family WHERE name = '$name'") or die(mysqli_error($db->con));
// check for empty result
if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    // success
    $response["success"] = 1;
    $response["message"] = $name;

    // echoing JSON response
}
else {
    $result = mysqli_query($db->con, "SELECT DISTINCT familydetail.familyName, familydetail.familyphoto, message.ID FROM familydetail JOIN family ON familydetail.familyName = family.familyName JOIN message ON family.name = message.name AND message.type = 'family_join' WHERE post_name = '$name'") or die(mysqli_error($db->con));
    if (mysqli_num_rows($result) > 0)
    {
        // looping through all results
        while ($row = mysqli_fetch_array($result))
        {
          $response["familyName"] = $row["familyName"];
          $response["image"] = $row["familyphoto"];
          $response["message_id"] = $row["ID"];
        }
        // success
        $response["success"] = 2;
        $response["message"] = $name;

        // echoing JSON response
    }
    else
    {
      $response["success"] = 0;
      $response["message"] = "No user_detail found";
    }


    // echo no users JSON
}
    echo json_encode($response);

?>
