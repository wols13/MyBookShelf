<?php
include('sqlAuthentication.php');

$courseID = mysql_real_escape_string(stripslashes($_POST["course_id"]));
$lectureID = mysql_real_escape_string(stripslashes($_POST["lecture_id"]));
$studentID = mysql_real_escape_string(stripslashes($_POST["student_id"]));
$note = mysql_real_escape_string(stripslashes($_POST["note"]));
$sql = "UPDATE note SET note_content='$note' WHERE course_id='$courseID' AND lecture_id='$lectureID' AND student_id='$studentID'";
$result = mysql_query($sql);
echo $lectureID;
?>