
<?php
include 'index.php';
$url = "https://api.fitbit.com/1/user/-/profile.json";


//Analysis for json file
if(isset($_POST['result'])){
//grabbing value from json file
    /*
$goalarray = array();
$summary = array();
$data = array();

$array = array();
$array = json_decode($_SESSION['result'],true);


foreach($array["goals"] as $value) {
    array_push($goalarray,$value);
}


foreach($array["summary"] as $value)
{
    array_push($summary,$value);
}


if(is_array($summary[4])) {
foreach (($summary)[4] as $value) {
    array_push($data,$value);
}
}

$valueArr = array();
$valueArr2 = array();
$valueArr3 = array();
$valueArr4 = array();
$valueArr5 = array();

if(is_array($data[0]))
{
// THIS IS ARRAY FOR TOTAL AND TRACKER DISTANCE.
foreach(($data[0]) as $value)
array_push($valueArr,$value);
}

// this is array for storing veryActive data
if(is_array($data[3]))
{
foreach(($data[3]) as $value)
array_push($valueArr2,$value);
}

//this is array for storing moderatelyActive data
if(is_array($data[4]))
{
foreach(($data[4]) as $value)
array_push($valueArr3,$value);
}

//this is array for storing lightlyActive data
if(is_array($data[5]))
{
foreach($data[5] as $value)
array_push($valueArr4,$value);
}

//this is array for storing sedentaryActive data
if(is_array($data[6]))
{
foreach($data[6] as $value)
array_push($valueArr5,$value);
}

//Array for storing value of activeMinutes,caloriesOut,distance,steps
$_SESSION["goal"] = array();
$_SESSION["goal"] = $goalarray;

//Array For storing Active Value
$_SESSION["VAdata"] =  array_values($valueArr2)[1];
$_SESSION["MAdata"] =  array_values($valueArr3)[1];
$_SESSION["LAdata"] =  array_values($valueArr4)[1];
$_SESSION["SAdata"] =  array_values($valueArr5)[1];

*/
}

?>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>FitBit Dashboard</title>

    <!-- CORE CSS-->
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS for full screen (Layout-2)-->
    <link href="css/layouts/style-fullscreen.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/xcharts/xcharts.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>
      <link href="js/plugins/xcharts/xcharts.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <script type="text/javascript" src="js/plugins/d3/d3.min.js"></script>
    <!-- xcharts -->
    <script type="text/javascript" src="js/plugins/xcharts/xcharts.min.js"></script>
    <script type="text/javascript" src="js/plugins/xcharts/xcharts-script.js"></script>

</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
         <?php

        echo '<div id="loader"></div>';
        echo '<div class="loader-section section-left"></div>';
        echo '<div class="loader-section section-right"></div>';



         ?>


    </div>
    <!-- End Page Loading -->


    <style type="text/css">

            #suggestions{
                position: relative;
                z-index: 9999;
            }
            #autoSuggestionsList > li {
                background: none repeat scroll 0 0 #F3F3F3;
                border-bottom: 1px solid #E3E3E3;
                list-style: none outside none;
                padding: 3px 15px 3px 15px;
                text-align: left;
            }
            #autoSuggestionsList > li a {  color: #1d80c2; }
            .auto_list {
                border: 1px solid #E3E3E3;
                border-radius: 5px 5px 5px 5px;
                position: absolute;
                width: 110%;
            }

            .search-input {
                padding: 30px;
                border: solid 1px #CCCCCC;
                /* margin: 2% 10%; */
                background: #F8F8F8;
                border-radius: 10px;
                text-align: center;
                font-size: 20px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                /* box-sizing: border-box; */
                /* text-align: left; */
                font-size: 19px;
                /* font-family: inherit; */
                -webkit-box-shadow: 0px 0px 0px 1px #b8b8b8;
                -moz-box-shadow: 0px 0px 0px 1px #b8b8b8;
                /* box-shadow: 0px 0px 0px 1px #b8b8b8; */
                -webkit-background-clip: padding-box;
                -moz-background-clip: padding-box;
                background-clip: padding-box;
                border: 3px solid rgba(255,255,255,0.4);
                -webkit-border-radius: 30px;
                -moz-border-radius: 30px;
                border-radius: 30px;
                /* width: 100% !important; */
                max-width: none;
                height: 54px;
                min-height: 54px;
                padding: 0 45px 0 20px;
            }

    </style>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- STARtit -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
                      <li><h1 class="logo-wrapper"><a href="first.php" class="brand-logo darken-1"><img src="" alt=""></a> <span class="logo-text"></span></h1></li>
                    </ul>
                     <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <form action="http://localhost/fypphp6/tiktok/search" method="post">
                        <input type="text" name="Search" id="search_data" class="form-control header-search-input z-depth-2" name="search-term" placeholder="Find Your Friend Here" onkeyup="liveSearch()" autocomplete="off"/>
                        <div id="suggestions">
                        <div id="autoSuggestionsList">
                        </div>
                        </div>
                        </form>
                    </div>


                    <!--
                   <form action="http://localhost/fypphp6/tiktok/search" method="post">
                                    <input type="text" id="search_data" class="form-control search-input" name="search-term" placeholder="Search your friend or family" onkeyup="liveSearch()" autocomplete="off">
                                    <div id="suggestions">
                                        <div id="autoSuggestionsList">
                                        </div>
                                    </div>
                                    <button type="submit" class="left-searchbtn"><i class="fa fa-search" style="color: #048CCE;"></i></button>

                                </form>


                    -->

                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>


                        </a>
                        </li>

                    </ul>

                        <!-- notifications-dropdown               <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge"><?php echo count($_SESSION["messagesend"]); ?></small></i>       /*
                    <ul id="notifications-dropdown" class="dropdown-content">
                      <li>
                        <h5>NOTIFICATIONS <span class="new badge"><?php
                      if(isset($_SESSION["messagesend"]))echo count($_SESSION["messagesend"]); ?></span></h5>
                      </li>
                      <li class="divider"></li>
                      <li><a href='#!'><i class='mdi-action-add-shopping-cart'></i></a></li>
                      <?php

/*
                      if(isset($_SESSION["messagesend"]))
                      {
                      $arraylength = count($_SESSION["messagesend"]);

                      for($x = 0 ; $x < $arraylength ; $x++)
                      {
                    //  echo "<li><a href='#!'><i class='mdi-action-add-shopping-cart'>",array_values($_SESSION["messagesend"])[$x],"</i></a></li>";
                      }

                      }

                      */
                      ?>

                    </ul>

                    */-->

                </div>
            </nav>
        </div>


        <!-- end header nav-->
    </header>
    <!-- END HEADER -->


    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                            </div>
                            <div class="col col s8 m8 l8">

                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php if(isset($_SESSION["loginedName"]))echo $_SESSION["loginedName"];?></a>

                            </div>
                        </div>
                    </li>
    <li class="bold"><a href="first.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>index page</a></li>
    <li class="bold"><a href="mail.php?page=family" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Mail Page</a></li>
	<li class="bold"><a href="familyInfo.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Family Info Page</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                            <div class="collapsible-body">
                                <ul>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                    <ul class="collapsible collapsible-accordion">





</ul>
                </li>
              <li class="li-hover"><div class="divider"></div></li>

                </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">

                    <!--chart dashboard start-->
                    <div id="chart-dashboard">
                        <div class="row">
                            <div class="col s12 m8 l8">
                                <div class="card">
                                    <div class="card-move-up waves-effect waves-block waves-light">
                                        <div class="move-up cyan darken-1">
                                            <div>
                                                <span class="chart-title white-text">Physical Data Summary for <?php
												                                                                  if($_SESSION["fusr"] > 1)
												                                                                    echo $_SESSION["loginedName"] . " family";
												                                                                  else
																													echo $_SESSION["loginedName"];
												                                                                     ?> </span>
                                                <div class="chart-revenue cyan white-text">
