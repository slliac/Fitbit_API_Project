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
$date = $_GET['date'];

$result = mysqli_query($db->con, "SELECT * FROM fitbit_summary WHERE name = '$username' AND date = '$date'") or die(mysqli_error($db->con));
// check for empty result

if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {
        $response["summary"] = array();
        // temp user_detail array
       $summary["name"] = $row["name"];
       $summary["steps"] = $row["step"];
       $summary["floors"] = $row["floors"];
       $summary["elevation"] = $row["elevation"];
       $summary["activityCalories"] = $row["activityCalories"];
       $summary["caloriesBMR"] = $row["caloriesBMR"];
       $summary["caloriesOut"] = $row["caloriesOut"];
       $summary["fatburn"] = $row["fatburn"];
       $summary["cardio"] = $row["cardio"];
       $summary["peak"] = $row["peak"];
       $summary["oor"] = $row["oor"];
       $summary["fatburnCalories"] = $row["fatburnCalories"];
       $summary["cardioCalories"] = $row["cardioCalories"];
       $summary["peakCalories"] = $row["peakCalories"];
       $summary["oorCalories"] = $row["oorCalories"];
       $summary["restingHeartRate"] = $row["restingHeartRate"];
       $summary["distance"] = $row["distance"];
       $summary["date"] = $row["date"];
        // push single product into final response array
        array_push($response["summary"], $summary);
    }
    // success
    $response["success"] = 1;


    // echoing JSON response
}
else {

    $response["summary"] = array();
    // temp user_detail array
   $summary["name"] = $username;
   $summary["steps"] = "0";
   $summary["floors"] = "0";
   $summary["elevation"] = "0";
   $summary["activityCalories"] = "0";
   $summary["caloriesBMR"] = "0";
   $summary["caloriesOut"] = "0";
   $summary["fatburn"] = "0";
   $summary["cardio"] = "0";
   $summary["peak"] = "0";
   $summary["oor"] = "0";
   $summary["fatburnCalories"] = "0";
   $summary["cardioCalories"] = "0";
   $summary["peakCalories"] = "0";
   $summary["oorCalories"] = "0";
   $summary["restingHeartRate"] = "0";
   $summary["distance"] = "0";
   $summary["date"] = $date;
    // push single product into final response array
    array_push($response["summary"], $summary);

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
