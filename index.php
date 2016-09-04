<?php
session_start();
if(isset($_SESSION['myusername'])){
    header("location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MyBookshelf</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link href="style.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" id="pacifico-css" href="http://fonts.googleapis.com/css?family=Pacifico&amp;ver=3.5.2" type="text/css" media="all">
    </head>
    <body>
    <div id="login-div">
        <header>
            <div id="appName2" style="text-align: center; margin: 3px 0 0;">mybookshelf</div>
        </header>
        <form action="profile_login.php" method="post">
        <input name="username" type="text" placeholder="Username" /><br>
        <input name="password" type="password" placeholder="Password" /><br>
        <a href="register.html">Don't have an account?</a>
        <input id="login-button" type="submit" value="Log in" />
        </form>
    </div>
    </body>
</html>
