<?php

$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCm6L_qdKeVnOvo2N8pbMiMlx2PiZTDjkA' );

$familyId = $_POST['ID']; //receiver
$familyName = $_POST['familyName'];
$user = $_POST['sender_name'];


$result = mysqli_query($db->con, "SELECT name, gcm_token FROM user_detail where name = (SELECT name FROM family WHERE familyName = (SELECT familyName FROM familydetail WHERE id = '$familyId') AND isParents = 1)") or die(mysqli_error($db->con));

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


$message = $user . ' would like to join your family';
$title = $familyName;


$result = mysqli_query($db->con, "INSERT INTO message(name, post_name, message, type, title, isread) VALUES('$receiver', '$user', '$message', 'family_join', '$title', false )") or die(mysqli_error($db->con));


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
	'message' 	=> $user . ' would like to join your family',
	'title'		=> $user,
	'subtitle'	=> $familyName,
	'tickerText'	=> 'text',
  'type' => 'family_join',
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

?>
