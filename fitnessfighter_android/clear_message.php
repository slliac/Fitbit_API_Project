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
$ID = $_POST['ID'];

// check for empty result


$result = mysqli_query($db->con, "DELETE FROM message WHERE ID = '$ID'") or die(mysqli_error($db->con));
if ($result)
{
      $response["success"] = 1;
}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