<?php
$count = count($_SESSION["vActiveArr"]);

if($count>0)
echo'<div class ="chart-revenue orange white-text"></div>',$_SESSION["fusr2"][0],'(',$_SESSION["fusr"][0],')<br/>';
if($count>1)
{
echo'<div class ="chart-revenue blue white-text"></div>',$_SESSION["fusr2"][1],'(',$_SESSION["fusr"][1],')<br/>';
}
if($count>2)
echo'<div class ="chart-revenue pink white-text"></div>',$_SESSION["fusr2"][2],'(',$_SESSION["fusr"][2],')<br/>';
if($count>3)
echo'<div class ="chart-revenue brown white-text"></div>',$_SESSION["fusr2"][3],'(',$_SESSION["fusr"][3],')<br/>';
if($count > 1)
echo'<div class ="chart-revenue green white-text"></div>mean<br/>';


?>
                                                </div>

                                            </div>
                                            <div class="trending-line-chart-wrapper">
                                                <canvas id="trending-line-chart" height="70"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <span class="chart-title black-text">Cardio Data Summary for <?php
												                                                                  if($_SESSION["fusr"] > 1)
												                                                                    echo $_SESSION["loginedName"] . " family";
												                                                                  else
																													echo $_SESSION["loginedName"];
												                                                                     ?> </span><br/>
                                        <div class="col s12 m3 l3">

                                            <div id="doughnut-chart-wrapper">
                                                <canvas id="doughnut-chart" height="200"></canvas>

                                            </div>
                                        </div>
                                        <div class="col s12 m2 l2">
                                            <ul class="doughnut-chart-legend">
                                                <li class="mobile ultra-small"><span class="legend-color"></span>Out of range 's data summary</li>
                                                <li class="mobile ultra-small"><span class="legend-color"></span>Fatburn 's data summary</li>
                                                <li class="kitchen ultra-small"><span class="legend-color"></span>Cardio ' s data summary</li>

                                            </ul>
                                        </div>



<div class="col s12 m5 l6">
<div class="trending-bar-chart-wrapper">
<canvas id="trending-bar-chart" height="230"></canvas>
</div>
</div>

                                    </div>



                               </div>
                            </div>

                            <div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-move-up teal waves-effect waves-block waves-light">
                                        <div class="move-up">
                                            <p class="margin white-text">Activation Value</p>

<div class="chart-revenue green white-text">
<?php
$count = count($_SESSION["vActiveArr"]);

if($count>0)
echo'<div class ="chart-revenue orange white-text"></div>',$_SESSION["fusr2"][0],'(',$_SESSION["fusr"][0],')<br/>';
if($count>1)
{
echo'<div class ="chart-revenue blue white-text"></div>',$_SESSION["fusr2"][1],'(',$_SESSION["fusr"][1],')<br/>';
}
if($count>2)
echo'<div class ="chart-revenue pink white-text"></div>',$_SESSION["fusr2"][2],'(',$_SESSION["fusr"][2],')<br/>';
if($count>3)
echo'<div class ="chart-revenue brown white-text"></div>',$_SESSION["fusr2"][3],'(',$_SESSION["fusr"][3],')<br/>';
if($count > 1)
echo'<div class ="chart-revenue green white-text"></div>mean<br/>';


?>
</div>

                                            <canvas id="trending-radar-chart" height="370" ></canvas>
                                        </div>
                                    </div>

                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Revenue by country <i class="mdi-navigation-close right"></i></span>
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th data-field="country-name">Country Name</th>
                                                    <th data-field="item-sold">Item Sold</th>
                                                    <th data-field="total-profit">Total Profit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>USA</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>UK</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Brazil</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>

                                                    <td>India</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>France</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Austrelia</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--chart dashboard end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i> Family Rank</p>
                                        <h4 class="card-stats-number"><?php echo $_SESSION["rankreal"]; ?></h4>
                                        <p class="card-stats-compare"> Among <?php echo count($_SESSION["ranking"]);?> <span class="green-text text-lighten-5">team in the world</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content pink lighten-1 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> Money </p>
                                        <h4 class="card-stats-number"><?php echo $_SESSION["money"]; ?></h4> <br>                                       </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Today 's game point </p>
                                        <h4 class="card-stats-number"><?php if(isset($_SESSION["today_point"])) echo $_SESSION["today_point"]; else echo 0 ; ?> </h4>
										<br>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Points</p>
                                        <h4 class="card-stats-number"><?php echo $_SESSION["rankForpoint"]+1000; ?></h4>
                                        <br/>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--card stats end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">

                            <div class="col s12 m12 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header cyan">
                                        <h4 class="task-card-title">World Ranking</h4>

                                    </li>
									<?php
									for($x = 0 ; $x < count($_SESSION["ranking"]) ; $x++)
									{
                                    echo'<li class="collection-item dismissable">';
                                    echo'<label for="task1">';
									echo $_SESSION["ranking"][$x][2];
									echo'<a href="#" class="secondary-content"><span class="ultra-small">Point :';
									echo $_SESSION["ranking"][$x][1] + 1000;
									echo'</span></a>';
                                    echo'</label>';
                                    echo'</li>';
									}
									?>

                                </ul>
                            </div>

                            <div class="col s12 m6 l4">
                                <div id="flight-card" class="card">
                                    <div class="card-header amber darken-2">
                                        <div class="card-title">
                                            <h4 class="flight-card-title">Last Battle</h4>
                                            <p class="flight-card-date"><?php echo $_SESSION["datelr"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="card-content-bg white-text">
                                        <div class="card-content">
                                            <div class="row flight-state-wrapper">
                                                <div class="col s5 m5 l5 center-align">
                                                    <div class="flight-state">
                                                        <h4 class="margin"><?php echo $_SESSION["af"]; ?></h4>
                                                        <p class="ultra-small">Your Family</p>
                                                    </div>
                                                </div>
                                                <div class="col s2 m2 l2 center-align">
                                                    <h1>VS</h1>
                                                </div>
                                                <div class="col s5 m5 l5 center-align">
                                                    <div class="flight-state">
                                                        <h4 class="margin"><?php echo $_SESSION["df"];?> </h4>
                                                        <p class="ultra-small">Defense 's Family</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6 m6 l6 center-align">
                                                    <div class="flight-info">
                                                        <p class="small"><span class="grey-text text-lighten-4">Point:</span> <?php echo $_SESSION["pointf"];?></p>
                                                    </div>
                                                </div>
                                                <div class="col s6 m6 l6 center-align flight-state-two">
                                                    <div class="flight-info">
                                                        <p class="small"><span class="grey-text text-lighten-4">Award received:</span> <?php echo $_SESSION["award"]; ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m6 l4">
                                <div id="profile-card" class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="images/user-bg.jpg" alt="user background">
                                    </div>
                                    <div class="card-content">

                                        <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                            <i class="mdi-action-account-circle"></i>
                                        </a>

                                        <span class="card-title activator grey-text text-darken-4"><?php echo $_SESSION["loginedName"];?></span>
                                         <?php

										                                                                          for($x = 0 ; $x < count($_SESSION["USERINFOGALLERY"]) ;$x++)
																												  {
																											       echo '<p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i>';
											                                                                       echo $_SESSION["USERINFOGALLERY"][$x];
																												   echo '</p>';
																												  }
																											?>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row">


                    </div>


                    <!--card widgets end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->


                    <!-- Floating Action Button -->

                    <!-- Floating Action Button -->

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <aside id="right-sidebar-nav">
                <ul id="chat-out" class="side-nav rightside-navigation">
                    <li class="li-hover">
                    <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                    <div id="right-search" class="row">
                        <form class="col s12">
                            <div class="input-field">
                                <i class="mdi-action-search prefix"></i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Search</label>
                            </div>
                        </form>
                    </div>
                    </li>

                        <li>
                            <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                            <div class="collapsible-body sales-repoart">
                                <div class="sales-repoart-list  chat-out-list row">
                                    <div class="col s8">Target Salse</div>
                                    <div class="col s4"><span id="sales-line-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Payment Due</div>
                                    <div class="col s4"><span id="sales-bar-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Delivery</div>
                                    <div class="col s4"><span id="sales-line-2"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Progress</div>
                                    <div class="col s4"><span id="sales-bar-2"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                            <div class="collapsible-body favorite-associates">
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s8">
                                        <p>Eileen Sideways</p>
                                        <p class="place">Los Angeles, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="avatar3.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Zaham Sindil</p>
                                        <p class="place">San Francisco, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="avatar3.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Renov Leongal</p>
                                        <p class="place">Cebu City, Philippines</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="images/avatar3.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Weno Carasbong</p>
                                        <p>Tokyo, Japan</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="images/avatar3.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Nusja Nawancali</p>
                                        <p class="place">Bangkok, Thailand</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
   <!--     <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">World Market</h5>
                    <p class="grey-text text-lighten-4">World map, world regions, countries and cities.</p>
                    <div id="world-map-markers"></div>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Sales by Country</h5>
                    <p class="grey-text text-lighten-4">A sample polar chart to show sales by country.</p>
                    <div id="polar-chart-holder">
                        <canvas id="polar-chart-country" width="200"></canvas>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2016 <a class="grey-text text-lighten-4" href="" target="_blank">Fitbit Fighter</a> All rights reserved.
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


<!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js">
</script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script type="text/javascript" src="js/fitbit.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script src = "js/fitbit_data.js"></script>


	<script type="text/javascript">





var statement = parseInt(<?php if(isset($_SESSION["fusr"]) )
{
	                                 echo count($_SESSION["fusr"]);
}
							   if(empty($_SESSION["fusr"]))
									 echo 0;

									 ?>);


if(statement == 1 || statement == 0 ){

alert("hi");
var step1 = <?php echo $_SESSION["stepArrS"] ; ?>;
var floor1 = <?php echo $_SESSION["floorArrS"];?>;
var activityCalories1 = <?php echo $_SESSION["activityCaloriesArrS"];?>;
var caloriesBMR1 = <?php echo $_SESSION["caloriesBMRArrS"];?>;
var caloriesOut1 = <?php echo $_SESSION["caloriesOutArrS"];?>;
var elevation1 = <?php echo $_SESSION["elevationArrS"];?>;
var floorA1 = <?php echo $_SESSION["floorArrS"];?>;


}


if(statement == 2){
var step1 = parseFloat("<?php echo $_SESSION["stepArr"][1]; ?>");
var elevation1 = parseFloat("<?php echo $_SESSION["elevationArr"][1]; ?>");
var floorA1 = parseFloat("<?php echo $_SESSION["floorArr"][1]; ?>");
var caloriesOut1 = parseFloat("<?php echo $_SESSION["caloriesOutArr"][1]; ?>");
var caloriesBMR1 = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][1]; ?>");
var activityCalories1 = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][1]; ?>");


