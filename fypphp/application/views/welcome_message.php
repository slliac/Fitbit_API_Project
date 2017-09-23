<!--

To FYP21,

welcome_message.php

PHP7 is used.

it 's a center for managing data flow and connection with server.
//this seem look faster :)

You might also welcome to use controller,model,view traditional appoarch

Best,
Gordon
-->
<!DOCTYPE html>
<html lang="en">

<?php
include "fitbit_updateServer.php";

$sqlForTodayPoint = $this->db->query("SELECT battle.* FROM battle inner join user_detail on user_detail.familyName = battle.attack_family where user_detail.name = '".$_SESSION["loginedName"]."' and battle.date = CURDATE() order by battle.date DESC LIMIT 1");
foreach($sqlForTodayPoint->result() as $row)
{
	$_SESSION["today_point"] = $row->point;
}







//last battle and related concepys

$sqlforlastbattle = $this->db->query("SELECT battle.* FROM battle inner join user_detail on user_detail.familyName = battle.attack_family where user_detail.name = '".$_SESSION["loginedName"]."' order by battle.date DESC LIMIT 1");
foreach($sqlforlastbattle->result() as $row)
{
    $_SESSION["datelr"] = $row->date;
	$_SESSION["af"] = $row->attack_family;
	$_SESSION["pointf"] = $row->point;
	$_SESSION["df"] = $row->defense_family;
	$_SESSION["award"] = $row->award_received;
}

// this part for redirect to whether family Create Page or family Home page


date_default_timezone_set("Asia/Hong_Kong");

$sqlMoneymoney = $this->db->query("SELECT g.* FROM game_family g inner join user_detail ON g.familyName = user_detail.familyName where user_detail.name = '".$_SESSION["loginedName"]."' ");
foreach($sqlMoneymoney->result() as $row)
{
	$_SESSION["money"] = $row->money;
}


//select ranking datum from your family
$monday =  date("Y-m-d", strtotime("this week monday"));
$sunday =  date("Y-m-d", strtotime("this week sunday"));

$rankForDash = 0 ;

$sqlforloginedRank = $this->db->query("SELECT * FROM user_detail where name = '".$_SESSION["loginedName"]."' ");
foreach($sqlforloginedRank->result() as $row)
{
$_SESSION["variableFamily"] = $row->familyName;
}

$sqlforRankingIndash = $this->db->query("SELECT familydetail.familyName,sum(point) as point, attack_family FROM battle JOIN familydetail ON battle.attack_family = familydetail.familyName WHERE date BETWEEN '$monday' AND '$sunday' GROUP BY attack_family ORDER BY sum(point) DESC");
$_SESSION["ranking"] = array();
foreach($sqlforRankingIndash->result() as $row)
{

	$_SESSION["ranking"][$rankForDash][0] = $row->attack_family;
	$_SESSION["ranking"][$rankForDash][1] = $row->point;
	$_SESSION["ranking"][$rankForDash][2] = $row->familyName;
	$rankForDash++;
}

for( $x = 0 ; $x < count($_SESSION["ranking"]); $x++)
{
	if(strcmp($_SESSION["variableFamily"] ,$_SESSION["ranking"][$x][2]) == 0 )
	{ // your family ranking
     $_SESSION["rankForpoint"] = $_SESSION["ranking"][$x][1];
	 $_rankforname =  $_SESSION["ranking"][$x][2];
	 $_rankreal     =  $x+1;
	 $_SESSION["rankreal"] = $x + 1;
	}
}




$_SESSION["USERINFOGALLERY"] = array();

$sqlforpage1 = $this->db->query("SELECT * FROM user where name = '".$_SESSION["loginedName"]."'");
foreach($sqlforpage1->result() as $row)
{
	$_SESSION["USERINFOGALLERY"][0] = $row->user_job;
	$_SESSION["USERINFOGALLERY"][1] = $row->dob;
	$_SESSION["USERINFOGALLERY"][2] = $row->gender;
	$_SESSION["USERINFOGALLERY"][2] = $row->message;
}




$_SESSION["defensemem"] = array();
$sqlForweapon = $this->db->query("SELECT * FROM equipment");
$_wea =  0 ;
foreach($sqlForweapon->result() as $row)
{
	$_SESSION["defensemem"][$_wea] = $row->job_name;
	$_wea++;
}




// redirect useful function
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}


// family redirection 's part
$createdFamily = $this->db->query("SELECT * FROM family where name = '".$_SESSION["loginedName"]."'");

	if(empty($createdFamily->result()))
	{
		$_SESSION["FAMILYPAGEDET"] = true;
	}
    else
    {
		$_SESSION["FAMILYPAGEDET"] = false;
	}

// the part for  creating new family

if(isset($_SESSION["loginedName"]))
{

if(isset($_SESSION['family']) and isset($_SESSION["rightforfamily"]) and $_SESSION["rightforfamily"] == true)
{
$sqlfamilyinsert = "INSERT INTO family VALUE(?,?,?)";
$this->db->query($sqlfamilyinsert ,array($_SESSION["loginedName"],$_SESSION["parent"],$_SESSION["family"]));

$family_photo = NULL;

if(true)
{
	$family_photo = '';

}

if(true)
{
	$family_background = "";

}


$sqlForaddfamily = "INSERT INTO familydetail(name,familyName,familyphoto, family_background) VALUE(?,?,?,?)";
$this->db->query($sqlForaddfamily,array($_SESSION["loginedName"],$_SESSION["family"],$family_photo, $family_background));

$sqlForUpdateUser = "UPDATE user_detail SET familyName = ? where name = ?";
$this->db->query($sqlForUpdateUser,array($_SESSION["family"],$_SESSION["loginedName"]) );


$_SESSION["rightforfamily"] = false;
}


//check whether the logined user have family.



$familyarraysed = array();
$familyarraymod = array();
$familyarrayla = array();
$familyarrayma = array();

$calories = array();
$caloriesbmr = array();

$sql = $this->db->query("SELECT Fitbit_Activity.* from user inner join family inner join Fitbit_Activity on family.name = user.name And user.fb_user_id = Fitbit_Activity.name where family.familyName = (SELECT family.familyName from user inner join family on family.name = user.name where user.name = '".$_SESSION["loginedName"]."') order by id");
$sql2 = $this->db->query("SELECT fitbit_summary.* from user inner join family inner join fitbit_summary on family.name = user.name And user.fb_user_id = fitbit_summary.name where family.familyName = (SELECT family.familyName from user inner join family on family.name = user.name where user.name = '".$_SESSION["loginedName"]."') order by id");

$i = 0 ;
$r = 0 ;

foreach($sql2->result() as $row)
{

$calories[$r] = $row->caloriesOut;
$caloriesbmr[$r] = $row->caloriesBMR;
$r++;
}

foreach($sql->result() as $row)
{
$familyarraysed[$i] = $row->sedentaryActive;
$familyarraymod[$i] = $row->moderatelyActive;
$familyarrayla[$i] = $row->lightlyActive;
$familyarrayma[$i] = $row->moderatelyActive;
$i++;
}

//after all the value extracted,start do analysis

$meansed = 0 ;
$meanmod = 0 ;
$meanla = 0;
$meanma = 0;


$meancaloriesbmr = 0;
$meancaloriesout = 0;



for($q = 0 ; $q < count($calories); $q++)
{
$meancaloriesout = $meancaloriesout  + $calories[$q];
$meancaloriesbmr = $meancaloriesbmr  + $caloriesbmr[$q] ;
}


for($j = 0 ; $j < count($familyarraysed) ; $j++)
{
$meansed = $meansed + $familyarraysed[$j];
$meanmod = $meanmod + $familyarraymod[$j];
$meanla  = $meanla  + $familyarrayla[$j];
$meanma = $meanma   + $familyarrayma[$j];
}

if(count($familyarraysed)>0 ){
$_SESSION["MEANCALO"] = $meancaloriesout / count($calories);
$_SESSION["MEANCALBMR"] = $meancaloriesbmr / count($calories);
$_SESSION["MEANSED"] = $meansed/count($familyarraysed);
$_SESSION["MEANMOD"] = $meanmod/count($familyarraysed);
$_SESSION["MEANLA"]  = $meanla /count($familyarraysed);
$_SESSION["MEANMA"]  = $meanma /count($familyarraysed);
}

}


