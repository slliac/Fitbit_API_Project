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

$familyName = $_POST['familyName'];
$fb_user_id = $_POST['fb_user_id'];
$position = $_POST['position'];
$original_position = $_POST['original_position'];

$result = mysqli_query($db->con, "UPDATE equity_box SET fb_user_id = null WHERE familyName = '$familyName' AND fb_user_id = '$fb_user_id' AND position = '$original_position'") or die(mysqli_error($db->con));

$result = mysqli_query($db->con, "SELECT fb_user_id FROM equity_box WHERE familyName = '$familyName' AND position = '$position' AND fb_user_id IS NULL OR fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
if (mysqli_num_rows($result) == 0)
{
    $response["success"] = 0;
    $result = mysqli_query($db->con, "SELECT equipment.*, equity_box.position, equity_box.fb_user_id FROM equity_box JOIN equipment ON equity_box.equipment_id = equipment.equipment_id WHERE familyName = '$familyName'") or die(mysqli_error($db->con));
    if (mysqli_num_rows($result) > 0)
    {
      $response["equipments"] = array();
      while ($row = mysqli_fetch_array($result))
      {
          // temp user_detail array
         $equipment["equipment_id"] = $row["equipment_id"];
         $equipment["type"] = $row["type"];
         $equipment["job_name"] = $row["job_name"];
         $equipment["hp"] = $row["hp"];
         $equipment["attack"] = $row["attack"];
         $equipment["defense"] = $row["defense"];
         $equipment["intelligence"] = $row["intelligence"];
         $equipment["flee"] = $row["flee"];
         $equipment["hit"] = $row["hit"];
         $equipment["image"] = $row["image"];
         $equipment["position"] = $row["position"];
         $equipment["fb_user_id"] = $row["fb_user_id"];

          // push single product into final response array
          array_push($response["equipments"], $equipment);
      }

    }

    $result = mysqli_query($db->con, "SELECT user_character.job_name, game_level.level, user_character.fb_user_id, job_figure, user_detail.name, box.box_size FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_family ON user_detail.familyName = game_family.familyName JOIN box ON game_family.box_level = box.box_level JOIN job_picture ON user_character.job_name = job_picture.job_name JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) WHERE user_detail.familyName = '$familyName' AND user_character.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
    if (mysqli_num_rows($result) > 0)
    {
        $response["user_character"] = array();
        while ($row = mysqli_fetch_array($result)) {
            $user_character["job_name"] = $row["job_name"];
            $user_character["level"] = $row["level"];
            $user_character["job_figure"] = $row["job_figure"];
            $user_character["name"] = $row["name"];
            $user_character["box_size"] = $row["box_size"];
            array_push($response["user_character"], $user_character);
        }
    }
}
else
{
  $result = mysqli_query($db->con, "UPDATE equity_box SET fb_user_id = '$fb_user_id' WHERE familyName = '$familyName' AND position = '$position'") or die(mysqli_error($db->con));
  if ($result)
  {
      // looping through all results

      // success
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
              	'original_position' 	=>  $original_position,
                'position' => $position,
                'ID'  => '-3',

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


      // echoing JSON response
  }
  else {
      $response["success"] = 0;


  }
}

// check for empty result


    echo json_encode($response);

?>
