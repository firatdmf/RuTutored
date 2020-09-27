<!-- This php file is capable to generate random quote and display it in the right of the navigation bar. -->

<?php

$quotes = array(
	"“To teach is to learn twice.”<br>-Joseph Joubert",
	"“What we learn with pleasure we never forget.”<br>-Alfred Mercier",
	"“Anyone who has never made a mistake has never tried anything new.<br>”-Albert Einstein",
	"“The important thing is to never stop questioning.<br>”-Albert Einstein",
	"“Engineering is the closest thing to magic that exists in the world<br>”-Elon Musk"
);

//Generates random number between 0 and 4 (both inclusive).
$randNum = rand(0,4);

// $randQuote = $quotes[$randNum];
$randQuote = $quotes[1];