<?php
session_start();

include('sqlAuthentication.php');

$firstname = mysql_real_escape_string(stripslashes($_POST["firstname"]));
$lastname = mysql_real_escape_string(stripslashes($_POST["lastname"]));
$username = mysql_real_escape_string(stripslashes($_POST["username"]));
$password = mysql_real_escape_string(stripslashes($_POST["password"]));
$email = mysql_real_escape_string(stripslashes($_POST["email"]));
$confirmation_code = md5(uniqid(rand()));

$insert_query = "INSERT INTO students (username, password, first_name, last_name, email, confirm_code) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$confirmation_code')";
$result = mysql_query($insert_query);

if ($result){
     $subject = "Welcome to MyBookshelf";
     $headers = "From: noreply@ayodejioyewole.com";
     $message = "Hi $firstname!
You're almost ready to start using MyBookshelf!
To verify your email address and get started, please go to:
http://www.ayodejioyewole.com/bookshelf/confirmation.php?confirmationCode=$confirmation_code

If the above link is not clickable, please copy and paste the link into your web browser. 

Thanks,
MyBookshelf
For more support drop us a message at: ayodeji.oyewole@gmail.com";

     mail($email,$subject,$message,$headers);
     $_SESSION['email'] = $email;
     header("Location: verify_email.php");
     exit();
} else {
     header("Location: register.html");
     exit();
}
?>