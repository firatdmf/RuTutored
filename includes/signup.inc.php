<?php

if(isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';


	$firstName = 	mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = 	mysqli_real_escape_string($conn, $_POST['lastName']);
	$sex = 			mysqli_real_escape_string($conn, $_POST['sex']);
	$username = 	mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = 			mysqli_real_escape_string($conn, $_POST['pwd']);
	$pwdRepeat = 	mysqli_real_escape_string($conn, $_POST['pwdRepeat']);
	$email = 		mysqli_real_escape_string($conn, $_POST['email']);
	$ruid = 		mysqli_real_escape_string($conn, $_POST['ruid']);
	$class = 		mysqli_real_escape_string($conn, $_POST['class']);
	$credits = 		mysqli_real_escape_string($conn, $_POST['credits']);
	$major = 		mysqli_real_escape_string($conn, $_POST['major']);
	$phone = 		mysqli_real_escape_string($conn, $_POST['phone']);
	$eoProgram = 	mysqli_real_escape_string($conn, $_POST['eoProgram']);
	$type = 		mysqli_real_escape_string($conn, $_POST['type']);


												/*Below code is for schedule file purposes.*/
	//------------------------------------------------------------------------------------------------------------------------

	$schedule = $_FILES['schedule'];

	$fileName = $_FILES['schedule']['name'];     // we could've also said $file['name'] instead. ($fileName = $file['name'];)
	$fileTmpName = $_FILES['schedule']['tmp_name'];
	$fileSize = $_FILES['schedule']['size'];
	$fileError = $_FILES['schedule']['error'];
	$fileType = $_FILES['schedule']['type'];

	//We can now, here, limit what files or amount of files a user can upload.
	$fileExt = explode('.', $fileName); // we seperated the string into two parts (before dot and after dot) ext stands for extension
	$fileActualExt = strtolower(end($fileExt)); //make sure everything is lowecased in the extension name of the file. FYI: end() function gets the last element of an array.

	$allowed = array('jpg','jpeg','png','pdf'); //setting which types of file we will allow in the website.

	//------------------------------------------------------------------------------------------------------------------------

	if(empty($firstName) || empty($lastName) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($email)) {
		// header("Location: ../createAccount.php?error=emptyfields&uid=".$username."&mail=".$email."&first=".$firstName."&last=".$lastName."&ruid=".$ruid."&credits=".$credits."phone=".$phone."eoProgram=".$eoProgram);

		header("Location: ../createAccount.php?error=emptyfields,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);

		exit();

	}
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		header("Location: ../createAccount.php?error=invalidemail&username,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
		exit();

	}
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location: ../createAccount.php?error=invalidemail,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
		exit();
	}
	elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		header("Location: ../createAccount.php?error=invalidusername,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
		exit();
	}
	elseif($pwd !== $pwdRepeat) {
		header("Location: ../createAccount.php?error=passwordcheck,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
		exit();

	}
	else{
		//Created a template with a placeholder "?".
		// $sql="SELECT username FROM users WHERE username=? AND email=?;";
		$sql="SELECT username FROM users WHERE username=? OR email=?;";
		//Create a prepared statement. (starting the prepared statement.)
		$stmt = mysqli_stmt_init($conn);
		//Prepare the prepared statement
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../createAccount.php?error=sql-statement-failed");
			exit();
		}
		else {
			//bind paramteres to the placeholder, number of s = number of parameters
			// mysqli_stmt_bind_param($stmt,"ss",$username,$email);
			mysqli_stmt_bind_param($stmt,"ss",$username, $email);
			//Run parameters inside database
			mysqli_stmt_execute($stmt);
			//store the finding in an array
			mysqli_stmt_store_result($stmt);
			//Returns a number(the number of rows that matches the binding)
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck >0) {
				$stmt2 = mysqli_stmt_init($conn);
				mysqli_stmt_bind_param($stmt2,"s",$username);
				mysqli_stmt_execute($stmt2);
				mysqli_stmt_store_result($stmt2);
				$resultCheck2 = mysqli_stmt_num_rows($stmt2);
				if ($resultCheck2>0) {
					header("Location: ../createAccount.php?error=usernametaken,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
					exit();
				}
				else {
					header("Location: ../createAccount.php?error=emailtaken,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
					exit();
				}
			}
			else {
				$sql = "INSERT INTO users (firstName,lastName,sex,username,hashedPwd,email,ruid,class,credits,major,phone,eoProgram,type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location: ../createAccount.php?error=sqlerror,"."&firstName=".$firstName."&lastName=".$lastName."&sex=".$sex."&username=".$username."&email=".$email."&ruid=".$ruid."&class=".$class."&credits=".$credits."&major=".$major."&phone=".$phone."&eoProgram=".$eoProgram."&type=".$type);
					exit();
				}
				else {
					$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"sssssssssssss",$firstName,$lastName,$sex,$username,$hashedPwd,$email, $ruid, $class,$credits, $major, $phone, $eoProgram, $type);
					mysqli_stmt_execute($stmt);
					header("Location: ../createAccount.php?signup=success");


					if (in_array($fileActualExt, $allowed)) {
						if ($fileError === 0) {
							if ($fileSize <1000000) {
								// We need to assign a unique name to the just uploaded file because if another user uploaded a file with the same name before, previous one gets deleted. The boolean "true" assigns the current time value in miliseconds as the new name. (COOL HUH?)
								$fileNameNew = $username.".Schedule.".uniqid('',true).".".$fileActualExt;
								//destination where the file will be uploaded
								$fileDestination = 'uploads/'.$fileNameNew;
								//uploads the file
								move_uploaded_file($fileTmpName, $fileDestination);
								header("location: ../createAccount.php?upload=success");
							}
							else {
								echo "Your file is too big!";
							}
						}
						else {
							echo "There was an error uploading your file!";
						}	
					}
					else {
						echo "You cannot upload files of this type!";
					}



					exit();

				}

			}
		}
	}
mysqli_stmt_close($stmt);
mysql_close($conn);
}
else {
	header("Location: ../createAccount.php");
	exit();
}