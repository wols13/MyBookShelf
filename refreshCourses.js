var refreshXmlhttp = new XMLHttpRequest();

refreshXmlhttp.onreadystatechange = function() {
     if (refreshXmlhttp.readyState == 4 && refreshXmlhttp.status == 200) {
           document.getElementById("enrolledCourses").innerHTML = refreshXmlhttp.responseText;
     }
}
  
function refreshCourses() {
        refreshXmlhttp.open("POST", "list_courses.php", true);
        refreshXmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        refreshXmlhttp.send();
}