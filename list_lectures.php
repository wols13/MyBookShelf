<?php
session_start();
$username = $_SESSION['myusername'];

include('sqlAuthentication.php');

//Get course id
$courseID = $_GET["courseID"];
$sql="SELECT * FROM lectures WHERE course_id='$courseID'";
$result = mysql_query($sql);
$lectureNo = 1;
while ($row = mysql_fetch_row($result)) {
    echo "<div><div id='lecture" . $lectureNo . "' style='cursor: default; height: 27px;' class='courseListItem'>Lecture " . 
$lectureNo . " - " . $row[2] . "<div class='lectureControls'><i onclick='watchVideo(this)' class='lectureFa fa fa-video-camera'></i><i onclick=\"takeNote('lecture" . $lectureNo . "', this.parentNode, this)\" class='lectureFa fa fa-pencil-square-o'></i></div></div>
     <textarea id='lectureNote" . $lectureNo . "' class='lectureNote'>";
$sqlNote="SELECT note_content FROM note WHERE course_id='$courseID' AND lecture_id='$lectureNo' AND student_id='" . $_SESSION["myid"] . "'";
$resultNote = mysql_query($sqlNote);
$rowNote = mysql_fetch_row($resultNote);
echo $rowNote[0];
echo "</textarea><div id='videoBox" . $lectureNo . "' class='videoBox'><iframe width='1280' height='720' src='https://www.youtube.com/embed/". $row[3] . "?vq=large' frameborder='0' allowfullscreen></iframe></div></div>";
    $lectureNo++;
}
?>