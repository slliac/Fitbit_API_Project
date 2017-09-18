$(document).ready(function(){
  var x = window.location.hash;
  var access_token = x.substring(x.indexOf("access_token=") + 13, x.indexOf("&user_id"));
  var user_id = x.substring(x.indexOf("&user_id=") + 9, x.indexOf("&scope"));

  console.log(access_token);
  console.log(user_id);
  var json = 112;
  console.log(user_id);
  $.ajax({
     url: 'fitbit.php',
     data: {access_token: access_token , user_id: user_id},
     type: "POST",
     success: function(data) {//response is value returned from php (for your example it's "bye bye"
         console.log(data);
         json = jQuery.parseJSON(data);
         var test = json.goals.activeMinutes;
         //alert(json.summary.fairlyActiveMinutes);
         //alert(json.summary.lightlyActiveMinutes);
         //alert(json.summary.sedentaryMinutes);
         //console.log(json);
         $("#rowValues").val(test);
        window.location.href = "first.php";

     }
  });

    function passVal(){
        var data = {
            fn: "filename",
            str: "this_is_a_dummy_test_string"
        };

        $.post("index2.php", data);
    }
    passVal();


});
