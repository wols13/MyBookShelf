<?php
session_start();
$id = $_SESSION["myid"];
include('sqlAuthentication.php');

$course = mysql_real_escape_string(stripslashes($_POST["course"]));

$insert_query = "INSERT INTO `takes_course` (`student`, `course`) VALUES ('$id', '$course')";
$result = mysql_query($insert_query);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>