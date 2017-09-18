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
$username = $_GET['name'];

// check for empty result


$result = mysqli_query($db->con, "SELECT COUNT(*) FROM message WHERE name = '$username' AND isread = false AND type != 'Friend' AND type != 'Family'") or die(mysqli_error($db->con));
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_array($result)) {

      $response["size"] = $row["COUNT(*)"];
      $response["success"] = 1;
  }
}
else{
      $response["size"] = 0;
      $response["success"] = 0;
}

    echo json_encode($response);

?>