var step2 = parseFloat("<?php echo $_SESSION["stepArr"][0]; ?>");
var floor2 = parseFloat("<?php echo $_SESSION["floorArr"][0]; ?>");
var activityCalories2 = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][0]; ?>");
var caloriesBMR2 = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][0]; ?>");
var caloriesOut2 = parseFloat("<?php echo $_SESSION["caloriesOutArr"][0]; ?>");
var elevation2 = parseFloat("<?php echo $_SESSION["elevationArr"][0]; ?>");
var floorA2 = parseFloat("<?php echo $_SESSION["floorArr"][0]; ?>");

var stepmean = parseFloat("<?php echo $_SESSION["stepArr"][1]+$_SESSION["stepArr"][0]; ?>")/2;
var elevationmean = parseFloat("<?php echo $_SESSION["elevationArr"][0]+$_SESSION["elevationArr"][1]; ?>")/2;
var floorAmean = parseFloat("<?php echo $_SESSION["floorArr"][1]+$_SESSION["floorArr"][0]; ?>")/2;
var caloriesOutmean = parseFloat("<?php echo $_SESSION["caloriesOutArr"][0]+$_SESSION["caloriesOutArr"][1]; ?>")/2;
var caloriesBMRmean = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][0]+$_SESSION["caloriesBMRArr"][1]; ?>")/2;
var activityCaloriesmean = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][1]+$_SESSION["activityCaloriesArr"][0]; ?>")/2;


}


if(statement == 3){

var step1 = parseFloat("<?php echo $_SESSION["stepArr"][1]; ?>");
var elevation1 = parseFloat("<?php echo $_SESSION["elevationArr"][1]; ?>");
var floorA1 = parseFloat("<?php echo $_SESSION["floorArr"][1]; ?>");
var caloriesOut1 = parseFloat("<?php echo $_SESSION["caloriesOutArr"][1]; ?>");
var caloriesBMR1 = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][1]; ?>");
var activityCalories1 = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][1]; ?>");


var step2 = parseFloat("<?php echo $_SESSION["stepArr"][0]; ?>");
var floor2 = parseFloat("<?php echo $_SESSION["floorArr"][0]; ?>");
var activityCalories2 = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][0]; ?>");
var caloriesBMR2 = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][0]; ?>");
var caloriesOut2 = parseFloat("<?php echo $_SESSION["caloriesOutArr"][0]; ?>");
var elevation2 = parseFloat("<?php echo $_SESSION["elevationArr"][0]; ?>");
var floorA2 = parseFloat("<?php echo $_SESSION["floorArr"][0]; ?>");


var step3 = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["stepArr"][2]; ?>");
var floor3 = parseFloat("<?php if(isset($_SESSION["floorArr"][2]) )echo $_SESSION["floorArr"][2]; ?>");
var activityCalories3 = parseFloat("<?php if(isset($_SESSION["activityCaloriesArr"][2]) )echo $_SESSION["activityCaloriesArr"][2]; ?>");
var caloriesBMR3 = parseFloat("<?php if(isset($_SESSION["caloriesBMRArr"][2]) )echo $_SESSION["caloriesBMRArr"][2]; ?>");
var caloriesOut3 = parseFloat("<?php if(isset($_SESSION["caloriesOutArr"][2]) )echo $_SESSION["caloriesOutArr"][2]; ?>");
var elevation3 = parseFloat("<?php if(isset($_SESSION["elevationArr"][2]) )echo $_SESSION["elevationArr"][2]; ?>");
var floorA3 = parseFloat("<?php if(isset($_SESSION["floorArr"][2]) )echo $_SESSION["floorArr"][2]; ?>");

var stepmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["stepArr"][2]+$_SESSION["stepArr"][1]+$_SESSION["stepArr"][0]; ?>")/3;
var elevationmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["elevationArr"][2]+$_SESSION["elevationArr"][0]+$_SESSION["elevationArr"][1]; ?>")/3;
var floorAmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["floorArr"][2]+$_SESSION["floorArr"][1]+$_SESSION["floorArr"][0]; ?>")/3;
var caloriesOutmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["caloriesOutArr"][2]+$_SESSION["caloriesOutArr"][0]+$_SESSION["caloriesOutArr"][1]; ?>")/3;
var caloriesBMRmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["caloriesBMRArr"][2]+$_SESSION["caloriesBMRArr"][0]+$_SESSION["caloriesBMRArr"][1]; ?>")/3;
var activityCaloriesmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["caloriesBMRArr"][2]+$_SESSION["activityCaloriesArr"][1]+$_SESSION["activityCaloriesArr"][0]; ?>")/3;



}

if(statement == 4){

var step1 = parseFloat("<?php echo $_SESSION["stepArr"][1]; ?>");
var elevation1 = parseFloat("<?php echo $_SESSION["elevationArr"][1]; ?>");
var floorA1 = parseFloat("<?php echo $_SESSION["floorArr"][1]; ?>");
var caloriesOut1 = parseFloat("<?php echo $_SESSION["caloriesOutArr"][1]; ?>");
var caloriesBMR1 = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][1]; ?>");
var activityCalories1 = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][1]; ?>");


var step2 = parseFloat("<?php echo $_SESSION["stepArr"][0]; ?>");
var floor2 = parseFloat("<?php echo $_SESSION["floorArr"][0]; ?>");
var activityCalories2 = parseFloat("<?php echo $_SESSION["activityCaloriesArr"][0]; ?>");
var caloriesBMR2 = parseFloat("<?php echo $_SESSION["caloriesBMRArr"][0]; ?>");
var caloriesOut2 = parseFloat("<?php echo $_SESSION["caloriesOutArr"][0]; ?>");
var elevation2 = parseFloat("<?php echo $_SESSION["elevationArr"][0]; ?>");
var floorA2 = parseFloat("<?php echo $_SESSION["floorArr"][0]; ?>");


var step3 = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["stepArr"][2]; ?>");
var floor3 = parseFloat("<?php if(isset($_SESSION["floorArr"][2]) )echo $_SESSION["floorArr"][2]; ?>");
var activityCalories3 = parseFloat("<?php if(isset($_SESSION["activityCaloriesArr"][2]) )echo $_SESSION["activityCaloriesArr"][2]; ?>");
var caloriesBMR3 = parseFloat("<?php if(isset($_SESSION["caloriesBMRArr"][2]) )echo $_SESSION["caloriesBMRArr"][2]; ?>");
var caloriesOut3 = parseFloat("<?php if(isset($_SESSION["caloriesOutArr"][2]) )echo $_SESSION["caloriesOutArr"][2]; ?>");
var elevation3 = parseFloat("<?php if(isset($_SESSION["elevationArr"][2]) )echo $_SESSION["elevationArr"][2]; ?>");
var floorA3 = parseFloat("<?php if(isset($_SESSION["floorArr"][2]) )echo $_SESSION["floorArr"][2]; ?>");

var step4 = parseFloat("<?php if(isset($_SESSION["stepArr"][3]) )echo $_SESSION["stepArr"][3]; ?>");
var floor4 = parseFloat("<?php if(isset($_SESSION["floorArr"][3]) )echo $_SESSION["floorArr"][3]; ?>");
var activityCalories4 = parseFloat("<?php if(isset($_SESSION["activityCaloriesArr"][3]) )echo $_SESSION["activityCaloriesArr"][3]; ?>");
var caloriesBMR4 = parseFloat("<?php if(isset($_SESSION["caloriesBMRArr"][3]) )echo $_SESSION["caloriesBMRArr"][3]; ?>");
var caloriesOut4 = parseFloat("<?php if(isset($_SESSION["caloriesOutArr"][3]) )echo $_SESSION["caloriesOutArr"][3]; ?>");
var elevation4 = parseFloat("<?php if(isset($_SESSION["elevationArr"][3]) )echo $_SESSION["elevationArr"][3]; ?>");
var floorA4 = parseFloat("<?php if(isset($_SESSION["floorArr"][3]) )echo $_SESSION["floorArr"][3]; ?>");

var stepmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["stepArr"][2]+$_SESSION["stepArr"][1]+$_SESSION["stepArr"][0]; ?>")/3;
var elevationmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["elevationArr"][2]+$_SESSION["elevationArr"][0]+$_SESSION["elevationArr"][1]; ?>")/3;
var floorAmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["floorArr"][2]+$_SESSION["floorArr"][1]+$_SESSION["floorArr"][0]; ?>")/3;
var caloriesOutmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["caloriesOutArr"][2]+$_SESSION["caloriesOutArr"][0]+$_SESSION["caloriesOutArr"][1]; ?>")/3;
var caloriesBMRmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["caloriesBMRArr"][2]+$_SESSION["caloriesBMRArr"][0]+$_SESSION["caloriesBMRArr"][1]; ?>")/3;
var activityCaloriesmean = parseFloat("<?php if(isset($_SESSION["stepArr"][2]) )echo $_SESSION["caloriesBMRArr"][2]+$_SESSION["activityCaloriesArr"][1]+$_SESSION["activityCaloriesArr"][0]; ?>")/3;




}



if(statement == 1 || statement  == 0 )
{

	var data = {
    labels : ["Step","Activity Calories","CaloriesBMR","caloriesOut","elevation","floor"],
    datasets : [
        {
            label: "First dataset",
            fillColor : "rgba(20, 222, 234, 0.6)",
            strokeColor : "#ffffff",
            pointColor : "blue",
            pointStrokeColor : "#ffffff",
            pointHighlightFill : "#ffffff",
            pointHighlightStroke : "#ffffff",
            data: [step1,activityCalories1,caloriesBMR1,caloriesOut1,elevation1,floorA1]
        }

    ]
};

}



if(statement == 2)
{
var data = {
    labels : ["Step","Activity Calories","CaloriesBMR","caloriesOut","elevation","floor"],
    datasets : [
        {
            label: "First dataset",
            fillColor : "rgba(20, 222, 234, 0.6)",
            strokeColor : "#ffffff",
            pointColor : "blue",
            pointStrokeColor : "#ffffff",
            pointHighlightFill : "#ffffff",
            pointHighlightStroke : "#ffffff",
            data: [step1,activityCalories1,caloriesBMR1,caloriesOut1,elevation1,floorA1]
        }
    ,{
            label: "Second dataset",
            fillColor : "rgba(60, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "orange",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [step2,activityCalories2,caloriesBMR2,caloriesOut2,elevation2,floorA2]
        }
    ,{
            label: "third dataset",
            fillColor : "rgba(60, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "green",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [stepmean,activityCaloriesmean,caloriesBMRmean,caloriesOutmean,elevationmean,floorAmean]
        }
    ]
};

}


else if(statement == 3)
{
var data = {
    labels : ["Step","Activity Calories","CaloriesBMR","caloriesOut","elevation","floor"],
    datasets : [
        {
            label: "First dataset",
            fillColor : "rgba(20, 222, 234, 0.6)",
            strokeColor : "#ffffff",
            pointColor : "blue",
            pointStrokeColor : "#ffffff",
            pointHighlightFill : "#ffffff",
            pointHighlightStroke : "#ffffff",
            data: [step1,activityCalories1,caloriesBMR1,caloriesOut1,elevation1,floorA1]
        }
    ,{
            label: "Second dataset",
            fillColor : "rgba(60, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "orange",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [step2,activityCalories2,caloriesBMR2,caloriesOut2,elevation2,floorA2]
        }
 ,
        {
            label: "Third dataset",
            fillColor : "rgba(75, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "pink",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [step3,activityCalories3,caloriesBMR3,caloriesOut3,elevation3,floorA3]
        },
		{
            label: "third dataset",
            fillColor : "rgba(60, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "green",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [stepmean,activityCaloriesmean,caloriesBMRmean,caloriesOutmean,elevationmean,floorAmean]
        }


    ]
};
}

