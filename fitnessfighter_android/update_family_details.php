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



  $familyName = $_POST['familyName'];

  if(isset($_POST['family_profile_image']))
  {
    $profile_image = $_POST['family_profile_image'];
    $result = mysqli_query($db->con, "UPDATE familydetail SET familyphoto = '$profile_image' WHERE familyName = '$familyName'") or die(mysqli_error($db->con));
    if($result)
    {
            $response["success"] = 1;
    }
    else{
                $response["success"] = 0;
    }
  }
  else if(isset($_POST['family_background_image']))
  {
    $background_image = $_POST['family_background_image'];
    $result = mysqli_query($db->con, "UPDATE familydetail SET family_background = '$background_image' WHERE familyName = '$familyName'") or die(mysqli_error($db->con));
    if($result)
    {
            $response["success"] = 1;
    }
    else{
                $response["success"] = 0;
    }
  }
  else{
          $response["success"] = 0;
  }






    echo json_encode($response);

?>
