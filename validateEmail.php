<?php
include('sqlAuthentication.php');

$currentValue = mysql_real_escape_string(stripslashes($_POST["email"]));
$query = "SELECT * FROM students WHERE email='$currentValue'";
$result = mysql_query($query);

if (mysql_num_rows($result) > 0 ){
    echo 2;
} else if (mysql_num_rows($result) == 0 ) {
    echo 1;
}
?>