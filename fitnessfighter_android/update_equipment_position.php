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

$familyName = $_GET['familyName'];
$fb_user_id = $_GET['fb_user_id'];
$position = $_GET['position'];
$eid = $_GET['eid'];
$my_id = $_GET['my_id'];
$time = $_GET['time'];
$new_position = $_GET['new_position'];

if($fb_user_id == 'null')
{
  $result = mysqli_query($db->con, "UPDATE equity_box SET fb_user_id = null, equipment_id = '$eid' WHERE familyName = '$familyName' AND position = '$position'") or die(mysqli_error($db->con));
}
else
{
  $result = mysqli_query($db->con, "UPDATE equity_box SET fb_user_id = '$fb_user_id', equipment_id = '$eid' WHERE familyName = '$familyName' AND position = '$position'") or die(mysqli_error($db->con));
}


if ($result && $time == '1')
{
    $response["success"] = 1;

    $result = mysqli_query($db->con, "SELECT gcm_token FROM user_detail WHERE familyName = '$familyName' AND fb_user_id != '$my_id' ") or die(mysqli_error($db->con));

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

        $registrationIds = $gcm_array;
        // prep the bundle
        $msg = array
        (
        	'old_position' 	=>  $new_position,
          'new_position' => $position,
          'ID'  => '-2',

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



    }
    else
    {
        $response["success"] = 0;
        $response["message"] = "No user_detail found";
        // echo no users JSON
    }





}

else if($time == '0')
{
        $response["success"] = 1;
}
else{
      $response["success"] = 0;
}

// check for empty result


    echo json_encode($response);

?>
