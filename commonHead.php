<?php
session_start();
if(!isset($_SESSION['myusername'])){
    header("location: index.php");
    exit();
} else {
    $myusername = $_SESSION['myusername'];
    include('sqlAuthentication.php');
    $sql="SELECT * FROM students WHERE username='$myusername'";
    $result = mysql_query($sql);
    $result = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo "<title>" . $title . "</title>"; ?>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link href="style.css" type="text/css" rel="stylesheet"/>
        <link href="style2.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" id="pacifico-css" href="http://fonts.googleapis.com/css?family=Pacifico&amp;ver=3.5.2" type="text/css" media="all">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="autosave_note.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
  <div id="suggestionBox" style="display: none;"><div id="outerSuggBox"><i class="fa fa-caret-up"></i></div>Suggestions?</div>
   <div id="clickOut" onclick="hideLogoutBar(); hideSideBar();"></div>
    <div id="side_bar">
         <a class="noUnder" href="home.php"><div class="sideBarMenu">COURSES</div></a>
         <a class="noUnder" href="schedule.php"><div class="sideBarMenu">SCHEDULE</div></a>
    </div>
   <div id="logout-div">
         <div class="logoutSubDiv"></div>
         <a class="noUnder" href="help.php"><div class="logoutSubDiv">Help</div></a>
         <a class="noUnder" href="settings.php"><div class="logoutSubDiv">Settings</div></a>
         <a class="noUnder" href="logout.php"><div class="logoutSubDiv" style="border-bottom-left-radius: 5px;">Log Out</div></a>
   </div> 
<header id="main_bar">
            <i id="bars" onclick="showSideBar()" style="float: left; margin-left: 20px; color: white; font-size: 18px;" class="notifications fa fa-bars"></i>
            <a id="appName" class="noUnder" href="home.php">mybookshelf</a>
            <?php 
                echo "<div id='myusername' style='display: none;'>" . $myusername . "</div><div id='currentUserID' style='display: none;'>" . $result['id'] . "</div>";
                echo "<div id='greeting' onclick='showLogoutBar()'>" . $result['username'] . " <i style='font-size: 10px;' class='fa fa-chevron-down'></i></div><i style='margin-right: 15px;' class='notifications fa fa-envelope-o'></i> <i class='notifications fa fa-bell-o'></i> </header>" ?>