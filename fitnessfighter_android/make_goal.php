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
$username = $_POST['fb_user_id'];
$date = $_POST['date'];
$result = mysqli_query($db->con, "SELECT * FROM fitbit_goal WHERE name = '$username' AND date = '$date'") or die(mysqli_error($db->con));
// check for empty result

if (mysqli_num_rows($result) <= 0)
{
    // looping through all results

    $result = mysqli_query($db->con, "SELECT * FROM user_goal WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));

    if(mysqli_num_rows($result) > 0)
    {

        while ($row = mysqli_fetch_array($result)) {
        $response["goals"] = array();
        // temp user_detail array
       $steps = $row["steps"];
       $floors = $row["floors"];
       $distance = $row["distance"];
       $activeMinutes = $row["activeMinutes"];
       $calories = $row["calories"];
       $members["steps"] = $row["steps"];
       $members["floors"] = $row["floors"];
       $members["distance"] = $row["distance"];
       $members["activeMinutes"] = $row["activeMinutes"];
       $members["calories"] = $row["calories"];
        // push single product into final response array
        array_push($response["goals"], $members);
      }

          $result = mysqli_query($db->con, "INSERT INTO fitbit_goal(name, date, steps, floors, distance, activeMinutes, calories)
          VALUES('$username', '$date' ,'$steps', '$floors', '$distance', '$activeMinutes', '$calories')") or die(mysqli_error($db->con));
          if($result)
          {
              $response["success"] = 1;
          }
          else{
              $response["success"] = 0;
          }

    }
    else{
            $result = mysqli_query($db->con, "INSERT INTO user_goal(fb_user_id, steps, floors, distance, activeMinutes, calories) VALUES('$username', '10000', '10', '8.05' , '30', '2634')") or die(mysqli_error($db->con));

            $result = mysqli_query($db->con, "SELECT * FROM user_goal WHERE fb_user_id = '$username'") or die(mysqli_error($db->con));

            if(mysqli_num_rows($result) > 0)
            {

                while ($row = mysqli_fetch_array($result)) {
                $response["goals"] = array();
                // temp user_detail array
               $steps = $row["steps"];
               $floors = $row["floors"];
               $distance = $row["distance"];
               $activeMinutes = $row["activeMinutes"];
               $calories = $row["calories"];
               $members["steps"] = $row["steps"];
               $members["floors"] = $row["floors"];
               $members["distance"] = $row["distance"];
               $members["activeMinutes"] = $row["activeMinutes"];
               $members["calories"] = $row["calories"];
                // push single product into final response array
                array_push($response["goals"], $members);
              }

                  $result = mysqli_query($db->con, "INSERT INTO fitbit_goal(name, date, steps, floors, distance, activeMinutes, calories)
                  VALUES('$username', '$date' ,'$steps', '$floors', '$distance', '$activeMinutes', '$calories')") or die(mysqli_error($db->con));
                  if($result)
                  {
                      $response["success"] = 1;
                  }
                  else{
                      $response["success"] = 0;
                  }

            }


    }



    // success

    // echoing JSON response
}
else {

      while ($row = mysqli_fetch_array($result)) {
      $response["goals"] = array();
      // temp user_detail array

     $members["steps"] = $row["steps"];
     $members["floors"] = $row["floors"];
     $members["distance"] = $row["distance"];
     $members["activeMinutes"] = $row["activeMinutes"];
     $members["calories"] = $row["calories"];
      // push single product into final response array
      array_push($response["goals"], $members);
    }

    $response["success"] = 2;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
