<?php

/*
 * Following code will list all the products
 */
date_default_timezone_set('Asia/Hong_Kong');
// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

define( 'API_ACCESS_KEY', 'AIzaSyCm6L_qdKeVnOvo2N8pbMiMlx2PiZTDjkA' );


// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$fb_user_id = $_POST['fb_user_id'];
$sender_name = $_POST['sender_name'];


$result = mysqli_query($db->con, "SELECT money FROM game_family WHERE familyName = (SELECT familyName FROM user_detail WHERE fb_user_id = '$fb_user_id')") or die(mysqli_error($db->con));
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_array($result))
  {
      $money = $row["money"];
  }
      if($money >= 500)
      {
                $result = mysqli_query($db->con, "UPDATE game_family SET money = $money - 500 WHERE familyName = (SELECT familyName FROM user_detail WHERE fb_user_id = '$fb_user_id')") or die(mysqli_error($db->con));
        $result = mysqli_query($db->con, "UPDATE challenge a, challenge b SET a.accepted = '1' WHERE a.fb_user_id = '$fb_user_id' AND a.challenge_id IN (SELECT b.challenge_id  WHERE b.fb_user_id = (SELECT b.fb_user_id FROM user_detail WHERE name = '$sender_name')) AND a.complete = '0' AND a.type = 'friend'") or die(mysqli_error($db->con));

        if ($result)
        {
            $response["success"] = 1;
            $result = mysqli_query($db->con, "SELECT c.challenge_id FROM challenge c WHERE c.accepted = '0' AND c.challenge_id = (SELECT a.challenge_id FROM challenge a WHERE a.fb_user_id = '$fb_user_id' AND a.type = 'friend' AND a.challenge_id IN (SELECT b.challenge_id FROM challenge b  WHERE b.fb_user_id = (SELECT fb_user_id FROM user_detail WHERE name = '$sender_name'))) AND complete = 0 AND confirm = 0") or die(mysqli_error($db->con));
            if (mysqli_num_rows($result) <= 0)
            {

                // looping through all results
                $result = mysqli_query($db->con, "SELECT DISTINCT datediff(a.end_date, a.start_date) as duration FROM challenge a WHERE a.fb_user_id = '$fb_user_id' AND a.challenge_id IN (SELECT b.challenge_id FROM challenge b  WHERE b.fb_user_id = (SELECT fb_user_id FROM user_detail WHERE name = '$sender_name')) AND a.complete = '0'  AND a.type = 'friend'") or die(mysqli_error($db->con));

                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_array($result))
                    {
                        $day = $row["duration"];
                    }
                    $today = date("Y-m-d H:i:s");

                    $date = date_create(date("Y-m-d H:i:s"));
                    date_add($date, date_interval_create_from_date_string($day . ' days'));
                    $date = date_format($date, 'Y-m-d H:i:s');

                    $result = mysqli_query($db->con, "UPDATE challenge a, challenge b SET a.confirm = '1', a.start_date = '$today', a.end_date = '$date' WHERE a.challenge_id IN (SELECT b.challenge_id  WHERE b.fb_user_id = (SELECT b.fb_user_id FROM user_detail WHERE name = '$sender_name')) AND a.complete = '0'  AND a.type = 'friend'") or die(mysqli_error($db->con));


                    //gcm

                    $result = mysqli_query($db->con, "SELECT name, gcm_token FROM user_detail where fb_user_id IN (SELECT a.fb_user_id FROM challenge a WHERE a.challenge_id = (SELECT r.challenge_id FROM challenge r WHERE r.fb_user_id = '$fb_user_id' AND r.type = 'friend' AND r.challenge_id IN (SELECT b.challenge_id FROM challenge b  WHERE b.fb_user_id = (SELECT fb_user_id FROM user_detail WHERE name = '$sender_name'))))") or die(mysqli_error($db->con));

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


                    if ($result)
                    {
                        // looping through all results

                        // success
                        $response["success"] = 1;
                        // echoing JSON response

                        // prep the bundle
                        $msg = array
                        (
                        	'message' 	=> 'Challenges started',
                        	'title'		=> 'Challenges started!',
                        	'subtitle'	=> '',
                        	'tickerText'	=> 'text',
                          'type' => 'Challenge start',
                          'ID'  => '10',
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

                    }
                    else {

                        $response["success"] = 0;


                        // echo no users JSON
                    }






                }



            }
          }
          else{
                $response["success"] = 0;

          }
      }
      else {
        $response["success"] = 3; //do not have enough money
      }

}
else {
  $response["success"] = 2;   //no family
}


  echo json_encode($response);


?>
