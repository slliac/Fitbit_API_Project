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
$week_start = date("Y-m-d", strtotime("yesterday -6 day"));
$week_end = date("Y-m-d", strtotime("yesterday"));

mysqli_query($db->con,"CREATE TABLE temp_date(date DATE)") or die(mysqli_error($db->con));

$temp_num =0;
for($i =0;$i<7;$i++)
{
  $temp_date = date("Y-m-d", strtotime("yesterday -6 day +$temp_num day"));
  mysqli_query($db->con,"INSERT INTO temp_date VALUES('$temp_date')") or die(mysqli_error($db->con));
  $temp_num++;
}


$result_step = mysqli_query($db->con, "SELECT TESTING2.name, IFNULL(step,0) AS step FROM fitbit_summary RIGHT JOIN (SELECT user_detail.name, fb_user_id, date FROM user_detail CROSS JOIN (SELECT DISTINCT date FROM temp_date WHERE date BETWEEN '$week_start' AND '$week_end') AS TESTING WHERE familyName = '$familyName') AS TESTING2 ON TESTING2.fb_user_id = fitbit_summary.name AND fitbit_summary.date = TESTING2.date ORDER BY TESTING2.name, TESTING2.date") or die(mysqli_error($db->con));

$result_floors = mysqli_query($db->con, "SELECT TESTING2.name, IFNULL(floors,0) AS floors FROM fitbit_summary RIGHT JOIN (SELECT user_detail.name, fb_user_id, date FROM user_detail CROSS JOIN (SELECT DISTINCT date FROM temp_date WHERE date BETWEEN '$week_start' AND '$week_end') AS TESTING WHERE familyName = '$familyName') AS TESTING2 ON TESTING2.fb_user_id = fitbit_summary.name AND fitbit_summary.date = TESTING2.date ORDER BY TESTING2.name, TESTING2.date") or die(mysqli_error($db->con));

$result_caloriesOut = mysqli_query($db->con, "SELECT TESTING2.name, IFNULL(caloriesOut,0) AS caloriesOut FROM fitbit_summary RIGHT JOIN (SELECT user_detail.name, fb_user_id, date FROM user_detail CROSS JOIN (SELECT DISTINCT date FROM temp_date WHERE date BETWEEN '$week_start' AND '$week_end') AS TESTING WHERE familyName = '$familyName') AS TESTING2 ON TESTING2.fb_user_id = fitbit_summary.name AND fitbit_summary.date = TESTING2.date ORDER BY TESTING2.name, TESTING2.date") or die(mysqli_error($db->con));

$result_distance = mysqli_query($db->con, "SELECT TESTING2.name, IFNULL(distance,0) AS distance FROM fitbit_summary RIGHT JOIN (SELECT user_detail.name, fb_user_id, date FROM user_detail CROSS JOIN (SELECT DISTINCT date FROM temp_date WHERE date BETWEEN '$week_start' AND '$week_end') AS TESTING WHERE familyName = '$familyName') AS TESTING2 ON TESTING2.fb_user_id = fitbit_summary.name AND fitbit_summary.date = TESTING2.date ORDER BY TESTING2.name, TESTING2.date") or die(mysqli_error($db->con));

$result_active = mysqli_query($db->con, "SELECT TESTING2.name, IFNULL(veryActive+moderatelyActive,0) AS active FROM fitbit_activity RIGHT JOIN (SELECT user_detail.name, fb_user_id, date FROM user_detail CROSS JOIN (SELECT DISTINCT date FROM temp_date WHERE date BETWEEN '$week_start' AND '$week_end') AS TESTING WHERE familyName = '$familyName') AS TESTING2 ON TESTING2.fb_user_id = fitbit_activity.name AND fitbit_activity.date = TESTING2.date ORDER BY TESTING2.name, TESTING2.date") or die(mysqli_error($db->con));

$result_7dates =  mysqli_query($db->con, "SELECT DISTINCT date FROM temp_date WHERE date BETWEEN '$week_start' AND '$week_end'") or die(mysqli_error($db->con));

mysqli_query($db->con,"DROP TABLE temp_date") or die(mysqli_error($db->con));

$response["7days_step"] = array();
$response["7days_floors"] = array();
$response["7days_caloriesOut"] = array();
$response["7days_distance"] = array();
$response["7days_active"] = array();
$response["7dates"] = array();

if (mysqli_num_rows($result_step) > 0)
{

    while ($row = mysqli_fetch_array($result_7dates)) {
        $date = date('d/m',strtotime($row["date"]));
        array_push($response["7dates"],$date);
    }
        $response["success"] = 1;
        $dayCount = 1;
        $sevendays = NULL;
    while ($row = mysqli_fetch_array($result_step)) {
      if($dayCount == 1)
      {
        $sevendays["name"] = $row["name"];
        $sevendays["7days_data"] = array();
      }
        $data = $row["step"];
      array_push($sevendays["7days_data"],$data);

      if($dayCount%7!=0)
      {
        $dayCount++;
      }
      else
      {
         array_push($response["7days_step"], $sevendays);
         $dayCount =1;
      }


}

    while ($row = mysqli_fetch_array($result_floors)) {
      if($dayCount == 1)
      {
        $sevendays["name"] = $row["name"];
        $sevendays["7days_data"] = array();
      }
        $data = $row["floors"];
      array_push($sevendays["7days_data"],$data);

      if($dayCount%7!=0)
      {
        $dayCount++;
      }
      else
      {
         array_push($response["7days_floors"], $sevendays);
         $dayCount =1;
      }

}

     while ($row = mysqli_fetch_array($result_caloriesOut)) {
       if($dayCount == 1)
       {
         $sevendays["name"] = $row["name"];
         $sevendays["7days_data"] = array();
       }
         $data = $row["caloriesOut"];
       array_push($sevendays["7days_data"],$data);

       if($dayCount%7!=0)
       {
         $dayCount++;
       }
       else
       {
          array_push($response["7days_caloriesOut"], $sevendays);
          $dayCount =1;
       }

}

     while ($row = mysqli_fetch_array($result_distance)) {
       if($dayCount == 1)
       {
         $sevendays["name"] = $row["name"];
         $sevendays["7days_data"] = array();
       }
         $data = $row["distance"];
       array_push($sevendays["7days_data"],$data);

       if($dayCount%7!=0)
       {
         $dayCount++;
       }
       else
       {
          array_push($response["7days_distance"], $sevendays);
          $dayCount =1;
       }

}

     while ($row = mysqli_fetch_array($result_active)) {
       if($dayCount == 1)
       {
         $sevendays["name"] = $row["name"];
         $sevendays["7days_data"] = array();
       }
         $data = $row["active"];
       array_push($sevendays["7days_data"],$data);

       if($dayCount%7!=0)
       {
         $dayCount++;
       }
       else
       {
          array_push($response["7days_active"], $sevendays);
          $dayCount =1;
       }

}


}
else{
      $response["success"] = 0;
}

    echo json_encode($response);

?>
