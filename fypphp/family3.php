<!DOCTYPE html>
<html lang="en">
<?php
include"index.php"; 
if(isset($_GET['page'])){
$_SESSION["searchName"] = $_GET['page'];
}

echo $_SESSION["loginedName"];

?>


<head>

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
                        <input type="text" name="Search" id="search_data" class="form-control header-search-input z-depth-2" name="search-term" placeholder="Find Your Friend and Family Here" onkeyup="liveSearch()" autocomplete="off"/>
                        <div id="suggestions">
                        <div id="autoSuggestionsList">
                        </div>
                        </div>
                        </form>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>
                        </a>
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

<img src="avatar3.jpg" alt="" class="circle responsive-img valign profile-image">

                            </div>
                            <div class="col col s8 m8 l8">

                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="form-layouts.php"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Student<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Professor</p>
                            </div>
                        </div>
                    </li>
    <li class="bold"><a href="https://www.fitbit.com/oauth2/authorize?response_type=token&client_id=227Z8V&redirect_uri=http%3A%2F%2Flocalhost%2Ffypphp%2Ffirst.php&scope=activity%20heartrate%20location%20nutrition%20profile%20settings%20sleep%20social%20weight&expires_in=604800 " class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>index page</a></li>
    <li class="bold"><a href="mail.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Mail Page</a></li>
    <li class="bold"><a href="compare.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Compare data with different population</a></li>
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
      <!-- START CONTENT -->
      <section id="content">        

        <!--start container-->
        <div class="container">

          <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/user-profile-bg.jpg" alt="user background">                    
                </div>
                <figure class="card-profile-image">
                    <img src="images/avatar.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
                <div class="card-content">
                  <div class="row">                    
                    <div class="col s3 offset-s2">                        
                    <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION["searchName"]; ?></h4>
                    <p class="medium-small grey-text">Gender: <?php echo $_SESSION["searchGender"]; ?></p>
                    </div>
                    <div class="col s2 center-align">
                    <!--    <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION["searchAge"];?></h4>-->
                        <p class="medium-small grey-text">User age</p>
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION["searchFamily"];?> </h4>
                        <p class="medium-small grey-text">Family joined</p>
                    </div>                    
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">
                       <?php 

                      if($_SESSION["addedfd"] == "yes")
                      echo "Friend";
                      else
                      echo "Stranger";
                    
                       ?>

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
                      <span class="card-title grey-text text-darken-4"><?php echo $_SESSION["searchName"];?><i class="mdi-navigation-close right"></i></span>
                      <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i><?php echo $_SESSION['searchGender'];?></span>
                    </p>

                    <p><?php echo $_SESSION["searchInfo"]; ?></p>
                    
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
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
                    <span class="card-title">About Me!</span>
                    <p><?php echo $_SESSION["searchInfo"]; ?></p>
                  </div>                  
                </div>
                <!-- Profile About  -->

                <!-- Profile About Details  -->
                <ul id="profile-page-about-details" class="collection z-depth-1">
                  <li class="collection-item">
                    <div class="row">
                      <div class="col s5 grey-text darken-1"><i class="mdi-action-wallet-travel"></i> Weight </div>
                      <div class="col s7 grey-text text-darken-4 right-align"><?php echo $_SESSION["searchHeight"]; ?></div>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div class="row">
                      <div class="col s5 grey-text darken-1"><i class="mdi-social-poll"></i> Height</div>
                      <div class="col s7 grey-text text-darken-4 right-align"><?php echo $_SESSION["searchWeight"]; ?></div>
                    </div>
                  </li>
                </ul>
                <!--/ Profile About Details  -->

                <!-- Profile About  -->
                <div class="card amber darken-2">
                  <div class="card-content white-text center-align">
                    <p class="card-title"><i class="mdi-social-group-add"></i><?php echo $_SESSION["numFriend"];?> </p>
                    <p>Friends</p>
                  </div>                  
                </div>
                <!-- Profile About  -->

                <!-- Profile Total sell -->
                <div class="card center-align">
                  <div class="card-content purple white-text">
                      <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>His Result and Rank</p>
                      <!--<h4 class="card-stats-number">$<?php echo $_SESSION["profit"]; ?> profit</h4>-->
                      <!--<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> Rank No. <?php echo $_SESSION["ranksearch"];?><span class="purple-text text-lighten-5">last month</span>-->
                      </p>
                  </div>
                  <div class="card-action purple darken-2">
                      <div id="sales-compositebar"></div>
                  </div>
                </div>

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

              <!-- profile-page-wall -->
              <div id="profile-page-wall" class="col s12 m8">
                <!-- profile-page-wall-share -->
                <div id="profile-page-wall-share" class="row">
                  <div class="col s12">
                    <ul class="tabs tab-profile z-depth-1 light-blue">
                      <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#UpdateStatus"><i class="mdi-editor-border-color"></i>Add him into your family</a>&</li>

                      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#AddPhotos"><i class="mdi-editor-border-color"></i>Add him/her as friend </a>
                      </li>
                      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#CreateAlbum"><i class="mdi-editor-border-color"></i>being member of his family</a>
                      </li>                      
                    </ul>
                    <!-- UpdateStatus-->

                   <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>

                     <?php
                        echo '<form action= "family.php" method="post">';
                      ?>
                          <div class="input-field col s10">
                          <?php 
                          if($_SESSION["addedfamily"] == "no")
                           echo '<textarea type="text" name="invit2" row="2" class="materialize-textarea"></textarea>';
                          else
                           echo '<textarea type="text" name="invit2" row="2" class="materialize-textarea" disabled></textarea>';
                          ?>                    
                          <label for="text" class="">Send Your invitation for adding him into your family</label>
                          </div>
                        <div class="row">
                        <div class="col s12 m6 share-icons">

                        </div>
                        <div class="col s12 m6 right-align">
                      <?php 
                      if($_SESSION["addedfamily"] == "no")
                    echo '<button class="btn waves-effect waves-light">Add Him as Your family member</button>';
                      elseif($_SESSION["addedfamily"] == "yet")
                    echo '<button class="btn waves-effect waves-light" disabled>Add Him as Your family member</button>';
                      else
                     echo '<button class="btn waves-effect waves-light" disabled>Add Him as Your family member</button>';
                      ?>
                        </div>
                      </div>
                        </form>
                      </div>
                    </div>




