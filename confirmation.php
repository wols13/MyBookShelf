<?php
session_start();

include('sqlAuthentication.php');

$confirmationCode = mysql_real_escape_string(stripslashes($_GET["confirmationCode"]));

$sql="SELECT * FROM students WHERE confirm_code='$confirmationCode'";
$result=mysql_query($sql);

if(mysql_num_rows($result) > 0){
    $sql="UPDATE students SET confirmed='1' WHERE confirm_code='$confirmationCode'";
    mysql_query($sql);
    $result = mysql_fetch_assoc($result);
    $_SESSION["myusername"] = $result["username"];
}

header("Location: home.php");
exit();
?>