else if(statement == 4)
{
var data = {
    labels : ["Step","Activity Calories","CaloriesBMR","caloriesOut","elevation","floor"],
    datasets : [
        {
            label: "First dataset",
            fillColor : "rgba(20, 222, 234, 0.6)",
            strokeColor : "#ffffff",
            pointColor : "blue",
            pointStrokeColor : "#ffffff",
            pointHighlightFill : "#ffffff",
            pointHighlightStroke : "#ffffff",
            data: [step1,activityCalories1,caloriesBMR1,caloriesOut1,elevation1,floorA1]
        }
    ,{
            label: "Second dataset",
            fillColor : "rgba(60, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "orange",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [step2,activityCalories2,caloriesBMR2,caloriesOut2,elevation2,floorA2]
        }
 ,
        {
            label: "Third dataset",
            fillColor : "rgba(75, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "pink",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [step3,activityCalories3,caloriesBMR3,caloriesOut3,elevation3,floorA3]
        }
		,
         {
            label: "fourth dataset",
            fillColor : "rgba(75, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "brown",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [step4,activityCalories4,caloriesBMR4,caloriesOut4,elevation4,floorA4]
        }
		,
		{
            label: "third dataset",
            fillColor : "rgba(60, 222, 234, 0.3)",
            strokeColor : "#80deea",
            pointColor : "green",
            pointStrokeColor : "#80deea",
            pointHighlightFill : "#80deea",
            pointHighlightStroke : "#80deea",
            data: [stepmean,activityCaloriesmean,caloriesBMRmean,caloriesOutmean,elevationmean,floorAmean]
        }

    ]
};
}


setInterval(function(){
  // Get a random index point
  var indexToUpdate = Math.round(Math.random() * (data.labels.length-1));
  if (typeof trendingLineChart != "undefined"){
      // Update one of the points in the second dataset
      if(trendingLineChart.datasets[0].points[indexToUpdate].value){
            //trendingLineChart.datasets[0].points[indexToUpdate].value = 30;
      }
      if(trendingLineChart.datasets[1].points[indexToUpdate].value){
            //trendingLineChart.datasets[1].points[indexToUpdate].value = 20;
      }
      trendingLineChart.update();
  }


}, 2000);


/*
Polor Chart Widget
*/
// Minute data


/*
Trending Bar Chart
*/

if(statement == 1 || statement == 0 )
{
var cardio1s = parseFloat("<?php echo $_SESSION["cardioArrS"]; ?>");
var fatburn1s = parseFloat("<?php echo $_SESSION["fatburnArrS"]; ?>");
var peak1s = parseFloat("<?php echo $_SESSION["elevationArrS"]; ?>");
var oor1s = parseFloat("<?php echo $_SESSION["oorArrS"]; ?>");
var oorCs = parseFloat("<?php echo $_SESSION["oorCalArrS"]; ?>");
var fatburnCs = parseFloat("<?php echo $_SESSION["fatburnCalArrS"]; ?>");
var cardioCs = parseFloat("<?php echo $_SESSION["cardioCalArrS"]; ?>");
}

else if(statement == 2)
{
var cardio1 = parseFloat("<?php echo $_SESSION["cardioArr"][0]; ?>");
var fatburn1 = parseFloat("<?php echo $_SESSION["fatburnArr"][0]; ?>");
var peak1 = parseFloat("<?php echo $_SESSION["elevationArr"][0]; ?>");
var oor1 = parseFloat("<?php echo $_SESSION["oorArr"][0]; ?>");
var oorC = parseFloat("<?php echo $_SESSION["oorCalArr"][0]; ?>");
var fatburnC = parseFloat("<?php echo $_SESSION["fatburnCalArr"][0]; ?>");
var cardioC = parseFloat("<?php echo $_SESSION["cardioCalArr"][0]; ?>");

var cardio2 = parseFloat("<?php echo $_SESSION["cardioArr"][1]; ?>");
var fatburn2 = parseFloat("<?php echo $_SESSION["fatburnArr"][1]; ?>");
var peak2 = parseFloat("<?php echo $_SESSION["elevationArr"][1]; ?>");
var oor2 = parseFloat("<?php echo $_SESSION["oorArr"][1]; ?>");
var oorC2 = parseFloat("<?php echo $_SESSION["oorCalArr"][1]; ?>");
var fatburnC2 = parseFloat("<?php echo $_SESSION["fatburnCalArr"][1]; ?>");
var cardioC2 = parseFloat("<?php echo $_SESSION["cardioCalArr"][1]; ?>");

}

else if(statement == 3)
{
var cardio1 = parseFloat("<?php echo $_SESSION["cardioArr"][0]; ?>");
var fatburn1 = parseFloat("<?php echo $_SESSION["fatburnArr"][0]; ?>");
var peak1 = parseFloat("<?php echo $_SESSION["elevationArr"][0]; ?>");
var oor1 = parseFloat("<?php echo $_SESSION["oorArr"][0]; ?>");
var oorC = parseFloat("<?php echo $_SESSION["oorCalArr"][0]; ?>");
var fatburnC = parseFloat("<?php echo $_SESSION["fatburnCalArr"][0]; ?>");
var cardioC = parseFloat("<?php echo $_SESSION["cardioCalArr"][0]; ?>");

var cardio2 = parseFloat("<?php if (isset($_SESSION["cardioArr"][1]) ) echo $_SESSION["cardioArr"][1]; ?>");
var fatburn2 = parseFloat("<?php if (isset($_SESSION["fatburnArr"][1]))   echo $_SESSION["fatburnArr"][1]; ?>");
var peak2 = parseFloat("<?php if (isset($_SESSION["elevationArr"][1])) echo $_SESSION["elevationArr"][1]; ?>");
var oor2 = parseFloat("<?php if (isset($_SESSION["oorArr"][1])) echo $_SESSION["oorArr"][1]; ?>");
var oorC2 = parseFloat("<?php if (isset($_SESSION["oorCalArr"][1]))  echo $_SESSION["oorCalArr"][1]; ?>");
var fatburnC2 = parseFloat("<?php if (isset($_SESSION["fatburnCalArr"][1])) echo $_SESSION["fatburnCalArr"][1]; ?>");
var cardioC2 = parseFloat("<?php if (isset($_SESSION["cardioCalArr"][1])) echo $_SESSION["cardioCalArr"][1]; ?>");


var cardio3 = parseFloat("<?php if (isset($_SESSION["cardioArr"][2]))  echo $_SESSION["cardioArr"][2]; ?>");
var fatburn3 = parseFloat("<?php if (isset($_SESSION["fatburnArr"][2])) echo $_SESSION["fatburnArr"][2]; ?>");
var peak3 = parseFloat("<?php if (isset($_SESSION["elevationArr"][2])) echo $_SESSION["elevationArr"][2]; ?>");
var oor3 = parseFloat("<?php if (isset($_SESSION["oorArr"][2])) echo $_SESSION["oorArr"][2]; ?>");
var oorC3 = parseFloat("<?php if (isset($_SESSION["oorCalArr"][2])) echo $_SESSION["oorCalArr"][2]; ?>");
var fatburnC3 = parseFloat("<?php if (isset($_SESSION["fatburnCalArr"][2])) echo $_SESSION["fatburnCalArr"][2]; ?>");
var cardioC3 = parseFloat("<?php if (isset($_SESSION["cardioCalArr"][2])) echo $_SESSION["cardioCalArr"][2]; ?>");


}

