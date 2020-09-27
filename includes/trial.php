<?php 

require 'dbh.inc.php';
if (isset($_POST['userName'])) {
	$userName = 	mysqli_real_escape_string($conn, $_POST['userName']);
	echo "The username: ".$userName;
	echo '<br>';

	$sql="SELECT * FROM users WHERE username=?";
	//Create a prepared statement. (starting the prepared statement.)
	$stmt = mysqli_stmt_init($conn);
	//Prepare the prepared statement
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: ../trial.php?error=sql-statement-failed");
		exit();
	}
	else {
		//bind paramteres to the placeholder, number of s = number of parameters
		// mysqli_stmt_bind_param($stmt,"ss",$username,$email);
		mysqli_stmt_bind_param($stmt,"s",$userName);
		//Run parameters inside database
		mysqli_stmt_execute($stmt);
		//store the finding in an array
		mysqli_stmt_store_result($stmt);
		//Returns a number(the number of rows that matches the binding)
		$resultCheck = mysqli_stmt_num_rows($stmt);

		if ($resultCheck >0) {
			echo 'Exists!';
			exit();
		}
		else {
			echo 'Does not exist!';
		}
	}
}