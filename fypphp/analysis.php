
<script type="text/javascript">
if(location.search.indexOf('r') < 0){
    var hash = window.location.hash;
    var loc = window.location.href.replace(hash, '');
    loc += (loc.indexOf('?') < 0? '?' : '&') + 'r';
    setTimeout(function(){window.location.href = loc + hash;}, 2000);
}
</script>



<?php 


/*


!!!!!!!!!!!BEWARE!!!!!!!!!!!!!
THE DATUM IS OUTDATED FOR ACCOUNT OF TESTING
SO I SET $X   ===    0
SO ONLY ONE DATUM WOULD BE RETRIEVED
!!!!!!!!!!!BEWARE!!!!!!!!!!!!!



Algorithm :


1. Grab the json that extracted as from server.
2. Turn variable into array if can
3. Run a big For Loop for data extraction(Make Sure each script should have fitbit_user_id)
4. Write back into database.


by Gordon

*/


require 'fitbit_server.php';
//get the content from server script.

$_SESSION["entryFordata"] = true;

//global variable setting
//echo $_SESSION['access_token'];

$count = count($_SESSION["resultServer"]) - 1 ;

$goalarray = array();
$goalarray2 = array();
$summary = array();
$data = array();
$array = array();
$array2 = array();
$summary2 = array();
$array3 = array();
$array5 = array();

//session variable for future use.
$_SESSION["Usummary"]=  array();
$_SESSION["UVAdata"] =  array();
$_SESSION["UMAdata"] =  array();
$_SESSION["ULAdata"] =  array();
$_SESSION["USAdata"] =  array();
$_SESSION["Ugoal"]   =  array();
$_SESSION["lastsyncTime"] = array();

$actvityheart = array();
$heartarray = array();
$zone = array();
$fatburn = array();
$cardio = array();
$peak = array();


$_SESSION["fatburn"] = array();
$_SESSION["cardio"]  = array();
$_SESSION["peak"]    = array();
$_SESSION["oor"]     = array();

$_SESSION["lastsyncVal"] = array();
//analysis of device datum



$array11  = array();

for($x = 0 ; $x <= $count ; $x++)
{
   if(isset($_SESSION['lastsync'][$x]) )
   {
     $array5[$x] = json_decode($_SESSION["lastsync"][$x],true);
   }
$counter11 = 0 ;

if(isset($array5[$x][0]))
{
foreach($array5[$x][0] as $value)
{
$array11[$x][$counter11] = $value;
$counter11++;
}
$_SESSION["lastsyncVal"][$x] = $array11[$x][4];
}
else
{
$_SESSION["lastsyncVal"][$x] = "No";
}

//$_SESSION["lastsyncentry"] = true;

}


//analysis for biological datum
//it 's required data synchorization,so that if users didn 't sync,all datum would return zero



/*

VO2 Max is a measurement of how well your body uses oxygen when you’re working out at your hardest. It is widely accepted as the gold standard for grading cardiovascular fitness: the higher your VO2 Max, the more fit you are (source). This metric can also indicate performance potential for endurance-based activities including running, biking, and swimming (source).

VO2 Max is traditionally measured in a lab where you run on a treadmill or ride a stationary bike until exhaustion with a mask strapped to your nose and mouth to gauge the amount of air you inhale and exhale. While this method provides the most accurate measure of VO2 Max, your tracker can estimate this value for you with less effort and discomfort.

So it 's datum for measure your VO2 amount measurement.
*/




