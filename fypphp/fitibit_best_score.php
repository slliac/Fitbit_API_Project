<?php

// THIS IS THE PHP SCRIPT FOR GRAB JSON FROM DATABASE 'S ACCESSS TOKEN AND ID

include "index.php";

//array ===> access token
//array ===> user id

//run a big for Loop for whole datum.
//try to access a big data from these.

//SUCCESS ON 21/1 IN SAT BY GORDON:)


$_SESSION['resultServerbs'] = array();
$result = array();

if(isset($_SESSION["Arruid"]))
{
	//echo array_values($_SESSION["Arruid"])[0];
}

if(isset($_SESSION["Arrat"]))
{
	//echo array_values($_SESSION["Arrat"])[0];
}

$num = count($_SESSION["Arruid"]);
for($x = 0 ; $x < $num ; $x++)
{
$oauth_profile_header = ["Authorization: Bearer " .array_values($_SESSION["Arrat"])[$x]];
$url = "https://api.fitbit.com/1/user/-/activities/frequent.json";
$cu = curl_init($url);
curl_setopt($cu, CURLOPT_HTTPHEADER, $oauth_profile_header);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
$result[$x] = curl_exec($cu);
curl_close($cu);
$_SESSION['resultServerbs'][$x] = $result[$x];
print_r($_SESSION['resultServerbs']);
//$_SESSION['good'] = $_POST['access_token'];
}   

//print_r($_SESSION['resultServer']);


 ?>