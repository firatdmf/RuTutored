<?php

	//Tracks whether the user is logged in or not.
	session_start();

	//Stores the current url in a variable.
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];

if(isset($_POST['schedule-submit'])) {
	require 'dbh.inc.php';


	$mondaySchedule = mysqli_real_escape_string($conn, $_POST['Monday']);

	if(empty($mondaySchedule)) {
		header("Location: ../userDisplay.php?error=emptyfields");

		exit();
	} else {
		$sql = "UPDATE users SET Monday='".$mondaySchedule."' WHERE id='".$_SESSION['id']."';";
		mysqli_query($conn, $sql);
		header("Location: ../userDisplay.php?schedule-input=success");
	}
}