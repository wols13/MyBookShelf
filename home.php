<?php 
$title = "Home | MyBookshelf";
include('commonHead.php'); 
?>
<script src="refreshCourses.js"></script>
<script src="joinCourse.js"></script>
     <div id="myCourses">
          <div id="tab-container">
                  <div onclick="selectTab(this, ['enrolledCourses', 'joinCourse', 'createCourse'], 'Select a course')" style="height: 18px; background-color: white; z-index: 1000;" class="darken tab"><i style="margin-top: 0px;" class="fa fa-graduation-cap"></i>
My Courses</div>
                  <div onclick="selectTab(this, ['joinCourse', 'enrolledCourses', 'createCourse'], 'Join a course')" class="darken tab"><i style="margin-top: 0px;" class="fa fa-users"></i>
Join a course</div>
                  <div onclick="selectTab(this, ['createCourse', 'enrolledCourses', 'joinCourse'], 'Create a course')" class="darken tab"><i style="margin-top: 0px;" class="fa fa-plus"></i>
Create a course</div>

		  <div style="display: inline-block;"></div>
          </div>
                 <p id="tabDesc">Select a course</p>
          <div id="enrolledCourses" class="courseList">
              <div id='dropStatus' class="courseListItem"></div>
	     <?php 
                    include('list_courses.php'); 
                    if (isset($_GET["dropStatus"]) && isset($_GET["dropName"])) {
                         $dropStatus = $_GET["dropStatus"];
                         $dropName = $_GET["dropName"];
                          if ($dropStatus == 1) {
                                 echo "<script>document.getElementById('dropStatus').innerHTML = 'You have been removed from <u>" . $dropName . "</u>';
                                                        document.getElementById('dropStatus').style.backgroundColor = 'rgb(139, 204, 118)';
                                                        document.getElementById('dropStatus').style.display = 'block';
                                                        $('#dropStatus').animate({opacity: '1'}, 1500);
                                                        setTimeout(function(){ $('#dropStatus').animate({opacity: '0'}, 2000); }, 18000);
                                                        setTimeout(function(){ document.getElementById('dropStatus').style.display = 'none'; }, 20000);
                                            </script>";
                          } else {
                                 echo "<script>document.getElementById('dropStatus').innerHTML = 'You could not be removed from <u>" . $dropName . "</u>';
                                                        document.getElementById('dropStatus').style.backgroundColor = 'rgb(204, 118, 118)';
                                                        document.getElementById('dropStatus').style.display = 'block';
                                                        $('#dropStatus').animate({opacity: '1'}, 1500);
                                                        setTimeout(function(){ $('#dropStatus').animate({opacity: '0'}, 2000); }, 18000);
                                                        setTimeout(function(){ document.getElementById('dropStatus').style.display = 'none'; }, 20000);
                                            </script>";
                          }
                    }
             ?>
          </div>
          <div id="joinCourse" class="courseList">
              <div id='joinStatus' class="courseListItem"></div>
<span id='joinedAllCourses'>You have joined all the available courses.<br>Click here to go back to <u onclick="document.getElementsByClassName('tab')[0].click();">My courses.</u></span>
              <?php include('coursesToJoin.php'); ?>
          </div>
          <div id="createCourse" class="courseList"></div>
     </div>
</body>