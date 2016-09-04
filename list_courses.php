<?php
session_start();
$username = $_SESSION['myusername'];
$userID = $_SESSION['myid'];

include('sqlAuthentication.php');

$sql = "SELECT *
FROM takes_course T
JOIN courses C ON T.course = C.id
WHERE T.student = '$userID'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

if ($count) {
while ($row = mysql_fetch_row($result)) {
   $semester = (int)$row[7];
   $semesterValues = array("F", "S", "Y");
   $semester = $semesterValues[($semester - 1)];
    echo "<a style='text-decoration: none;' href='coursePage.php?courseID=" . $row[6] . "'><div class='courseListItem'>" . 
$row[3] . $semester . " - " . $row[2] . 
    "
<br>
<span style='font-weight: normal; font-size: 11px; color: #555555;'>University of Toronto</span>
</div></a>";
}
} else {
    echo "<style>#enrolledCourses {border: 0;} #noJoinedCourses{display: block;}</style>
<span id='noJoinedCourses'>You have not joined any courses yet.<br>Click here to <u onclick=\"document.getElementsByClassName('tab')[1].click();\">join a course.</u></span>";
}

?>