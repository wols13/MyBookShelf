var emailVerify = new XMLHttpRequest();

emailVerify.onreadystatechange = function() {
    if (emailVerify.readyState == 4 && emailVerify.status == 200) {
        if (emailVerify.responseText == 1){
            document.getElementById("checkEmail").style.display = "inline-block";
            document.getElementById("checkEmail").className = "fa fa-check checkMarks";
        } else {
            document.getElementById("checkEmail").style.display = "inline-block";
            document.getElementById("checkEmail").className = "fa fa-times checkMarks2";
        }        
    }
}
  
function validateEmail() {
    emailVerify.open("POST", "validateEmail.php", true);
    emailVerify.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var parameters  = "email=" + document.getElementById("email").value;
    emailVerify.send(parameters);
}

var usernameVerify = new XMLHttpRequest();

usernameVerify.onreadystatechange = function() {
    if (usernameVerify.readyState == 4 && usernameVerify.status == 200) {
        if (usernameVerify.responseText == 1){
            document.getElementById("checkUsername").style.display = "inline-block";
            document.getElementById("checkUsername").className = "fa fa-check checkMarks";
        } else {
            document.getElementById("checkUsername").style.display = "inline-block";
            document.getElementById("checkUsername").className = "fa fa-times checkMarks2";
        }        
    }
}
  
function validateUsername() {
    usernameVerify.open("POST", "validateUsername.php", true);
    usernameVerify.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var parameters  = "username=" + document.getElementById("username").value;
    usernameVerify.send(parameters);
}



function verifyPassword() {
    var password = document.getElementById("pass1").value;
    var verifyPassword = document.getElementById("pass2").value;
    
    if (password == verifyPassword){
        document.getElementById("checkPassword").style.display = "inline-block";
        document.getElementById("checkPassword").className = "fa fa-check checkMarks";
    } else {
        document.getElementById("checkPassword").style.display = "inline-block";
        document.getElementById("checkPassword").className = "fa fa-times checkMarks2";
    }
}