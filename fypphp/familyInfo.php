<?php

include"index.php"; 


if(isset($_SESSION["FAMILYPAGEDET"])&&$_SESSION["FAMILYPAGEDET"] == true)
	Redirect("createfamily.php",false);




?>


<!DOCTYPE html>
<html lang="en">


<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem('firstLoad') )
    {
      localStorage['firstLoad'] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem('firstLoad');
  }
})();

</script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/box2d/Box2dWeb-2.1.a.3.min.js"></script>
 <script src="echarts.js"></script>



<?php




if(isset($_GET['page'])){
$_SESSION["searchName"] = $_GET['page'];

}
?>


<head>
  <!-- morris -->
    <script type="text/javascript" src="js/plugins/raphael/raphael-min.js"></script>
    <script type="text/javascript" src="js/plugins/morris-chart/morris.min.js"></script>
    <script type="text/javascript" src="js/plugins/morris-chart/morris-script.js"></script>

  <script type="text/javascript" src="js/plugins/sweetalert/sweetalert.min.js"></script>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">

  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/morris-chart/morris.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">




</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
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
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                     
                    </ul>
                    <!-- translation-button -->

      <!-- notifications-dropdown -->
                    <ul id="notifications-dropdown" class="dropdown-content">
                      <li>
                        <h5>NOTIFICATIONS <span class="new badge"><?php echo count($_SESSION["messagesend"]); ?></span></h5>
                      </li>
                      <li class="divider"></li>
                      <?php 

                      $arraylength = count($_SESSION["messagesend"]);
                  
                      for($x = 0 ; $x < $arraylength ; $x++)
                      {
                      echo "<li><a href='#!'><i class='mdi-action-add-shopping-cart'>",array_values($_SESSION["messagesend"])[$x],"</i></a></li>";
                      }

                      ?>
                     
                        </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->

    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
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
	<li class="bold"><a href="familyInfo.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Family Info Page</a></li>       <li class="no-padding">
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
      <!-- START CONTENT -->
      <section id="content">        

        <!--start container-->
        <div class="container">

          <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="https://www.lacywestinsurance.com/wp-content/uploads/2014/05/Banner-Happy-Family-lifer.jpg" alt="user background">                    
                </div>

                <div class="card-content">
                  <div class="row">                    
                    <div class="col s3 offset-s2">                        
                    <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION["gilbert"]; ?></h4>
					<p class="medium-small grey-text">Group Name</p>
                    </div>
                    <div class="col s2 center-align">
                    <!--    <h4 class="card-title grey-text text-darken-4"><?php if(isset($_SESSION["searchAge"]) )echo $_SESSION["searchAge"]; ?></h4>-->
                        <p class="medium-small grey-text"></p>
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4"> <?php  if(isset($_SESSION["rankreal"]) )echo $_SESSION["rankreal"]; else echo 0; ?>  </h4>
                        <p class="medium-small grey-text">Family Rank </p>
                    </div>                    
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">
						
						<p id = "demo" ></p>
						
						
<script type="text/javascript">
var meansed =  "<?php echo $_SESSION["MEANSED"]; ?>";
var meanmod =  "<?php echo $_SESSION["MEANMOD"]; ?>";
var meanla =  "<?php echo $_SESSION["MEANLA"]; ?>";
var meanma =  "<?php echo $_SESSION["MEANMA"]; ?>";
var caloriesbmr = "<?php echo $_SESSION["MEANCALBMR"]; ?>";
var caloriesmean = "<?php echo $_SESSION["MEANCALO"]; ?>";

var overallValue = meansed+meanmod+meanla+meanla+caloriesbmr+caloriesmean;

var birdType ;


//consider bird type
if(overallValue > 10000 && overallValue < 15000)
{
    document.getElementById("demo").innerHTML = "Pet : Angry Bird";
	birdType = 1;
}	
else if(overallValue < 10000)
{
	document.getElementById("demo").innerHTML = "Pet : Pig";
	birdType = 2; 
}
else 
{
	birdType = 3;    
    document.getElementById("demo").innerHTML = "Pet : Smart Bird";
}


</script>

</h4>
                        <p class="medium-small grey-text">status</p>
                    </div>


                    <div class="col s1 right-align">
                      <a class="btn-floating activator waves-effect waves-light darken-2 right">
                          <i class="mdi-action-perm-identity"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-reveal">
                    <p>
                      <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i></span>
                      <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i></span>
                    </p>

                    
                    
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> </p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> </p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> </p>
                </div>
            </div>
            <!--/ profile-page-header -->

            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
              <!-- profile-page-sidebar-->
              <div id="profile-page-sidebar" class="col s12 m4">
                <!-- Profile About  -->
                <div class="card light-blue">
                  <div class="card-content white-text">
                    <span class="card-title">About Family Page!</span>
                    <p>The family page would mainly introduced some challenge (Angry Bird) and compare datum with some huge datum.And it might
                       boost up whole family to sport together.					
					 
					</p>
                  </div>                  
                </div>
                <!-- Profile About  -->

                <!-- Profile About Details  -->

                <!--/ Profile About Details  -->

                <!-- Profile About  -->
                <div class="card amber darken-2">
                  <div class="card-content white-text center-align">
                    <p class="card-title"><i class="mdi-social-group-add"></i><?php echo count($_SESSION["fusr"]); ?></p>
                    <p>Family Size</p>
                  </div>                  
                </div>
                <!-- Profile About  -->



                <!-- flight-card -->
          
                <!-- flight-card -->

                <!-- Map Card -->
                <div class="map-card">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
                        </div>
                        <div class="card-content">                    
                            <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                <i class="mdi-maps-pin-drop"></i>
                            </a>
                            <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Area usually located in </a>
                            </h4>
                            <p class="blog-post-content">This user like having sport in this area , you can take a look as refernece.</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Company Name LLC <i class="mdi-navigation-close right"></i></span>                   
                            <p><?php echo $_SESSION["searchInfo"]; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Map Card -->

              </div>
              <!-- profile-page-sidebar-->

                <!--/ profile-page-wall-share -->


                <!-- profile-page-wall-posts -->
                <div id="profile-page-wall-posts"class="row">

                      <!-- medium -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin"><?php echo "Bomb the bad result";?></p>
                            </div>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
                            </div>

        <div class="container">
          <div class="section">
            
            <div class="divider"></div>
            <!--Animated  Chart
			
			https://www.amcharts.com/lib/coffee/redbird.png
			-->
				
        <div id="container" style="width: 900px; height: 500px; position:relative; align:center;">
  <span style="width : 200 px; height : 300 px;"></span><div id="chartdiv" style="width : 100%; height: 500px; position:absolute;" ontouchstart="addBird();" onmousedown="addBird();" onmouseup="releaseBird();" ontouchend="releaseBird();"></div>
  <img src="https://www.amcharts.com/lib/coffee/slingshot.png" style="width:70px; height:110px; position:absolute; bottom:17px; left:100px; pointer-events: none;"></img>