//update the user information if user login because the access token is used OAuth form and would be failed at soon.
if(isset($_SESSION["loginedName"])){

if(isset($_SESSION["access_token"]) && strlen($_SESSION["access_token"]) > 0 )
{
$sql2 = $this->db->query("UPDATE user set fb_access_token = '".$_SESSION["access_token"]."' where name = '".$_SESSION["loginedName"]."';");
}

}



$family_user = array();

$_SESSION["vActiveArr"] = array();
$_SESSION["sActiveArr"] = array();
$_SESSION["lActiveArr"] = array();
$_SESSION["mActiveArr"] = array();



//logined detail for users.
if(isset($_SESSION["loginedName"]))
{
$sqlfind = $this->db->query("SELECT * from user where name = '".$_SESSION["loginedName"]."'");
foreach($sqlfind->result() as $row)
{
$search = $row->fb_user_id;
}


$sql4 = $this->db->query("SELECT * from Fitbit_Activity where name = '".$search."' ORDER BY id DESC LIMIT 1");
foreach($sql4->result() as $row)
{
$_SESSION["vActiveY"] = $row->veryActive;
$_SESSION["sActiveY"] = $row->sedentaryActive;
$_SESSION["lActiveY"] = $row->lightlyActive;
$_SESSION["mActiveY"] = $row->moderatelyActive;
}

$sql5 = $this->db->query("SELECT * from fitbit_summary where name = '".$search."' ORDER BY id DESC LIMIT 1");


foreach($sql5->result() as $row)
{
$_SESSION["activityCaloriesU"] = $row->activityCalories;
$_SESSION["caloriesBMRU"] = $row->caloriesBMR;
$_SESSION["caloriesOutU"] = $row->caloriesOut;
$_SESSION["elevationU"] = $row->elevation;
}



}


//load back searched people information,for example you search gavin and the result shouldbe return back to gavin.
if(isset($_SESSION["searchName"]))
{
$sqlfind = $this->db->query("SELECT * from user where name = '".$_SESSION["searchName"]."'");
foreach($sqlfind->result() as $row)
{
$search = $row->fb_user_id;
}

$sql4 = $this->db->query("SELECT * from Fitbit_Activity where name = '".$search."' ORDER BY id DESC LIMIT 1");
foreach($sql4->result() as $row)
{
$_SESSION["vActiveS"] = $row->veryActive;
$_SESSION["sActiveS"] = $row->sedentaryActive;
$_SESSION["lActiveS"] = $row->lightlyActive;
$_SESSION["mActiveS"] = $row->moderatelyActive;
}


$sql5 = $this->db->query("SELECT * FROM fitbit_summary where name = '".$search."'  ORDER BY id DESC LIMIT 1");
foreach ($sql5->result() as $row)
{

$_SESSION["activityCaloriesS"] = $row->activityCalories;
$_SESSION["caloriesBMRS"] = $row->caloriesBMR;
$_SESSION["caloriesOutS"] = $row->caloriesOut;
$_SESSION["elevationS"] = $row->elevation;

}


}

$_SESSION["oldsync"] = array();

//before last sync , store it old value


$_SESSION["lastsyncentry"] = true;
//last sync set
$sql3 = $this->db->query("SELECT * FROM user");
$sqlcheck = $this->db->query("SELECT * FROM user WHERE cast(lastsync as date) = cast(now() as date)");
if(empty($sqlcheck->result() ))
{
$i = 0 ;
foreach($sql3->result() as $row)
{//please click 2 times to ensure the date different
   $_SESSION["oldsync"][$i] = $row->lastsync;
   $i++;
}
}




if(isset($_SESSION["lastsyncentry"]))
$_SESSION["lastsyncentry"] = false;


if(isset($_SESSION["lastsyncVal"]))
{

$sql5 = $this->db->query("SELECT * FROM user");
$i = 0 ;
foreach($sql5->result() as $row)
{
   $tmpmember[$i] = $row->name;
   $i++;
}


for($j = 0 ; $j < count($tmpmember) ; $j++)
{
$sql2 = "UPDATE user set lastsync = ? where name = ? "; // ***** change it to update the value inside user data table
$this->db->query($sql2,array($_SESSION["lastsyncVal"][$j] ,$tmpmember[$j]));
}

}



