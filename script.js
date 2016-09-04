var currentInfoBox = "";

function showSideBar() {
      document.getElementById("side_bar").style.display = "block";
      document.getElementById("clickOut").style.display = "block";
      $("#side_bar").animate({top: "46px", zIndex: "200"}, 250);
      $("#side_bar").on( { 'mouseleave':function() { hideSideBar(); } });
}

function hideSideBar() {
      $("#side_bar").animate({top: "calc(46px - 100%)", zIndex: "-950"}, 250);
      document.getElementById("side_bar").style.display = "none";
      document.getElementById("clickOut").style.display = "none";
}

function showLogoutBar() {
      document.getElementById("logout-div").style.display = "block";
      document.getElementById("clickOut").style.display = "block";
      $("#logout-div").animate({top: "46px", zIndex: "200"}, 250);
      $("#logout-div").on( { 'mouseleave':function() { hideLogoutBar(); } });
}

function hideLogoutBar() {
      $("#logout-div").animate({top: "-144px", zIndex: "-950"}, 250);
      document.getElementById("logout-div").style.display = "none";
      document.getElementById("clickOut").style.display = "none";
}

function selectTab(current, views, desc) {
     document.getElementById("tabDesc").innerHTML = desc;
     document.getElementById(views[0]).style.display = "block"; 
     for (var j = 1; j < views.length; j++) {
         document.getElementById(views[j]).style.display = "none";   
     }
     var tabs = document.getElementsByClassName('tab');
     for (var i = 0; i < tabs.length; i++){
         tabs[i].style.height = "17px";
         tabs[i].style.removeProperty('background-color');
         tabs[i].style.removeProperty('zIndex');
         tabs[i].style.cursor = "pointer";
     }

     current.style.height = "18px";
     current.style.backgroundColor = "white";
     current.style.zIndex = "1000";
     current.style.cursor = "auto";
}

function courseSelectTab(current, views) {
     document.getElementById(views[0]).style.display = "block"; 
     for (var j = 1; j < views.length; j++) {
         document.getElementById(views[j]).style.display = "none";   
     }
     var tabs = document.getElementsByClassName('courseTab');
     for (var i = 0; i < tabs.length; i++){
         tabs[i].className = "courseMenuItem  courseTab";
     }

     current.className = "courseMenuItem  courseTab courseMenuSelected";
}

function dropCourseBox(box) {
     document.getElementById(box).style.display = "block";
}

function courseInfoBox(main, box) {
      if (currentInfoBox == box) {
            hideInfoBox();
            currentInfoBox = "";
            return;
      }

      /* if (currentInfoBox.length > 0) {
            hideInfoBox();
      } */
     currentInfoBox = box;
     document.getElementById(main).style.backgroundColor = "rgb(230, 230, 230)";
     document.getElementById(box).style.display = "block";
     var id = "#" + box;
     $(id).animate({marginTop: "0px"}, 700);
     
}

function hideInfoBox(){
     var main = "main" + currentInfoBox.split("o")[1];
     document.getElementById(currentInfoBox).style.marginTop = "-51px";
     document.getElementById(currentInfoBox).style.display = "none";
     document.getElementById(main).style.backgroundColor = "rgb(250, 250, 250)";
}