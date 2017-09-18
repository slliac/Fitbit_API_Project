<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$familyName = $_GET['FamilyName'];

// check for empty result
$week_start = date("Y-m-d", strtotime("this week monday"));
$week_end = date("Y-m-d", strtotime("this week sunday"));


$result_step = mysqli_query($db->con, "SELECT user_detail.name, profile_image, SUM(step) AS Total_step FROM user_detail,fitbit_summary WHERE user_detail.fb_user_id = fitbit_summary.name AND user_detail.familyName = '$familyName' AND date BETWEEN '$week_start' AND '$week_end' GROUP BY user_detail.name ORDER BY Total_step DESC") or die(mysqli_error($db->con));

$result_floors = mysqli_query($db->con, "SELECT user_detail.name, profile_image, SUM(floors) AS Total_floors FROM user_detail,fitbit_summary WHERE user_detail.fb_user_id = fitbit_summary.name AND user_detail.familyName = '$familyName' AND date BETWEEN '$week_start' AND '$week_end' GROUP BY user_detail.name ORDER BY Total_floors DESC") or die(mysqli_error($db->con));

$result_caloriesOut = mysqli_query($db->con, "SELECT user_detail.name, profile_image, SUM(caloriesOut) AS Total_caloriesOut FROM user_detail,fitbit_summary WHERE user_detail.fb_user_id = fitbit_summary.name AND user_detail.familyName = '$familyName' AND date BETWEEN '$week_start' AND '$week_end' GROUP BY user_detail.name ORDER BY Total_caloriesOut DESC") or die(mysqli_error($db->con));

$result_distance = mysqli_query($db->con, "SELECT user_detail.name, profile_image, SUM(distance) AS Total_distance FROM user_detail,fitbit_summary WHERE user_detail.fb_user_id = fitbit_summary.name AND user_detail.familyName = '$familyName' AND date BETWEEN '$week_start' AND '$week_end' GROUP BY user_detail.name ORDER BY Total_distance DESC") or die(mysqli_error($db->con));

$result_active = mysqli_query($db->con, "SELECT user_detail.name, profile_image, SUM(veryActive+moderatelyActive) AS Total_active FROM user_detail,fitbit_activity WHERE user_detail.fb_user_id = fitbit_activity.name AND user_detail.familyName = '$familyName' AND date BETWEEN '$week_start' AND '$week_end' GROUP BY user_detail.name ORDER BY Total_active DESC") or die(mysqli_error($db->con));


$response["rank_step"] = array();
$response["rank_floors"] = array();
$response["rank_caloriesOut"] = array();
$response["rank_distance"] = array();
$response["rank_active"] = array();

if (mysqli_num_rows($result_step) > 0)
{
        $response["success"] = 1;

    while ($row = mysqli_fetch_array($result_step)) {
 $rank_step["name"] = $row["name"];
 $rank_step["profile_image"] = $row["profile_image"];
         $rank_step["Total_step"] = $row["Total_step"];

         array_push($response["rank_step"], $rank_step);

}

    while ($row = mysqli_fetch_array($result_floors)) {
 $rank_floors["name"] = $row["name"];
 $rank_floors["profile_image"] = $row["profile_image"];
         $rank_floors["Total_floors"] = $row["Total_floors"];

         array_push($response["rank_floors"], $rank_floors);
}

     while ($row = mysqli_fetch_array($result_caloriesOut)) {
 $rank_caloriesOut["name"] = $row["name"];
 $rank_caloriesOut["profile_image"] = $row["profile_image"];
         $rank_caloriesOut["Total_caloriesOut"] = $row["Total_caloriesOut"];

         array_push($response["rank_caloriesOut"], $rank_caloriesOut);

}

     while ($row = mysqli_fetch_array($result_distance)) {
 $rank_distance["name"] = $row["name"];
 $rank_distance["profile_image"] = $row["profile_image"];
         $rank_distance["Total_distance"] = $row["Total_distance"];

         array_push($response["rank_distance"], $rank_distance);

}

     while ($row = mysqli_fetch_array($result_active)) {
 $rank_active["name"] = $row["name"];
 $rank_active["profile_image"] = $row["profile_image"];
         $rank_active["Total_active"] = $row["Total_active"];

         array_push($response["rank_active"], $rank_active);

}


}
else{
      $response["success"] = 0;
}

    echo json_encode($response);

?>