if(isset($_SESSION["loginedName"]))
{

$selfsql = $this->db->query("SELECT fitbit_summary.* from fitbit_summary inner join user on user.fb_user_id = fitbit_summary.name where user.name = '".$_SESSION['loginedName']."' order by fitbit_summary.updatedDate desc LIMIT 1");
foreach($selfsql->result() as $row )
{
$_SESSION["stepArrS"] = $row->step;
$_SESSION["floorArrS"] = $row->floors;
$_SESSION["activityCaloriesArrS"] = $row->activityCalories;
$_SESSION["caloriesBMRArrS"] = $row->caloriesBMR;
$_SESSION["caloriesOutArrS"] = $row->caloriesOut;
$_SESSION["elevationArrS"] = $row->elevation;
$_SESSION["fatburnArrS"] = $row->fatburn;
$_SESSION["fatburnCalArrS"] = $row->fatburnCalories;
$_SESSION["cardioArrS"] = $row->cardio;
$_SESSION["cardioCalArrS"] = $row->cardioCalories;
$_SESSION["oorArrS"] = $row->oor;
$_SESSION["oorCalArrS"] = $row->oorCalories;

}

$sqlhaha = $this->db->query("SELECT family.* FROM user inner join family where user.name = '".$_SESSION['loginedName']."' ");
foreach($sqlhaha->result() as $row)
{
	$_SESSION["gilbert"] = $row->familyName;
}



//check the logined 's user family member 's information
$sql3 = $this->db->query("SELECT user.* from user inner join family on family.name = user.name where family.familyName = (SELECT family.familyName from user inner join family on family.name = user.name where user.name = '".$_SESSION['loginedName']."')");
$counter = 0 ;
foreach($sql3->result() as $row)
{
$family_user[$counter] = $row->fb_user_id;
$family_user_name[$counter] = $row->name;
$counter++;
}


$_SESSION["fusr"] = 0 ;


if (count($family_user) > 1 )
{
$_SESSION["fusr"] = $family_user;
$_SESSION["fusr2"] = $family_user_name;
//grabbed the family from recent user.

$tmpmember = array();


for($x = 0 ; $x < count($family_user)  ; $x++)
{

$sql4 = $this->db->query("SELECT * FROM Fitbit_Activity where name = '".$family_user[$x]."' ORDER BY id DESC LIMIT 1 ");
foreach($sql4->result() as $row)
{
//for chart part
$_SESSION["vActiveArr"][$x] = $row->veryActive;
$_SESSION["sActiveArr"][$x] = $row->sedentaryActive;
$_SESSION["lActiveArr"][$x] = $row->lightlyActive;
$_SESSION["mActiveArr"][$x] = $row->moderatelyActive;

}

$_SESSION["stepArr"] = array();
$_SESSION["floorArr"] = array();
$_SESSION["activityCaloriesArr"] = array();
$_SESSION["caloriesBMRArr"] = array();
$_SESSION["caloriesOutArr"] = array();

}

$_SESSION["fatburnArr"] = array();
$_SESSION["fatburnCalArr"] = array();
$_SESSION["cardioArr"] = array();
$_SESSION["cardioCalArr"] = array();
$_SESSION["oorArr"] = array();
$_SESSION["oorCalArr"] = array();


for($x = 0 ; $x < count($family_user) ; $x++)
{
$sql5 = $this->db->query("SELECT * FROM fitbit_summary where name = '".$family_user[$x]."' ORDER BY id DESC LIMIT 1 ");

foreach($sql5->result() as $row)
{
//this are the data easily have huge amount and big change
$_SESSION["stepArr"][$x] = $row->step;
$_SESSION["floorArr"][$x] = $row->floors;
$_SESSION["activityCaloriesArr"][$x] = $row->activityCalories;
$_SESSION["caloriesBMRArr"][$x] = $row->caloriesBMR;
$_SESSION["caloriesOutArr"][$x] = $row->caloriesOut;
$_SESSION["elevationArr"][$x] = $row->elevation;
$_SESSION["fatburnArr"][$x] = $row->fatburn;
$_SESSION["fatburnCalArr"][$x] = $row->fatburnCalories;
$_SESSION["cardioArr"][$x] = $row->cardio;
$_SESSION["cardioCalArr"][$x] = $row->cardioCalories;
$_SESSION["oorArr"][$x] = $row->oor;
$_SESSION["oorCalArr"][$x] = $row->oorCalories;



}

}


}




}

//print_r($_SESSION["lActiveArr"]);

//After grab it and you use the datum for other real use.

if(isset($_SESSION["loginedName"]))
{

$sql4 = $this->db->query("SELECT fbg.* from user usr inner join fitbit_summary fbg ON fbg.name = usr.fb_user_id where usr.fb_user_id = '".$_SESSION['user_id']."'");
foreach($sql4->result() as $row)
{
$_SESSION["activeMinutes"] = $row->elevation;
$_SESSION["caloriesOut"] = $row->activityCalories;
$_SESSION["distance"] = $row->caloriesBMR ;
$_SESSION["step"] = $row->caloriesOut;
}


$sql5 = $this->db->query("SELECT fba.* from user usr inner join Fitbit_Activity fba on fba.name = usr.fb_user_id where usr.fb_user_id = '".$_SESSION['user_id']."'");

foreach($sql5->result() as $row)
{

$_SESSION["VA"] = $row->veryActive;
$_SESSION["MA"] = $row->moderatelyActive;
$_SESSION["LA"] = $row->lightlyActive;
$_SESSION["SA"] = $row->sedentaryActive;
}


}


//checking the server sync time respectively,if sync time is over 3 days,just update the record in three time.

$tmpTimediffuser = array();


$qpeople = 0 ;
$sqlFortimediff = $this->db->query("SELECT * FROM user");
foreach($sqlFortimediff->result() as $row)
{
$tmpTimediffuser[$qpeople][0] = $row->lastsync;
$tmpTimediffuser[$qpeople][1] = $row->fb_user_id;
$qpeople++;
}

for($tmpVal  = 0 ; $tmpVal < count($tmpTimediffuser) ; $tmpVal++)
{

//$sql6 = $this->db->query("SELECT * FROM `user` WHERE cast(lastsync as date) = cast(now() as date)");



}






//insert Or update data that recently update from the server,Everyday the things that server should do.

