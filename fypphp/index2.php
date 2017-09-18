

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
      var inputvalue = "java";
      var rowData = JSON.stringify(inputvalue);
      $('#rowValues').val(rowData);
   });
</script>



<html>
<body>

<form action="index2.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>


<?php
if(isset($_POST['email'])){
$tw =  $_POST['email'];
echo $tw;
}
 ?>

<!--
<body>
<form name="form" action="" method="post">
<input id="rowValues" value="" name="rowValues">
</form>

<?php

$tw =  $_POST['rowValues'];
echo $tw;

 ?>


</body>
</html>
-->