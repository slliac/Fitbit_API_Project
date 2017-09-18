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
$familyName = $_GET['familyName'];
$fb_user_id = $_GET['fb_user_id'];

$today =  date("Y-m-d", strtotime("today"));
$before_yesterday = date("Y-m-d", strtotime($today . ' - 2 day'));
$three_day_before = date("Y-m-d", strtotime($today . ' - 3 day'));


$response["family_members"] = array();
$result = mysqli_query($db->con, "SELECT job_level.* , job_picture.job_walk, job_picture.job_attack, job_picture.job_icon, job_picture.job_figure, user_character.fb_user_id, user_character.cumulated_exp - c.cumulated_exp as cumulated_exp, game_level.required_exp , profile_image, user_detail.name FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN game_level c ON c.level = game_level.level - 1 JOIN job_level ON game_level.level = job_level.level AND user_character.job_name = job_level.job_name JOIN job_picture ON job_picture.job_name = job_level.job_name WHERE familyName = '$familyName' AND user_character.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 1;


      while ($row = mysqli_fetch_array($result))
      {
          $family_member["job_name"] = $row["job_name"];
          $family_member["level"] = $row["level"];
          $family_member["fb_user_id"] = $row["fb_user_id"];
          $family_member["strength"] = $row["strength"];
          $family_member["constitution"] = $row["constitution"];
          $family_member["agility"] = $row["agility"];
          $family_member["intelligence"] = $row["intelligence"];
          $family_member["attack"] = $row["attack"];
          $family_member["defense"] = $row["defense"];
          $family_member["attack_speed"] = $row["attack_speed"];
          $family_member["job_figure"] = $row["job_figure"];
          $family_member["job_icon"] = $row["job_icon"];
          $family_member["job_walk"] = $row["job_walk"];
          $family_member["job_attack"] = $row["job_attack"];
          $family_member["stone_required"] = $row["stone_required"];
          $family_member["profile_image"] = $row["profile_image"];
          $family_member["name"] = $row["name"];
          $family_member["cumulated_exp"] = $row["cumulated_exp"];
          $family_member["required_exp"] = $row["required_exp"];
          $family_member["status"] = 10;
          $response["user_equipments"][$row["fb_user_id"]] = array();
          array_push($response["family_members"], $family_member);
      }


    $result = mysqli_query($db->con, "SELECT job_level.* , job_picture.job_walk, job_picture.job_attack, job_picture.job_icon, job_picture.job_figure, user_character.fb_user_id, user_character.cumulated_exp - c.cumulated_exp as cumulated_exp, game_level.required_exp , profile_image, user_detail.name FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN game_level c ON c.level = game_level.level - 1 JOIN job_level ON game_level.level = job_level.level AND user_character.job_name = job_level.job_name JOIN job_picture ON job_picture.job_name = job_level.job_name WHERE familyName = '$familyName' AND user_character.fb_user_id <> '$fb_user_id'") or die(mysqli_error($db->con));


    if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          $family_member["job_name"] = $row["job_name"];
          $family_member["level"] = $row["level"];
          $family_member["fb_user_id"] = $row["fb_user_id"];
          $family_member["strength"] = $row["strength"];
          $family_member["constitution"] = $row["constitution"];
          $family_member["agility"] = $row["agility"];
          $family_member["intelligence"] = $row["intelligence"];
          $family_member["attack"] = $row["attack"];
          $family_member["defense"] = $row["defense"];
          $family_member["attack_speed"] = $row["attack_speed"];
          $family_member["job_figure"] = $row["job_figure"];
          $family_member["job_icon"] = $row["job_icon"];
          $family_member["job_walk"] = $row["job_walk"];
          $family_member["job_attack"] = $row["job_attack"];
          $family_member["stone_required"] = $row["stone_required"];
          $family_member["profile_image"] = $row["profile_image"];
          $family_member["name"] = $row["name"];
          $family_member["cumulated_exp"] = $row["cumulated_exp"];
          $family_member["required_exp"] = $row["required_exp"];
          $response["user_equipments"][$row["fb_user_id"]] = array();
          array_push($response["family_members"], $family_member);
      }
    }


    $result = mysqli_query($db->con, "SELECT name as fb_user_id , ROUND(AVG(step) / 10000 * 100) as status FROM fitbit_summary WHERE name IN (SELECT fb_user_id FROM user_detail WHERE familyName = '$familyName') AND  date BETWEEN '$three_day_before' AND '$before_yesterday' GROUP BY name") or die(mysqli_error($db->con));

    if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        for($i = 0; $i < count($response["family_members"]); $i++)
        {
          if($response["family_members"][$i]["fb_user_id"] == $row["fb_user_id"])
          {
              $response["family_members"][$i]["status"] = $row["status"];
          }
        }
      }
    }


    $result = mysqli_query($db->con, "SELECT equipment.equipment_id, equipment.attack as attack, equipment.image as image ,equipment.type , equipment.hp as hp, equipment.defense as defense, equipment.intelligence as intelligence, equipment.attack_speed  as attack_speed, equipment.flee as flee, equipment.hit as hit, equity_box.fb_user_id FROM equity_box JOIN equipment ON equipment.equipment_id = equity_box.equipment_id WHERE equity_box.familyName = '$familyName' AND fb_user_id IS NOT NULL") or die(mysqli_error($db->con));


    if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $equipment["equipment_id"] = $row["equipment_id"];
        $equipment["image"] = $row["image"];
        $equipment["type"] = $row["type"];
        $equipment["attack"] = $row["attack"];
        $equipment["hp"] = $row["hp"];
        $equipment["defense"] = $row["defense"];
        $equipment["intelligence"] = $row["intelligence"];
        $equipment["attack_speed"] = $row["attack_speed"];
        $equipment["flee"] = $row["flee"];
        $equipment["hit"] = $row["hit"];
        $equipment["fb_user_id"] = $row["fb_user_id"];
        array_push($response["user_equipments"][$row["fb_user_id"]], $equipment);

      }
    }

}

else{
  // check for empty result
    $response["success"] = 0;

}
    echo json_encode($response);



?>
