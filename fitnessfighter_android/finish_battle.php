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

$attack_family = $_POST['attack_family'];
$defense_family = $_POST['defense_family'];
$point = $_POST['point'];
// get all products from products table


// check for empty result

$result = mysqli_query($db->con, "INSERT INTO battle(attack_family, defense_family, date, point, award_received) VALUES ('$attack_family', '$defense_family', now(), '$point', '0')") or die(mysqli_error($db->con));
if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 1;


}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
