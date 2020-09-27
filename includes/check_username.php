<?php

	require 'dbh.inc.php';

	if(isset($_POST['username'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		if(!empty($username)) {
			$sql="SELECT username FROM users WHERE username=?;";
			$stmt = mysqli_stmt_init($conn);
			echo 'good';
			if(!mysqli_stmt_prepare($stmt, $sql)) {
				echo 'wassup';
				header("Location: ../createAccount.php?error=sql-statement-failed");
			}
			else {
				//bind paramteres to the placeholder, number of s = number of parameters
				// mysqli_stmt_bind_param($stmt,"ss",$username,$email);
				mysqli_stmt_bind_param($stmt,"s",$username);
				//Run parameters inside database
				mysqli_stmt_execute($stmt);
				//store the finding in an array
				mysqli_stmt_store_result($stmt);
				//Returns a number(the number of rows that matches the binding)
				$resultCheck = mysqli_stmt_num_rows($stmt);

				if ($resultCheck >0) {
					echo 'The username'.$username.'is not available';
				} else{
					echo 'The username'.$username.'is available';
				}
			}
		}
	}