for($x = 0 ; $x <= $count  ; $x++)
{
if(isset($_SESSION["resultServer2"][$x])){
$array3[$x] = json_decode($_SESSION["resultServer2"][$x],true);
}

$counter = 0 ;

foreach($array3[$x]["activities-heart"] as $value)
{
$actvityheart[$x][$counter] = $value;
$counter++;
}

$counter2 = 0; 
if(is_array($actvityheart[$x][$counter2]))
{
foreach ($actvityheart[$x][$counter2] as $value) 
{
$heartarray[$x][$counter2] = $value;
$counter2++;
}

//print_r($heartarray[0]);

$counter3 = 0 ; 
foreach($heartarray[$x][1]["heartRateZones"] as $value)
{
$zone[$x][$counter3] = $value;
$counter3++;
}

$_SESSION["fatburn"][$x] = $zone[$x][1];
$_SESSION["cardio"][$x]  = $zone[$x][2];
$_SESSION["peak"][$x]    = $zone[$x][3];
$_SESSION["oor"][$x]     = $zone[$x][0];

}



}


//analysis for physical data
//for an instance,calories out and other physical movement would be done in there.



for($x  = 0 ; $x <= $count ; $x++)
{

if(isset($_SESSION["resultServer"][$x])){
//grabbing value from json file


$array = json_decode($_SESSION["resultServer"][$x],true);
$array2[$x] = json_decode($_SESSION["resultServer"][$x],true);


//new algorithm for upgrading,add a counter
$upgrade = 0 ; 
foreach($array2[$x]["goals"] as $value) 
{
    $goalarray2[$x][$upgrade] = $value;
    $upgrade = $upgrade + 1;
}


$upgrade2 = 0 ; 
foreach($array["summary"] as $value)
{ 
   $summary2[$x][$upgrade2] = $value;
   $upgrade2 = $upgrade2 + 1;
}

//this loop is wrong
foreach($array["summary"] as $value)
{ 
    array_push($summary,$value);
}

$upgrade3 = 0 ;
foreach($summary2[$x][4] as $value) 
{
    $data[$x][$upgrade3] = $value;  
    $upgrade3 =  $upgrade3 + 1 ;
}


$valueArr = array();
$valueArr2 = array();
$valueArr3 = array();
$valueArr4 = array();
$valueArr5 = array();

$upgrade4 = 0 ;
if(is_array($data[$x][0]))
{
// THIS IS ARRAY FOR TOTAL AND TRACKER DISTANCE.
foreach(($data[$x][0]) as $value)    
{
$valueArr[$x][$upgrade4] = $value;
$upgrade4 =  $upgrade4 + 1 ;
}
}

// this is array for storing veryActive data
$upgrade5 = 0 ; 
if(is_array($data[$x][3]))
{
foreach(($data[$x][3]) as $value)
{    
$valueArr2[$x][$upgrade5] = $value;
$upgrade5 =  $upgrade5 + 1 ;
}
}


//this is array for storing moderatelyActive data
$upgrade6 =  0 ;
if(is_array($data[$x][4]))
{
foreach(($data[$x][4]) as $value)
{    
$valueArr3[$x][$upgrade6] = $value;
$upgrade6 = $upgrade6 + 1 ;
}
}

//this is array for storing lightlyActive data
$upgrade7 =  0 ;
if(is_array($data[$x][5]))
{
foreach($data[$x][5] as $value)
{
$valueArr4[$x][$upgrade7] = $value;
$upgrade7 = $upgrade7+ 1 ;
}
}


//this is array for storing sedentaryActive data
$upgrade8 =  0 ;
if(is_array($data[$x][6]))
{
foreach($data[$x][6] as $value)
{
$valueArr5[$x][$upgrade8] = $value;
$upgrade8 = $upgrade8+ 1 ;
}
}

//Array for storing value of activeMinutes,caloriesOut,distance,steps
$_SESSION["Ugoal"][$x] = $goalarray2[$x];
//Array For storing Active Value
$_SESSION["UVAdata"][$x] =  $valueArr2[$x][1];
$_SESSION["UMAdata"][$x] =  $valueArr3[$x][1];
$_SESSION["ULAdata"][$x] =  $valueArr4[$x][1];
$_SESSION["USAdata"][$x] =  $valueArr5[$x][1];
//Array for storing value of activeScore,activityCalories,caloriesBMR,caloriesOut
$_SESSION["Usummary"][$x] = $summary2[$x];

}

}


?>




