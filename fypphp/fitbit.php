<?php

// tesing code : 4X2RWX
session_start();
//include "index.php";
$_SESSION['access_token'] = $_POST['access_token'];
$_SESSION['user_id'] = $_POST['user_id'];
$oauth_profile_header = ["Authorization: Bearer " . $_SESSION['access_token']];
$url = "https://api.fitbit.com/1/user/".$_POST['user_id']."/activities/date/2016-12-12.json";
$cu = curl_init($url);
curl_setopt($cu, CURLOPT_HTTPHEADER, $oauth_profile_header);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($cu);
curl_close($cu);
$_SESSION['result'] = $result;
$_SESSION['good'] = $_POST['access_token'];
echo ($result);
    
 ?>
