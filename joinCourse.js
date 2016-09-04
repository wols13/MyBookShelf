var xmlhttp = new XMLHttpRequest();
var courseToAdd = "";
var courseLink = "";
var mainID = "";
var infoID = "";
var inProgress = 0;

xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == 1) {
                  document.getElementById("joinStatus").innerHTML = "You have been successfully added to <a href='coursePage.php?courseID=" + courseLink + "'>" + courseToAdd + "</a>";
                  document.getElementById("joinStatus").style.backgroundColor = "rgb(139, 204, 118)";
                  var main = document.getElementById(mainID);
                  var info = document.getElementById(infoID);
                  document.getElementById("joinCourse").removeChild(main);
                  document.getElementById("joinCourse").removeChild(info);
            } else {
                  document.getElementById("joinStatus").innerHTML = "You could not be added to " + courseToAdd;
                  document.getElementById("joinStatus").style.backgroundColor = "rgb(204, 118, 118)";
            }
            document.getElementById("joinStatus").style.display = "block";
            $("#joinStatus").animate({opacity: "1"}, 1500);
            refreshCourses();
            noMoreCourses();
            inProgress = 0;
     }
}
  
function joinCourse(current, course) {
    if (inProgress == 0) {
        inProgress = 1;
        document.getElementById("joinStatus").style.display = "none";
        document.getElementById("joinStatus").style.opacity = "0";
        courseToAdd = current.parentNode.parentNode.childNodes[0].textContent;
        courseLink = course;
        mainID = current.parentNode.parentNode.id;
        infoID = "info" + current.parentNode.parentNode.id.split("main")[1];
        xmlhttp.open("POST", "joinCourse.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        var parameters  = "course=" + course;
        xmlhttp.send(parameters);
    }
}

function noMoreCourses() {
    //This is to ensure that if user has added all available 
    //courses, a box saying that this is the case appears
   var children = 0;
   for (var i = 0; i < document.getElementById("joinCourse").childNodes.length; i++){
           if (document.getElementById("joinCourse").childNodes[i].className == "courseListItem"){
                   children++;
           }
   }
   if (children <= 1) {
          document.getElementById("joinCourse").style.border = "0";
          document.getElementById("joinedAllCourses").style.display = "block";
   }
}