if(isset($_SESSION["entryFordata"]) && $_SESSION["entryFordata"] == true)
{
//HELP  !!!!! IMPORTANT,I ASSUME ALL DATUM WOULD ONLY RUN ONCE.SO THAT I JUST SEARCH SQL IN ACTIVITY SIDE
$sql5 = $this->db->query("SELECT * FROM `Fitbit_Activity` WHERE cast(dateUpdate as date) = cast(now() as date)");

if(empty($sql5->result() )) // check today 's result whether implement or not.
{
$count = count($_SESSION["resultServer"]) - 1 ;
//echo $count;
for($x = 0  ; $x <= $count ; $x++)
{
// for linked data

if(isset($_SESSION["Usummary"][$x][13]) && isset($_SESSION["fatburn"][$x]["minutes"]) ){
if(strlen($_SESSION["Usummary"][$x][13]) > 0 && strlen($_SESSION["fatburn"][$x]["minutes"]) > 0 )
{// if user has ping the datum to fitbit app
$sql2 = "INSERT INTO fitbit_summary VALUE(0,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now(),0,0)";
$this->db->query($sql2,array($_SESSION["Arruid"][$x],$_SESSION["Usummary"][$x][13],$_SESSION["Usummary"][$x][7],$_SESSION["Usummary"][$x][6],$_SESSION["Usummary"][$x][5],$_SESSION["Usummary"][$x][1],$_SESSION["Usummary"][$x][2],$_SESSION["Usummary"][$x][3],$_SESSION["fatburn"][$x]["minutes"],$_SESSION["cardio"][$x]["minutes"],$_SESSION["peak"][$x]["minutes"],$_SESSION["oor"][$x]["minutes"],$_SESSION["fatburn"][$x]["caloriesOut"],$_SESSION["cardio"][$x]["caloriesOut"],$_SESSION["peak"][$x]["caloriesOut"],$_SESSION["oor"][$x]["caloriesOut"]));
}
}
else{//else user didn 't ping the datum to fitbit app
$sql2 = "INSERT INTO fitbit_summary VALUE(0,?,?,?,?,?,?,?,0,0,0,0,0,0,0,0,now(),now(),0,0 )";
$this->db->query($sql2,array($_SESSION["Arruid"][$x],0,$_SESSION["Usummary"][$x][7],$_SESSION["Usummary"][$x][6],$_SESSION["Usummary"][$x][5],$_SESSION["Usummary"][$x][1],$_SESSION["Usummary"][$x][2],$_SESSION["Usummary"][$x][3]));
}

// for discrete data
$sql = "INSERT INTO Fitbit_Activity VALUE(0,?,?,?,?,?,now(),now())";
$this->db->query($sql,array($_SESSION["UVAdata"][$x],$_SESSION["UMAdata"][$x],$_SESSION["ULAdata"][$x],$_SESSION["USAdata"][$x],$_SESSION["Arruid"][$x] ));
}

$_SESSION["entryFordata"] = false;

}
else
{

//if(strlen($_SESSION["UVAdata"][0]) > 0)
//{
$count = count($_SESSION["resultServer"]) - 1 ;

for($x = 0  ; $x <= $count ; $x++)
{
//print_r ($_SESSION["Usummary"][$x][2]);
// for discrete data
$sql = "UPDATE Fitbit_Activity set veryActive = ? , moderatelyActive = ? , lightlyActive = ? , sedentaryActive = ? WHERE name = ? and cast(dateUpdate as date) = cast(now() as date) ";
$this->db->query($sql,array($_SESSION["UVAdata"][$x],$_SESSION["UMAdata"][$x],$_SESSION["ULAdata"][$x],$_SESSION["USAdata"][$x],$_SESSION["Arruid"][$x] ));


if(isset($_SESSION["Usummary"][$x][13]) && isset($_SESSION["fatburn"][$x]["minutes"]) )
{
if(strlen($_SESSION["Usummary"][$x][13]) > 0 && strlen($_SESSION["fatburn"][$x]["minutes"]) > 0 )
{//if user has ping the datum to fitbit app
$sql2 = "UPDATE fitbit_summary SET step = ? , floors = ? , elevation = ? , activityCalories = ? , caloriesBMR = ? , caloriesOut = ? , fatburn = ? , cardio = ? , peak = ? , oor = ? , fatburnCalories = ? , cardioCalories = ? , peakCalories = ? , oorCalories = ?  WHERE name = ? and cast(updatedDate as date) = cast(now() as date) ";
$this->db->query($sql2,array($_SESSION["Usummary"][$x][13],$_SESSION["Usummary"][$x][7],$_SESSION["Usummary"][$x][5],$_SESSION["Usummary"][$x][1],$_SESSION["Usummary"][$x][2],$_SESSION["Usummary"][$x][3],$_SESSION["fatburn"][$x]["minutes"],$_SESSION["cardio"][$x]["minutes"],$_SESSION["peak"][$x]["minutes"],$_SESSION["oor"][$x]["minutes"],$_SESSION["fatburn"][$x]["caloriesOut"],$_SESSION["cardio"][$x]["caloriesOut"],$_SESSION["peak"][$x]["caloriesOut"],$_SESSION["oor"][$x]["caloriesOut"],$_SESSION["Arruid"][$x]));
}
}

//else user didn 't ping the datum to fitbit app
//last 2 eight value all set to 0
else if(empty($_SESSION["Usummary"][$x][12]))
{
$sql2 = "UPDATE fitbit_summary SET step = ? , floors = ?  ,elevation = ? , activityCalories = ? , caloriesBMR = ? , caloriesOut = ? , fatburn = 0 , cardio = 0 , peak = 0 , oor = 0 , fatburnCalories = 0 , cardioCalories = 0 , peakCalories = 0 , oorCalories = 0  WHERE name = ? and cast(updatedDate as date) = cast(now() as date) ";
$this->db->query($sql2,array(0,$_SESSION["Usummary"][$x][7],$_SESSION["Usummary"][$x][5],$_SESSION["Usummary"][$x][1],$_SESSION["Usummary"][$x][2],$_SESSION["Usummary"][$x][3],$_SESSION["Arruid"][$x]));
}

}

}
$_SESSION["entryFordata"] = false;

}

//}



//After grab it and you use the datum for other real use.

if(isset($_SESSION["loginedName"]))
{

$sql4 = $this->db->query("SELECT fbg.* from user usr inner join fitbit_summary fbg ON fbg.name = usr.fb_user_id where usr.fb_user_id = '".$_SESSION['user_id']."'");
foreach($sql4->result() as $row)
{
$_SESSION["activeMinutes"] = $row->elevation;
$_SESSION["caloriesOut"] = $row->activityCalories;
$_SESSION["distance"] = $row->caloriesBMR ;
$_SESSION["step"] = $row->caloriesOut;
}


$sql5 = $this->db->query("SELECT fba.* from user usr inner join Fitbit_Activity fba on fba.name = usr.fb_user_id where usr.fb_user_id = '".$_SESSION['user_id']."'");

foreach($sql5->result() as $row)
{

$_SESSION["VA"] = $row->veryActive;
$_SESSION["MA"] = $row->moderatelyActive;
$_SESSION["LA"] = $row->lightlyActive;
$_SESSION["SA"] = $row->sedentaryActive;
}


}


//ACCESS TOKEN AND USER_ID EXTRACTION FROM DATABASE
$_SESSION["Arruid"] = array() ;
$_SESSION["Arrat"] = array() ;
$sqlSu = $this->db->query("SELECT * FROM user");
foreach($sqlSu->result() as $row)
{

array_push($_SESSION["Arruid"],$row->fb_user_id);
array_push($_SESSION["Arrat"],$row->fb_access_token);

}


//Login Information
if(isset($_SESSION['user_id']))
{
$sql = $this->db->query("SELECT * FROM user WHERE fb_user_id = '".$_SESSION['user_id']."'");
foreach($sql->result() as $row)
{
$_SESSION["loginedName"] = $row->name;
}
}

//REGISTER DATA




