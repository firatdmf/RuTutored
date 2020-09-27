<!-- This document reads the login info entered by the user and compares with database, then sends the result to the header.php -->

<?php

	//Checks if the user clicked on the login button(The one inside the popup).
	if (isset($_POST['login-submit'])) {


			// I'm trying to fix a bug. I'll play around with the chunk of code later. For now, ignore this.
//-------------------------------------------------------------------------------------------------------------------	

	//Gets the current url on the browser, and stores as a string.
	// $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	//Seperates that string into multiple strings seperated by "/", and stores into an array. 
	/*$afterUrl = explode("/",$fullUrl);

	$endUrl = end($afterUrl);*/

//-------------------------------------------------------------------------------------------------------------------

		//Loads the data from the database.
		include_once 'dbh.inc.php';

		//The code below is not that secure when it comes to privacy/security. So we gotta use another way. But I left it here as a comment, cuz why not :D.
//-------------------------------------------------------------------------------------------------------------------
		/*//Stores the entered username or email address by the user as a variable.
		$mailuid = $_POST['mailuid']; //
		//Stores the entered password by the user as a variable.
		$password = $_POST['pwd'];*/


								//The code below is more secure.
//-------------------------------------------------------------------------------------------------------------------
		
		//Stores the user entered username or email address as a variable.
		// $mailuidVar = mysqli_real_escape_string($conn, $_POST['mailuid']);
		$mailuidVar = mysqli_real_escape_string($conn, $_POST['mailuid']);

		//Stores the user entered password as a variable.
		$passwordVar = mysqli_real_escape_string($conn, $_POST['pwd']);

//-------------------------------------------------------------------------------------------------------------------
		
		//If a user fails to fill all the fields in the login form, it indicates it within the url.  
		if (empty($mailuidVar) || empty($passwordVar)) {
			header("Location: ../index.php?login=emptyfields");
			exit();
		}

		//Warning: Below code can get pretty confusing, it is a PHP built in stuff called prepared statements that used only for security purposes where sensitive data is checked/entered. 
		//So, I basically just copied and pasted the code from internet (With small adjustments.)
		else {
			//Look for which user in the database has that username/Email address, and store their information as a variable.
			// $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
			$sql = "SELECT * FROM users WHERE username=? OR email=?;";

			//Initialize a statement and return an object suitable for mysqli_stmt_prepare(). Basically creates the actual prepared statement.
			$stmt = mysqli_stmt_init($conn); 
			
			//mysqli_stmt_prepare() function prepares the SQL prepared statement for execution. (Kinda like re-preparing.) If it fails, then that means an SQL (Database) error occured.
			if (!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../index.php?login=sqlerror");
				exit();
			}
			else{
				//Bind the variables to the prepared statement as parameters.
				//The number of s's equals to number of parameters (We have two parameters: 2 of the same $mailuidVar)
				//The reason why we have 2 of the same $mailuidVar is because the user can either enter their email address or username. Both should be valid to login to RU Tutored.
				mysqli_stmt_bind_param($stmt,"ss",$mailuidVar,$mailuidVar); 

				//Execute the prepared statement.
				mysqli_stmt_execute($stmt);

				//Gets a result set from the prepared statement.
				$result = mysqli_stmt_get_result($stmt);

				//Returns an array that corresponds to the fetched row or NULL if there are no more rows in resultset.
				if ($row = mysqli_fetch_assoc($result)) {

					//Checks if the entered password matches with the one in our database.
					$pwdCheck = password_verify($passwordVar, $row['hashedPwd']);

					if($pwdCheck == false) {
						header("Location: ../index.php?login=wrongpwd");
						exit();
					}
					elseif($pwdCheck == true) {
						//Start the login session if the password is correct.
						session_start();


		// I'm trying to fix a bug. I'll play around with the chunk of below code later. For now, ignore this as well.
//-------------------------------------------------------------------------------------------------------------------

						/*if(isset($_SESSION['url'])) {
   							$url = $_SESSION['url']; // holds url for last page visited.
						}
						else {
   							$url = "index.php"; // default page for 
						}

						$afterUrl = explode("/",$url);
						$endUrl = end($afterUrl);*/

//-------------------------------------------------------------------------------------------------------------------

						$_SESSION['id'] = $row['id'];

						//I don't know what below is
						// $_SESSION['userUid'] = $row['uidUsers'];

						// $_SESSION['userName'] = $mailuidVar;
						$_SESSION['username'] = $row['username'];
						// header("Location: ../index.php?login=success=".$mailuidVar);
						$_SESSION['firstName'] = $row['firstName'];
						$_SESSION['type'] = $row['type'];
						header("Location: ../index.php?login=success");
						exit();
					}
					//The below else statement is kinda like arbitrary, but it makes sure a user does not get logged in accidentally due to a systematic bug or something.
					else {
						header("Location: ../index.php?login=wrongpwd");
						exit();
					}

				}

				//If such username or email address is not found in the database, then changes url. 
				else {
					header("Location: ../index.php?login=nouser");
					exit();
				}
			}
		}

	}
	else {
		header("Location: ../index.php");

		exit();
	}