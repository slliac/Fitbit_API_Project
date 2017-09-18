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
$type_id = $_POST['type_id'];
$type = $_POST['type'];

if($type == 'friend')
{
  if($type_id == "1")
  {
    $result = mysqli_query($db->con, "SELECT challenge_id, a.fb_user_id, start_date, end_date, accepted, a.confirm, user_detail.name, profile_image, sum(step) as steps, sum(floors) as floors FROM challenge a JOIN user_detail ON a.fb_user_id = user_detail.fb_user_id JOIN fitbit_summary ON fitbit_summary.name = a.fb_user_id WHERE a.challenge_id = (SELECT b.challenge_id FROM challenge b WHERE b.fb_user_id = '$fb_user_id' AND b.type_id = '$type_id' AND b.type = '$type' AND complete ='0') AND  (fitbit_summary.date BETWEEN DATE(a.start_date) AND DATE(a.end_date)) AND a.start_date < user_detail.lastsync  GROUP BY fitbit_summary.name UNION SELECT challenge_id, a.fb_user_id, start_date, end_date, accepted,a.confirm, user_detail.name, profile_image, 0 as steps, 0 as floors FROM challenge a JOIN user_detail ON a.fb_user_id = user_detail.fb_user_id WHERE a.challenge_id = (SELECT b.challenge_id FROM challenge b WHERE b.fb_user_id = '$fb_user_id' AND b.type_id = '$type_id' AND b.type = '$type' AND complete ='0') AND  (a.start_date > user_detail.lastsync ) GROUP BY user_detail.fb_user_id ORDER BY steps DESC") or die(mysqli_error($db->con));

  }
  else {
    $result = mysqli_query($db->con, "SELECT challenge_id, a.fb_user_id, start_date, end_date, accepted, a.confirm, user_detail.name, profile_image, sum(step) as steps, sum(floors) as floors FROM challenge a JOIN user_detail ON a.fb_user_id = user_detail.fb_user_id JOIN fitbit_summary ON fitbit_summary.name = a.fb_user_id WHERE a.challenge_id = (SELECT b.challenge_id FROM challenge b WHERE b.fb_user_id = '$fb_user_id' AND b.type_id = '$type_id' AND b.type = '$type' AND complete ='0') AND  (fitbit_summary.date BETWEEN DATE(a.start_date) AND DATE(a.end_date)) AND a.start_date < user_detail.lastsync  GROUP BY fitbit_summary.name UNION SELECT challenge_id, a.fb_user_id, start_date, end_date, accepted,a.confirm, user_detail.name, profile_image, 0 as steps, 0 as floors FROM challenge a JOIN user_detail ON a.fb_user_id = user_detail.fb_user_id  WHERE a.challenge_id = (SELECT b.challenge_id FROM challenge b WHERE b.fb_user_id = '$fb_user_id' AND b.type_id = '$type_id' AND b.type = '$type' AND complete ='0') AND  (a.start_date > user_detail.lastsync ) GROUP BY user_detail.fb_user_id ORDER BY floors DESC") or die(mysqli_error($db->con));

  }
}
else
{
  $result = mysqli_query($db->con, "SELECT challenge_id, a.fb_user_id, start_date, end_date, accepted, a.confirm, user_detail.name, profile_image, sum(step) as steps, sum(floors) as floors FROM challenge a JOIN user_detail ON a.fb_user_id = user_detail.fb_user_id JOIN fitbit_summary ON fitbit_summary.name = a.fb_user_id WHERE a.challenge_id = (SELECT b.challenge_id FROM challenge b WHERE b.fb_user_id = '$fb_user_id' AND b.type_id = '$type_id' AND b.type = '$type' AND complete ='0') AND  (fitbit_summary.date BETWEEN DATE(a.start_date) AND DATE(a.end_date)) AND a.start_date < user_detail.lastsync AND complete ='0' GROUP BY fitbit_summary.name UNION SELECT challenge_id, a.fb_user_id, start_date, end_date, accepted,a.confirm, user_detail.name, profile_image, 0 as steps, 0 as floors FROM challenge a JOIN user_detail ON a.fb_user_id = user_detail.fb_user_id JOIN fitbit_summary ON fitbit_summary.name = a.fb_user_id WHERE a.challenge_id = (SELECT b.challenge_id FROM challenge b WHERE b.fb_user_id = '$fb_user_id' AND b.type_id = '$type_id' AND b.type = '$type' AND complete = '0') AND  (a.start_date > user_detail.lastsync ) AND complete = '0' GROUP BY fitbit_summary.name") or die(mysqli_error($db->con));
}

if (mysqli_num_rows($result) > 0)
{
    // looping through all results
  $response["challenge_details"] = array();
    while ($row = mysqli_fetch_array($result)) {
      $challenge_id = $row["challenge_id"];
      $challenge_details["challenge_id"] = $row["challenge_id"];
      $challenge_details["fb_user_id"] = $row["fb_user_id"];
      $challenge_details["start_date"] = $row["start_date"];
      $challenge_details["end_date"] = $row["end_date"];
      $challenge_details["accepted"] = $row["accepted"];
      $challenge_details["name"] = $row["name"];
      $challenge_details["profile_image"] = $row["profile_image"];
      $challenge_details["steps"] = $row["steps"];
      $challenge_details["floors"] = $row["floors"];
      $challenge_details["confirm"] = $row["confirm"];
      array_push($response["challenge_details"], $challenge_details);

    }
    $response["success"] = 1;

}
else
{
    $response["success"] = 0;

    // echo no users JSON
}

  echo json_encode($response);


?>