//checking about data regsiter before
if(isset($_SESSION['user_id']))
{
//echo $_SESSION['user_id'];
$checksql = $this->db->query("SELECT * FROM user where name='".$_SESSION['loginedName']."'");
if(isset($_SESSION['Rname']) && $_SESSION["data"] = true )
{
$sql = "INSERT INTO user VALUE(?,?,?,?,?,?,?,?,?,?)";
$this->db->query($sql,array($_SESSION['Rname'],'M',date("Y-m-d h:i:sa"),$_SESSION['Rdate'],$_SESSION['Rcareer'],$_SESSION['Rweight'],$_SESSION['Rheight'],$_SESSION['Rintro'],$_SESSION['user_id'],$_SESSION['access_token']));
$personal_photo = NULL;
if(true)
{
	$personal_photo = 'iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAYAAAA8AXHiAAAABHNCSVQICAgIfAhkiAAAEgNJREFU
eJztnWt2Gle2x//7VBVvBNigpDu3Y9LJXbnd664VMYIoI2j3CCKPIO4RxB5B5BFEGUHsEYSMAPlL
39zb6TZOx520QAIkHlXUY98PFDaSQeJRj1Mlfmux9ADO2VX82WeffV6EW06jc7Kn2OIeE+8xcxWg
6uVXzP1fE6Dm1f8RUZOYjm3FeVkr7R77YW9UoLANCIpGp1MVtv0pmPeYsDdfMF4zESAxjkF07CjK
97VSqelvnXIQW2FNhcRw9gHs+y+iZeEmgDpB1OMstFgJq9HpVIVlfcHE9+UR0k1wk5ieOqr6JE4i
i7ywGp1OVTjmn9jBAYj2wrZnI5iPSeDIEdqzqIssssJ63m5/zuD7AO6HbYtPPCXQ00/K5W/CNmQd
IiWsRqdTFI75OTMeRqep2xRuEuHQEdo3tVKpG7Y1yxIJYU0EZX0xERSKYdsTEt2JwNQnURCY1MJ6
E4zjALdXUFeZCuwbmeMwaYX1/LT15S33UDfRJcLhJ3crj8M2ZB7SCavRau0T8de3J4baFG4y04Na
pVIP25JZpBFWo9Opkm19hfj28vzmKSvqX2RpHqUQ1rbZ8wxpmsdQhdXodIpkW98C2A/TjhhSZ0X9
c5i9x9CENYml8C22Xsovusz4c1ixlwij0uenrS+J8B22ovKTIhG+e37a+jKMygP1WI1Op0qW+W3k
x/SiR50V9UGQgX1gwmp0TvbIpq2XCo8uK/xZUBMQA2kKG63W/lZUoVMkm75rdE4CaS18F1aj3T7Y
xlPSUCSbGo12+8DvinxtChvt9gGBv/azjk0gABlVRUZVkVJUJBQFmhBQiCDcRxj0TRN/P+/5WgeD
HtTK5SO/yvftzj1vtb5iwkO/yl8XAaCYTKKQSCKnaaGJ5zpM28Zfux3f6yHG4SeVyl98KduPQhvt
9iGBv/Cj7HXRhMBuOo1SMgVFQjHN0rw4R288DqQuBj2plcueOwDP77BszZ8gwrvpDMqpFEhyQTEz
Xg0HONX1YOv1oVn09E7LJqqdRAL/kc1BE6HkgVdCtyz8POhjYFmh1O+1uDwTljtE851X5W3Ke9ks
yql02GYszcA0YTrOta+5MMc4MwzfbGCFa17luTwRlkzJT0GED/J55LRE2KZ4Ttcw8LJ/4WsVXiVR
N24jJvOo5BCVQoQPdwqxFBUAnBq+x15uErVT3bSgjYVFlinFDAUB4Pc7BWRUNWxTfOHM0NE3zSCq
KpJtbRwnbySsRqv1SJYB5ffzO7EVVdcw8HO/H2SV+41W69EmBawdY8kUrL+TTuPdTDZsMzzHdBz8
OhzizP8mcC7M+Gzd+VxrCcud+fkCEjSBGVXFRzsF6XNUqzK0LJyMhnCY5z4/ME1c34f0hC4r6gfr
zERdq+1wpxOHLioC8LtcLnaiAiZfmGp+Z+HzrwZ9tP1PpE6njn+26htXjrHctnd/1ff5QSWdRkqJ
Z1x1HTYzugEN+WDNeGulr7q7RKsBCbyVQoQ/lO5IP+7nNcyMl/2LwMYSXbqsqLVVZqCu5LHcdX+h
iwoAdtPpWycqhxk/BS8qYNIkfrXKG5b+ZGTqBQoAfyzdgRKBMUAvYGacm2P8azDA+IZhH3/tWL6X
uHSA4i57X9soLyklU7dGVOfjMf416MMIUVBTJhrAB8u8dqlPZxK8UXVtizymlEwGUo/NDkzHwdi2
odsWRpYF3bJg2DbGtg3LccAL0gFeoRBJIaoJVF02kL/RBckUsANAQgj8oXRn43KYGabjwLDtycOZ
iMV0GBY7E9EsWZZCBJUEVEFIKAqSQpn8VBSkFGXjWar/0zkLtQm8wlKB/M1NoW1LtafCTmK9AWbL
cdA3TYwsC0PLwtC2FiYfV8Vmhs02DAdz51OlFQVpVUVG1ZDTNCQVZaXydxKJIHJWy1KEZR0AeHTd
i679KsmUYZ9SzedRSNzcFDrM6Jsm+qaJC3MM3bYDsG45NCGQ1zTktQTyicSNvdve2EDzwtfpMqty
Y0b+eo9lWQ9B8ogKALKqtvA5hxnn4zF6YwPnYxPLN2bBYjoOzgwDZ4YBApDXEigmE9hJJKDQ22Hv
ddccEkVY1kNc47UWflVk9FaaEPjjnPhqYJo4NXT0DCOI8TPfmK4guptMIaNdFtNfO2c3zjANmGu9
1mKP5VgHkEhUAJCeGb6xHQenhoEzQ4chUTO3CQ7w2pOlFAWVVBqlZBJEhLSiwnQCT4xeR9HVyOG8
Jxd6rOP2yQuZUgzAZHrMnWQKbV3Hqa5L29R5iSYEKqk0TMdBSx+Fbc4VuLlX3p2b15orLNlW20xJ
KYpUQfiWxat7FiRIWcp9QLeikpH5WnnLY7kJ0Rf+GyQvChE0IaAKAQGCIICIIEBgMByG+5Nhu4lW
yQLrQGFFLV0N4t8O3h1LSm/lNQQgpapIKwpSioqUorzeFGSdTDm7Ihs7NnTLHQKybeiWBcvnYZ/Q
mRPEvyUscvhzxHA6iiBCVlWR0zRkVQ0ZVfV05ikRQSWCKgQyV/JOum1hYFpuwnYcO6GRw5/jirAu
3dm4NYOaENhJJFBIJJBTNSmmMDMzhpaFnpvIlWgMcCPcnFZz+vdljzUZF4w0ggilRBJ3kkmkPfZK
XkBEyGoaspqG32azGFomTnUdHcOIdvLkyvjhpbsuY+5qWTKqirvJFIrJpJR7Xt2E7Q7znOo6DCeC
vV/m473Kbm365+tPIKrN4I6WwG46jawm3XjaWjAzumMD/x6OIiew2d7hzBiJvR+WQetQTCSxm04j
HbPVz0SEUjKFYiKJ7tjAr8NhdOKwiYaeApcSpM5+KMasSFbV8J+FIu7l87ET1SxTgX1cLOGddFqS
SeE3sj/95fUnQ8CnoZiyJAkh8Ntsdqm5WHFCEOHdTBalZAo/9/voW4FsDLIWxM5rDQlgEl/JHrS/
l83dOlHNklQUVNKSbyRHtNfodIrAtCmMWHy1RWJcLU1jLCm2IrqOiMQYvhKRe7APTIXFLL2wtkQE
V0sqABDxPdm+DzlVQyE5GYpZd2A4buQ0Df9dugPTcdC3TPSMsXTB/ERLr3uFVA3NkiukFQXvZXOx
SXh6CRFBIYIiBFKqinIqjYFp4tWgj5E0c9WoCgDk7njcCNUWl0Iigfdz+a13WpEQNwuZCytcE7BF
NWxDACCrqri3FdVaCCLcy+WRlSVhbFFRyBC4CwD38jvSzUSIEkSEe/mdcM5ifpt9AeJq2FaU0+lI
HEsiO5oQKMuQRCWuCjBVw7bjTjIVtgmxQYp7yVQN3U0khFh5k4wti0kqChISeP/QLUhsReU5MtzT
0IWlztkEY8tmyHBPxTRTumWLVxDxPRF21p2jvYRASsK/pxIE71ZUpt1GCBnuaejC0m3b9w1ibxPM
LMUeF6ELy3YXcG7xhqFlwZbgiyoYeBm2EW3p9n2KLjLcSwZeCjCaYRvSHY8xDOb00FgzNM0gD29a
DKMZelM4pdm/kCLojCqW46Dp70HkKyGNsEzHwY+9Xmz2Ew0Sw7bxY68n1R5dkkzgmWA4Nv6v18U7
6QzKqdR2btYNOMxo6zr+fc1JrGGhgrgJkDSLVR1m/DIc4GQ0xI67/ZCmTHbWS6vqrRWbw4yRZcEB
w7Qnc97Px2MpeoBvQdxUwdSUbB0FgEkaomMY6BjG6/99kN9Z+8iTqNM3Tby4OA/bjOVgagoQHYdt
x7Kcy9DjCYmIXXtdQHGaYVuxLOdmpG6up0Tq2lXuilppNzIey3QcjG5hln5kWVL1+G6iVto9FsAk
Uxq2MctyKs/xaoERpWueasldYh9+9n1ZOoYOO0Lf3k2xHQcdIzrCmmppIqwIBfDTg4xuC2dRO9HM
1dI08x4ZYQHAyWgkXULQDxxmnIzCH1RekTowFZai1EM0ZGUsdqJ4w1fmZDSCxZHyV6+1JACgVio1
oxTAA0BrNIQZsV2FV8F0bLRGw7DNWAlmfj7dNXlmEJrrIdmzFg6Af/b7YZvhG//s96MVWwEAifr0
1xlhvflnVLgwTbRi2CS2RiNcRHN+Wn36yxthRSzOmvLLcBCrpOnIsvDLcBC2Gesxo6HXwopinAUA
DODFxTnGMZjHNbZtvLg4D33x1jrMxlfAWxP96GnQBnmB6Th4cXEe6cSp7V5DlIZuLnNZO5eFpShz
TySPArpt4x8X55Gc3mw5Dv5xcS7Fsq21UdWj2T8vCatWKjWZ+XmgBnnI0LLw43kPZoQ+INO28eN5
L9JL4NxmsDn7v7fnvAs6CsgeXzBsG3+LyAc1tCz87TwG8/znaGaOsNRIxlmzTBZmdKVYY7eItj7C
j71uhGOqGcTlZhCYIyy3d/gsEIN8hAG8GgykC4inHY1Xg0Eke39XYeDZ1RPsgYXLv6LZO5zH+XiM
HzodnIyGoe4Rwcw4GQ3xQ6cTtWnGNzBfKwuXUTTarSYBsdo7K6UoeD8X/DmHI8vCT/2LaPf65sDA
y1q5Up333OIFq4TIph4Wods2/n7eCzSZOnbrjJuoJtCjRc8sFpZQjxjo+WFOmNjuIs+gaOu6nGv/
NoSBHhRlYci0UFi1UqkLjp/XAgDdDi4VEWRdgcI4nBe0T7l+7wZVPYyj16IAV+gGWVdQMNCDql7r
dK4VVly9liqC+7CDrCswbvBWwDK7zajxi7XUADfYD7KuIHC91dFNr7vxqmulUjNuXivIfdBl2HPd
UybeqnnTy5b203HKa72fy6OUTAZSV8cw8JNEG6JtwnV5q6ss/3ViHKxpj3RoAcY9QdblOytoYGlh
1SqVehzGEIFtU7gODDyrVSr1ZV+/2lUr6sM4BPLb4H01JslQ9eEq71npqqMWyH9cKOKjnQJ+k8kg
N3N4uRLgroCzdeU0Db/JZPDRTgEfF4qB2bAxSwbss6x1hxutVp0I0mwvuYj/KpYunYVoOQ4uzDFK
AR8W2TF05LXEJe9l2DZ+6HYCtWMdmPF9rVLZX/V96/lpVb0fxSZRFSJwUQFAKZmKZJPo5qzur/Pe
ta7WzcivVeGWCMG4f1OGfRFrf41qlUqdGY/Xff8WuWHG41V6gVfZyD/XKpVHzPh+kzL8JMggfVVk
ts2Nqx5tUsbmDb+qHsgab8n84clq2yZx1SwbC6tWKjWh8L5s4sqoKkjSDw8AiAiZgKdI38QkX8X7
68ZVs3jSVamVdo9lC+aLiWDGAjdBOhsV3vdqF23P+sCTIR964FV5m6AJgbup4NMKq3I3lYImSRqC
QQ+83Jrd06uqlctHYYtLAKjmdyJx5o4gmtgash0MelArl4+8LNPza3LF9cTrcpdBEwIfFgrSxS7X
kVFVfFgohOa5GPTEa1EBaw7pLEOj3T4k8Bd+lX+Vu6kU3k1nIpnhBibDTb+OhoEeFuDmqh75Ubav
7UWj3T4g8Nd+lU+YDJfsptOXxgSjjGHbOBmN0DF0X5fg+9H8zeJ7IOKHuJJC4E4qhTsRHYNbBstx
cGboONN1GB7vPeG3qIAAhAUAjc7JHmyqE1DYpJxCIoFyKoWcdrvOLOybY7R1Hb0N93x4k6fy/2Cu
wLpO64pLEOFuMoVyKoVETJq7dRnbNtq6jlNDX/lkjiBFBQQoLABodDpVWNbRMnO5CEA5lcZuOh3b
5m5dLGdyMkdbHy0VhzHje6jq2jMV1iGUZE+j1XpEhC8XPZ/XNLyXzcUmIPcLw7bxatC/dk94P3t+
1xFaFrHRau2D8HS2aSQAv8vmUIpA1lwmLsZjvOxfXNp8hIEeGPc3mfqyCaGmpxudThGW9ZQInyaF
wEeF4rbZWxNmxq/DIU70UShN31WkGPf4387po48KpYeCaKNe4xb0urp+WEqnH4VtiBTCAgBmrgI4
BPCnkE2JKs8APCSiZtiGABIJawoz7wM4QkyW8wfASwAHRFQP25BZpAtoiKhORFUAjyHZ5EHJ6AF4
TERV2UQFSOixZnGbxwMAD7Fh1j5G9DAJGY5kafbmIbWwpjBzERNx3WaBTQV1SESh9faWJRLCmuIK
7AATgd2WGOwl3ngo6QU1JVLCmoWZDwDcR3x7kc8APCWK5tlGkRXWlBkvdgDgk1CN2ZznmPSII+Wd
5hF5Yc3iBvsPAewjOiJ7DuApJA/GVyVWwprF9WT7Mw9ZhPYck0O56wDqUfdMi4itsK5yRWh7AKrw
vwPwEkATwDFiLqSr3BphLYKZ9wBMRVd1H7NU8bYAp4KZpek+6gC6RBTIhDpZ+X8FvJCIHEak2QAA
AABJRU5ErkJggg==';





}

$sqlFordetail = "INSERT INTO user_detail VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$this->db->query($sqlFordetail, array($_SESSION['Rname'],'m',date("Y-m-d h:i:sa"),$_SESSION['Rdate'],$_SESSION['Rcareer'],$_SESSION['Rweight'],$_SESSION['Rheight'],$_SESSION['Rintro'],$_SESSION['user_id'],$_SESSION['access_token'],NULL,NULL,date("Y-m-d h:i:sa"),$personal_photo,NULL,'2017-01-01',NULL)    );

$sqlforresultdetail =  "INSERT INTO user_goal(fb_user_id, steps, floors, distance, activeMinutes, calories) VALUES(?, '10000', '10', '8.05' , '30', '2634')";
$this->db->query($sqlforresultdetail,$_SESSION['user_id']);

//$_SESSION["loginedName"] = $_SESSION['Rname'];
//$sql = "INSERT INTO user VALUE(?,?,?,?,?,?,?,?,?,?)";
//$this->db->query($sql,array($_SESSION['Rname'],'M', $_SESSION['Rcareer'],23,$_SESSION['Rweight'],$_SESSION['Rheight'],$_SESSION['Rintro'],10000,$_SESSION['user_id'],$_SESSION['access_token']));
$_SESSION["data"] = "full";
}

if(empty($checksql->result()))
{//jal register_page !!!!!
Redirect('/fypphp/register.php', false);
$_SESSION["login"] = "yes";
$_SESSION["data"] = true;
}
else
{
$_SESSION["login"] = "no";
$_SESSION["data"] = false;
}

}


