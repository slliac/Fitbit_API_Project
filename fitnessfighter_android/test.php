<?php

 echo date("Y-m-d", strtotime("yesterday"));
 echo "<br>";
$today =  date("d/m", strtotime("today"));
$before_yesterday = date("Y-m-d", strtotime($today . ' - 2 day'));
$three_day_before = date("Y-m-d", strtotime($today . ' - 3 day'));
echo $today . "<br>";
echo $three_day_before . "<br>";
 echo date("Y-m-d", strtotime("this week sunday", strtotime("2017-02-04")));
?>
