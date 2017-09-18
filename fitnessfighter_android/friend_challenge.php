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
define( 'API_ACCESS_KEY', 'AIzaSyCm6L_qdKeVnOvo2N8pbMiMlx2PiZTDjkA' );

$fb_user_id = $_POST['fb_user_id'];
$challenge_id = $_POST["challenge_id"];
$type_id = $_POST['type_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$complete = $_POST['complete'];
$accepted = $_POST['accepted'];
$type = $_POST['type'];
$challenge_title = $_POST['title'];
$user = $_POST['sender_name'];
$receiver = $_POST['receiver_name'];
$confirm = $_POST['confirm'];
// check for empty result


  $result = mysqli_query($db->con, "INSERT INTO challenge(challenge_id, fb_user_id, type_id, start_date, end_date ,complete, accepted, type, confirm) VALUES('$challenge_id', '$fb_user_id', '$type_id', '$start_date' , '$end_date' ,  '$complete', '$accepted', '$type', '$confirm')") or die(mysqli_error($db->con));
  // check if row inserted or not
  if ($result)
  {
      $response["success"] = 1;

      $result = mysqli_query($db->con, "SELECT gcm_token FROM user_detail WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));

      $response = array();
      $gcm_array = array();

      if (mysqli_num_rows($result) > 0)
      {
          // looping through all results

          while ($row = mysqli_fetch_array($result)) {
             $gcm_token = $row["gcm_token"];


             array_push($gcm_array, $gcm_token);
          }
          $response["success"] = 1;

      }
      else
      {
          $response["success"] = 0;
          $response["message"] = "No user_detail found";
          // echo no users JSON
      }


      $registrationIds = $gcm_array;


      $message = $user . ' would like to invite you';
      $title = $challenge_title;


      $result = mysqli_query($db->con, "INSERT INTO message(name, post_name, message, type, title, isread) VALUES('$receiver', '$user', '$message', 'challenge', '$title', false )") or die(mysqli_error($db->con));


      $result = mysqli_query($db->con, "select ID from message WHERE name = '$receiver' ORDER BY ID DESC LIMIT 1;") or die(mysqli_error($db->con));
      if (mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_array($result)) {

            $size = $row["ID"];

        }
      }
      else{
            $size = 1;

      }

      // prep the bundle
      $msg = array
      (
      	'message' 	=> $user . ' would like to invite you join challenge',
      	'title'		=> $challenge_title,
      	'subtitle'	=> 'subtitle',
      	'tickerText'	=> 'text',
        'type' => 'challenge_invite',
        'ID'  => $size,
      	'vibrate'	=> 1,
      	'sound'		=> 1,
      	'largeIcon'	=> 'large_icon',
      	'smallIcon'	=> 'small_icon'
      );






      $fields = array
      (
      	'registration_ids' 	=> $registrationIds,
      	'data'			=> $msg
      );

      $headers = array
      (
      	'Authorization: key=' . API_ACCESS_KEY,
      	'Content-Type: application/json'
      );

      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
      $result = curl_exec($ch );
      curl_close( $ch );
      echo json_encode($response);



  }
  else
  {
      // failed to insert row
      $response["success"] = 0;
      // echoing JSON response
  }


    echo json_encode($response);

?>