//==============================================================
if(isset($_SESSION["goal"]))
{

//print_r($_SESSION["goal"]);
//print_r($_SESSION["goal"]);
//print_r($_SESSION["VAdata"]);
//print_r($_SESSION["LAdata"]);
//print_r($_SESSION["MAdata"]);
//print_r($_SESSION["SAdata"]);

//$valueUpdate = $this->db->query("UPDATE Fitbit_Activity VALUE(",);



}

if(isset($_SESSION["loginedName"])){
$loginedSQL =  $this->db->query("SELECT *,(veryActive+moderatelyActive+lightlyActive+sedentaryActive)/4 as mean FROM Fitbit_Activity WHERE name = '".$_SESSION['loginedName']."'");
foreach($loginedSQL->result() as $row)
{
    $_SESSION["LVA"] = $row->veryActive;
    $_SESSION["LMA"] = $row->moderatelyActive;
    $_SESSION["LLA"] = $row->lightlyActive;
    $_SESSION["LSA"] = $row->sedentaryActive;
    $_SESSION["LM"]  = $row->mean;
}
}

//query for searching your personal information :)
if(isset($_GET['page']))

{

//Family Searching :)
$sqlForFamily = $this->db->query("SELECT b.familyName FROM user usr INNER JOIN Family b ON usr.name = b.name where usr.name='".$_GET['page']."'");
foreach($sqlForFamily->result() as $row)
{
$_SESSION["searchFamily"] = $row->familyName;
}

if(empty($sqlForFamily->result()))
{
 $_SESSION["searchFamily"] = "No Family";
}

//personal profile
$sql2 = $this->db->query("SELECT * FROM user WHERE name = '".$_GET['page']."'");
foreach($sql2->result() as $row)
{
$_SESSION["searchGender"] = $row->gender;
//$_SESSION["searchAge"] = $row->user_age;
$_SESSION["searchWeight"] = $row->weight;
$_SESSION["searchHeight"] = $row->height;
$_SESSION["searchInfo"] = $row->message;
//$_SESSION["profit"] = $row->profit;
}


//rank , It ;s still problematics for SQL Error , Don 't know why :(


//$sqlrank = $this->db->query("SELECT * FROM (SELECT IF(@rownum = NULL, @rownum := 0 ,@rownum := @rownum + 1) AS rank,name FROM user ORDER BY profit DESC) as result WHERE name='".$_GET['page']."'");
//foreach($sqlrank->result() as $row)
//{
//$_SESSION["ranksearch"] = $row->rank;
//}


$sql3 = $this->db->query("SELECT COUNT(friend_name) as num from friend WHERE name = '".$_GET['page']."'");
foreach($sql3->result() as $row2){
$_SESSION["numFriend"] = $row2->num;
}

$sqlForpreventadded = $this->db->query("SELECT * FROM friend where name = '".$_SESSION['loginedName']."'");


//boolean variable for check family added
$_SESSION["addedfd"] = "no";
$_SESSION["addedfamily"] = "no";
$_SESSION["addedfamily2"] = "no";


$sqlForpreventaddFamily = $this->db->query("SELECT * FROM family where name = '".$_SESSION['loginedName']."'");

foreach($sqlForpreventaddFamily->result() as $rowF)//check whether have familyname or not for yourself
{
      $_SESSION["addedfamily2"] = "yet";
}


$sqlForpreventaddFamily2 = $this->db->query("SELECT * FROM family where name = '".$_GET['page']."'");
//  your searched user didn ;t have family



foreach($sqlForpreventaddFamily2->result() as $rowF)//check whether have familyname or not for yourself
{
      $_SESSION["addedfamily"] = "yet";
}


if(empty($sqlForpreventaddFamily2->result()))
{
  $_SESSION["addedfamily2"] = "yes";
}

//you didn 't have family
if(empty($sqlForpreventaddFamily->result()))
{
    $_SESSION["addedfamily"] = "yes";
}


foreach($sqlForpreventadded->result() as $rowC)//check whehther added friend
{
       if($rowC->friend_name == $_GET['page'])
       {
        $_SESSION["addedfd"] = "yes";
       }
}

}

