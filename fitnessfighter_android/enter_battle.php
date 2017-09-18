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


$today =  date("Y-m-d", strtotime("today"));
$before_yesterday = date("Y-m-d", strtotime($today . ' - 2 day'));
$three_day_before = date("Y-m-d", strtotime($today . ' - 3 day'));


// get all products from products table
$familyName = $_GET['familyName'];
$fb_user_id = $_GET['fb_user_id'];
$ticket = $_GET['ticket'] - 1;
$money = $_GET['money'];

$result = mysqli_query($db->con, "SELECT familyName,count(*) as size FROM user_detail group by familyName having count(*) >= (SELECT count(*) FROM user_detail WHERE familyName ='$familyName') AND familyName <> '$familyName' ORDER BY rand() LIMIT 1") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    $response["success"] = 1;

    $result2 = mysqli_query($db->con, "UPDATE user_character SET ticket = ticket - 1 WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));

    $result2 = mysqli_query($db->con, "UPDATE game_family SET money = '$money' WHERE familyName = '$familyName'") or die(mysqli_error($db->con));


    while ($row = mysqli_fetch_array($result))
    {

       $response["enemy_familyName"] = $row["familyName"];
    }


    $result = mysqli_query($db->con, "SELECT familyName, familyphoto from familydetail WHERE familyName = '$familyName' OR familyName = '$response[enemy_familyName]'") or die(mysqli_error($db->con));

    if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          if($row["familyName"] == $familyName)
          {
            $response["familyPhoto"] = $row["familyphoto"];
          }
          else {
            $response["enemyPhoto"] = $row["familyphoto"];
          }


      }
    }

    $response["family_members"] = array();
    $result = mysqli_query($db->con, "SELECT job_level.* , job_picture.job_walk, job_picture.job_attack, job_picture.job_icon, user_character.fb_user_id FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN job_level ON game_level.level = job_level.level AND user_character.job_name = job_level.job_name JOIN job_picture ON job_picture.job_name = job_level.job_name WHERE familyName = '$familyName' AND user_character.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
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
          $family_member["job_icon"] = $row["job_icon"];
          $family_member["job_walk"] = $row["job_walk"];
          $family_member["job_attack"] = $row["job_attack"];
          $family_member["stone_required"] = $row["stone_required"];
          $family_member["status"] = 10;
          array_push($response["family_members"], $family_member);
      }
    }


      $result = mysqli_query($db->con, "SELECT job_level.*, job_picture.job_walk, job_picture.job_attack, job_picture.job_icon,  user_character.fb_user_id FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN job_level ON game_level.level = job_level.level AND user_character.job_name = job_level.job_name JOIN job_picture ON job_picture.job_name = job_level.job_name  WHERE familyName = '$familyName' AND user_character.fb_user_id <> '$fb_user_id' ORDER BY rand() LIMIT 4") or die(mysqli_error($db->con));
      $familyCount = 1;

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
            $family_member["job_icon"] = $row["job_icon"];
            $family_member["job_walk"] = $row["job_walk"];
            $family_member["job_attack"] = $row["job_attack"];
            $family_member["stone_required"] = $row["stone_required"];
            $family_member["status"] = 10;
            $familyCount = $familyCount + 1;
            array_push($response["family_members"], $family_member);
        }
      }

      $response["count"] = $familyCount;
      //select enemy_familyMember


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



    $result = mysqli_query($db->con, "SELECT job_level.*, job_picture.job_walk, job_picture.job_attack, job_picture.job_icon, user_character.fb_user_id  FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN job_level ON job_level.level = game_level.level AND job_level.job_name = user_character.job_name JOIN job_picture ON job_picture.job_name = job_level.job_name WHERE familyName <> '$familyName' ORDER BY rand() LIMIT $familyCount") or die(mysqli_error($db->con));
      $response["enemy_members"] = array();
      if (mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_array($result))
        {
            $enemy_member["job_name"] = $row["job_name"];
            $enemy_member["level"] = $row["level"];
            $enemy_member["fb_user_id"] = $row["fb_user_id"];
            $enemy_member["strength"] = $row["strength"];
            $enemy_member["constitution"] = $row["constitution"];
            $enemy_member["agility"] = $row["agility"];
            $enemy_member["intelligence"] = $row["intelligence"];
            $enemy_member["attack"] = $row["attack"];
            $enemy_member["defense"] = $row["defense"];
            $enemy_member["attack_speed"] = $row["attack_speed"];
            $enemy_member["job_icon"] = $row["job_icon"];
            $enemy_member["job_walk"] = $row["job_walk"];
            $enemy_member["job_attack"] = $row["job_attack"];
            $enemy_member["stone_required"] = $row["stone_required"];
            $enemy_member["status"] = rand(10, 100);
            array_push($response["enemy_members"], $enemy_member);
        }

      }



      $result = mysqli_query($db->con, "SELECT familyName, equipment.attack as attack, equipment.hp as hp, equipment.defense as defense, type , equipment.intelligence as intelligence, equipment.attack_speed, equipment.flee as flee, equipment.hit as hit, equity_box.fb_user_id FROM equity_box JOIN equipment ON equipment.equipment_id = equity_box.equipment_id WHERE equity_box.familyName = '$familyName' AND fb_user_id IS NOT NULL OR equity_box.familyName = '$response[enemy_familyName]' AND fb_user_id IS NOT NULL") or die(mysqli_error($db->con));
      $response["user_weapons"] = array();
      $response["enemy_weapons"] = array();
      $response["user_armor"] = array();
      $response["enemy_armor"] = array();
      if (mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_array($result))
        {
          $equipment["attack"] = $row["attack"];
          $equipment["hp"] = $row["hp"];
          $equipment["defense"] = $row["defense"];
          $equipment["intelligence"] = $row["intelligence"];
          $equipment["attack_speed"] = $row["attack_speed"];
          $equipment["flee"] = $row["flee"];
          $equipment["hit"] = $row["hit"];
          $equipment["fb_user_id"] = $row["fb_user_id"];
          $equipment["type"] = $row["type"];
          if($row["familyName"] == $familyName)
          {
            if($row["type"] == "weapon")
            {
                array_push($response["user_weapons"], $equipment);
            }
            if($row["type"] == "body")
            {
                array_push($response["user_armor"], $equipment);
            }

          }
          else
          {
            if($row["type"] == "weapon")
            {
                array_push($response["enemy_weapons"], $equipment);
            }
            if($row["type"] == "body")
            {
                array_push($response["enemy_armor"], $equipment);
            }
          }

        }

      }


}
else{

  // check for empty result
    $response["success"] = 0;

}
    echo json_encode($response);



?>
