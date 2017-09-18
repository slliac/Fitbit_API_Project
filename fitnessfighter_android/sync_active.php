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
   $sedentaryActive = $_POST['sedentaryActive'];
   $lightlyActive = $_POST['lightlyActive'];
   $moderatelyActive = $_POST['fairlyActive'];
   $veryActive = $_POST['veryActive'];



   $result = mysqli_query($db->con, "SELECT date FROM fitbit_activity WHERE name = '$fb_user_id' AND date = '$date'") or die(mysqli_error($db->con));

   if (mysqli_num_rows($result) <= 0)
   {
     //no data, do insertion
     $result = mysqli_query($db->con,"INSERT INTO fitbit_activity (name , date, lightlyActive, moderatelyActive, sedentaryActive, veryActive, dateUpdate)
     VALUES ('$fb_user_id', '$date', '$lightlyActive',  '$moderatelyActive', '$sedentaryActive', '$veryActive', now())") or die(mysqli_error($db->con));
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
     $result = mysqli_query($db->con,"UPDATE fitbit_activity SET name = '$fb_user_id' , date = '$date', lightlyActive = '$lightlyActive', moderatelyActive = '$moderatelyActive', sedentaryActive = '$sedentaryActive', veryActive = '$veryActive', dateUpdate = now() WHERE name = '$fb_user_id' AND date = '$date'") or die(mysqli_error($db->con));
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
