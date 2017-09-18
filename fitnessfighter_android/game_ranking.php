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

$monday =  date("Y-m-d", strtotime("this week monday"));
$sunday =  date("Y-m-d", strtotime("this week sunday"));
$familyName = $_GET['familyName'];

$result = mysqli_query($db->con, "SELECT sum(point) as point, attack_family, familyphoto FROM battle JOIN familydetail ON battle.attack_family = familydetail.familyName WHERE date BETWEEN '$monday' AND '$sunday' GROUP BY attack_family ORDER BY sum(point) DESC") or die(mysqli_error($db->con));
$number = 1;
if (mysqli_num_rows($result) > 0)
{
  $response["ranking"] = array();
  while ($row = mysqli_fetch_array($result))
  {

    $ranking["number"] = $number;
    $ranking["family"] = $row["attack_family"];
    $ranking["point"] = $row["point"] + 1000;
    $ranking["familyPhoto"] = $row["familyphoto"];
    $number = $number + 1;
    array_push($response["ranking"], $ranking);
  }


    $response["success"] = 1;

    $result = mysqli_query($db->con, "SELECT point , defense_family,date , familyphoto FROM battle JOIN familydetail ON familydetail.familyName = battle.defense_family WHERE attack_family = '$familyName' AND date BETWEEN '$monday' AND '$sunday' ORDER BY battle_id DESC LIMIT 10") or die(mysqli_error($db->con));

    if (mysqli_num_rows($result) > 0)
    {
      $response["records"] = array();
      while ($row = mysqli_fetch_array($result))
      {
        $record["date"] = $row["date"];
        $record["point"] = $row["point"];
        $record["defense_family"] = $row["defense_family"];
        $record["familyPhoto"] = $row["familyphoto"];

        array_push($response["records"], $record);
      }
    }



}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
