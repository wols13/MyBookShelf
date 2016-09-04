<!DOCTYPE html>
<html>
<head>
    <title>MyBookshelf | Verify email</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" id="pacifico-css" href="http://fonts.googleapis.com/css?family=Pacifico&amp;ver=3.5.2" type="text/css" media="all">
</head>
<body>
<div id="login-div">
<header>
            <div id="appName2" style="text-align: center; margin: 3px 0 0;">mybookshelf</div>
</header>
<p id="verify_email"><?php 
session_start(); 
echo "An email has been sent to:<br><span style='font-weight: bold; color: rgb(164, 81, 81);'>" . $_SESSION["email"] . "</span><br>please click on the link in the email to verify your account."; 
?></p>
</div>
</body>
</html>