<?php 
$title = "Schedule | MyBookshelf";
include('commonHead.php'); 
?>

<div id="myCourses">
     <div id="tab-container" style="text-align: center; font-size: 15px; font-family: arial; color: #333333; padding: 10px 0; height: 17px;" ><i style="margin-top: 0px;" class="fa fa-calendar"></i> Schedule</div>

<table id="scheduleTable">
<tr class="shaded"><td></td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td></tr>
<tr class="tableRows"><td class="shaded">9:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">10:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">11:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">12:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">1:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">2:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">3:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">4:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">5:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">6:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">7:00</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr class="tableRows"><td class="shaded">8:00</td><td></td><td></td><td></td><td></td><td></td></tr>
</table>
<?php
//Set up MySQL connection
include('sqlAuthentication.php');
session_start();
$userID = $_SESSION['myid'];

$sql="SELECT * FROM takes_course T JOIN courses C ON T.course = C.id WHERE T.student = '$userID'";
$courseSchedule = mysql_query($sql);

$colors = array("#ADD7C3", "#6399FD", "#FDCB9B", "#F29BFD", "#CCFFFF",  "#E0E001");
$colorIndex = 0;
while ($row = mysql_fetch_row($courseSchedule)) {
     $timeSlots = explode(" ", $row[10]);
     $allDays = "XMTWRF";
     $allTimes = array("9", "10", "11", "12", "1", "2", "3", "4", "5", "6", "7", "8");
     echo "<script>";
     foreach ($timeSlots as $timeSlot) {
         $day =  strpos($allDays, $timeSlot[0]);
         $time = array_search(substr($timeSlot, 1), $allTimes);
         echo "document.getElementsByClassName('tableRows')[" . $time . "].childNodes[" . $day . "].style.backgroundColor = '" . $colors[$colorIndex] . "';";
         echo "document.getElementsByClassName('tableRows')[" . $time . "].childNodes[" . $day . "].innerHTML = '" . $row[3] . "<br>" . $row[9] . "';";
         echo "document.getElementsByClassName('tableRows')[" . $time . "].childNodes[" . $day . "].style.fontSize = '13px';";
     }
     echo "</script>";
    $colorIndex++;
}

?>
</div>
</body>