if(statement == 1 || statement == 0 )
{
	var doughnutData = [
    {
        value: fatburnCs,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Fatburn"
    },
    {
        value: cardioCs,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Cardio"
    },
    {
        value: oorCs,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "OutofCalories"
    },
    {
        value: cardioCs,
        color: "orange",
        highlight: "#FFC870",
        label: "Cardio"
    },
    {
        value: cardio1s,
        color: "blue",
        highlight: "#FFC870",
        label: "CardioCalories"
    },
	{
        value: oor1s,
        color: "green",
        highlight: "#FFC870",
        label: "OORCalories"
    },
    {
        value: fatburn1s,
        color: "black",
        highlight: "#FFC870",
        label: "Fatburn Calories"
    }

];

}
else if(statement == 2 )
{
	var doughnutData = [
    {
        value: (fatburnC+fatburnC2)/2,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Fatburn"
    },
    {
        value: (cardioC+cardioC2)/2,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Cardio"
    },
    {
        value: (oorC+oorC2)/2,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Out of Calories"
    },
    {
        value: (cardioC+cardioC2)/2,
        color: "orange",
        highlight: "#FFC870",
        label: "Cardio"
    },
    {
        value: (cardio1+cardio2)/2,
        color: "blue",
        highlight: "#FFC870",
        label: "Cardio Calories"
    },
	{
        value: (oor1+oor2)/2,
        color: "green",
        highlight: "#FFC870",
        label: "OOR Calories"
    },
    {
        value: (fatburn1+fatburn2)/2,
        color: "black",
        highlight: "#FFC870",
        label: "Fatburn Calories"
    }

];

}
else if(statement == 3 )
{
	var doughnutData = [
    {
        value: (fatburnC+fatburnC2+fatburnC3+fatburn1+fatburn2+fatburn3)/6,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "FatburnMinute"
    },
    {
        value: 0,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "CardioMinute"
    },
    {
        value: (oorC+oorC2+oorC3+oor1+oor2+oor3)/6,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Out of range data summary"
    },
    {
        value: (cardioC+cardioC2+cardioC3+cardio1+cardio2+cardio3)/6,
        color: "orange",
        highlight: "#FFC870",
        label: "Cardio data summary"
    }


];

}

if(statement == 1 || statement == 0 )
{
var dataBarChart = {
    labels : ["Cardio Minute","Cardio Calories","Out of range Minute","Out of Range Calories","fatburn Calories","fatburn Minute"],
    datasets: [
        {
            label: "Bar dataset",
            fillColor: "blue",
            strokeColor: "blue",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [cardio1s,cardioCs,oor1s,oorCs,fatburnCs,fatburn1s]
        }
    ]
};

}

if(statement == 2)
{
var dataBarChart = {
    labels : ["Cardio Minute","Cardio Calories","Out of range Minute","Out of Range Calories","fatburn Calories","fatburn Minute"],
    datasets: [
        {
            label: "Bar dataset",
            fillColor: "blue",
            strokeColor: "blue",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [cardio1,cardioC,oor1,oorC,fatburnC,fatburn1]
        },
        {
            label: "Bar dataset2",
            fillColor: "orange",
            strokeColor: "orange",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [cardio2,cardioC2,oor2,oorC2,fatburnC2,fatburn2]
        }

    ]
};

}

if(statement == 3)
{
var dataBarChart = {
    labels : ["Cardio Minute","Cardio Calories","Out of range Minute","Out of Range Calories","fatburn Calories","fatburn Minute"],
    datasets: [
        {
            label: "Bar dataset",
            fillColor: "blue",
            strokeColor: "blue",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [cardio1,cardioC,oor1,oorC,fatburnC,fatburn1]
        },
        {
            label: "Bar dataset2",
            fillColor: "orange",
            strokeColor: "orange",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [cardio2,cardioC2,oor2,oorC2,fatburnC2,fatburn2]
        },
         {
            label: "Bar dataset2",
            fillColor: "red",
            strokeColor: "red",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [cardio3,cardioC3,oor3,oorC3,fatburnC3,fatburn3]
        }
    ]
};

}

var nReloads1 = 0;
var min1 = 1;
var max1 = 10;
var l1 =0;
var trendingBarChart;
function updateBarChart() {
    if (typeof trendingBarChart != "undefined") {
        nReloads1++;
        var x = Math.floor(Math.random() * (max1 - min1 + 1)) + min1;
        trendingBarChart.addData([x], dataBarChart.labels[l1]);
        trendingBarChart.removeData();
        l1++;
        if( l1 == dataBarChart.labels.length){ l1 = 0;}
    }
}
//setInterval(updateBarChart, 5000);

/*
Trending Bar Chart
*/




//alert(statement);


var vActiveData = 10;
var mActive = 10;
var lActive = 10;
var sActive = 10;
var mean = 40/4;


if(statement > 1)
{
var vActiveData2 = parseFloat("<?php  if(count($_SESSION["vActiveArr"])>1) echo $_SESSION["vActiveArr"][1]; ?>");
var mActive2 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>1) echo $_SESSION["mActiveArr"][1]; ?>");
var lActive2 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>1) echo $_SESSION["lActiveArr"][1]; ?>");
var sActive2 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>1) echo $_SESSION["sActiveArr"][1]; ?>");
var mean2 = parseFloat(vActiveData2+mActive2+lActive2+sActive2)/4;
}

if(statement > 2)
{
var vActiveData3 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>2) echo $_SESSION["vActiveArr"][2]; else echo 0; ?>");
var mActive3 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>2) echo $_SESSION["mActiveArr"][2]; ?>");
var lActive3 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>2) echo $_SESSION["lActiveArr"][2]; ?>");
var sActive3 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>2) echo $_SESSION["sActiveArr"][2]; ?>");
var mean3 = (vActiveData3+mActive3+lActive3+sActive3)/4;
}

if(statement > 3)
{
var vActiveData4 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>3) echo $_SESSION["vActiveArr"][3]; else echo 0; ?>");
var mActive4 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>3) echo $_SESSION["mActiveArr"][3]; ?>");
var lActive4 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>3) echo $_SESSION["lActiveArr"][3]; ?>");
var sActive4 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>3) echo $_SESSION["sActiveArr"][3]; ?>");
var mean4 = (vActiveData4+mActive4+lActive4+sActive4)/4;
}

if(statement > 4)
{
var vActiveData5 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>4) echo $_SESSION["vActiveArr"][4]; else echo 0; ?>");
var mActive5 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>4) echo $_SESSION["mActiveArr"][4]; ?>");
var lActive5 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>4) echo $_SESSION["lActiveArr"][4]; ?>");
var sActive5 = parseFloat("<?php if(count($_SESSION["vActiveArr"])>4) echo $_SESSION["sActiveArr"][4]; ?>");
var mean5 = (vActiveData5+mActive5+lActive5+sActive5)/4;
}



var Familymemeber =  3 ;

if(statement == 0)
{
	var radarChartData = {
    labels: ["Very Active", "Moderate Active", "lightly active", "sedentary active","mean"],
    datasets: [
        {
            label: "First dataset",
            fillColor: "rgba(255,255,255,0.2)",
            strokeColor: "#fff",
            pointColor: "orange",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#fff",
            data: [0,0,0,0,0]
        }
    ],
};

}

