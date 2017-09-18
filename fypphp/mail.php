<!DOCTYPE html>
<html lang="en">
<?php
include"index.php"; 
if(isset($_GET['page'])){
$_SESSION["mail"] = $_GET['page'];
}

?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Mail box</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
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
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
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
	<li class="bold"><a href="familyInfo.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Family Info Page</a></li>               <li class="no-padding">
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



      <!-- START LEFT SIDEBAR NAV-->


      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--start container-->
        <div class="container">

          <div id="mail-app" class="section">
            <div class="row">
              <div class="col s12">
                <nav class="red">
                  <div class="nav-wrapper">
                    <div class="left col s12 m5 l5">
                      <ul>
                        <li><a href="#!" class="email-menu"><i class="mdi-navigation-menu"></i></a>
                        </li>
                      </ul>
                    </div>
                    <div class="col s12 m7 l7 hide-on-med-and-down">
                      <ul class="right">

                      </ul>
                    </div>

                  </div>
                </nav>
              </div>
              <div class="col s12">
                <div id="email-sidebar" class="col s2 m1 s1 card-panel">
                  <ul>
                    <li>
                      <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                    </li>
                    <li>
                      <a href="#!"><i class="mdi-content-archive active"></i></a>
                    </li>
                    <li>
                      <a href="#!"><i class="mdi-social-group"></i></a>
                    </li>
                    <li>
                      <a href="#!"><i class="mdi-maps-local-offer"></i></a>
                    </li>
                    <li>
                      <a href="#!"><i class="mdi-alert-error"></i></a>
                    </li>
                  </ul>
                </div>
                <div id="email-list" class="col s10 m4 l4 card-panel z-depth-1">
                  <ul class="collection">
                    <?php
                    if($_SESSION["mail"]=="Friend")
                     echo '<li class="collection-item avatar selected">';
                    else
                     echo '<li class="collection-item avatar email-unread">';
                    ?>
                      <i class="mdi-social-group icon blue-text"></i>
                      <span class="email-title">Friend</span>
                   <!--   <p class="truncate grey-text ultra-small">You have Google+ request from john doe.</p>-->
                      <a href="mail.php?page=Friend" class="secondary-content"><span class="new badge blue"><?php echo count($_SESSION["msg1"]);?></span></a>
                    </li>
                    <?php
                    if($_SESSION["mail"]=="Family")
                     echo '<li class="collection-item avatar selected">';
                    else
                     echo '<li class="collection-item avatar email-unread">';
                    ?>
                      <i class="mdi-maps-local-offer icon green-text"></i>
                      <span class="email-title">Family issue</span>
                     <!-- <p class="truncate grey-text ultra-small">Your father invited to have join Battle.</p>-->
                      <a href="mail.php?page=Family" class="secondary-content"><span class="new badge green"><?php echo count($_SESSION["msg2"]);?></span></a>
                    </li>
                   <?php
                    if($_SESSION["mail"]=="upgrade")
                     echo '<li class="collection-item avatar selected">';
                    else
                     echo '<li class="collection-item avatar email-unread">';
                    ?>
                      <i class="mdi-alert-error icon yellow-text text-darken-3"></i>
                      <span class="email-title">System Updates</span>
                <!--  <p class="truncate grey-text ultra-small">Fitbit Fighter had a patch update in wednesdday.</p>-->
                      <a href="mail.php?page=upgrade" class="secondary-content"><span class="new badge yellow darken-3"><?php echo count($_SESSION["msg3"]);?></span></a>
                    </li>
                    <?php
                    if($_SESSION["mail"]=="other")
                     echo '<li class="collection-item avatar selected">';
                    else
                     echo '<li class="collection-item avatar email-unread">';
                    ?>
                      <i class="mdi-alert-error icon yellow-text text-darken-3"></i>
                      <span class="email-title">Other Email</span>
                 <!--     <p class="truncate grey-text ultra-small">Fitbit Fighter had a patch update in wednesdday.</p> -->
                      <a href="mail.php?page=other" class="secondary-content"><span class="new badge red darken-3"><?php echo count($_SESSION["msg4"]);?></span></a>
                    </li>



                  </ul>
                </div>
                <div id="email-details" class="col s12 m7 l7 card-panel">
                  <p class="email-subject truncate"><?php echo $_SESSION['mail']; ?> <span class="email-tag grey lighten-3">inbox</span> <span class="email-tag  light-blue lighten-4">projects</span> <i class="mdi-action-star-rate yellow-text text-darken-3 right"></i>
                  </p>
<?php 
if(isset($_SESSION['mail']))
{
        $arraylength = count($_SESSION["messagesend"]);
          for($x = $arraylength - 1  ; $x >= 0  ; $x--)
          {
                 echo' <hr class="grey-text text-lighten-2">';
                 echo'<div class="email-content-wrap">';
                 echo'<div class="row">';
                 echo'<div class="col s10 m10 l10">';
                 echo'<ul class="collection">';
                 echo'<li class="collection-item avatar">';
                 echo'<img src="images/avatar.jpg" alt="" class="circle">';
                 echo'<span class="email-title">';
                 echo array_values($_SESSION["title"])[$x]; 
                 echo'</span>';
                 echo'<p class="truncate grey-text ultra-small"> From :';
                 echo array_values($_SESSION["poster"])[$x];
                 echo'To : ';
                 echo array_values($_SESSION["sender"])[$x];
                 echo'</p>';
                 echo'<p class="grey-text ultra-small">Yesterday</p>';
                 echo'</li>';
                 echo'</ul>';
                 echo'</div>';  
                 echo'<div class="col s2 m2 l2 email-actions">';
                 echo'<a href="#!"><span><i class="mdi-content-reply"></i></span></a>';
                 echo'<a href="#!"><span><i class="mdi-navigation-more-vert"></i></span></a>';
                 echo'</div></div><div class="email-content">';
                 echo array_values($_SESSION["messagesend"])[$x];
                 echo'</div>';
                 echo'</div>';
                 echo'<hr>';

}

}
?>

                  <div class="email-reply">
                    <div class="row">
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- Compose Email Trigger -->


            <!-- Compose Email Structure -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <nav class="red">
                  <div class="nav-wrapper">
                    <div class="left col s12 m5 l5">
                      <ul>
                        <li><a href="#!" class="email-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                        </li>
                        <li><a href="#!" class="email-type">Compose</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col s12 m7 l7 hide-on-med-and-down">
                      <ul class="right">
                        <li><a href="#!"><i class="mdi-editor-attach-file"></i></a>
                        </li>
                <form action= "mail.php" method="post">
                        </li>
                        <li><a href="#!"><i class="mdi-navigation-more-vert"></i></a>
                        </li>
                      </ul>
                    </div>

                  </div>
                </nav>
              </div>
              <div class="model-email-content">
                <div class="row">

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="to_email" type="text" class="validate">
                        <label for="to_email">To</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="subject" type="text" class="validate">
                        <label for="subject">Subject</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="compose" class="materialize-textarea" length="500"></textarea>
                        <label for="compose">Compose email</label>
                      </div>
                      <button class="btn btn-message orange waves-effect waves-light">Send your email</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>

<!--

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
-->


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
<br/><br/><br/>
  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4"target="_blank">Fitbit Fighter</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="">Fitbit Fighter</a></span>
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
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    
</body>

</html>