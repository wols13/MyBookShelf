<?php
$title = "Help | MyBookshelf";
include('commonHead.php'); 
?>

<div id="myCourses">
          <div id="tab-container">
                  <div onclick="selectTab(this, ['enrolledCourses', 'joinCourse'], 'What do you need help with?')" style="height: 18px; background-color: white; z-index: 1000;" class="darken tab"><i style="margin-top: 0px;" class="fa fa-question-circle"></i>
Help</div>
                  <div onclick="selectTab(this, ['joinCourse', 'enrolledCourses'], 'Only BIO130H and MAT136H are available at the moment, more courses would be added by summer this year.')" class="darken tab"><i style="margin-top: 0px;" class="fa fa-envelope"></i>
Report a problem</div>
		  <div style="display: inline-block;"></div>
          </div>
                 <p id="tabDesc">What do you need help with?</p>
                  <div id="enrolledCourses" class="courseList"></div>
                 <div id="joinCourse" class="courseList"></div>
     </div>