if(statement == 1)
{
	var radarChartData = {
    labels: ["Very Active", "Moderate Active", "lightly active", "sedentary active","mean"],
    datasets: [
        {
            label: "First dataset",
            fillColor: "rgba(255,255,255,0.2)",
            strokeColor: "#fff",
            pointColor: "orange",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#fff",
            data: [vActiveData,mActive,lActive,sActive,mean]
        }
    ],
};

}

if(statement==2)
{
	var a1 = (vActiveData+vActiveData2)/2;
	var a12 = (mActive+mActive2)/2;
	var a13 = (lActive+lActive2)/2;
	var a14 = (sActive+sActive2)/2;
	var a15 = (mean+mean2)/2;
var radarChartData = {
    labels: ["Very Active", "Moderate Active", "lightly active", "sedentary active","mean"],
    datasets: [
        {
            label: "First dataset",
            fillColor: "rgba(255,255,255,0.2)",
            strokeColor: "#fff",
            pointColor: "orange",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#fff",
            data: [vActiveData,mActive,lActive,sActive,mean]
        },
       {
     label: "second dataset",
     fillColor: "rgba(255,255,255,0.2)",
     strokeColor: "#fff",
     pointColor: "blue",
     pointStrokeColor: "#fff",
     pointHighlightFill: "#fff",
     pointHighlightStroke: "#fff",
     data: [vActiveData2,mActive2,lActive2,sActive2,mean2]
       }
,
    {
    label: "Third dataset",
    fillColor: "rgba(255,255,255,0.2)",
    strokeColor: "#fff",
    pointColor: "green",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "#fff",
    data: [a1,a12,a13,a14,a15]
    }
    ]
};
}else if(statement == 3){
	var a1 = (vActiveData+vActiveData2+vActiveData3)/3;
	var a12 = (mActive+mActive2+mActive3)/3;
	var a13 = (lActive+lActive2+lActive3)/3;
	var a14 = (sActive+sActive2+lActive3)/3;
	var a15 = (mean+mean2+mean3)/3;
    var radarChartData = {
    labels: ["Very Active", "Moderate Active", "lightly active", "sedentary active","mean"],
    datasets: [
        {
        label: "First dataset",
        fillColor: "rgba(255,255,255,0.2)",
        strokeColor: "#fff",
        pointColor: "orange",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#fff",
        data: [vActiveData,mActive,lActive,sActive,mean]
        },
        {
        label: "second dataset",
        fillColor: "rgba(255,255,255,0.2)",
        strokeColor: "#fff",
        pointColor: "blue",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#fff",
        data: [vActiveData2,mActive2,lActive2,sActive2,mean2]
        },
      {
     label: "third dataset",
     fillColor: "rgba(255,255,255,0.2)",
     strokeColor: "#fff",
     pointColor: "pink",
     pointStrokeColor: "#fff",
     pointHighlightFill: "#fff",
     pointHighlightStroke: "#fff",
     data: [vActiveData3,mActive3,lActive3,sActive3,mean3]
       },
    {
    label: "Third dataset",
    fillColor: "rgba(255,255,255,0.2)",
    strokeColor: "#fff",
    pointColor: "green",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "#fff",
    data: [a1,a12,a13,a14,a15]
    }



        ],
    };
}else if(statement == 4){
	var a1 = (vActiveData+vActiveData2+vActiveData3+vActiveData4)/3;
	var a12 = (mActive+mActive2+mActive3+mActive4)/3;
	var a13 = (lActive+lActive2+lActive3+lActive4)/3;
	var a14 = (sActive+sActive2+sActive4+sActive5)/3;
	var a15 = (mean+mean2+mean3+mean4)/3;


    var radarChartData = {
    labels: ["Very Active", "Moderate Active", "lightly active", "sedentary active","mean"],
    datasets: [
        {
        label: "First dataset",
        fillColor: "rgba(255,255,255,0.2)",
        strokeColor: "#fff",
        pointColor: "orange",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#fff",
        data: [vActiveData,mActive,lActive,sActive,mean]
        },
        {
        label: "second dataset",
        fillColor: "rgba(255,255,255,0.2)",
        strokeColor: "#fff",
        pointColor: "blue",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#fff",
        data: [vActiveData2,mActive2,lActive2,sActive2,mean2]
        },
      {
     label: "third dataset",
     fillColor: "rgba(255,255,255,0.2)",
     strokeColor: "#fff",
     pointColor: "pink",
     pointStrokeColor: "#fff",
     pointHighlightFill: "#fff",
     pointHighlightStroke: "#fff",
     data: [vActiveData3,mActive3,lActive3,sActive3,mean3]
       },
             {
     label: "four dataset",
     fillColor: "rgba(255,255,255,0.2)",
     strokeColor: "#fff",
     pointColor: "brown",
     pointStrokeColor: "#fff",
     pointHighlightFill: "#fff",
     pointHighlightStroke: "#fff",
     data: [vActiveData4,mActive4,lActive4,sActive4,mean4]
       }
	   ,
             {
     label: "four dataset",
     fillColor: "rgba(255,255,255,0.2)",
     strokeColor: "#fff",
     pointColor: "green",
     pointStrokeColor: "#fff",
     pointHighlightFill: "#fff",
     pointHighlightStroke: "#fff",
    data: [a1,a12,a13,a14,a15]
       }

        ],
    };
}

var nReloads2 = 0;
var min2 = 1;
var max2 = 10;
var l2 = 0;
var trendingRadarChart;

/*
function trendingRadarChartupdate() {
   if (typeof trendingRadarChart != "undefined") {
        nReloads2++;
        var x = Math.floor(Math.random() * (max2 - min2 + 1)) + min2;
        trendingRadarChart.addData([x], radarChartData.labels[l2]);
        var y = trendingRadarChart.removeData();
        l2++;
        if( l2 == radarChartData.labels.length){ l2 = 0;}
    }
}

setInterval(trendingRadarChartupdate, 5000);
 */

/*
Pie chart
*/
var pieData = [
                {
                    value: 300,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "America"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Canada"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "UK"
                },
                {
                    value: 40,
                    color: "#949FB1",
                    highlight: "#A8B3C5",
                    label: "Europe"
                },
                {
                    value: 120,
                    color: "#4D5360",
                    highlight: "#616774",
                    label: "Australia"
                }

            ];
/*
Line Chart
*/
var lineChartData = {
    labels : ["Mon","Tues","Wed","Thurs","Fri","Sat","Sun"],
    datasets : [
        {
            label: "My dataset",
            fillColor : "rgba(255,255,255,0)",
            strokeColor : "#fff",
            pointColor : "#00796b ",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(220,220,220,1)",
            data: [10, 45, 50, 30, 63, 45,70]
        },
        {
            label: "My dataset2",
            fillColor : "rgba(255,255,255,0)",
            strokeColor : "#fff",
            pointColor : "#00796b ",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(220,220,220,1)",
            data: [10, 20, 30, 40, 53, 65,70]
        }



    ]

}

var polarData = [
        {
            value: 4800,
            color:"#f44336",
            highlight: "#FF5A5E",
            label: "USA"
        },
        {
            value: 6000,
            color: "#9c27b0",
            highlight: "#ce93d8",
            label: "UK"
        },
        {
            value: 1800,
            color: "#3f51b5",
            highlight: "#7986cb",
            label: "Canada"
        },
        {
            value: 4000,
            color: "#2196f3 ",
            highlight: "#90caf9",
            label: "Austrelia"
        },
        {
            value: 5500,
            color: "#ff9800",
            highlight: "#ffb74d",
            label: "India"
        },
        {
            value: 2100,
            color: "#009688",
            highlight: "#80cbc4",
            label: "Brazil"
        },
        {
            value: 5000,
            color: "#00acc1",
            highlight: "#4dd0e1",
            label: "China"
        },
        {
            value: 3500,
            color: "#4caf50",
            highlight: "#81c784",
            label: "Germany"
        }



    ];




