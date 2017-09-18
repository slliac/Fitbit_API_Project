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


$result = mysqli_query($db->con, "SELECT shop.equipment_id, position, equipment.equipment_name, equipment.type, equipment.job_name, equipment.hp, equipment.attack, equipment.defense, equipment.intelligence, equipment.flee, equipment.hit, equipment.flee, equipment.attack_speed ,equipment.image, equipment.price FROM shop JOIN equipment ON equipment.equipment_id = shop.equipment_id ORDER BY position") or die(mysqli_error($db->con));
if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 1;
    $response["shop_items"] = array();
  while ($row = mysqli_fetch_array($result)) {
      $shop_item["position"] = $row["position"];
      $shop_item["equipment_id"] = $row["equipment_id"];
      $shop_item["equipment_name"] = $row["equipment_name"];
      $shop_item["type"] = $row["type"];
      $shop_item["job_name"] = $row["job_name"];
      $shop_item["hp"] = $row["hp"];
      $shop_item["attack"] = $row["attack"];
      $shop_item["defense"] = $row["defense"];
      $shop_item["intelligence"] = $row["intelligence"];
      $shop_item["flee"] = $row["flee"];
      $shop_item["hit"] = $row["hit"];
      $shop_item["attack_speed"] = $row["attack_speed"];
      $shop_item["image"] = $row["image"];
      $shop_item["price"] = $row["price"];
      array_push($response["shop_items"], $shop_item);

  }
}
else{

      $response["success"] = 0;
}

    echo json_encode($response);

?>