<p id="demo2"></p>
    <script type="text/javascript">
var meansed =  "<?php echo $_SESSION["MEANSED"]; ?>";
var meanmod =  "<?php echo $_SESSION["MEANMOD"]; ?>";
var meanla =  "<?php echo $_SESSION["MEANLA"]; ?>";
var meanma =  "<?php echo $_SESSION["MEANMA"]; ?>";
var caloriesbmr = "<?php echo $_SESSION["MEANCALBMR"]; ?>";
var caloriesmean = "<?php echo $_SESSION["MEANCALO"]; ?>";

var overallValue = meansed+meanmod+meanla+meanla+caloriesbmr+caloriesmean;

var birdType ;


//consider bird type
if(overallValue > 10000 && overallValue < 15000)
{
    document.getElementById("demo2").innerHTML = '<img src="sad.png" id="bird" style="width:45px; height:45px; position:absolute; top:-100px; left:50px; pointer-events: none;"></img>';
	birdType = 1;
}	
else if(overallValue < 10000)
{
	document.getElementById("demo2").innerHTML = '<img src="https://www.amcharts.com/lib/coffee/redbird.png" id="bird" style="width:45px; height:45px; position:absolute; top:-100px; left:50px; pointer-events: none;"></img>';
	birdType = 2; 
}
else 
{
	birdType = 3;    
    document.getElementById("demo2").innerHTML = '<img src="http://orig14.deviantart.net/6587/f/2013/197/3/a/orange_by_mallonsart07-d6dqkzs.png" id="bird" style="width:45px; height:45px; position:absolute; top:-100px; left:50px; pointer-events: none;"></img>';
}


</script>
  <div style="width:300px; top:84px; left:95px; position:absolute;">Animal is used to destory the bad record and </a>. P.S. you know where to get the <a target="_blank" href="http://www.rovio.com">original game ;)</a></div>
</div>
</div>
</div>
          <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                <a class="btn-floating btn-large">
                  <i class="mdi-action-stars"></i>
                </a>
                <ul>
                  <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
</div>
</div>

                      <!-- medium -->
                      <div id="profile-page-wall-post" class="card">
					  
                        <div class="card-profile-title">
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin">Compare your datum with the giant !!! Check your amount of sport with the giant</p>
                            </div>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
							  
                            </div>

</div>
<div id="main" style="height:700px"></div>
</div>
</div>



                
                <!--/ profile-page-wall-posts -->

              </div>
              <!--/ profile-page-wall -->

            </div>
          </div>
        </div>
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
            <li class="li-hover">
                <ul class="chat-collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                    <div class="collapsible-body recent-activity">
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">just now</a>
                                <p>Jim Doe Purchased new equipments for zonal office.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Yesterday</a>
                                <p>Your Next flight for USA will be on 15th August 2015.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Last Week</a>
                                <p>Jessy Jay open a new store at S.G Road.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
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
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Eileen Sideways</p>
                                <p class="place">Los Angeles, CA</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Zaham Sindil</p>
                                <p class="place">San Francisco, CA</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Renov Leongal</p>
                                <p class="place">Cebu City, Philippines</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Weno Carasbong</p>
                                <p>Tokyo, Japan</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
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
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2015 <a class="grey-text text-lighten-4" target="_blank">Fitbit Fighter</a> All rights reserved.</span>

        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>  

    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>
    
    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
    <!--google map-->
    <script type="text/javascript" src="js/plugins/google-map/google-map-script.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <!-- Toast Notification -->
    <script type="text/javascript">
    // Toast Notification
  /*  $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 1500);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 3000);
        }, 5000);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 15000);
    });
   */
    </script>
       
       <script type="text/javascript">
      var sentOrNot = false;
      $("#rowValues").val(sentOrNot);

       dataString = 'cipher';

    $(document).ready(function(){
        "use strict";
        
        $('.btn-message').click(function(){
          swal("Here's a message!");
        });
        
        $('.btn-title-text').click(function(){
          swal("Here's a message!", "It's pretty, isn't it?")
        });

        $('.btn-timer').click(function(){
          swal({
            title: "Auto close alert!",
            text: "I will close in 2 seconds.",
            timer: 2000,
            showConfirmButton: false
          });
        });
        
        $('.btn-success').click(function(){
          swal("Good job!", "You clicked the button!", "success");
        });
        
        $('.btn-warning-confirm').click(function(){
          swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
          },
          function(){
            swal("Deleted!", "Your imaginary file has been deleted!", "success");
          });
        });
        
        $('.btn-warning-cancel').click(function(){
          swal({
            title: "Are you sure add him/her as friend?",
            text: "The inviter would received the invitation afterward",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, add him/her!',
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm){
              $("#rowValues").val(sentOrNot);
              swal("Sent!", "We sent make friend invitation to him/her.", "success");

            } else {
              swal("Cancelled", "No, we didn 't add him/her:)", "error");
            }
          });
        });

      $('.btn-warning-family').click(function(){
          swal({
            title: "Are you sure add him/her as family member?",
            text: "The inviter would received the invitation afterward",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, add him/her!',
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm){
              swal("Sent!", "We sent request to him/her.", "success");

            } else {
              swal("Cancelled", "No, we didn 't add him/her :)", "error");
            }
          });
        });
        




        
        $('.btn-custom-icon').click(function(){
          swal({
            title: "Sweet!",
            text: "Here's a custom image.",
            imageUrl: 'images/favicon/apple-touch-icon-152x152.png'
          });
        });
        
        $('.btn-message-html').click(function(){
          swal({
            title: "HTML <small>Title</small>!",
            text: 'A custom <span style="color:#F8BB86">html<span> message.',
            html: true
          });
        });
        
        $('.btn-input').click(function(){
          swal({
            title: "An input!",
            text: 'Write something interesting:',
            type: 'input',
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something",
          },
          function(inputValue){
            if (inputValue === false) return false;
        
            if (inputValue === "") {
              swal.showInputError("You need to write something!");
              return false;
            }
            
            swal("Nice!", 'You wrote: ' + inputValue, "success");
        
          });
        });
        
        $('.btn-theme').click(function(){
          swal({
            title: "Themes!",
            text: "Here's the Twitter theme for SweetAlert!",
            confirmButtonText: "Cool!",
            customClass: 'twitter'
          });
        });
        
        $('.btn-ajax').click(function(){
          swal({
            title: 'Ajax request example',
            text: 'Submit to run ajax request',
            type: 'info',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          }, function(){
            setTimeout(function() {
              swal('Ajax request finished!');
            }, 2000);
          });
        });
        
    });
    </script>

    <input id="rowValues" value="" >

