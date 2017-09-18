<script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>

<?php

// THIS IS THE PHP SCRIPT FOR GRAB JSON FROM DATABASE 'S ACCESSS TOKEN AND ID

include "index.php";

//array ===> access token
//array ===> user id

//run a big for Loop for whole datum.
//try to access a big data from these.

//SUCCESS ON 21/1 IN SAT BY GORDON:)


$_SESSION['resultServer'] = array();
$_SESSION['resultServer2'] = array();
$_SESSION['lastsync'] = array();




$result = array();

if(isset($_SESSION["Arruid"]))
{
	//echo array_values($_SESSION["Arruid"])[1];
}

if(isset($_SESSION["Arrat"]))
{
	//echo array_values($_SESSION["Arrat"])[0];
}

$num = count($_SESSION["Arruid"]) - 1 ;
//echo $num;


//for user last sync grabbing

for($x = 0 ; $x <=$num; $x++)
{

$oauth_profile_header = ["Authorization: Bearer " .array_values($_SESSION["Arrat"])[$x]];
$url = "https://api.fitbit.com/1/user/".array_values($_SESSION["Arruid"])[$x]."/devices.json";
$cu = curl_init($url);
curl_setopt($cu, CURLOPT_HTTPHEADER, $oauth_profile_header);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
$result[$x] = curl_exec($cu);
curl_close($cu);
$_SESSION['lastsync'][$x] = $result[$x];


}



// for user activity datum grabbing
for($x = 0 ; $x <= $num ; $x++)
{
$oauth_profile_header = ["Authorization: Bearer " .array_values($_SESSION["Arrat"])[$x]];
$url = "https://api.fitbit.com/1/user/".array_values($_SESSION["Arruid"])[$x]."/activities/date/".date("Y-m-d").".json";
$cu = curl_init($url);
curl_setopt($cu, CURLOPT_HTTPHEADER, $oauth_profile_header);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
$result[$x] = curl_exec($cu);
curl_close($cu);
$_SESSION['resultServer'][$x] = $result[$x];
//$_SESSION['good'] = $_POST['access_token'];
}   

// for heart rate datum grabbing

for($x = 0 ; $x <= $num ; $x++)
{
$oauth_profile_header = ["Authorization: Bearer " .array_values($_SESSION["Arrat"])[$x]];
$url = "https://api.fitbit.com/1/user/".array_values($_SESSION["Arruid"])[$x]."/activities/heart/date/today/1d.json";
$cu = curl_init($url);
curl_setopt($cu, CURLOPT_HTTPHEADER, $oauth_profile_header);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
$result[$x] = curl_exec($cu);
curl_close($cu);
$_SESSION['resultServer2'][$x] = $result[$x];
}   

//print_r($_SESSION['resultServer2']);

//print_r($_SESSION['lastsync']);
//print_r($_SESSION['resultServer']);


 ?>