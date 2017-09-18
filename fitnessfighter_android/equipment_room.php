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

$result = mysqli_query($db->con, "SELECT equipment.*, equity_box.position, equity_box.fb_user_id FROM equity_box JOIN equipment ON equity_box.equipment_id = equipment.equipment_id WHERE familyName = '$familyName' ORDER BY position ASC") or die(mysqli_error($db->con));
// check for empty result
$response["equipments"] = array();
if (mysqli_num_rows($result) > 0)
{
    // looping through all results

    while ($row = mysqli_fetch_array($result)) {

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
       $equipment["equipment_name"] = $row["equipment_name"];
       $equipment["price"] = $row["price"];
       $equipment["attack_speed"] = $row["attack_speed"];
        // push single product into final response array
        array_push($response["equipments"], $equipment);
    }
    // success
    $response["success"] = 1;

    $result = mysqli_query($db->con, "SELECT game_level.level , user_character.cumulated_exp - c.cumulated_exp as current_exp ,game_level.required_exp , user_character.fb_user_id, user_character.cumulated_exp , job_figure, user_detail.name, box.box_size, game_family.money, job_level.* FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_family ON user_detail.familyName = game_family.familyName JOIN box ON game_family.box_level = box.box_level JOIN job_picture ON user_character.job_name = job_picture.job_name JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN job_level ON job_level.job_name = user_character.job_name AND job_level.level = game_level.level JOIN game_level c ON game_level.level - 1 = c.level WHERE user_detail.familyName = '$familyName' AND user_character.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
    if (mysqli_num_rows($result) > 0)
    {
        $response["user_character"] = array();
        while ($row = mysqli_fetch_array($result)) {
            $user_character["job_name"] = $row["job_name"];
            $user_character["level"] = $row["level"];
            $user_character["cumulated_exp"] = $row["cumulated_exp"];
            $user_character["current_exp"] = $row["current_exp"];
            $user_character["required_exp"] = $row["required_exp"];
            $user_character["job_figure"] = $row["job_figure"];
            $user_character["name"] = $row["name"];
            $user_character["strength"] = $row["strength"];
            $user_character["constitution"] = $row["constitution"];
            $user_character["agility"] = $row["agility"];
            $user_character["intelligence"] = $row["intelligence"];
            $user_character["attack"] = $row["attack"];
            $user_character["defense"] = $row["defense"];
            $user_character["attack_speed"] = $row["attack_speed"];
            $user_character["box_size"] = $row["box_size"];
            $user_character["money"] = $row["money"];
            array_push($response["user_character"], $user_character);
        }

    }


    // echoing JSON response
}
else {

    $response["success"] = 1;

    $result = mysqli_query($db->con, "SELECT game_level.level , user_character.cumulated_exp - c.cumulated_exp as current_exp ,game_level.required_exp , user_character.fb_user_id, user_character.cumulated_exp , job_figure, user_detail.name, box.box_size, game_family.money, job_level.* FROM user_character JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_family ON user_detail.familyName = game_family.familyName JOIN box ON game_family.box_level = box.box_level JOIN job_picture ON user_character.job_name = job_picture.job_name JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp < user_character.cumulated_exp) JOIN job_level ON job_level.job_name = user_character.job_name AND job_level.level = game_level.level JOIN game_level c ON game_level.level - 1 = c.level WHERE user_detail.familyName = '$familyName' AND user_character.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
    if (mysqli_num_rows($result) > 0)
    {
        $response["user_character"] = array();
        while ($row = mysqli_fetch_array($result)) {
            $user_character["job_name"] = $row["job_name"];
            $user_character["level"] = $row["level"];
            $user_character["cumulated_exp"] = $row["cumulated_exp"];
            $user_character["current_exp"] = $row["current_exp"];
            $user_character["required_exp"] = $row["required_exp"];
            $user_character["job_figure"] = $row["job_figure"];
            $user_character["name"] = $row["name"];
            $user_character["strength"] = $row["strength"];
            $user_character["constitution"] = $row["constitution"];
            $user_character["agility"] = $row["agility"];
            $user_character["intelligence"] = $row["intelligence"];
            $user_character["attack"] = $row["attack"];
            $user_character["defense"] = $row["defense"];
            $user_character["attack_speed"] = $row["attack_speed"];
            $user_character["box_size"] = $row["box_size"];
            $user_character["money"] = $row["money"];
            array_push($response["user_character"], $user_character);
        }

    }




    // echo no users JSON
}
    echo json_encode($response);

?>
