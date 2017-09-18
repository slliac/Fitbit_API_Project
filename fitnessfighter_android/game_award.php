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

$familyName = $_GET['familyName'];

// get all products from products table


// check for empty result

$day = date("Y-m-d", strtotime("this week monday"));

$result = mysqli_query($db->con, "SELECT date FROM battle WHERE attack_family = '$familyName' AND award_received ='0' AND date < '$day'  ORDER BY date ASC LIMIT 1") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 1;
    while ($row = mysqli_fetch_array($result))
    {
        $monday = date("Y-m-d", strtotime("this week monday", strtotime("$row[date]")));
        $sunday = date("Y-m-d", strtotime("this week sunday", strtotime("$row[date]")));
    }

    $result = mysqli_query($db->con, "SELECT sum(point) as point, attack_family FROM battle WHERE date BETWEEN '$monday' AND '$sunday' GROUP BY attack_family ORDER BY sum(point) DESC") or die(mysqli_error($db->con));
    $response["number"] = 1;
    while ($row = mysqli_fetch_array($result))
    {
        if($familyName == $row["attack_family"])
        {
          break;
        }
        $response["number"] = $response["number"] + 1;
    }
    $response["award"] = 0;
    if($response["number"] == 1)
    {
      $response["award"] = 3000;
    }
    else if($response["number"] == 2)
    {
      $response["award"] = 1000;
    }
    else if($response["number"] == 3)
    {
      $response["award"] = 500;
    }
    else if($response["number"] > 3 && $response["number"] <= 10)
    {
      $response["award"] = 300;
    }
    else if($response["number"] > 10 && $response["number"] <= 100)
    {
      $response["award"] = 100;
    }
    else
    {
      $response["award"] = 50;
    }

        $result = mysqli_query($db->con, "SELECT money FROM game_family WHERE familyName = '$familyName'") or die(mysqli_error($db->con));
        if (mysqli_num_rows($result) > 0)
        {
          while ($row = mysqli_fetch_array($result))
          {
              $response["money"] = $row["money"];
          }
            $response["money"] = $response["money"] + $response["award"];
            $result = mysqli_query($db->con, "UPDATE game_family SET money = '$response[money]' WHERE familyName = '$familyName'") or die(mysqli_error($db->con));
            $result = mysqli_query($db->con, "UPDATE battle SET award_received = '1' WHERE attack_family = '$familyName' AND DATE BETWEEN '$monday' AND '$sunday'") or die(mysqli_error($db->con));
        }


}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
