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

define( 'API_ACCESS_KEY', 'AIzaSyCm6L_qdKeVnOvo2N8pbMiMlx2PiZTDjkA' );

// get all products from products table
$username = $_POST['user_name'];
$familyName = $_POST['familyName'];
$message_id = $_POST['message_id'];


$result = mysqli_query($db->con, "SELECT name, gcm_token FROM user_detail where name = '$username'") or die(mysqli_error($db->con));

$response = array();
$gcm_array = array();

if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {
       $gcm_token = $row["gcm_token"];
       $receiver = $row["name"];

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


$result = mysqli_query($db->con, "SELECT ID from message WHERE ID = '$message_id'") or die(mysqli_error($db->con));

if($result)
{


$result = mysqli_query($db->con, "INSERT INTO family(name, isParents, familyName) VALUES('$username', 0, '$familyName')") or die(mysqli_error($db->con));
$result = mysqli_query($db->con, "UPDATE user_detail SET familyName = '$familyName' WHERE name = '$username'");
// check for empty result

  if ($result)
  {
      // looping through all results

      // success
      $response["success"] = 1;
      $result = mysqli_query($db->con, "DELETE FROM message WHERE name = '$username' AND type = 'family'") or die(mysqli_error($db->con));
      // echoing JSON response



      // prep the bundle
      $msg = array
      (
      	'message' 	=> 'Accepted',
      	'title'		=> '',
      	'subtitle'	=> '',
      	'tickerText'	=> 'text',
        'type' => 'family_join',
        'ID'  => '-1',
      	'vibrate'	=> 1,
      	'sound'		=> 1
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
  else {

      $response["success"] = 0;


      // echo no users JSON
  }
}
else{
      $response["success"] = 0;
}



    echo json_encode($response);

?>
