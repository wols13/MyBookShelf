<?php
session_start();
$id = $_SESSION["myid"];
include('sqlAuthentication.php');

$courseID = mysql_real_escape_string(stripslashes($_GET["courseID"]));

$drop_query = "DELETE FROM `takes_course` WHERE `student` = '$id' AND `course` = '$courseID'";
$result = mysql_query($drop_query);

$courseDetailsID = $courseID;
include("courseDetails.php");

if ($result) {
    $url = "location: home.php?dropStatus=1&dropName=" . $courseDetails[1] . " - " . $courseDetails[0];
    header($url);
    exit();
} else {
    $url = "location: home.php?dropStatus=0&dropName=" . $courseDetails[1] . " - " . $courseDetails[0];
    header($url);
    exit();
}

?>