<?php
//Set up MySQL connection
include('sqlAuthentication.php');

//Check for the details in the db and set it to $course
$sql="SELECT * FROM courses WHERE id =  '$courseDetailsID'";
$courseDetails = mysql_query($sql);
$courseDetails = mysql_fetch_row($courseDetails);

?>