<!--
                    <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
                          <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Send Your invitation for being family member.</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m6 share-icons">

                        </div>
                        <div class="col s12 m6 right-align">

                            
<button class="btn btn-warning-cancel waves-effect waves-light">Add Him as Your family member</button>
                        </div>
                      </div>
                    </div>


-->




                    <!-- Add friend -->
                    <div id="AddPhotos" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>

                     <?php
                        echo '<form action= "family.php" method="post">';
                      ?>
                          <div class="input-field col s10">
                          <?php 
                          if($_SESSION["addedfd"] == "no")
                           echo '<textarea type="text" name="invit1" row="2" class="materialize-textarea"></textarea>';
                          else
                           echo '<textarea type="text" name="invit1" row="2" class="materialize-textarea" disabled></textarea>';
                          ?>                    
                          <label for="text" class="">Send Your invitation for being friend</label>
                          </div>
                        <div class="row">
                        <div class="col s12 m6 share-icons">

                        </div>
                        <div class="col s12 m6 right-align">
                      <?php 
                      if($_SESSION["addedfd"] == "no")
                    echo '<button class="btn waves-effect waves-light">Add Him as Your Friend</button>';
                      else
                    echo '<button class="btn waves-effect waves-light" disabled>You both are friend already</button>';
                      ?>
                        </div>
                      </div>
                        </form>
                      </div>
                    </div>



                    <!-- CreateAlbum -->

                    <div id="CreateAlbum" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>

                     <?php
                        echo '<form action= "family.php" method="post">';
                      ?>
                          <div class="input-field col s10">
                          <?php 
                          if($_SESSION["addedfamily2"] == "no")
                           echo '<textarea type="text" name="invit3" row="2" class="materialize-textarea"></textarea>';
                          else
                           echo '<textarea type="text" name="invit3" row="2" class="materialize-textarea" disabled></textarea>';
                          ?>                    
                          <label for="text" class="">Send Your invitation for adding him into your family</label>
                          </div>
                        <div class="row">
                        <div class="col s12 m6 share-icons">

                        </div>
                        <div class="col s12 m6 right-align">
                      <?php 
                      if($_SESSION["addedfamily2"] == "no")
                    echo '<button class="btn waves-effect waves-light">Join his family :)</button>';
                      elseif($_SESSION["addedfamily2"] == "yet")
                   echo '<button class="btn waves-effect waves-light" disabled>Join his family :)</button>';
                      else
                   echo '<button class="btn waves-effect waves-light" disabled>Join his family :)</button>';                     
                    ?>
                        </div>
                      </div>
                        </form>
                      </div>
                    </div></div></div>
