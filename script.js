
//changing the view of sign up and login UI
function changeView() {
  var signUpBox = document.getElementById("signupbox");
  var signInBox = document.getElementById("signinbox");

  signInBox.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}



function signUp() {

  //catching the data from UI elements
  var fn = document.getElementById("fname");
  var ln = document.getElementById("lname");
  var e = document.getElementById("email");
  var pw = document.getElementById("password");
  var m = document.getElementById("mobile");
  var g = document.getElementById("gender");

  //creating new object of FormData and append the data
  var f = new FormData();
  f.append("fname", fn.value);
  f.append("lname", ln.value);
  f.append("email", e.value);
  f.append("password", pw.value);
  f.append("mobile", m.value);
  f.append("gender", g.value);
  
  //creating new object of XMLHttpRequest
  var r = new XMLHttpRequest();

  //declearing the map for data parsing
  r.open("POST", "signUpProcess.php", true);

  //sending the data
  r.send(f);

  r.onreadystatechange = function() {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      

      if (t == "success") {
        document.getElementById("msg").innerHTML =t;
        document.getElementById("msg").className ="alert alert-success";
        document.getElementById("msgdiv").className ="d-block";

        //clear the UI elements
        document.getElementById("fname").value ="";
        document.getElementById("lname").value ="";
        document.getElementById("email").value ="";
        document.getElementById("password").value ="";
        document.getElementById("mobile").value ="";
        document.getElementById("gender").value ="";
        

      }else {
        document.getElementById("msg").innerHTML =t;
        document.getElementById("msgdiv").className ="d-block";

      }
      
     
    }
  }


}

function signin(){
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");
  
  // alert(email.value);
  // alert(password.value);
  // alert(rememberme.checked);

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();
  //this is like map
  r.open("POST", "signinProcess.php", true);
  //sending the data
  r.send(f);

  r.onreadystatechange = function() {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      // alert(t);
      if (t == "success") {
        window.location = "home.php";
      }else {
        alert(t);
      }
    }
  }

}
