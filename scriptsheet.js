function tuteeUp(){
  document.querySelector(".tutee-span").style.background="white";
  document.querySelector(".tutee-span").style.color="rgb(147,38,38)";

  document.querySelector(".tutor-span").style.background="rgb(211,204,189)";
  document.querySelector(".tutor-span").style.color="white";

  document.querySelector(".faculty-span").style.background="rgb(211,204,189)";
  document.querySelector(".faculty-span").style.color="white";

  document.getElementById("tutor-form").style.display="none";
  document.getElementById("faculty-form").style.display="none";
  document.getElementById("tutee-form").style.display="flex";

  document.querySelector(".background").style.height="650px";
  document.querySelector(".right").style.height="650px";
  document.querySelector(".left").style.height="650px";

  document.querySelector(".tutee-image").style.display="flex";
  document.querySelector(".tutor-image").style.display="none";
  document.querySelector(".faculty-image").style.display="none";

  document.getElementById("pleaseSelect").style.display="none";
  document.getElementById("fac-msg").style.display="none";


}



function tutorUp() {
  document.querySelector(".tutor-span").style.background="white";
  document.querySelector(".tutor-span").style.color="rgb(147,38,38)";

    document.querySelector(".tutee-span").style.background="rgb(211,204,189)";
  document.querySelector(".tutee-span").style.color="white";

  document.querySelector(".faculty-span").style.background="rgb(211,204,189)";
  document.querySelector(".faculty-span").style.color="white";


  document.getElementById("tutee-form").style.display="none";
  document.getElementById("faculty-form").style.display="none";
  document.getElementById("tutor-form").style.display="flex";


  document.querySelector(".background").style.height="650px";
  document.querySelector(".right").style.height="650px";
  document.querySelector(".left").style.height="650px";



  document.querySelector(".tutee-image").style.display="none";
  document.querySelector(".tutor-image").style.display="flex";
  document.querySelector(".faculty-image").style.display="none";

  document.getElementById("pleaseSelect").style.display="none";
  document.getElementById("fac-msg").style.display="none";

}

function facultyUp(){
  document.querySelector(".faculty-span").style.background="white";
  document.querySelector(".faculty-span").style.color="rgb(147,38,38)";

  document.querySelector(".tutor-span").style.background="rgb(211,204,189)";
  document.querySelector(".tutor-span").style.color="white";

  document.querySelector(".tutee-span").style.background="rgb(211,204,189)";
  document.querySelector(".tutee-span").style.color="white";

  document.getElementById("tutee-form").style.display="none";
  document.getElementById("tutor-form").style.display="none";
  document.getElementById("faculty-form").style.display="flex";


  document.querySelector(".background").style.height="400px";
  document.querySelector(".right").style.height="400px";
  document.querySelector(".left").style.height="400px";


  document.querySelector(".tutee-image").style.display="none";
  document.querySelector(".tutor-image").style.display="none";
  document.querySelector(".faculty-image").style.display="flex";

  document.getElementById("pleaseSelect").style.display="none";
  document.getElementById("fac-msg").style.display="flex";
}


function name_validate(input){
  var id = input.id;
  var imgValid = document.getElementById(id+"-valid-img").style;
  var imgError = document.getElementById(id+"-error-img").style;
  var errorDisplay = document.getElementById("error-display")
  var inputValue = document.getElementById(id).value;
  var inputValueLength = inputValue.length;
  var firstLetter = inputValue[0].toUpperCase();
  var following = (inputValue.slice(1, inputValueLength+1)).toLowerCase();
  var capitilized = firstLetter + following;
  document.getElementById(id).value = capitilized;
  var inner = $('#error-display').innerHTML;


  if (inputValueLength >= 2) {
    imgValid.display = "flex";
    imgError.display = "none";
    errorDisplay.innerHTML = "Welcome to RU Tutored!";
  }
  else {
    imgValid.display = "none";
    imgError.display = "flex";
    if (id == 'firstName') {
      errorDisplay.innerHTML = "First name should have more than 2 characters.";
    } else if (id=='lastName') {
      errorDisplay.innerHTML = "Last name should have more than 2 characters.";
    }
  }
}


/*
function username_validate(input) {
  var id = input.id;
  // var username = document.getElementById(id).value;
  var username = $('#username').val();
  $('#error-display').html()
  var username_length = username.length;
  if (username_length == 0) {
    document.getElementById("error-display").innerHTML = "Please enter your username";
  }

  // // Run the logout php code.
  //   location.replace("includes/check.php");

  //   //Return false so the href of the button (.logoutButton) is not followed.
  //   return false;


}*/

/* $('#username').keyup(function(){

  var username = $('#username').val();
  alert('key stroke');

  if (username != '') {
    $.post('check_username.php',{username:username},
    function(data) {
      $('#error-display').html(data);
    });
  }else{
    $('#error-display').html("Welcome to RU Tutored!");
  }
 });*/

function username_valid(){

  var username = $('#username').val();

  if (username != '') {
    $.post('check_username.php',{username:username},
    function(data) {
      $('#error-display').html(data);
    });
  }else{
    $('#error-display').html("Welcome to RU Tutored!");
  }
 };



function password_validate() {
  var pwd = document.getElementById('pwd').value;
  var pwdLength = pwd.length;
  if (pwdLength<7) {
    document.getElementById("pwd-error-img").style.display = "flex";
    document.getElementById("pwd-valid-img").style.display = "none";
    document.getElementById("error-display").innerHTML = "Your password should have more than 7 characters! 🗝";
    var valid = false;
  }
  else {
    password_match();
  }

}


function password_match() {
  var pwd = document.getElementById('pwd').value;
  var pwdRepeat = document.getElementById('pwdRepeat').value;
  var pwdRepeatLength = pwdRepeat.length;

    if (pwdRepeatLength == 0) {
      document.getElementById("error-display").innerHTML = "Please confirm your password";
      var valid = false;
    }
    else if (pwd != pwdRepeat) {
      document.getElementById("pwd-error-img").style.display = "flex";
      document.getElementById("pwd-valid-img").style.display = "none";
      document.getElementById("error-display").innerHTML = "Your passwords do not match!";
      var valid = false;
    }
    else {
      document.getElementById("pwd-error-img").style.display = "none";
      document.getElementById("pwd-valid-img").style.display = "flex";
      document.getElementById("error-display").innerHTML = "Nice Password! 😉";
      var valid = true;

    }
}
function formatTel(){
  var inputValue = document.getElementById("telInput").value;
  var inputValueLength = inputValue.length;
  if(inputValueLength == 0){
    document.getElementById("telInput").value = inputValue+"("; 
  }
  if(inputValueLength == 4){
    document.getElementById("telInput").value = inputValue+") ";
  }
  if(inputValueLength == 9){
    document.getElementById("telInput").value = inputValue+"-";
  }
}