</body>


<?php
if(isset($_POST["invit1"])){
echo $_POST["invit1"];
}


?>



<!-- jQuery Library -->    
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    
    <script type="text/javascript" src="js/plugins/d3/d3.min.js"></script>
    <!-- xcharts -->
    <script type="text/javascript" src="js/plugins/xcharts/xcharts.min.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <!--xCharts css-->
  <link href="js/plugins/xcharts/xcharts.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media=“screen,projection”>




<script type="text/javascript">
var mActive = parseInt("<?php echo array_values($moderatelyActive)[0]; ?>");
var lActive = parseInt("<?php echo array_values($lightlyActive)[0]; ?>");
var sActive = parseInt("<?php echo array_values($sedentaryActive)[0]; ?>");
var mean = parseFloat("<?php echo array_values($mean)[0]; ?>");


var acs = parseFloat("<?php echo $_SESSION["activityCaloriesS"];?>");
var cbs = parseFloat("<?php echo $_SESSION["caloriesBMRS"];?>");
var cos = parseFloat("<?php echo $_SESSION["caloriesOutS"];?>");
var els = parseFloat("<?php echo $_SESSION["elevationS"];?>");

var acu = parseFloat("<?php echo $_SESSION["activityCaloriesU"];?>");
var cbu = parseFloat("<?php echo $_SESSION["caloriesBMRU"];?>");
var cou = parseFloat("<?php echo $_SESSION["caloriesOutU"];?>");
var elu = parseFloat("<?php echo $_SESSION["elevationU"];?>");


(function () {
var data = [{"xScale":"ordinal","comp":[],"main":[
{"className":".main.l1","data":[
{"y":acs,"x":"activity Calories"},
{"y":cbs,"x":"calories of BMR"},
{"y":cos,"x":"calories Out"},
{"y":els,"x":"elevation"}]},
{"className":".main.l2","data":[
{"y":acu,"x":"activity Calories"},
{"y":cbu,"x":"calories of BMR"},
{"y":cou,"x":"calories Out"},
{"y":elu,"x":"elevation"}]}],
"type":"line-dotted","yScale":"linear"},
{"xScale":"ordinal","comp":[],"main":[
{"className":".main.l1","data":[
{"y":acs,"x":"activity Calories"},
{"y":cbs,"x":"calories of BMR"},
{"y":cos,"x":"calories Out"},
{"y":els,"x":"elevation"}]},
{"className":".main.l2","data":[
{"y":acu,"x":"activity Calories"},
{"y":cbu,"x":"calories of BMR"},
{"y":cou,"x":"calories Out"},
{"y":elu,"x":"elevation"}]}],
"type":"bar","yScale":"linear"},
{"xScale":"ordinal","comp":[],"main":[
{"className":".main.l1","data":[
{"y":acs,"x":"activity Calories"},
{"y":cbs,"x":"calories of BMR"},
{"y":cos,"x":"calories Out"},
{"y":els,"x":"elevation"}]},
{"className":".main.l2","data":[{"y":acu,"x":"activity Calories"},
{"y":cbu,"x":"calories of BMR"},{"y":cou,"x":"calories Out"},
{"y":elu,"x":"elevation"}]}],"type":"bar","yScale":"linear"}];
var order = [0, 1, 0, 2],
  i = 0,
  xFormat = d3.time.format('%A'),
  chart = new xChart('line-dotted',data[order[i]], '#chart-animated', {
    axisPaddingTop: 6,
    timing: 1250
  }),
  rotateTimer,
  toggles = d3.selectAll('.multi button'),
  t = 3500;

function updateChart(i) {
  var d = data[i];
  chart.setData(d);
  toggles.classed('toggled', function () {
    return (d3.select(this).attr('data-type') === d.type);
  });
  return d;
}

toggles.on('click', function (d, i) {
  clearTimeout(rotateTimer);
  updateChart(i);
});

function rotateChart() {
  i += 1;
  i = (i >= order.length) ? 0 : i;
  var d = updateChart(order[i]);
  rotateTimer = setTimeout(rotateChart, t);
}
rotateTimer = setTimeout(rotateChart, t);
}());



// Line Chart
var dataLine = {
  "xScale": "time",
  "yScale": "linear",
  "type": "line",
  "main": [
    {
      "className": ".pizza",
      "data": [
        {
          "x": "2012-11-05",
          "y": 1
        },
        {
          "x": "2012-11-06",
          "y": 6
        },
        {
          "x": "2012-11-07",
          "y": 13
        },
        {
          "x": "2012-11-08",
          "y": -3
        },
        {
          "x": "2012-11-09",
          "y": -4
        },
        {
          "x": "2012-11-10",
          "y": 9
        },
        {
          "x": "2012-11-11",
          "y": 6
        }
      ]
    }
  ]
};
var opts = {
  "dataFormatX": function (x) { return d3.time.format('%Y-%m-%d').parse(x); },
  "tickFormatX": function (x) { return d3.time.format('%A')(x); }
};
var linechart = new xChart('line', dataLine, '#line-chart', opts);

// Basic Bar Chart
var dataBar = {
  "xScale": "ordinal",
  "yScale": "linear",
  "main": [
    {
      "className": ".pizza",
      "data": [
        {
          "x": "Pepperoni",
          "y": 4
        },
        {
          "x": "Cheese",
          "y": 8
        }
      ]
    }
  ]
};
var myChart = new xChart('bar', dataBar, '#bar-chart');



//Interacting With Points
var tt = document.createElement('div'),
  leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
  topOffset = -32;
tt.className = 'ex-tooltip';
document.body.appendChild(tt);

