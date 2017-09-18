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

$familyName = $_GET['familyName'];
$fb_user_id = $_GET['fb_user_id'];
$position = $_GET['position'];


$result = mysqli_query($db->con, "UPDATE equity_box SET fb_user_id = null WHERE familyName = '$familyName' AND fb_user_id = '$fb_user_id' AND position = '$position'") or die(mysqli_error($db->con));
if ($result)
{
    $response["success"] = 1;


              $result = mysqli_query($db->con, "SELECT gcm_token FROM user_detail WHERE familyName = '$familyName' AND fb_user_id != '$fb_user_id' ") or die(mysqli_error($db->con));

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
                    'position' => $position,
                    'ID'  => '-4',

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




}
else{
      $response["success"] = 0;
}

// check for empty result


    echo json_encode($response);

?>
