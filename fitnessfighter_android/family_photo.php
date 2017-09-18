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


// check for empty result

$familyName = $_GET['familyName'];

$result = mysqli_query($db->con, "SELECT familyName, familyphoto, family_background FROM familydetail WHERE familyName = '$familyName'") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{

  while ($row = mysqli_fetch_array($result))
  {

    $response["familyName"] = $row["familyName"];
    $response["familyphoto"] = $row["familyphoto"];
    $response["family_background"] = $row["family_background"];
  }


    $response["success"] = 1;


}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