var dataIP = {
  "xScale": "time",
  "yScale": "linear",
  "main": [
    {
      "className": ".pizza",
      "data": [
        {
          "x": "2012-11-05",
          "y": 6
        },
        {
          "x": "2012-11-06",
          "y": 6
        },
        {
          "x": "2012-11-07",
          "y": 8
        },
        {
          "x": "2012-11-08",
          "y": 3
        },
        {
          "x": "2012-11-09",
          "y": 4
        },
        {
          "x": "2012-11-10",
          "y": 9
        },
        {
          "x": "2012-11-11",
          "y": 6
        }
      ]
    }
  ]
};
var opts = {
  "dataFormatX": function (x) { return d3.time.format('%Y-%m-%d').parse(x); },
  "tickFormatX": function (x) { return d3.time.format('%A')(x); },
  "mouseover": function (d, i) {
    var pos = $(this).offset();
    $(tt).text(d3.time.format('%A')(d.x) + ': ' + d.y)
      .css({top: topOffset + pos.top, left: pos.left + leftOffset})
      .show();
  },
  "mouseout": function (x) {
    $(tt).hide();
  }
};
var myChart = new xChart('line-dotted', dataIP, '#interacting-points', opts);



</script>


<script type="text/javascript">


var vActive = parseFloat("<?php echo $_SESSION["vActiveY"]; ?>");
var mActive = parseInt("<?php echo $_SESSION["mActiveY"]; ?>");
var lActive = parseInt("<?php echo $_SESSION["lActiveY"]; ?>");
var sActive = parseInt("<?php echo $_SESSION["sActiveY"]; ?>");
var mean = parseFloat("<?php echo array_values($mean)[0]; ?>");





//SIMPLE LINE CHART
new Chartist.Line('#ct1-chart', {
  labels: ['activity Calories ', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
  series: [
    [12, 9, 7, 8, 5],
    [2, 1, 3.5, 7, 3],
    [1, 3, 4, 5, 6]
  ]
}, {
  fullWidth: true,
  chartPadding: {
    right: 40
  }
});


//LINE CHART WITH AREA
new Chartist.Line('#ct2-chart-bar', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8],
  series: [
    [5, 9, 7, 8, 5, 3, 5, 4]
  ]
}, {
  low: 0,
  showArea: true
});


//BI-POLAR LINE CHART WITH AREA ONLY
new Chartist.Line('#ct3-chart', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8],
  series: [
    [1, 2, 3, 1, -2, 0, 1, 0],
    [-2, -1, -2, -1, -2.5, -1, -2, -1],
    [0, 0, 0, 1, 2, 2.5, 2, 1],
    [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5]
  ]
}, {
  high: 3,
  low: -3,
  showArea: true,
  showLine: false,
  showPoint: false,
  fullWidth: true,
  axisX: {
    showLabel: false,
    showGrid: false
  }
});


//ADVANCED SMIL ANIMATIONS

var vActiveSearch = "<?php echo $_SESSION["vActiveS"];?>";
var mActiveSearch = "<?php echo $_SESSION["mActiveS"];?>";
var lActiveSearch = "<?php echo $_SESSION["lActiveS"];?>";
var sActiveSearch = "<?php echo $_SESSION["sActiveS"];?>";


var chart = new Chartist.Line('#ct4-chart', {
  labels: ['moderatelyActive', 'VeryActive', 'LowActive', 'sedentaryActive', 'NotActive',],
  series: [
    [vActive,mActive, lActive, sActive, 0],
    [vActiveSearch, mActiveSearch, lActiveSearch, sActiveSearch, 0]

  ]
}, {
  low: 0
});

// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
  delays = 80,
  durations = 3500;

