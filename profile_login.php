<?php
//Start session
session_start();

//Setup MySQL database connection
include('sqlAuthentication.php');

//Get the username and password given by the user
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$myusername = mysql_real_escape_string(stripslashes($myusername));
$mypassword = mysql_real_escape_string(stripslashes($mypassword));

//Check for an account with the given username-password combination
$sql="SELECT * FROM students WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

//If such an account exists it should be unique and count should be 1
if($count==1){
    //These next few lines ensure that the user has verified the 
    //ownership of the email attched to this account
    $sql2="SELECT confirmed FROM students WHERE username='$myusername' and password='$mypassword'";
    $result2=mysql_query($sql2);
    $result2=mysql_fetch_assoc($result2);
    if ($result2['confirmed'] != 1){
        //If the user hasn't verified their email, send them to a page that tells them to do so
        header("location: index.html");
        exit();}
    else {
        //If they have verified thier email, send them to the homepage
        $_SESSION['myid'] = mysql_result($result, 0, "id");
        $_SESSION['myusername'] = $myusername;
        header("location: home.php");
        exit();}
}
else {
    //If the user gave a wrong username-password combination, give them a second attempt
    header("location: index.php");
    exit();
}
?>