document.querySelector(".loginButton").addEventListener("click",function(){
  document.querySelector(".popup-login").style.display="flex";
})


document.querySelector(".close").addEventListener("click",function(){
  document.querySelector(".popup-login").style.display="none";
  document.querySelector(".popup-signup").style.display="none";

})



document.querySelector(".create-account-button").addEventListener("click",function() {
	document.querySelector(".popup-signup").style.display = "flex";
	document.querySelector(".popup-login").style.display="none";
})



document.querySelector(".close2").addEventListener("click",function(){
    document.querySelector(".popup-login").style.display="none";
  document.querySelector(".popup-signup").style.display="none";

})

document.querySelector(".already-login").addEventListener("click",function(){
  document.querySelector(".popup-signup").style.display="none";
  document.querySelector(".popup-login").style.display="flex";

})

function logOut() {
    // Run the logout php code.
    location.replace("includes/logout.inc.php");

    //Return false so the href of the button (.logoutButton) is not followed.
    return false;
}






