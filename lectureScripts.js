var currentlyVidBox = "";

function watchVideo(current){
    var videoBox = current.parentNode.parentNode.parentNode.childNodes[4].id;
    //Close all other video box
    var allCourses = document.getElementById("lectureList").childNodes;
    for (var i = 0; i < allCourses.length; i++) {
        if (allCourses[i].childNodes[4].style.height == "467px"){
               var initiaIId = String(allCourses[i].childNodes[4].id);
                var nid = "#" + initiaIId;
                $(nid).animate({height: "0px"}, 750);
          }
     }

   //If current is already open, animate close, exit
   if (currentlyVidBox == videoBox) {
       currentlyVidBox = "";
       videoBox = "#" + videoBox;
       $(videoBox).animate({height: "0px"}, 750);
   } else {
      //If current isn't already open, animate open
       currentlyVidBox = videoBox;
       videoBox = "#" + videoBox;
       $(videoBox).animate({height: "467px"}, 750);
   }
}

function takeNote(lecture, parent, current){
     var note = current.parentNode.parentNode.parentNode.childNodes[2].id;
     var noteJquery = "#" + note;
   
     //If item to be selected is currently selected - unselect it
     if (document.getElementById(lecture).className == "courseListItemSelected"){
             document.getElementById(lecture).className = "courseListItem";
             $(noteJquery).animate({height: "0px"}, 750, function() {
                    document.getElementById(note).style.display = "none";
             });
             var icons = parent.childNodes;
             icons[0].className = "lectureFa fa fa-video-camera";
             icons[1].className = "lectureFa fa fa-pencil-square-o";
             return;
     }
     
     //Unselect any previous lecture
     var selected = document.getElementsByClassName("courseListItemSelected");
     for (var i = 0; i < selected.length; i++){
          selected[i].className = "courseListItem";
     }
     
      var allCourses = document.getElementById("lectureList").childNodes;
      for (var i = 0; i < allCourses.length; i++) {
          if (allCourses[i].childNodes[2].style.display == "block"){
               var initiaIId = String(allCourses[i].childNodes[2].id);
                var nid = "#" + initiaIId;
                $(nid).animate({height: "0px"}, 750, function() {
                     document.getElementById(initiaIId).style.display = "none";
                 });
          }
     }
    
     var selected = document.getElementsByClassName("lectureFaSelected fa fa-user");
     for (var i = 0; i < selected.length; i++){
          selected[i].className = "lectureFa fa fa-user";
     }

     var selected = document.getElementsByClassName("lectureFaSelected fa fa-video-camera");
     for (var i = 0; i < selected.length; i++){
          selected[i].className = "lectureFa fa fa-video-camera";
     }

     var selected = document.getElementsByClassName("lectureFaSelected fa fa-pencil-square-o");
     for (var i = 0; i < selected.length; i++){
          selected[i].className = "lectureFa fa fa-pencil-square-o";
     }
   
     //Select new one
     document.getElementById(lecture).className = "courseListItemSelected";
     document.getElementById(note).style.display = "block";
     $(noteJquery).animate({height: "402px"}, 750); 
     var icons = parent.childNodes;
     icons[0].className = "lectureFaSelected fa fa-video-camera";
     icons[1].className = "lectureFaSelected fa fa-pencil-square-o";
}

window.onload = function() {
      var allCourses = document.getElementById("lectureList").childNodes;
      for (var i = 0; i < allCourses.length; i++) {
            allCourses[i].childNodes[2].style.display = "none";
            allCourses[i].childNodes[2].style.height = "0px";
      }
     var saveStat = document.getElementsByClassName("mce-toolbar");
     var saveStatId = 1;
      for (var k = 1; k < saveStat.length; k = k + 2) {
            saveStat[k].childNodes[0].innerHTML += "<div id='saveStatus" + saveStatId + "' class='saveStatus'>Saved</div>";
            saveStatId++;
      }
     var iframes = document.getElementsByClassName("lectureNote");
     for (var j = 0; j < iframes.length; j++) {
            var iframeID = "#" + iframes[j].id + "_ifr";
            $(iframeID).contents().find("body").on("keyup", {iframe: iframeID}, autosave);
     }
     document.body.style.display = "block";
}