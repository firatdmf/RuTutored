<!-- This PHP file is used to connect all the database components into our website. -->
<!-- dbh = Data Base Handler, inc = includes-->

<!-- start of PHP code -->
<?php

// If we had hosting service we would put that name instead, but this server runs in our computer so it's name is "localhost".
$servername = "localhost";

//This should be "root" only if you use XAMPP (A software that helps to create a local server on our computer) like we do currently.
$dBUsername = "root";

//Xampp, by default, assigns no password to any database we have. We may set one later for ourselves though.
$dBPassword = "";

//Name of our Database.
$dBName = "rututored";

//A built-in php function where you assign connection to the variable "conn". Note: the order of the variables matter.
$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

//If we cannot connect to the database, print out error message.
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}