window.onload = function(){
    var trendingLineChart = document.getElementById("trending-line-chart").getContext("2d");
    window.trendingLineChart = new Chart(trendingLineChart).Line(data, {
        scaleShowGridLines : true,///Boolean - Whether grid lines are shown across the chart
        scaleGridLineColor : "rgba(255,255,255,0.4)",//String - Colour of the grid lines
        scaleGridLineWidth : 1,//Number - Width of the grid lines
        scaleShowHorizontalLines: true,//Boolean - Whether to show horizontal lines (except X axis)
        scaleShowVerticalLines: false,//Boolean - Whether to show vertical lines (except Y axis)
        bezierCurve : true,//Boolean - Whether the line is curved between points
        bezierCurveTension : 0.4,//Number - Tension of the bezier curve between points
        pointDot : true,//Boolean - Whether to show a dot for each point
        pointDotRadius : 5,//Number - Radius of each point dot in pixels
        pointDotStrokeWidth : 2,//Number - Pixel width of point dot stroke
        pointHitDetectionRadius : 20,//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        datasetStroke : true,//Boolean - Whether to show a stroke for datasets
        datasetStrokeWidth : 3,//Number - Pixel width of dataset stroke
        datasetFill : true,//Boolean - Whether to fill the dataset with a colour
        animationSteps: 15,// Number - Number of animation steps
        animationEasing: "easeOutQuart",// String - Animation easing effect
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        scaleFontSize: 12,// Number - Scale label font size in pixels
        scaleFontStyle: "normal",// String - Scale label font weight style
        scaleFontColor: "#fff",// String - Scale label font colour
        tooltipEvents: ["mousemove", "touchstart", "touchmove"],// Array - Array of string names to attach tooltip events
        tooltipFillColor: "rgba(255,255,255,0.8)",// String - Tooltip background colour
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        tooltipFontSize: 12,// Number - Tooltip label font size in pixels
        tooltipFontColor: "#000",// String - Tooltip label font colour
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        tooltipTitleFontSize: 14,// Number - Tooltip title font size in pixels
        tooltipTitleFontStyle: "bold",// String - Tooltip title font weight style
        tooltipTitleFontColor: "#000",// String - Tooltip title font colour
        tooltipYPadding: 8,// Number - pixel width of padding around tooltip text
        tooltipXPadding: 16,// Number - pixel width of padding around tooltip text
        tooltipCaretSize: 10,// Number - Size of the caret on the tooltip
        tooltipCornerRadius: 6,// Number - Pixel radius of the tooltip border
        tooltipXOffset: 10,// Number - Pixel offset from point x to tooltip edge
        responsive: true
        });

        var doughnutChart = document.getElementById("doughnut-chart").getContext("2d");
        window.myDoughnut = new Chart(doughnutChart).Doughnut(doughnutData, {
            segmentStrokeColor : "#fff",
            tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
            percentageInnerCutout : 50,
            animationSteps : 15,
            segmentStrokeWidth : 4,
            animateScale: true,
            percentageInnerCutout : 60,
            responsive : true
        });

        var trendingBarChart = document.getElementById("trending-bar-chart").getContext("2d");
        window.trendingBarChart = new Chart(trendingBarChart).Bar(dataBarChart,{
            scaleShowGridLines : false,///Boolean - Whether grid lines are shown across the chart
            showScale: true,
            animationSteps:15,
            tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
            responsive : true
        });

        window.trendingRadarChart = new Chart(document.getElementById("trending-radar-chart").getContext("2d")).Radar(radarChartData, {

            angleLineColor : "rgba(255,255,255,0.5)",//String - Colour of the angle line
            pointLabelFontFamily : "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
            pointLabelFontColor : "#fff",//String - Point label font colour
            pointDotRadius : 4,
            animationSteps:15,
            pointDotStrokeWidth : 2,
            pointLabelFontSize : 12,
            responsive: true
        });

        // var pieChartArea = document.getElementById("pie-chart-area").getContext("2d");
        // window.pieChartArea = new Chart(pieChartArea).Pie(pieData,{
        //  responsive: true
        // });

        var lineChart = document.getElementById("line-chart").getContext("2d");
        window.lineChart = new Chart(lineChart).Line(lineChartData, {
            scaleShowGridLines : false,
            bezierCurve : false,
            scaleFontSize: 12,
            scaleFontStyle: "normal",
            scaleFontColor: "#fff",
            responsive: true,
        });


        if (typeof getContext != "undefined") {
            var polarChartCountry = document.getElementById("polar-chart-country").getContext("2d");
            window.polarChartCountry = new Chart(polarChartCountry).PolarArea(polarData, {
                segmentStrokeWidth : 1,
                responsive:true
            });
        }
};
    </script>

    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>

    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>

    <!--jvectormap-->
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/vectormap-script.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <!-- Toast Notification -->
    <script type="text/javascript">
    // Toast Notification
   // $(window).load(function() {
   //     setTimeout(function() {
    //        .toast('<span>Hiya! I am a toast.</span>', 1500);
      //  }, 1500);
       // setTimeout(function() {
         //   Materialize.toast('<span>You can swipe me too!</span>', 3000);
       // }, 5000);
        //setTimeout(function() {
         //   Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
       // }, 15000);
   // });
  // -->

    $(function() {
      // Google Maps
      $('#map-canvas').addClass('loading');
      var latlng = new google.maps.LatLng(40.6700, -73.9400); // Set your Lat. Log. New York
      var settings = {
          zoom: 10,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          mapTypeControl: false,
          scrollwheel: false,
          draggable: true,
          styles: [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}],
          mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
          navigationControl: false,
          navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      };
      var map = new google.maps.Map(document.getElementById("map-canvas"), settings);

      google.maps.event.addDomListener(window, "resize", function() {
          var center = map.getCenter();
          google.maps.event.trigger(map, "resize");
          map.setCenter(center);
          $('#map-canvas').removeClass('loading');
      });

      var contentString =
          '<div id="info-window">'+
          '<p>18 McLuice Road, Vellyon Hills,<br /> New York, NY 10010<br /><a href="https://plus.google.com/102896039836143247306/about?gl=za&hl=en" target="_blank">Get directions</a></p>'+
          '</div>';
      var infowindow = new google.maps.InfoWindow({
          content: contentString
      });

      var companyImage = new google.maps.MarkerImage('images/map-marker.png',
          new google.maps.Size(36,62),// Width and height of the marker
          new google.maps.Point(0,0),
          new google.maps.Point(18,52)// Position of the marker
      );

      var companyPos = new google.maps.LatLng(40.6700, -73.9400);

      var companyMarker = new google.maps.Marker({
          position: companyPos,
          map: map,
          icon: companyImage,
          title:"Shapeshift Interactive",
          zIndex: 3});

      google.maps.event.addListener(companyMarker, 'click', function() {
          infowindow.open(map,companyMarker);
          pageView('/#address');
      });
    });
    </script>


        <script>
            function liveSearch() {

                var input_data = $('#search_data').val();
                if (input_data.length === 0) {
                    $('#suggestions').hide();
                } else {


                    $.ajax({
                        type: "POST",
                        url: "/fypphp/fypphp6/livesearch/search",
                        data: {search_data: input_data},
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });
                }
            }

        </script>









</body>

</html>
