
<!-- Below PHP code executes when the user clicks to the Logout button inside the website. -->

<!-- (The user gets logged out, and goes back to homepage.) -->

<?php


//Load the session
session_start();

//Erases all the session (global) variables.
session_unset();

//Destroys all of the data associated with the current session
session_destroy();

//Brings the user back to the homepage.
header("Location: ../index.php");

