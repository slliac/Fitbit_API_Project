

<?php
session_start();

$arrayForsync = array();
if(isset( $_SESSION["oldsync"]))
{
//print_r( $_SESSION["oldsync"]);


if(isset($_SESSION["oldsync"][0]) )
{
if(strlen($_SESSION["oldsync"][0]) > 0 )
{


for($i = 0 ; $i < count($_SESSION["oldsync"]); $i++ )
{
$arrayForsync[$i] = $_SESSION["oldsync"][$i];
}

}
}


/*

Algorithm : 

COUNT DATE DIFFERENT BETWEEN

 $num = DATE DIFF 

 $userForUpdateID = ?

 $useraccesstoken = ? 

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


Run the datum into analysis.php format.

Then update the value using sql query.





*/






}











?>