if(isset($_SESSION["searchName"])){
$testtsql  = $this->db->query("SELECT * FROM friend where name = ('".$_SESSION['loginedName']."' and friend_name = '".$_SESSION['searchName']."') or ('".$_SESSION['searchName']."' and friend_name = '".$_SESSION['loginedName']."')");
if(empty($testtsql->result()))
$_SESSION["pass1"] = false;
}

//Invitation message for friend
if(isset($_POST["invit1"])&& $_SESSION["pass1"] == false )
{
$sql113 = "INSERT INTO message VALUE(?,?,?,?,?,0,0)";
$this->db->query($sql113,array($_SESSION["searchName"],$_SESSION["loginedName"],$_POST["invit1"],"Friend","Invitation From your friend"));

$sqlForaddfriend = "INSERT INTO friend VALUE(?,?)";
$this->db->query($sqlForaddfriend,array($_SESSION["loginedName"],$_SESSION["searchName"]));

$sqlForaddfriend2 = "INSERT INTO friend VALUE(?,?)";
$this->db->query($sqlForaddfriend2,array($_SESSION["searchName"],$_SESSION["loginedName"]));


$_SESSION["pass1"] = true;
}

//invitation message for family


if(isset($_SESSION["searchName"])){
$testttsql = $this->db->query("SELECT * FROM family where name = '".$_SESSION['searchName']."'" );
if(empty($testttsql->result()))
$_SESSION["pass2"] = false;
}


