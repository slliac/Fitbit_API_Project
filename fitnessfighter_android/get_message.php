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
$username = $_GET['name'];


$result = mysqli_query($db->con, "SELECT message.*, familydetail.familyphoto FROM message inner JOIN familydetail ON message.title = familydetail.familyName WHERE message.name = '$username' AND message.type = 'family_invite' ORDER BY ID DESC") or die(mysqli_error($db->con));
// check for empty result
$response["message"] = array();
$response["success"] = 0;
if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {

        // temp user_detail array
       $message["ID"] = $row["ID"];
       $message["name"] = $row["name"];
       $message["post_name"] = $row["post_name"];
       $message["message"] = $row["message"];
       $message["type"] = $row["type"];
       $message["title"] = $row["title"];
       $message["profile_image"] = $row["familyphoto"];
        // push single product into final response array
        array_push($response["message"], $message);
    }
    // success
    $response["success"] = 1;
    $result = mysqli_query($db->con, "UPDATE message SET isread = true WHERE name = '$username'") or die(mysqli_error($db->con));

    $result = mysqli_query($db->con, "SELECT message.*, user_detail.profile_image FROM message inner JOIN user_detail ON message.post_name = user_detail.name WHERE message.name = '$username' AND (message.type = 'family_join' OR message.type = 'friend_request') ORDER BY ID DESC") or die(mysqli_error($db->con));

    if (mysqli_num_rows($result) > 0)
    {
        // looping through all results

        while ($row = mysqli_fetch_array($result)) {

            // temp user_detail array
           $message["ID"] = $row["ID"];
           $message["name"] = $row["name"];
           $message["post_name"] = $row["post_name"];
           $message["message"] = $row["message"];
           $message["type"] = $row["type"];
           $message["title"] = $row["title"];
           $message["profile_image"] = $row["profile_image"];
            // push single product into final response array
            array_push($response["message"], $message);
        }
    }


}


  $result = mysqli_query($db->con, "SELECT message.*, user_detail.profile_image FROM message inner JOIN user_detail ON message.post_name = user_detail.name WHERE message.name = '$username' AND (message.type = 'family_join' OR message.type = 'friend_request') ORDER BY ID DESC") or die(mysqli_error($db->con));

  if (mysqli_num_rows($result) > 0)
  {
      // looping through all results
      $response["success"] = 1;
      while ($row = mysqli_fetch_array($result))
      {
          // temp user_detail array
         $message["ID"] = $row["ID"];
         $message["name"] = $row["name"];
         $message["post_name"] = $row["post_name"];
         $message["message"] = $row["message"];
         $message["type"] = $row["type"];
         $message["title"] = $row["title"];
         $message["profile_image"] = $row["profile_image"];
          // push single product into final response array
          array_push($response["message"], $message);
      }
          $result = mysqli_query($db->con, "UPDATE message SET isread = true WHERE name = '$username'") or die(mysqli_error($db->con));
  }

  $result = mysqli_query($db->con, "SELECT message.*, user_detail.profile_image FROM message inner JOIN user_detail ON message.post_name = user_detail.name WHERE message.name = '$username' AND message.type = 'challenge'") or die(mysqli_error($db->con));

  if (mysqli_num_rows($result) > 0)
  {
      // looping through all results
      $response["success"] = 1;
      while ($row = mysqli_fetch_array($result))
      {
          // temp user_detail array
         $message["ID"] = $row["ID"];
         $message["name"] = $row["name"];
         $message["post_name"] = $row["post_name"];
         $message["message"] = $row["message"];
         $message["type"] = $row["type"];
         $message["title"] = $row["title"];
         $message["profile_image"] = $row["profile_image"];
          // push single product into final response array
          array_push($response["message"], $message);
      }
          $result = mysqli_query($db->con, "UPDATE message SET isread = true WHERE name = '$username'") or die(mysqli_error($db->con));
  }






    echo json_encode($response);

?>
