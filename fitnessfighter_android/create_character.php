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
$fb_user_id = $_POST['fb_user_id'];
$job_name = $_POST['job_name'];
$last_update = $_POST['last_update'];

// check for empty result
$result = mysqli_query($db->con, "INSERT INTO user_character(fb_user_id, job_name, cumulated_exp, last_update, ticket, remaining_step, last_day_step) VALUES('$fb_user_id', '$job_name', '0', NULL, '10' ,'0', '0')") or die(mysqli_error($db->con));

if($result)
{
             $response["success"] = 1;
}
else{
           $response["success"] = 0;
}


    echo json_encode($response);

?>