if(isset($_POST["invit2"]) && $_SESSION["pass2"]==false )
{

$sql = "INSERT INTO message VALUE(?,?,?,?,?,0,0)";
$this->db->query($sql,array($_SESSION["searchName"],$_SESSION["loginedName"],$_POST["invit2"],"Family","Added you into new family"));

$sqlForsearchMyfamily = $this->db->query("SELECT * FROM family where name = '".$_SESSION['loginedName']."'");
foreach($sqlForsearchMyfamily->result() as $rowC)
{
  $_SESSION["family"] = $rowC->familyName; //session var stored family name of loginedName
}


$sqlForaddfamily = "INSERT INTO family VALUE(?,0,?)";
$this->db->query($sqlForaddfamily,array($_SESSION["searchName"],$_SESSION["family"]));

$sqlupdateFamilyForusertable = "UPDATE user_detail SET familyName = ? where name = ? ";
$this->db->query($sqlupdateFamilyForusertable,array($_SESSION["family"],$_SESSION["searchName"])  );




$_SESSION["pass2"] = true;
}

//invitation message for family (being member of searched user)



//searching whehther family added or not
if(isset($_SESSION['loginedName']))
{
$testtttsql = $this->db->query("SELECT * FROM family where name = '".$_SESSION['loginedName']."'" );
if(empty($testtttsql->result()))
$_SESSION["pass3"] = false;
}


if(isset($_POST["invit3"]) && $_SESSION["pass3"]==false)
{
$_SESSION["family2"] = array();
$sql = "INSERT INTO message VALUE(?,?,?,?,?,0,0)";
$this->db->query($sql,array($_SESSION["searchName"],$_SESSION["loginedName"],$_POST["invit3"],"Family","A new member added into your family"));

$sqlForsearchMyfamily2 = $this->db->query("SELECT * FROM family where name = '".$_SESSION["searchName"]."'");
foreach($sqlForsearchMyfamily2->result() as $rowC)
{
  $_SESSION["family2"] = $rowC->familyName; //session var stored family name of loginedName
}

$sqlForaddfamily = "INSERT INTO family VALUE(?,0,?)";
$this->db->query($sqlForaddfamily,array($_SESSION["loginedName"],$_SESSION["family2"]));


$_SESSION["pass3"] = true;
}




//message push to noticebox and mailbox


if(isset($_GET['page']))
{
$_SESSION["poster"] = array();
$_SESSION["messagesend"] = array();
$_SESSION["sender"] = array();
$_SESSION["title"] = array();
$sqlformessage = $this->db->query("SELECT * FROM message where name = '".$_SESSION['loginedName']."' and type = '".$_GET["page"]."'");


$countmessage1 = $this->db->query("SELECT * FROM message where name = '".$_SESSION['loginedName']."' and type='Friend' ");
$countmessage2 = $this->db->query("SELECT * FROM message where name = '".$_SESSION['loginedName']."' and type='Family' ");
$countmessage3 = $this->db->query("SELECT * FROM message where name = '".$_SESSION['loginedName']."' and type='upgrade' ");
$countmessage4 = $this->db->query("SELECT * FROM message where name = '".$_SESSION['loginedName']."' and type='other' ");

$_SESSION["msg1"] = array();
$_SESSION["msg2"] = array();
$_SESSION["msg3"] = array();
$_SESSION["msg4"] = array();
foreach($countmessage1->result() as $row)
{
array_push($_SESSION["msg1"],$row->post_name);
}
foreach($countmessage2->result() as $row)
{
array_push($_SESSION["msg2"],$row->post_name);
}
foreach($countmessage3->result() as $row)
{
array_push($_SESSION["msg3"],$row->post_name);
}
foreach($countmessage4->result() as $row)
{
array_push($_SESSION["msg4"],$row->post_name);
}



foreach($sqlformessage->result() as $row)
{
array_push($_SESSION["poster"],$row->post_name);
array_push($_SESSION["messagesend"],$row->message);
array_push($_SESSION["sender"],$row->name);
array_push($_SESSION["title"],$row->title);
}


}




//query for update your information
 if (isset($_POST['action']))
 {
 $_SESSION['name2'] = $_POST['first_name'];
 $_SESSION['weight2'] = $_POST['weight'];
 $_SESSION['height2'] = $_POST['height'];
 $_SESSION['carer2'] = $_POST['career'];

$sql = "UPDATE user set gender = ? , weight = ? , height = ? WHERE name = 'gordon' ";
$this->db->query($sql,array($_SESSION['name2'],$_SESSION['weight2'],$_SESSION['height2']));
 }

//query information
$query = $this->db->query("SELECT * FROM Fitbit_Data WHERE name = 'Quan Long' ");
$queryForSportAmt =  $this->db->query("SELECT *,(veryActive+moderatelyActive+lightlyActive+sedentaryActive)/4 as mean FROM Fitbit_Activity");
$queryForPI = $this->db->query("SELECT * FROM user where name = 'gordon'");
//global variable for health data
global $arr;
global $arrForDistance;
global $arrForstep;

//global variable for sport amount
global $veryActive;
global $moderatelyActive;
global $lightlyActive;
global $sedentaryActive;
global $mean;


//global variable for personal information summary
global $name;
global $gender;
global $user_age;
global $family_name;
global $weight;
global $height;


foreach($queryForPI->result() as $row)
    {
        $name = $row->name;
        $gender = $row->gender;
        //$user_age = $row->user_age;
        //$family_name = $row->family_name;
        $weight = $row->weight;
        $height = $row->height;
    }

$_SESSION['name'] = $name;
$_SESSION['gender'] = $gender;
//$_SESSION['user_age'] = $user_age;
$_SESSION['family_name'] = "hello";
$_SESSION['weight'] = $weight;
$_SESSION['height'] = $height;


//Operation for health data summary
$arrForstep = array();
$arr = array();
$arrForDistance = array();
$posts = array();
$response = array();
$mean = array();


foreach ($query->result() as $row)
{
   array_push($arr,$row->caloriesOut,$row->distance);
   array_push($arrForDistance,$row->distance);
   array_push($arrForstep,$row->steps);
   $posts[] = array('Calories Out'=> $row->caloriesOut, 'Distance'=> $row->distance);
}

//operation for Sport Amount

 $veryActive = array();
 $moderatelyActive = array();
 $lightlyActive = array() ;
 $sedentaryActive = array();

foreach($queryForSportAmt->result() as $row){
    array_push($veryActive,$row->veryActive);
    array_push($moderatelyActive,$row->moderatelyActive);
    array_push($lightlyActive,$row->lightlyActive);
    array_push($sedentaryActive,$row->sedentaryActive);
    array_push($mean,$row->mean);
}

?>


</html>