// Once the chart is fully created we reset the sequence
chart.on('created', function() {
  seq = 0;
});

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
chart.on('draw', function(data) {
  seq++;

  if(data.type === 'line') {
    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
    data.element.animate({
      opacity: {
        // The delay when we like to start the animation
        begin: seq * delays + 1000,
        // Duration of the animation
        dur: durations,
        // The value where the animation should start
        from: 0,
        // The value where it should end
        to: 1
      }
    });
  } else if(data.type === 'label' && data.axis === 'x') {
    data.element.animate({
      y: {
        begin: seq * delays,
        dur: durations,
        from: data.y + 500,
        to: data.y,
        // We can specify an easing function from Chartist.Svg.Easing
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'label' && data.axis === 'y') {
    data.element.animate({
      x: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 100,
        to: data.x,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'point') {
    data.element.animate({
      x1: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      x2: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      opacity: {
        begin: seq * delays,
        dur: durations,
        from: 0,
        to: 1,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'grid') {
    // Using data.axis we get x or y which we can use to construct our animation definition objects
    var pos1Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '1'] - 30,
      to: data[data.axis.units.pos + '1'],
      easing: 'easeOutQuart'
    };

    var pos2Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '2'] - 100,
      to: data[data.axis.units.pos + '2'],
      easing: 'easeOutQuart'
    };

    var animations = {};
    animations[data.axis.units.pos + '1'] = pos1Animation;
    animations[data.axis.units.pos + '2'] = pos2Animation;
    animations['opacity'] = {
      begin: seq * delays,
      dur: durations,
      from: 0,
      to: 1,
      easing: 'easeOutQuart'
    };

    data.element.animate(animations);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 10 seconds
chart.on('created', function() {
  if(window.__exampleAnimateTimeout) {
    clearTimeout(window.__exampleAnimateTimeout);
    window.__exampleAnimateTimeout = null;
  }
  window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
});

//MULTI-LINE LABELS
new Chartist.Bar('#ct5-chart', {
  labels: ['First quarter of the year', 'Second quarter of the year', 'Third quarter of the year', 'Fourth quarter of the year'],
  series: [
    [60000, 40000, 80000, 70000],
    [40000, 30000, 70000, 65000],
    [8000, 3000, 10000, 6000]
  ]
}, {
  seriesBarDistance: 10,
  axisX: {
    offset: 60
  },
  axisY: {
    offset: 80,
    labelInterpolationFnc: function(value) {
      return value + ' CHF'
    },
    scaleMinSpace: 15
  }
});
//STACKED BAR CHART
new Chartist.Bar('#ct6-chart', {
  labels: ['Q1', 'Q2', 'Q3', 'Q4'],
  series: [
    [800000, 1200000, 1400000, 1300000],
    [200000, 400000, 500000, 300000],
    [100000, 200000, 400000, 600000]
  ]
}, {
  stackBars: true,
  axisY: {
    labelInterpolationFnc: function(value) {
      return (value / 1000) + 'k';
    }
  }
}).on('draw', function(data) {
  if(data.type === 'bar') {
    data.element.attr({
      style: 'stroke-width: 30px'
    });
  }
});


//SIMPLE PIE CHART
var data = {
  series: [5, 3, 4]
};

var sum = function(a, b) { return a + b };

new Chartist.Pie('#ct7-chart', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  }
});

//GAUGE CHART
new Chartist.Pie('#ct8-chart', {
  series: [20, 10, 30, 40]
}, {
  donut: true,
  donutWidth: 60,
  startAngle: 270,
  total: 200,
  showLabel: false
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



<script type="text/javascript">

var meansed =  "<?php echo $_SESSION["MEANSED"]; ?>";
var meanmod =  "<?php echo $_SESSION["MEANMOD"]; ?>";
var meanla =  "<?php echo $_SESSION["MEANLA"]; ?>";
var meanma =  "<?php echo $_SESSION["MEANMA"]; ?>";
var caloriesbmr = "<?php echo $_SESSION["MEANCALBMR"]; ?>";
var caloriesmean = "<?php echo $_SESSION["MEANCALO"]; ?>";

var overallValue = meansed+meanmod+meanla+meanla+caloriesbmr+caloriesmean;

var birdType ;


//consider bird type
if(overallValue > 10000 && overallValue < 15000)
	birdType = 1; 
else if(overallValue < 10000)
	birdType = 2; 
else 
	birdType = 3; 


if(birdType == 1)

{	
	swal({
  title: "Angry Bird!!!",
  text: "You are do moderate amount of sport in this month , your speed and friction for bird is normal",
  imageUrl: "https://www.amcharts.com/lib/coffee/redbird.png"
});

}
if(birdType == 2)

{	
	swal({
  title: "Pig!!!",
  text: "You are too lazy to do exercise, and you can only use pig for Bomb bad result game(friction and speed is 1/2 than normal)",
  imageUrl: "sad.png"
});

}
if(birdType == 3)

{	
	swal({
  title: "Smart Bird!!!",
  text: "You are perform well in the game , so your speed and friction would be faster 2 times than normal angry Bird",
  imageUrl: "http://orig14.deviantart.net/6587/f/2013/197/3/a/orange_by_mallonsart07-d6dqkzs.png"
});

}



function randomData() {


  return [{
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    },

    {
      "year": "Cardio",
      "meanmod": meanmod*1000 ,
      "meanma": meanma*1000,
      "meanla": meanla*1000,


      "pattern": {
        "url": "https://www.amcharts.com/lib/3/patterns/black/pattern5.png",
        "width": 4,
        "height": 4
      },
      "color": "#000000"
    }, 



    {
      "year": "Calories",
      "meanca": caloriesmean,
      "BMR": caloriesbmr,
      "pattern": {
        "url": "https://www.amcharts.com/lib/3/patterns/black/pattern5.png",
        "width": 4,
        "height": 4
      },
      "color": "#000000"
    },

    {
      "year": "other Physical Data",
      "europe": randomVal(),
      "namerica": randomVal(),
      "asia": randomVal()
    },

    {
      "year": "",
    },

    {
      "year": "",
    },

    {
      "year": "",
    }
  ];
}

var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "marginLeft": 10,
  "marginBottom": 20,
  "balloon": {
    "fontSize": 16
  },
  "panEventsEnabled": true,
  "autoMargins": false,
  "startDuration": 1,
  "columnWidth": 0.4,
  "dataProvider": randomData(),
  "valueAxes": [{
    "stackType": "regular",
    "axisAlpha": 0.3,
    "gridAlpha": 0.1,
    "inside": true,
    "position": "left"
  }],
  "graphs": [

   {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of calories Out ",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanca",
    "balloonText": "[[title]]:[[value]]"
  }
  ,{
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of moderately Active (*1000 times for data)",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanma",
    "balloonText": "[[title]]:[[value]]"
  }, 
  {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of lightly Active (*1000 times for data)",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanla",
    "balloonText": "[[title]]:[[value]]"
  }, 
   {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of moderately Active (*1000 times for data)",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanmod",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Monthly mean of Calories BMR for your family",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "BMR",
    "balloonText": "[[title]]:[[value]]"
  },
  {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Over",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "europe",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.5,
    "title": "ok and satisfactory",
    "type": "column",
    "color": "#000000",
    "lineColorField": "color",
    "patternField": "pattern",
    "cornerRadiusTop": 6,
    "valueField": "namerica",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "not acceptable",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "asia",
    "balloonText": "[[title]]:[[value]]"
  }],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0.3,
    "gridAlpha": 0.1,
    "tickLength": 0
  }
});

// generate random val
function randomVal() {
  return Math.round(Math.random() * 5) + 2;
}

// listen for init
chart.addListener("init", init);

// BOX2D (Physics) part
var width = 900;
var height = 500;
var pixels2meters = 30; // box2d uses meters, not pixels and this is ratio
var framesPerSecond = 30;
var world;
var columns = [];
var birdBody;
var birdBodyDef;
var birdFixtureDef;

function init() {
  setTimeout(initBox2D, 2000);
  bird = document.getElementById("bird");
}

function initBox2D() {
  var b2Vec2 = Box2D.Common.Math.b2Vec2;
  var b2BodyDef = Box2D.Dynamics.b2BodyDef;
  var b2Body = Box2D.Dynamics.b2Body;
  var b2FixtureDef = Box2D.Dynamics.b2FixtureDef;
  var b2Fixture = Box2D.Dynamics.b2Fixture;
  var b2World = Box2D.Dynamics.b2World;
  var b2PolygonShape = Box2D.Collision.Shapes.b2PolygonShape;
  var b2CircleShape = Box2D.Collision.Shapes.b2CircleShape;
  var b2DistanceJointDef = Box2D.Dynamics.Joints.b2DistanceJointDef;
  var b2DebugDraw = Box2D.Dynamics.b2DebugDraw;

  world = new b2World(
    new b2Vec2(0, 10),
    true
  );

  // ground. please, study box2d tutorials if you want to understand everything below
  var wallsBodyDef = new b2BodyDef();
  wallsBodyDef.type = b2Body.b2_staticBody;
  var wallsFixtureDef = new b2FixtureDef();
  wallsFixtureDef.density = 1.0;
  wallsFixtureDef.friction = 0.5;
  wallsFixtureDef.restitution = 0.2;
  wallsFixtureDef.shape = new b2PolygonShape();
  wallsFixtureDef.shape.SetAsBox(width / pixels2meters, 10 / pixels2meters);
  wallsBodyDef.position.Set(0, (height - 10) / pixels2meters);
  world.CreateBody(wallsBodyDef).CreateFixture(wallsFixtureDef);

  // bird
  birdBodyDef = new b2BodyDef();
  birdBodyDef.angularDamping = 3;
  birdBodyDef.linearDamping = 0.5;
  birdBodyDef.type = b2Body.b2_dynamicBody;

  birdFixtureDef = new b2FixtureDef();
  
  /***** Main point for control friction of bird   ****/
  
  if(birdType == 1)
  birdFixtureDef.density = 1;
  else if(birdType == 2)
  birdFixtureDef.density = 3;
  else
  birdFixtureDef.density = 0.5;
  
  
  birdFixtureDef.friction = 0.3;
  birdFixtureDef.restitution = 0.6;
  birdFixtureDef.shape = new b2CircleShape(20 / pixels2meters);

  birdBodyDef.position.Set(50 / pixels2meters, -20 / pixels2meters);
  birdBody = world.CreateBody(birdBodyDef).CreateFixture(birdFixtureDef);

  // rectangles
  var rectangleBodyDef = new b2BodyDef();
  rectangleBodyDef.angularDamping = 3;
  rectangleBodyDef.linearDamping = 0.5;
  rectangleBodyDef.type = b2Body.b2_dynamicBody;

  // fixed rectangle
  var fixedRectangleBodyDef = new b2BodyDef();
  fixedRectangleBodyDef.type = b2Body.b2_staticBody;

  var rectangleFixtureDef = new b2FixtureDef();
  rectangleFixtureDef.density = 0.2;
  rectangleFixtureDef.friction = 0.3;
  rectangleFixtureDef.restitution = 0.6;

  // now, loop through all columns

  for (var i = 0; i < chart.graphs.length; i++) {
    for (var j = 0; j < chart.graphs[i].columnsArray.length; j++) {
      columns.push(chart.graphs[i].columnsArray[j]);
    }
  }

  var x0 = 10;
  var y0 = 21;

  for (var i = 0; i < columns.length; i++) {
    var column = columns[i].column;
    var w = Math.abs(column.w);
    var h = Math.abs(column.h) - 0.5;
    var x = column.set.x + x0 + w / 2;
    var y = column.set.y + y0 - h / 2;

    // create block
    rectangleFixtureDef.shape = new b2PolygonShape();
    rectangleFixtureDef.shape.SetAsBox(w / 2 / pixels2meters, h / 2 / pixels2meters);

    // blocks with patterns are fixed (for more fun)
    if (column.pattern) {
      fixedRectangleBodyDef.position.Set(x / pixels2meters, y / pixels2meters);
      column.body = world.CreateBody(fixedRectangleBodyDef).CreateFixture(rectangleFixtureDef);
    } else {
      rectangleBodyDef.position.Set(x / pixels2meters, y / pixels2meters);
      column.body = world.CreateBody(rectangleBodyDef).CreateFixture(rectangleFixtureDef);
    }
  }

  //setup debug draw (if you don't need it, just delete the lines, uncomment to see how box objects are drawn)
  /*
var debugDraw = new b2DebugDraw();
debugDraw.SetSprite(document.getElementById("canvas").getContext("2d"));
debugDraw.SetDrawScale(pixels2meters);
debugDraw.SetFillAlpha(0.5);
debugDraw.SetLineThickness(1.0);
debugDraw.SetFlags(b2DebugDraw.e_shapeBit | b2DebugDraw.e_jointBit);
world.SetDebugDraw(debugDraw);
*/
  window.setInterval(update, 1000 / framesPerSecond);
}

//update blocks and bird
function update() {

  var x0 = 10;
  var y0 = 21;

  for (var i = 0; i < columns.length; i++) {
    var column = columns[i].column;
    var position = column.body.GetBody().GetPosition();
    var angle = column.body.GetBody().GetAngle();
    // a bit complicated transforms
    column.set.translate(position.x * pixels2meters - x0 - column.w / 2, position.y * pixels2meters - column.h / 2 - y0, 1, true);
    var node = column.set.node;
    var transform = node.getAttribute("transform");
    var val = "rotate(" + (angle * 180 / Math.PI) + "," + column.w / 2 + "," + column.h / 2 + ")";
    if (transform) {
      val = transform + " " + val;
    }
    node.setAttribute("transform", val);
  }

  

  if (isDragging) {
    bird.style.top = (chart.mouseY - 25) + "px";
    bird.style.left = (chart.mouseX - 25) + "px";
    // draw lines
    createLines(chart.mouseX, chart.mouseY);
  } else {
    if (birdBody) {
      var body = birdBody.GetBody();
      var birdPosition = body.GetPosition();
      bird.style.top = ((birdPosition.y) * pixels2meters - 25) + "px";
      bird.style.left = ((birdPosition.x) * pixels2meters - 25) + "px";
    }
  }

  world.Step(1 / framesPerSecond, 10, 10);

  // uncomment next line if you want to see box2d objects in action (also canvas element at the bottom)
  //world.DrawDebugData();
  world.ClearForces();
};

var isDragging = false;
var bird;
var mouseX;
var mousey;

// add bird
function addBird(event) {
  if (birdBody) {
    world.DestroyBody(birdBody.GetBody());
  }
  isDragging = true;
  //https://www.amcharts.com/lib/coffee/redbird2.png
  
  if(birdType == 1)
  bird.src = "https://www.amcharts.com/lib/coffee/redbird2.png";
  else if(birdType == 2)
  bird.src = "sad.png";
  else if(birdType == 3)
  bird.src = "http://orig14.deviantart.net/6587/f/2013/197/3/a/orange_by_mallonsart07-d6dqkzs.png";
}

// release bird
function releaseBird() {
	
	//https://www.amcharts.com/lib/coffee/redbird.png
  if(birdType == 1)
  bird.src = "https://www.amcharts.com/lib/coffee/redbird.png";
  else if(birdType == 2)
  bird.src = "sad.png";
  else if(birdType == 3)
  bird.src = "http://orig14.deviantart.net/6587/f/2013/197/3/a/orange_by_mallonsart07-d6dqkzs.png";



  if (line1) {
    line1.remove();
  }
  if (line2) {
    line2.remove();
  }

  isDragging = false;

  birdBodyDef.position.Set(chart.mouseX / pixels2meters, chart.mouseY / pixels2meters);
  birdBody = world.CreateBody(birdBodyDef).CreateFixture(birdFixtureDef);
  setTimeout(applyImpulse, 30);
}

function applyImpulse() {
  var impulse = new Box2D.Common.Math.b2Vec2((150 - chart.mouseX) / 2, (390 - chart.mouseY) / 2);
  var pos = new Box2D.Common.Math.b2Vec2(0, 0);
  birdBody.GetBody().ApplyImpulse(impulse, pos);
}

var line1;
var line2;

function createLines(x, y) {

  if (line1) {
    line1.remove();
  }
  if (line2) {
    line2.remove();
  }
  line1 = AmCharts.line(chart.container, [x, 140], [y, 390], "#000000", 1, 3);
  line2 = AmCharts.line(chart.container, [x, 166], [y, 390], "#000000", 1, 3);
}
        // 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('main'));
var totalrunningdistance = parseInt(meansed + meanmod + meanla +meanma);
        // 指定图表的配置项和数据
var paperDataURI = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJgAAAAyCAYAAACgRRKpAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAB6FJREFUeNrsnE9y2zYYxUmRkig7spVdpx3Hdqb7ZNeFO2PdoD1Cj9DeoEdKbmDPeNFNW7lu0y7tRZvsYqfjWhL/qPgggoIggABIQKQkwsOhE5sQCfzw3uNHJu5sNnOaZq29RttolwfAbxgwChO9nad//4C2C7S9Sfe3uzQobqNghdoJBdIw3R8qHnvNANcA1sBUGCaV9pYC7rYBbLvbgAFpaBgmWbujlO1NA9h2wQTbcdHOoih2ZujLa7WcFtoMtUsKuFEDWL3bkAHq2GTnT+OJkyTzsXRd1/G8FoYN9vBnQ+pGZ7f7BrDqYSLbq6IdxXGM96BKIlBgDP97mgj7aLXcDLa8fgqoGwFu1ABmvzwwLAuTTJmw/SFIfG/ZBmEMIwRiHCVOnCTSPkk/BDoD7YHJbvcNYOVgYmtNWo1cs0xJ8pQJDgXIfM9bscE4TrDyAWwETuEEpP0QSzWU365T0CpXtzoDdsJY3bmpjqfT0AlRKMfWhQBhFYkGLAwjpE6JIxsnAAz6YW0QjksQaBGGTq0fw/mt0kJvXQA7cezWmpYaqBJ73XmKREABQMAKARjZsOXZqU4/FvLbWgu9VQA24NzRGYEJJm6C1GmuJJ4w39C5Sj6x/H6IKiWxPHflwQv9wPEV5TeibgS4200DzGitSdX6VCZWR0nonAR98dQNgxInpey0BvnNeKHXJGDGYYLiJQwiqIjuHZ+uKsWpEsUYOHVAeOdm0k4rzm9vKYUbrRswY7UmcVYa48mR5SN2YgkoMlXCoHEmQ6cfAojni1VkAUmsrEplVddCfitU6FUFzDpMvDw1nkzFA5dz91dkYvP61MlJREV8waQWUSWRnVac35QeY/EAe83c0RmDCSzMRV+w2nlZhp1UyFNyJVpMaJ6VmlQ3HUBE9rdSpIUbhhJ2WnF+ExZ63U+f/v2h02mfeb7/JZp0a8rEK1ouVqeXu6LwhEZqA0eCuCyD6ExGngVmKpICJ5tUEbjFsmC+nRZRSsSC0UKv++7Pv676/f7ZQb/v7O/vm3p0wQ3sUEIoM/hsDpFNqKqV6t1R5ltgnJ6Xyt0kOT+RZelCQmcuVs1VrhGOC7qd0kIyV2N87j+7v938cUFXyQ8O+nh7hmBrt9vGVUz1mZ3nicsC7ISqTICqldLqFilaoEjddOxP5UamiJ3CubV9n+sKbH7rdHzu74rnE/UzW9QCASpmvC5XekOWiTdoQRA4z58PEGx7+PvSNRE0aHABbV+eiYjlTJ0oW5m+761M4txePWmox5ODVDTCdbIwF2Dysw4zqTzFxOc/TbjlC/p6ZbYM109/Bk+NuP3l2Cn+nDDhQtNKFwTdF3xm7sJLMmWSLmj4nel0+swdXd9coQ86k8EB3gw2enBwgKx0z8pdo4pqECv1Jbfe2lYqAJinmKoWmAexdilEougiOy1qe/P+UrubyfMlfPbT05MzHo/xHsHldLvde/fi8vKjM3MGQa/n9NDmuvIMBhOMrdRSbiOqAWqjEupVrVQFDFWAdS1fVpzVKal00WKHxaAyhi1XXpJYtrpZar/y8tXj4+MSUMuC1AGe7jBgURgOspPvBvMt6CrBto7cphrAdepjcXpnagpgnUCu+mA9FljRXq9bqmiKlSmZ5zhieUplJkqhYE+ajywYqRWOUSlYWQZzf/n1+qc4jr4KEYFAYRSF2YrrBkEGnGoznduKK5FefUwZ4Ja8rKJbBIV+QZVEi4LuC97776HFb8vqZEARmACkAPPRzVvMl+j3/fH8oCA9oWQOWhg603DqPNx/xAMKPwcb9f18hYITef/+g7XcRkJ9R6JEvFDPUwxsXchuiOXkATxf7TEuAMvKKnSIXla31bwF/eYpEhvIpUFc0+pIg3mnoaKszjk8PMQw+b7ev9VeKVOIPjicTtBkRXiAADQATvUh9Lpym+n6mJaVpiUBmZXy8lbRIJ7d0WlanQgogIlYXRGYqCLrBdkAsB/RN987Gu9kgY3CyUGA1Mlq68ptNupjOnd9vaCj/OhF/fVtJ81Mi2ymX+yOMqCgHwCIQAX7ElX7DKj9vWDpIXj2LPLm93ffoh3Z1vmPTa3nNtU7NNW3NvLKKnAMhPDSCyRVpUVRdVYYKAImXBsTwo0DtTKmvBOvEjbb9TZdK8X5TOEOkpQr3DSwF7E6+u6ubAOHgQVQEiZtoJQA48A2TGE7XidstnObqpUG3bZW3tSxOs7jlapbKaC0AWNgg1d4vqsCtnXkNtFbG2XqTjqPVypqdwxQtyY7L/xGa9Ww2c5txPZgeDptX/mY7E2CWbEgvulAGQOsTrDZzm1Cq8t/k2AngbICWJ1gs5Xbij5e2TWgrAPGwHaSggbAvariAovktjKPV3YdqLUCVjfYeLmt6JsEDVA1A6xusEFue/HiuM5Wt5FA1QKwusD28uXLBqhtB0wAG2znOwLYVgFVa8AY2AYUbN9sEWBbDdTGALYO2NYE2E4BtZGA2YLNEmA7DdTGA2YSttPT04nrut0GqAYwVdiGjsZrRkdHR3ftdlv3aQP9/zA0QO0KYBzgpO+0KQL2wCjUqMGmAUwJNgFgDVANYGZgQ4DdI8AGDVANYFba3/98+PqLzz+7ajCw1/4XYABXWBExzrUA+gAAAABJRU5ErkJggg==';

option = {
    backgroundColor: '#ffffff',
    tooltip: {},
    legend: {
        data: ['all'],
        textStyle: {color: '#ddd'}
    },
    xAxis: [{
        data: ['Total running distance', 'Qomolangma', 'Fuji Mountain','Hong Kong'],
        axisTick: {show: false},
        axisLine: {show: false},
        axisLabel: {
            margin: 20,
            textStyle: {
                color: '#000',
                fontSize: 14
            }
        }
    }],
    yAxis: {
        splitLine: {show: false},
        axisTick: {show: false},
        axisLine: {show: false},
        axisLabel: {show: false}
    },
    markLine: {
        z: -1
    },
    animationEasing: 'elasticOut',
    series: [{
        type: 'pictorialBar',
        name: 'all',
        hoverAnimation: true,
        label: {
            normal: {
                show: true,
                position: 'top',
                formatter: '{c} m',
                textStyle: {
                    fontSize: 16,
                    color: '#e54035'
                }
            }
        },
        data: [{
            value: totalrunningdistance,
            symbol: 'image://' + paperDataURI,
            symbolRepeat: true,
            symbolSize: ['130%', '20%'],
            symbolOffset: [0, 10],
            symbolMargin: '-30%',
            animationDelay: function (dataIndex, params) {
                return params.index * 30;
            }
        }, {
            value: 8844,
            symbol: 'image://hill-Qomolangma.png',
            symbolSize: ['200%', '105%'],
            symbolPosition: 'end'
        }, {
            value: 5895,
            symbol: 'image://hill-Kilimanjaro.png',
            symbolSize: ['200%', '105%'],
            symbolPosition: 'end'
        },
        {
            value: 6000,
            symbol: 'image://https://upload.wikimedia.org/wikipedia/commons/1/12/Hong_Kong_Ball.png',
            symbolSize: ['200%', '105%'],
            symbolPosition: 'end'
        }

        ],
        markLine: {
            symbol: ['none', 'none'],
            label: {
                normal: {show: false}
            },
            lineStyle: {
                normal: {
                    color: '#e54035',
                    width: 2
                }
            },
            data: [{
                yAxis: 8844
            }]
        }
    }, {
        name: 'all',
        type: 'pictorialBar',
        barGap: '-100%',
        symbol: 'circle',
        itemStyle: {
            normal: {
                color: '#fff'
            }
        },
        silent: true,
        symbolOffset: [0, '50%'],
        z: -10,
        data: [{
            value: 1,
            symbolSize: ['150%', 50]
        }, {
            value: '-'
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }]
    }]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


var uploadedDataURL = "https://cdn3.iconfinder.com/data/icons/ui-glyph-blue-03-of-5/100/UI_Blue_3_of_3_23-128.png";
var myChart = echarts.init(document.getElementById('main2'));

var option2 = {
    backgroundColor: '#FFFFFF',
    xAxis: {
        type: 'category',
        boundaryGap: false,
        axisLine: {
            show: true,
            lineStyle: {
                width: 2,
                color: '#eb594b'
            }
        },
        axisTick: {
            show: false
        },
        axisLabel: {
            textStyle: {
                color: 'white',
                fontSize: 16
            }
        },
        splitLine: {
            show: true,
            lineStyle: {
                width: 2,
                color: '#eb594b',
                type: 'dashed'
            }
        },
        data: ['2011', '2012', '2013', '2014', '2015'],
    },
    yAxis: [{
        type: 'value',
        min: 18,
        show: false
    }, {
        type: 'value',
        min: 2.3,
        max: 2.5,
        show: false
    }],
    legend: {
        data: ['average datum comparision', 'Your family average datum comparision']
    },
    series: [{
        name: 'your family datum',
        type: 'line',
        symbol: 'circle',
        symbolSize: 10,
        lineStyle: {
            normal: {
                color: 'transparent',
                width: 2,
            },
        },
        itemStyle: {
            normal: {
                color: '#46d185'
            }
        },
        areaStyle: {
            normal: {
                color: '#46d185'
            }
        },
        label: {
            normal: {
                show: true,
                position: 'top',
                textStyle: {
                    fontSize: 18,
                    color: '#ddd'
                }
            },
        },
        data: [18.62, 18.74, 18.89, 19.04, 19.18]
    }, {
        name: 'total datum comparision',
        type: 'line',
        data: [2.311, 2.314, 2.328, 2.347, 2.363],
        itemStyle: {
            normal: {
                color: '#eb594b',
                shadowColor: 'rgba(0, 0, 0, 0.5)',
                shadowBlur: 20
            }
        },
        yAxisIndex: 1,
        symbol: 'image://' + uploadedDataURL,
        symbolSize: 50,
        label: {
            normal: {
                show: true,
                position: 'top',
                textStyle: {
                    fontSize: 18,
                    color: 'white'
                }
            },
        },
        lineStyle: {
            normal: {
                width: 4,
                shadowColor: 'rgba(0, 0, 0, 0.25)',
                shadowBlur: 20
            }
        }
    }]
};

 myChart.setOption(option2);





	</script>
	

  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert/sweetalert.min.js"></script>  
 <link href="js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">




</body>

</html>

