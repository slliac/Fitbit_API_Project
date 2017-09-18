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
$title = $_POST['title'];

$result = mysqli_query($db->con, "SELECT challenge_id FROM challenge WHERE fb_user_id = '$fb_user_id' AND type_id = '$type_id' AND type = '$type'") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {
       $challenge_id = $row["challenge_id"];

    }
    $response["success"] = 1;

}
else
{
    $response["success"] = 0;

    // echo no users JSON
}

        $result = mysqli_query($db->con, "UPDATE challenge SET accepted = '1' WHERE fb_user_id = '$fb_user_id' AND challenge_id ='$challenge_id'") or die(mysqli_error($db->con));
        $result = mysqli_query($db->con, "SELECT challenge_id FROM challenge WHERE fb_user_id = '$fb_user_id' AND challenge_id = '$challenge_id' AND accepted = 0") or die(mysqli_error($db->con));
        if (mysqli_num_rows($result) == 0)
        {

          $result = mysqli_query($db->con, "SELECT DISTINCT datediff(end_date, start_date) as duration FROM challenge WHERE fb_user_id = '$fb_user_id' AND challenge_id ='$challenge_id'") or die(mysqli_error($db->con));
          if (mysqli_num_rows($result) > 0)
          {
              while ($row = mysqli_fetch_array($result))
              {
                  $day = $row["duration"];
              }
              $today = date("Y-m-d");

              $date = date_create(date("Y-m-d"));
              date_add($date, date_interval_create_from_date_string($day . ' days'));
              $date = date_format($date, 'Y-m-d');

              $result = mysqli_query($db->con, "UPDATE challenge SET confirm = '1', start_date = '$today', end_date = '$date' WHERE challenge_id = '$challenge_id'") or die(mysqli_error($db->con));
              $result = mysqli_query($db->con, "DELETE FROM message WHERE title = '$title' AND type = 'challenge' AND name = (SELECT name FROM user_detail WHERE fb_user_id = '$fb_user_id')") or die(mysqli_error($db->con));
          }


      }



  echo json_encode($response);


?>
