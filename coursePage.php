<?php 
include('sqlAuthentication.php');
if (!isset($_GET["courseID"])) {
    header("Location: home.php");
    exit(); 
} else {
    $courseID = $_GET["courseID"];
    session_start();
    $id = $_SESSION["myid"];
    $sql = "SELECT * FROM takes_course T WHERE T.course =  '$courseID' AND T.student = '$id'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) < 1) {
        header("Location: home.php");
        exit(); 
    } 
}

$title = "Notes | MyBookshelf";
include('commonHead.php'); 

$sql="SELECT * FROM courses C WHERE C.id =  '$courseID'";
$result = mysql_query($sql);
$result = mysql_fetch_row($result);
$semester = (int)$result[5];
$semesterValues = array("F", "S", "Y");
$semester = $semesterValues[($semester - 1)];

echo "<div id='dropCourseOuter'></div><div id='dropCourseInner'>Are you sure you want to drop this course?<br><span style='position: relative; top: 15px; right: 0;' class='joinInfo'>
<a id='infoButtonCSC148H1' class='joinInfoButton' style='width: 75px;' href='dropCourse.php?courseID=" . $result[4] . "'><i style='margin-top: 0;' class='fa fa-thumbs-up'></i> Yes</a><div class='joinInfoButton' onclick=\"document.getElementById('dropCourseOuter').style.display = 'none'; document.getElementById('dropCourseInner').style.display = 'none';\" style='width: 75px;'><i style='margin-top: 0; font-size: 14px;' class='fa fa-thumbs-down'></i> Cancel</div>
</span></div>
          <script>document.body.style.display = 'none';</script>
          <script src='lectureScripts.js'></script>
          <script src='//code.jquery.com/jquery-1.11.0.min.js'></script>
          <script type='text/javascript' src='tinymce/tinymce.min.js'></script>
          <p id='currentCourseId' style='display: none;'>" . $courseID . "</p>
          <script>
tinymce.init({
    selector: 'textarea.lectureNote',
    theme: 'modern',
    width: 300,
    height: 300,
    plugins: [
         'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
         'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
         'save table contextmenu directionality emoticons template paste textcolor'
   ],
   fontsize_formats: '8pt 9pt 10pt 11pt 12pt 26pt 36pt',
   theme: 'modern',
   toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons | fontselect | fontsizeselect', 
setup :
  function(ed) {
    ed.on('init', function() 
    {
        this.getDoc().body.style.fontSize = '12px';
    });
  },
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
          <div id='myCourses'>
          <div style='height: 54px; border: 0;' id='tab-container'>
          <div id='courseImageBox'>
               <img id='courseImage' src='" . $result[6] . "'>
          </div>
          <div id='myCoursesDetails'>" . $result[1] . $semester . " - " . $result[0] . "<br><span style='font-size: 11px; font-weight: normal;'>UNIVERSITY OF TORONTO</span></div></div>
<div id='courseMenu'><span onclick=\"courseSelectTab(this, ['lectureList', 'courseInfo', 'courseSettings', 'courseWebsite'])\" class='courseMenuItem  courseTab courseMenuSelected'>Lectures</span><span onclick=\"courseSelectTab(this, ['courseWebsite', 'courseInfo', 'lectureList', 'courseSettings']); document.getElementById('courseWebsite').style.height = (window.innerHeight - 300) + 'px';\" class='courseMenuItem  courseTab'>Course Website</span><span onclick=\"courseSelectTab(this, ['courseInfo', 'lectureList', 'courseSettings', 'courseWebsite'])\" class='courseMenuItem  courseTab'>Course info</span><span onclick=\"courseSelectTab(this, ['courseSettings', 'lectureList', 'courseInfo', 'courseWebsite'])\" class='courseMenuItem courseTab'>Settings</span></div>
        <div id='courseSettings' class='courseListItem courseList'><span id='dropCourseLink' onclick=\"document.getElementById('dropCourseOuter').style.display = 'block'; document.getElementById('dropCourseInner').style.display = 'block';\">Drop this course</span></div>
        <div id='courseWebsite' class='courseListItem courseList'>" . "<iframe src='" . $result[9] . "'>Your browser does not support this feature</iframe>" . "</div>
        <div id='courseInfo' class='courseListItem courseList'>" . $result[3] . "<br><br>Instructor: " . $result[2] . "<br>Location: " . $result[7] . "<br>Schedule: " . $result[8] . "</div>
         <div id='lectureList' class='courseList' style='margin-top: 60px;'>";
         include('list_lectures.php');
     echo "</div>

</div>
</body>"; 
?>