<!--
                    <div id="CreateAlbum" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
                          <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Invitation For being partner</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m6 share-icons">
                        </div>
                        <div class="col s12 m6 right-align">
                          
                            <a class="waves-effect waves-light btn"><i class="mdi-maps-rate-review left"></i>being an family member for him/her </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
-->






                <!--/ profile-page-wall-share -->


                <!-- profile-page-wall-posts -->
                <div id="profile-page-wall-posts"class="row">

                      <!-- medium -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin"><?php echo "The Week Amount of sport compared with ",$_SESSION["searchName"],"(green) and You(blue)";?></p>
                            </div>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
                            </div>

        <div class="container">
          <div class="section">
            
            <div class="divider"></div>
            <!--Animated  Chart-->
            <div id="xcharts-animated-chart" class="section">
                <div class="col s12 m12 l12">
                  <div class="sample-chart-wrapper">
                    <figure class="xchart-placeholder"  id="chart-animated"></figure>
                  </div>
                </div>
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
                              <p class="grey-text text-darken-4 margin"><?php echo "The Week Amount of sport compared with ",$_SESSION["searchName"],"(green) and You(blue)";?></p>
                            </div>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
                            </div>
  <div id="chartist-chart-2" class="section">
              <div class="row">
                <div class="col s12 m8 l12">
                  <div class="sample-chart-wrapper">
                    <div class="ct-chart ct-golden-section" id="ct4-chart"></div>
                  </div>
                </div>
              </div>
</div>
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
   // $_SESSION["LVA"] 
   // $_SESSION["LMA"] 
   // $_SESSION["LLA"] 
   // $_SESSION["LSA"]
   // $_SESSION["LM"]  
(function () {
var data = [{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":mActive,"x":"2012-11-19T00:00:00"},{"y":lActive,"x":"2012-11-20T00:00:00"},{"y":sActive,"x":"2012-11-21T00:00:00"},{"y":mean,"x":"2012-11-22T00:00:00"},{"y":1,"x":"2012-11-23T00:00:00"},{"y":6,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"line-dotted","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"cumulative","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"bar","yScale":"linear"}];
var order = [0, 1, 0, 2],
  i = 0,
  xFormat = d3.time.format('%A'),
  chart = new xChart('line-dotted', data[order[i]], '#chart-animated', {
    axisPaddingTop: 5,
    dataFormatX: function (x) {
      return new Date(x);
    },
    tickFormatX: function (x) {
      return xFormat(x);
    },
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
var vActive = parseFloat("<?php echo $_SESSION["VA"]; ?>");
var mActive = parseInt("<?php echo $_SESSION["MA"]; ?>");
var lActive = parseInt("<?php echo $_SESSION["LA"]; ?>");
var sActive = parseInt("<?php echo $_SESSION["SA"]; ?>");
var mean = parseFloat("<?php echo array_values($mean)[0]; ?>");

//SIMPLE LINE CHART
new Chartist.Line('#ct1-chart', {
  labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
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
var chart = new Chartist.Line('#ct4-chart', {
  labels: ['moderatelyActive', 'VeryActive', 'LowActive', 'sedentaryActive', 'NotActive',],
  series: [
    [vActive,mActive, lActive, sActive, mean],
    [4, 5, 3, 7, 3]

  ]
}, {
  low: 0
});

// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
  delays = 80,
  durations = 500;

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
        from: data.y + 100,
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





  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>




</body>


</html>
