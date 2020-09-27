<!-- This php document consist of the top of every page in the website, as well as the log in/ log out sytem. -->

<?php
	//Tracks whether the user is logged in or not.
	session_start();

	//Stores the current url in a variable.
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Setting the webpage language to standard English. -->
	<meta charset="utf-8">
    <!-- This how the description will look like in search engines like Google. -->
	<meta name="description" content="RU Tutored is a college based amiable platform that provides personalized peer-tutoring experience. Join our community today!">
    <!-- This will adjust how the website looks like on various devices such as phones or tablets. -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- This is what browsers will display on the toolbar as the icon of the website. -->
    <LINK REL="SHORTCUT ICON" HREF="img/icon.ico">
    <!-- This is what browser will display on the toolbar as the title of the website. -->
	<title>RU Tutored</title>
    <!-- This connect the CSS (Styling) document to the HTML. -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="userDisplay.css">

    <!-- FYI: Javascript files is attached at the bottom of <body> tag instead of here, so it will execute after every component of the website is loaded. -->
</head>

<body>
	<header>

        <!-- Below <div> tag is to construct a header consisting of logos and login/logout buttons above the menu bar. -->
		<div class="header">
			<img class="logoText" src="img/logoText.png">
			<img class="logo" src="img/logo.png">

			<?php

                // If the user has already logged in, displays the Logout button on top right corner.
                if (isset($_SESSION['id'])) { 
                    echo '<button class="logoutButton" onclick="logOut();">Logout</button>';
                }

                // If the user has not yet logged in, displays the Login button on top right corner.
                else {
                    echo '<button class="loginButton">Login</button>';
                }
            ?>
		</div>

		<!-- Below is the navigation bar.-->
		<div class="navbar">
		  <a class="active" href="index.php">Home</a>
		  <a href="index.php">My Classes</a>
		  <a href="surveyQuestions.php">My Assessments</a>
		  <a href="survey.php">Survey</a>
		  	<?php 
		  	if(isset($_SESSION['id']) && ($_SESSION['type']=="tutor")) {
		  		echo '<a href="userDisplay.php">My Tutees</a>';
		  	}
		  	elseif (isset($_SESSION['id']) && ($_SESSION['type']=="tutee")){
		  		echo '<a href="userDisplay.php">My Tutors</a>';
		  	}
		  	?>
		  <a href="index.php">Help</a>
		  	<p class="userDisplay"> 
		    	<?php
				// If the user has logged in, display their username at the right side of the navigation bar.
                if (isset($_SESSION['id'])) { 
                	echo "Welcome back, ".$_SESSION['firstName']."!";
                }

                // If the user has not logged in yet, display a quote for the day at the right side of the navigation bar.
                else {

                	//Loads the variable called randQuote from the php file includes/randQuotes.php.
                	include_once "includes/randQuotes.php";
                	echo $randQuote;
                }
                ?>	
           	</p>
		</div>

      	<!-- Below code pops up the login form.-->
	    <div class="popup-login">
	  		<div class="popup-login-content">

	  			<!-- Login images -->
	    		<img src="img/logo.png" alt="User" class="inside-logo">
	    		<img src="img/close-button.png"  alt="close" class="close" id="close">
	    		<p class="errorMsg"></p>
	    		<p class="successMsg"></p>
	    		<!-- Login Form -->
	    		<form name="login-form" action="includes/login.inc.php" method="POST">
	    		<div class="loginInput1">
	    		<input type="text" name="mailuid" autocomplete="off" required/>
	    		<label for="mailuid" class="label-name">
				<span class="content-name">Username/E-mail</span>
				</label>
				</div>
				<div class="loginInput2">
	    		<input type="password" name="pwd" autocomplete="off" required/>
	    		<label for="pwd" class="label-name">
				<span class="content-name">Password</span>
				</label>
				</div>

	    		<!-- Login Buttons -->
	    		<div class="stack-buttons">
	    			<a class="forgot-password" href="#">Forgot your password?</a>
		    		<button class="inside-login-button" type="submit" name="login-submit">Login!</button>
		    		<button class="inside-netid-login-button" type="button" onclick="window.location.href='netidlogin.php';">NetID login!</button>
		    		<p class="no-account"> New to RU Tutored? </p>
		    		<a class="create-account-button" href="createAccount.php">Sign Up!</a>
	    		</div>
	    		</form>
	  		</div>
		</div>

	</header>

	<!-- RU Tutored (Our own Javascript file) -->
	<script type="text/javascript" src="script.js"></script>

	<!-- Linking Jquery (a Javascript Framework) -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Below php code is to handle errors and give appropriate feedback during the login process.  --> 
	<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if (strpos($fullUrl,"login=") == true) {
			// If the url does not contain global get method as "login", then do not do anything bc user hasn't tried to log in yet.
			if(!isset($_GET['login'])) {
				exit();
			}

			// However, if the string in the browser url bar DOES contain the global get method as "login", then execute the below statements.
			else {

				// This variable will be equal to whatever comes as a string after "?login=" in the url bar.
				$loginCheck = $_GET['login']; 

				if ($loginCheck == "sqlerror") {
					echo '<script>document.querySelector(".errorMsg").innerHTML = "An error occured while connecting to RU Tutored database!";</script>';
					echo '<style> .popup-login {display:flex;}</style>';
					exit();
				}
				elseif ($loginCheck == "wrongpwd") {
					echo '<script>document.querySelector(".errorMsg").innerHTML = "You have entered a wrong password!";</script>';
					echo '<style> .popup-login {display:flex;}</style>';
					exit();
				}
				elseif ($loginCheck == "nouser") {
					echo '<script>document.querySelector(".errorMsg").innerHTML = "Such Email/Userid does not exist!";</script>';
					echo '<style> .popup-login {display:flex;}</style>';
					exit();
				}
				elseif ($loginCheck == "emptyfields") {
					echo '<script>document.querySelector(".errorMsg").innerHTML = "You have not filled the all the fields!";</script>';
					echo '<style> .popup-login {display:flex;}</style>';
					exit();
				}

				//If the user successfully logs in:
				elseif ($loginCheck == "success") {
					echo '<script>document.querySelector(".successMsg").innerHTML = "You have been logged in successfuly!";</script>';
					echo '<style> .popup-login {display:flex;}</style>';

					//Waits 1.5 seconds then closes up the popup.
					echo '<script>setTimeout(function(){ document.querySelector(".popup-login").style.display="none"; }, 1500);</script>';
					exit();
				}

			}
		}
	?>
</body>
