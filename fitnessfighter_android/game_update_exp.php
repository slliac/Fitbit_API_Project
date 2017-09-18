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

// $level = $_POST["game_level"];
// $current_exp = $_POST["current_exp"];

// get all products from products table

// check for empty result

$fb_user_id = $_POST["fb_user_id"];
$last_game = $_POST["last_game"];
$last_sync = $_POST["last_sync"];
$familyName = $_POST["familyName"];

$last_game_date = substr($last_game, 0, 10);
$last_sync_date = substr($last_sync, 0, 10);

$result = mysqli_query($db->con, "SELECT date, name, veryActive, moderatelyActive, lightlyActive FROM fitbit_activity WHERE date BETWEEN '$last_game_date' AND '$last_sync_date' AND name IN (SELECT fb_user_id FROM user_detail WHERE familyName = '$familyName') ORDER BY DATE ASC, (veryActive * 5 + moderatelyActive * 2 + lightlyActive) ASC") or die(mysqli_error($db->con));

if (mysqli_num_rows($result) > 0)
{
    $exp_components = array();
  while ($row = mysqli_fetch_array($result)) {
     $exp_component["date"] = $row["date"];
     $exp_component["name"] = $row["name"];
     $exp_component["exp"] = $row["veryActive"] * 5 + $row["moderatelyActive"] * 2 + $row["lightlyActive"];

     array_push($exp_components, $exp_component);
  }

  $result = mysqli_query($db->con, "SELECT date, count(*) as size FROM fitbit_activity WHERE date BETWEEN '$last_game_date' AND '$last_sync_date' AND name IN (SELECT fb_user_id FROM user_detail WHERE familyName = '$familyName') GROUP BY DATE ORDER BY DATE ASC, (veryActive * 5 + moderatelyActive * 2 + lightlyActive) ASC") or die(mysqli_error($db->con));

  if (mysqli_num_rows($result) > 0)
  {
      $count_size = array();
    while ($row = mysqli_fetch_array($result)) {
       $count_temp["date"] = $row["date"];
       $count_temp["size"] = $row["size"];
       array_push($count_size, $count_temp);
    }

  }

  $date = $exp_components[0]["date"];
  $response["final_exp"] = array();
  $index = 0;


  for($i = 0; $i < count($count_size); $i++)
  {
        $previous_exp = 0;
        $previous_load = 0;
        for($j = 0; $j < $count_size[$i]["size"]; $j++)
        {
            $final_temp["exp"] = $previous_exp + ($exp_components[$index + $j]["exp"] - $previous_load) * ($count_size[$i]["size"] - $j);
            $final_temp["previous_exp"] = $previous_load;
            $final_temp["previous_num"] = $count_size[$i]["size"] -$j + 1;
            $final_temp["my_exp"] = $exp_components[$index + $j]["exp"] - $previous_load;
            $final_temp["my_num"] = $count_size[$i]["size"] - $j;
            $previous_exp = $final_temp["exp"];
            $previous_load = $exp_components[$index + $j]["exp"];
            $final_temp["date"] = $exp_components[$index + $j]["date"];
            $final_temp["name"] = $exp_components[$index + $j]["name"];

            if($final_temp["name"] == $fb_user_id)
            {
                array_push($response["final_exp"], $final_temp);
            }


        }
            $index = $index + $count_size[$i]["size"];
  }


    $total_exp = 0;
    $response["cumulated_exp"] = 0;
    for($i = 0; $i < count($response["final_exp"]); $i++)
    {
        $name = $response["final_exp"][$i]["name"];
        $date = $response["final_exp"][$i]["date"];
        $exp = $response["final_exp"][$i]["exp"];
        if($date == $last_game_date)
        {
          $result = mysqli_query($db->con, "SELECT exp, date FROM user_exp WHERE fb_user_id = '$name' AND date = '$date'") or die(mysqli_error($db->con));
          if (mysqli_num_rows($result) > 0)
          {
              while ($row = mysqli_fetch_array($result)) {
                $total_exp = $total_exp - $row["exp"] + $exp;
                $response["final_exp"][$i]["exp"] -= $row["exp"];

              }
              $result = mysqli_query($db->con, "UPDATE user_exp SET exp = '$exp' WHERE fb_user_id = '$name' AND date = '$date'") or die(mysqli_error($db->con));

              continue;
          }
        }

        $total_exp = $total_exp + $exp;
        $result = mysqli_query($db->con, "INSERT INTO user_exp(fb_user_id, date, exp) VALUES('$name', '$date', '$exp')") or die(mysqli_error($db->con));
    }



        $result = mysqli_query($db->con, "select level from game_level where cumulated_exp >=  (SELECT cumulated_exp FROM user_character WHERE fb_user_id = '$fb_user_id') ORDER BY level ASC LIMIT 1") or die(mysqli_error($db->con));

        if (mysqli_num_rows($result) > 0)
        {

          while ($row = mysqli_fetch_array($result))
          {
             $user_level = $row["level"];
          }

          $result = mysqli_query($db->con, "SELECT cumulated_exp FROM user_character WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));

          if (mysqli_num_rows($result) > 0)
          {

            while ($row = mysqli_fetch_array($result))
            {
               $cumulated_exp = $row["cumulated_exp"];
            }

            $response["cumulated_exp"] += $cumulated_exp;
          }



            $current_cumulated_exp = $cumulated_exp + $total_exp;

            $result = mysqli_query($db->con, "UPDATE user_character SET cumulated_exp = '$current_cumulated_exp' WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
            $response["level_up_details"] = array();
            $result = mysqli_query($db->con, "select level, cumulated_exp, required_exp from game_level where level = '$user_level'") or die(mysqli_error($db->con));
            if (mysqli_num_rows($result) > 0)
            {

              while ($row = mysqli_fetch_array($result))
              {

                 $level_up_detail["level"] = $row["level"];
                 $level_up_detail["cumulated_exp"] = $row["cumulated_exp"];
                 $level_up_detail["required_exp"] = $row["required_exp"];
                 array_push($response["level_up_details"], $level_up_detail);
              }
            }

            $result = mysqli_query($db->con, "select level, cumulated_exp, required_exp from game_level where cumulated_exp <=  '$current_cumulated_exp' AND level > '$user_level' ORDER BY level ASC") or die(mysqli_error($db->con));
            $max_level = $user_level;
            if (mysqli_num_rows($result) > 0)
            {

              while ($row = mysqli_fetch_array($result))
              {
                if($max_level < $row["level"])
                {
                  $max_level = $row["level"];
                }
                 $level_up_detail["level"] = $row["level"];
                 $level_up_detail["cumulated_exp"] = $row["cumulated_exp"];
                 $level_up_detail["required_exp"] = $row["required_exp"];
                 array_push($response["level_up_details"], $level_up_detail);
              }

            }

            $previous_lv = $user_level - 1;
            $response["previous_cumulated"] = 0;
            $result = mysqli_query($db->con, "select cumulated_exp from game_level where level = '$previous_lv'") or die(mysqli_error($db->con));
            if (mysqli_num_rows($result) > 0)
            {

              while ($row = mysqli_fetch_array($result))
              {
                  $response["previous_cumulated"] = $row["cumulated_exp"];
              }
            }

            $next_level = $max_level + 1;

            $result = mysqli_query($db->con, "select level, cumulated_exp, required_exp from game_level where level = '$next_level'") or die(mysqli_error($db->con));
            if (mysqli_num_rows($result) > 0)
            {

              while ($row = mysqli_fetch_array($result))
              {
                 $level_up_detail["level"] = $row["level"];
                 $level_up_detail["cumulated_exp"] = $row["cumulated_exp"];
                 $level_up_detail["required_exp"] = $row["required_exp"];
                 array_push($response["level_up_details"], $level_up_detail);
              }
            }


        }

          $total_step = 0;
          $ticket = 0;
          $last_day_step = 0;
          $result = mysqli_query($db->con, "SELECT remaining_step, ticket, last_day_step FROM user_character WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));
          if (mysqli_num_rows($result) > 0)
          {
              while ($row = mysqli_fetch_array($result)) {
                $total_step = $total_step - $row["last_day_step"] + $row["remaining_step"];

                $ticket = $row["ticket"];
                $response["original_ticket"] = $ticket;
                $last_day_step = $row["last_day_step"];
              }
          }

          $result = mysqli_query($db->con, "SELECT date ,step FROM fitbit_summary WHERE date BETWEEN '$last_game_date' AND '$last_sync_date' AND name = '$fb_user_id'") or die(mysqli_error($db->con));
          if (mysqli_num_rows($result) > 0)
          {
              while ($row = mysqli_fetch_array($result)) {
                $total_step = $total_step + $row["step"];
                  if($row["date"] == substr($last_sync, 0, 10))
                  {
                      $last_day_step = $row["step"];
                  }
              }
          }
          $remaining_step = $total_step % 500;
          $ticket = $ticket + $total_step / 500;

          if($ticket > 10)
          {
            $ticket = 10;
            $remaining_step  = 0;
          }


          $response["new_ticket"] = $ticket - $response["original_ticket"];

        $result = mysqli_query($db->con, "UPDATE user_character SET last_update = '$last_sync', ticket = '$ticket', remaining_step = '$remaining_step', last_day_step = '$last_day_step' WHERE fb_user_id = '$fb_user_id'") or die(mysqli_error($db->con));



             $response["success"] = 1;
}
else{
           $response["success"] = 0;
}




    echo json_encode($response);

?>
