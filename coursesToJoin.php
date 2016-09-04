<?php
session_start();
$username = $_SESSION['myusername'];

include('sqlAuthentication.php');
$sql="SELECT * FROM students WHERE username='$username'";
$result = mysql_query($sql);
$result = mysql_fetch_assoc($result);
$userID = $result['id'];

$sql = "SELECT * FROM courses C WHERE C.id NOT IN (SELECT course FROM takes_course WHERE student='$userID')";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

if ($count > 0){
while ($row = mysql_fetch_row($result)) {
   $semester = (int)$row[5];
   $semesterValues = array("F", "S", "Y");
   $semester = $semesterValues[($semester - 1)];
    echo "<div id='main" . $row[1] . "' style='z-index: 100; cursor: auto;' class='courseListItem'>" . 
$row[1] . $semester . " - " . $row[0] . 
    "
<br>
<span style='font-weight: normal; font-size: 11px; color: #555555;'>University of Toronto</span>
<div class='joinInfo'>
<div id='infoButton" . $row[1] . "' onclick=\"courseInfoBox('main" . $row[1] . "', 'info" . $row[1] . "')\" class='joinInfoButton'><i style='margin-top: 0;' class='fa fa-info-circle'></i> Info</div><div class='joinInfoButton' onclick=\"joinCourse(this, '" . $row[4] . "')\"><i style='margin-top: 0; font-size: 12px;' class='fa fa-plus'></i> Join</div>
</div>
</div>
<div id='info" . $row[1] . "' class='courseInfoBox'>" . $row[3] . "<br>Instructor: " . $row[2] . "<br>Location: " . $row[7] . "<br>Schedule: " . $row[8] . "
</div>";
}
} else {
    echo "<style>#joinCourse {border: 0 !important;} #joinedAllCourses{display: block;}</style>";
}

?>