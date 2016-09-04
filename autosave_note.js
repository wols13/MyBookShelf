var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            setTimeout(function(){ document.getElementById("saveStatus" + xmlhttp.responseText).innerHTML = "Saved"; document.getElementById("saveStatus" + xmlhttp.responseText).className = "saveStatus"; }, 750);
     }
}
  
function autosave(event) {
    var lectureNo = event.data.iframe.split('_')[0].substring(12);
    document.getElementById("saveStatus" + lectureNo).innerHTML = "Saving...";
    document.getElementById("saveStatus" + lectureNo).className = "savingStatus";
    xmlhttp.open("POST", "autosave.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var parameters  = "course_id=" + document.getElementById('currentCourseId').innerHTML + "&lecture_id=" + lectureNo + "&student_id=" + document.getElementById('currentUserID').innerHTML + "&note=" + encodeURIComponent($(event.data.iframe).contents().find('body').html());
    xmlhttp.send(parameters);
}