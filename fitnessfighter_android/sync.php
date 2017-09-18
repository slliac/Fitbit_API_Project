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

   $fb_user_id = $_POST['fb_user_id'];
   $date = $_POST['date'];
   $activityCalories = $_POST['activityCalories'];
   $caloriesBMR = $_POST['caloriesBMR'];
   $caloriesOut = $_POST['caloriesOut'];
   $elevation = $_POST['elevation'];
   $floors = $_POST['floors'];
   $steps = $_POST['steps'];
   $distance = $_POST['distance'];
   $oorCalories = $_POST['oorCalories'];
   $oor = $_POST['oor'];
   $fatburnCalories = $_POST['fatburnCalories'];
   $fatburn = $_POST['fatburn'];
   $cardioCalories = $_POST['cardioCalories'];
   $cardio = $_POST['cardio'];
   $peakCalories = $_POST['peakCalories'];
   $peak = $_POST['peak'];
   $restingHeartRate = $_POST['restingHeartRate'];


   $result = mysqli_query($db->con, "SELECT date FROM fitbit_summary WHERE name = '$fb_user_id' AND date = '$date'") or die(mysqli_error($db->con));

   if (mysqli_num_rows($result) <= 0)
   {
     //no data, do insertion
     $result = mysqli_query($db->con,"INSERT INTO fitbit_summary (name , step, floors,  elevation, activityCalories, caloriesBMR, caloriesOut, fatburn, cardio,peak, oor,fatburnCalories, cardioCalories, peakCalories, oorCalories, date, updatedDate, restingHeartRate, distance)
     VALUES ('$fb_user_id', '$steps', '$floors',  '$elevation', '$activityCalories', '$caloriesBMR', '$caloriesOut', '$fatburn', '$cardio', '$peak', '$oor', '$fatburnCalories', '$cardioCalories', '$peakCalories', '$oorCalories','$date', now(), '$restingHeartRate', '$distance')") or die(mysqli_error($db->con));
     if($result)
     {
       $response["success"] = 1;
     }
     else
     {
       $response["success"] = 0;
     }

   }
   else
   {
     //data exists, do update  try again
     $result = mysqli_query($db->con,"UPDATE fitbit_summary SET name = '$fb_user_id' , step = '$steps', floors = '$floors' , elevation = '$elevation', activityCalories = '$activityCalories', caloriesBMR = '$caloriesBMR', caloriesOut = '$caloriesOut', fatburn = '$fatburn', cardio = '$cardio' , peak = '$peak', oor = '$oor', fatburnCalories = '$fatburnCalories', cardioCalories = '$cardioCalories', peakCalories = '$peakCalories', oorCalories = '$oorCalories', date = '$date', updatedDate = now(), restingHeartRate = '$restingHeartRate', distance = '$distance' WHERE name = '$fb_user_id' AND date = '$date'") or die(mysqli_error($db->con));
     if($result)
     {
       $response["success"] = 1;
     }
     else
     {
       $response["success"] = 0;
     }
   }

   echo json_encode($response);


?>
