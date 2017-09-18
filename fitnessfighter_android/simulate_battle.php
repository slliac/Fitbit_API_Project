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


// check for empty result

$result = mysqli_query($db->con, "SELECT familyName FROM game_family ORDER BY rand() LIMIT 2") or die(mysqli_error($db->con));
$count = 0;
if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 1;
    while ($row = mysqli_fetch_array($result))
    {
      if($count == 0)
      {
            $attack_family = $row["familyName"];
      }
      else
      {
            $defense_family = $row["familyName"];
      }
      $count = $count + 1;
    }


    $win = rand(0, 1);
    $point = rand(18, 25);
    if($win == 0)
    {
      $point = $point * -1;
    }

      $result = mysqli_query($db->con, "INSERT INTO battle(attack_family, defense_family, date, point, award_received) VALUES ('$attack_family', '$defense_family', now(), '$point', '0')") or die(mysqli_error($db->con));

}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
