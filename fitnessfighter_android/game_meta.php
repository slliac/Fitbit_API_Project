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
$fb_user_id = $_GET['fb_user_id'];


$result = mysqli_query($db->con, "SELECT job_picture.job_name, last_update, lastsync, user_detail.familyName ,game_family.money, user_character.ticket , game_level.level , job_picture.* FROM user_character JOIN job_picture ON job_picture.job_name = user_character.job_name JOIN game_level ON (user_character.cumulated_exp < game_level.cumulated_exp AND game_level.cumulated_exp - game_level.required_exp <= user_character.cumulated_exp) JOIN user_detail ON user_character.fb_user_id = user_detail.fb_user_id JOIN game_family ON game_family.familyName = user_detail.familyName WHERE user_character.fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
// check for empty result
if (mysqli_num_rows($result) > 0)
{
    // looping through all results
        $response["game_character"] = array();
    while ($row = mysqli_fetch_array($result)) {

        // temp user_detail array
       $character["job_name"] = $row["job_name"];
       $character["last_game"] = $row["last_update"];
       $character["lastsync"] = $row["lastsync"];
       $character["familyName"] = $row["familyName"];
       $character["job_figure"] = $row["job_figure"];
       $character["job_walk"] = $row["job_walk"];
       $character["job_attack"] = $row["job_attack"];
       $character["money"] = $row["money"];
       $character["ticket"] = $row["ticket"];
       $character["level"] = $row["level"];
        // push single product into final response array
        array_push($response["game_character"], $character);
    }
    // success
    $response["success"] = 1;





    // echoing JSON response
}
else {

    $response["success"] = 0;
    $response["message"] = "No user_detail found";

    // echo no users JSON
}
    echo json_encode($response);

?>
