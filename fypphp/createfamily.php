<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    //$_SESSION["data"] = true;
?>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/plugins/sweetalert/sweetalert.min.js"></script>  
    
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Create Family Page</title>

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
    <link href="js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">

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

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"></a> <span class="logo-text"></span></h1></li>
                    </ul>
                    <!-- notifications-dropdown -->
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

<br><br><br><br><br><br><br><br>


      <!-- START CONTENT -->
      <section id="content">
          <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Create Your Family</h4>
				<br/>
                <div class="row">
                  <form class="col s12" action="success4.php" method="post">
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="family" name="family" type="text" placeholder="Your Family name ">
                        <label for="first_name">Your family name</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="parent" type="text" name="parent" placeholder="Your family character">
                        <label for="weight">Is family 's parent?  </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="pet" type="text" name="pet" placeholder = "Your pet name">
                        <label for="email">Your pet</label>
                      </div>
                    </div>                     
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>



                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- END CONTENT -->
  </div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->


  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
        <span>Copyright © 2016 <a class="grey-text text-lighten-2" target="_blank"> Fitbit Fighter </a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4">FYP21</a></span>

    </div>
  </footer>
  <!-- END FOOTER -->

<script type="text/javascript">


swal("Create Your own family !!!", "Please fill in the information of your family below", "success");

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


<!--  Sweet Alert -->


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
