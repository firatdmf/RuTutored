<!-- @author: Muhammed Ozturk -->
<!-- Things to fix: Fix name correction, password, database AJAX-JQuery JS -> username, email, ruid -->
<!-- also fix the file upload stuff some time -->

<!DOCTYPE html>
<html>
	<head>
	    <!-- Setting the language to standard English. -->
		<meta charset="UTF-8">
	    <!-- This how the description will look like in search engines like Google. -->
		<meta name="description" content="RU Tutored is a college based amiable platform that provides personalized peer-tutoring experience. Join our community today!">
	    <!-- This will adjust how the website looks like on various devices such as phones or tablets. -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- This is what browsers will display on the toolbar as the icon of the website. -->
	    <LINK REL="SHORTCUT ICON" HREF="img/icon.ico">

	    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<link rel="stylesheet" href="stylesheet.css">
	    <!-- This is what browser will display on the toolbar as the title of the website. -->
		<title>RU Tutored</title>

	</head>



	<body>

		<!-- This is the top portion of the page. -->
		<div class="header">
			<a href="index.php"><img class="logoText" src="img/logoText.png"></a>
			<img class="logo" src="img/logo.png">
		</div>

		<div class="background">
			<div class="right">
				<!-- <img src="img/student.png" class="tutee-image"> -->

				<div id="container" class="tutee-image">
					<img id="student" src="img/student.png" alt="student" border="0">
					  
					<div id="bubble-container">
						<img id="bubble" src="img/speechBubble2.png">

						<textarea id="error-display" readonly>Welcome to RU Tutored!</textarea>
					</div>
				</div>

				<img src="img/student3.png" class="tutor-image">
				<img src="img/faculty.png" class="faculty-image">
			</div>

			<div class="left">
				<div class="headlines">
				<h1>Welcome to RU Tutored!</h1>
				<p id="pleaseSelect">Please select the type of account you'd like to create below.</p>
				</div>

				<div class="account-types">
					<p><span class="tutee-span" onclick="tuteeUp()">Tutee</span><span class="tutor-span" onclick="tutorUp()">Tutor</span><span class="faculty-span" onclick="facultyUp()">Faculty</span></p>
				</div>

			<!-- Tutee Form -->
			<div class="signup-form" id="tutee-form">
			<form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
			  <table>
			  	<tr class="type">
			      <td align="right">Type:</td>
			      <td align="left">
			      	<input type="radio" name="type" value="tutee" checked="checked">
					<input type="radio" name="type" value="tutor">
					<input type="radio" name="type" value="faculty">
			    </tr>
			    <tr>
			      <td align="right">First Name:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['firstName'])) {
							$firstName = $_GET['firstName'];
							echo '<input type="text" name="firstName" id="firstName" placeholder="First Name" value="'.$firstName.'" onfocusout="name_validate(this)"><img src="img/valid.png" id="firstName-valid-img" class="valid-img">
										<img class="error-img" id="firstName-error-img" src="img/error.png">';
						}
						else {
							echo '<input type="text" name="firstName" id="firstName" placeholder="First Name" onfocusout="name_validate(this)"><img src="img/valid.png" id="firstName-valid-img" class="valid-img"><img class="error-img" id="firstName-error-img" src="img/error.png">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">Last Name:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['lastName'])) {
							$lastName = $_GET['lastName'];
							echo '<input onfocusout="name_validate(this)" id="lastName" type="text" name="lastName" placeholder="Last Name" value="'.$lastName.'"><img src="img/valid.png" id="lastName-valid-img" class="valid-img"><img class="error-img" id="lastName-error-img" src="img/error.png">';
						}
						else {
							echo '<input onfocusout="name_validate(this)" id="lastName" type="text" name="lastName" placeholder="Last Name"><img src="img/valid.png" id="lastName-valid-img" class="valid-img"><img class="error-img" id="lastName-error-img" src="img/error.png">';
						}
					?>
			      </td>
			    </tr>
			    <tr id="genderHide">
			      <td align="right">Gender:</td>
			      <td align="left" id="radio">

			      	<?php
				      	if (isset($_GET['sex'])) {
							$sex = $_GET['sex'];
							echo '	<input type="radio" name="sex" id="radiof" value="F">
									<label for="F">Female</label>

									<input type="radio" name="sex" id="radiom" value="M">
									<label for="M">Male</label>

									<input type="radio" name="sex" id="radioo" value="O">
									<label for="O">Other</label>';
							if ($sex == "F") {echo '<script type="text/javascript">document.getElementById("radiof").checked = true</script>';}
							elseif ($sex == "M") {echo '<script type="text/javascript">document.getElementById("radiom").checked = true</script>';}
							elseif ($sex == "O") {echo '<script type="text/javascript">document.getElementById("radioo").checked = true</script>';}
						}
						else {
							echo '	<input type="radio" name="sex" id="radiof" value="F">
									<label for="F">Female</label>

									<input type="radio" name="sex" id="radiom" value="M">
									<label for="M">Male</label>

									<input type="radio" name="sex" id="radioo" value="O">
									<label for="O">Other</label>';
						}
					?>
			    </tr> 
			    <tr>
			      <td align="right">Username:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['username'])) {
							$username = $_GET['username'];
							echo '<input id="username" onkeypress="username_valid()" onfocusout="username_validate(this)" type="text" name="username" placeholder="username" value="'.$username.'"><img src="img/valid.png" id="username-valid-img" class="valid-img"><img class="error-img" id="username-error-img" src="img/error.png">';
						}
						else {
							echo '<input id="username" onkeypress="username_valid()" onfocusout="username_validate(this)" type="text" name="username" placeholder="username"><img src="img/valid.png" id="username-valid-img" class="valid-img"><img class="error-img" id="username-error-img" src="img/error.png">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">Password:*</td>
			      <td align="left"><input type="password" name="pwd" placeholder="Password" id="pwd"></td>
			    </tr>
			    <tr>
			      <td align="right">Repeat Password:*</td>
			      <td align="left">
			      	<input type="password" name="pwdRepeat" placeholder="Repeat Password" id="pwdRepeat" onfocusout="password_match()">
			      	<img src="img/valid.png" id="pwd-valid-img" class="valid-img">
			      	<img class="error-img" id="pwd-error-img" src="img/error.png">
			      </td>
			    </tr>
 			    <tr>
			      <td align="right">Class:</td>
			      <td align="left" id="radio">


			      	<?php
				      	if (isset($_GET['class'])) {
							$class = $_GET['class'];
							echo '	<input type="radio" name="class" id="radiofr" value="freshmen">
									<label for="freshmen">Freshmen</label>
									<input type="radio" name="class" id="radioso" value="sophomore">
									<label for="sophomore">Sophomore</label>
									<br>
									<input type="radio" name="class" id="radioju" value="junior">
									<label for="junior">Junior</label>
									<input type="radio" name="class" id="radiose" value="senior" >
									<label for="senior">Senior</label>';

							if ($class == "freshmen") {echo '<script type="text/javascript">document.getElementById("radiofr").checked = true</script>';}
							elseif ($class == "sophomore") {echo '<script type="text/javascript">document.getElementById("radioso").checked = true</script>';}
							elseif ($class == "junior") {echo '<script type="text/javascript">document.getElementById("radioju").checked = true</script>';}
							elseif ($class == "senior") {echo '<script type="text/javascript">document.getElementById("radiose").checked = true</script>';}
						}
						else {
							echo '	<input type="radio" name="class" value="freshmen" checked="checked">
									<label for="freshmen">Freshmen</label>
									<input type="radio" name="class" value="sophomore">
									<label for="sophomore">Sophomore</label>
									<br>
									<input type="radio" name="class" value="junior">
									<label for="junior">Junior</label>
									<input type="radio" name="class" value="senior" id="senior-radio">
									<label for="senior">Senior</label>';
						}
					?>

				</td>
			    </tr> 
			    <tr>
			      <td align="right">Email:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['email'])) {
							$email = $_GET['email'];
							echo '<input type="email" name="email" placeholder="netID@rutgers.edu" value="'.$email.'">';
						}
						else {
							echo '<input type="email" name="email" placeholder="netID@rutgers.edu">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">RUID:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['ruid'])) {
							$ruid = $_GET['ruid'];
							echo '<input type="text" name="ruid" maxlength="9" placeholder="RUID" value="'.$ruid.'">';
						}
						else {
							echo '<input type="text" name="ruid" maxlength="9" placeholder="RUID">';
						}
					?>

			      </td>
			    </tr>
			    <tr>
			      <td align="right">Credits Completed:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['credits'])) {
							$credits = $_GET['credits'];
							echo '<input type="text" name="credits" maxlength="3" placeholder="#Credits" value="'.$credits.'">';
						}
						else {
							echo '<input type="text" name="credits" maxlength="3" placeholder="#Credits">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">Major:</td>
			      <td align="left">
					<?php
				      	if (isset($_GET['major'])) {
							$major = $_GET['major'];
							if ($major == "other"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE">Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "ASE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "BEE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE" selected>Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "BME"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME" selected>Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "CBE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE" selected>Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "CEE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE" selected>Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "ECE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE" selected>Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "ISE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE"selected>Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "MSE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE" selected>Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "MAE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE" selected>Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "PE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE" selected>Packaging Engineering</option></select>';}

						}
						else {
							echo '	<select name="major">
									  	<option value="other">Other</option>
									  	<option value="ASE">Applied Sciences in Engineering</option>
									  	<option value="BEE">Bioenvironmental Engineering</option>
									  	<option value="BME">Biomedical Engineering</option>
									  	<option value="CBE">Chemical and Biochemical Engineering</option>
									  	<option value="CEE">Civil and Environmental Engineering</option>
									  	<option value="ECE">Electrical and Computer Engineering</option>
									  	<option value="ISE">Industrial and Systems Engineering</option>
									  	<option value="MSE">Materials Science and Engineering</option>
									  	<option value="MAE">Mechanical and Aerospace Engineering</option>
									  	<option value="PE">Packaging Engineering</option>
									</select>';
						}
					?>
				</td>
			    </tr>
			    <tr>
			      <td align="right">Phone:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['phone'])) {
							$phone = $_GET['phone'];
							echo '<input type="tel" name="phone" id="telInput" onkeypress="formatTel()" maxlength="14" autocomplete="off" placeholder="Phone number" value="'.$phone.'">';
						}
						else {
							echo '<input name="phone" type="tel" id="telInput" onkeypress="formatTel()" maxlength="14" autocomplete="off" placeholder="Phone number">';
						}
					?>

			      </td>
			    </tr>
			    <tr>
			      <td align="right">Class Schedule:*</td>
			      <td align="left"><input type="file" name="schedule" class="file-upload"></td>
			    </tr>
			    <tr>
			      <td align="right">EOF/EOP Program:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['eoProgram'])) {
							$eoProgram = $_GET['eoProgram'];
							if ($eoProgram == "yes") {
								echo '<input type="checkbox" id="eof-eod" name="eoProgram" value="yes" checked>';
							}
							else { echo '<input type="checkbox" id="eof-eod" name="eoProgram" value="yes">';

							}
						}
						else { echo '<input type="checkbox" id="eof-eod" name="eoProgram" value="yes">';

						}
					?>

			      </td>
			    </tr>
			    <tr>
			    	<td align="right"></td>
			    	<td align="left">
			     <button class="signup-button" type="submit" name="signup-submit" id="tutee-signup-submit" onclick="tuteeUp()">Submit!</button>
			 </td>
			 </tr>
			  </table>
			</form>
			</div>


















			<!-- Tutor Form -->

			<div class="signup-form" id="tutor-form">
			<form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
			  <table>
			  	<tr class="type">
			      <td align="right">Type:</td>
			      <td align="left">
			      	<input type="radio" name="type" value="tutee">
					<input type="radio" name="type" value="tutor" checked="checked">
					<input type="radio" name="type" value="faculty">
			    </tr>
			    <tr>
			      <td align="right">First Name:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['firstName'])) {
							$firstName = $_GET['firstName'];
							echo '<input type="text" name="firstName" id="firstName" placeholder="First Name" value="'.$firstName.'" onfocusout="name_validate(this)"><img src="img/valid.png" id="firstName-valid-img" class="valid-img">
										<img class="error-img" id="firstName-error-img" src="img/error.png">';
						}
						else {
							echo '<input type="text" name="firstName" id="firstName" placeholder="First Name" onfocusout="name_validate(this)"><img src="img/valid.png" id="firstName-valid-img" class="valid-img"><img class="error-img" id="firstName-error-img" src="img/error.png">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">Last Name:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['lastName'])) {
							$lastName = $_GET['lastName'];
							echo '<input onfocusout="name_validate(this)" id="lastName" type="text" name="lastName" placeholder="Last Name" value="'.$lastName.'"><img src="img/valid.png" id="lastName-valid-img" class="valid-img"><img class="error-img" id="lastName-error-img" src="img/error.png">';
						}
						else {
							echo '<input onfocusout="name_validate(this)" id="lastName" type="text" name="lastName" placeholder="Last Name"><img src="img/valid.png" id="lastName-valid-img" class="valid-img"><img class="error-img" id="lastName-error-img" src="img/error.png">';
						}
					?>
			      </td>
			    </tr>
			    <tr id="genderHide">
			      <td align="right">Gender:</td>
			      <td align="left" id="radio">

			      	<?php
				      	if (isset($_GET['sex'])) {
							$sex = $_GET['sex'];
							echo '	<input type="radio" name="sex" id="radiof" value="F">
									<label for="F">Female</label>

									<input type="radio" name="sex" id="radiom" value="M">
									<label for="M">Male</label>

									<input type="radio" name="sex" id="radioo" value="O">
									<label for="O">Other</label>';
							if ($sex == "F") {echo '<script type="text/javascript">document.getElementById("radiof").checked = true</script>';}
							elseif ($sex == "M") {echo '<script type="text/javascript">document.getElementById("radiom").checked = true</script>';}
							elseif ($sex == "O") {echo '<script type="text/javascript">document.getElementById("radioo").checked = true</script>';}
						}
						else {
							echo '	<input type="radio" name="sex" id="radiof" value="F">
									<label for="F">Female</label>

									<input type="radio" name="sex" id="radiom" value="M">
									<label for="M">Male</label>

									<input type="radio" name="sex" id="radioo" value="O">
									<label for="O">Other</label>';
						}
					?>
			    </tr> 
			    <tr>
			      <td align="right">Username:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['username'])) {
							$username = $_GET['username'];
							echo '<input id="username" onkeypress="username_valid()" onfocusout="username_validate(this)" type="text" name="username" placeholder="username" value="'.$username.'"><img src="img/valid.png" id="username-valid-img" class="valid-img"><img class="error-img" id="username-error-img" src="img/error.png">';
						}
						else {
							echo '<input id="username" onkeypress="username_valid()" onfocusout="username_validate(this)" type="text" name="username" placeholder="username"><img src="img/valid.png" id="username-valid-img" class="valid-img"><img class="error-img" id="username-error-img" src="img/error.png">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">Password:*</td>
			      <td align="left"><input type="password" name="pwd" placeholder="Password" id="pwd"></td>
			    </tr>
			    <tr>
			      <td align="right">Repeat Password:*</td>
			      <td align="left">
			      	<input type="password" name="pwdRepeat" placeholder="Repeat Password" id="pwdRepeat" onfocusout="password_match()">
			      	<img src="img/valid.png" id="pwd-valid-img" class="valid-img">
			      	<img class="error-img" id="pwd-error-img" src="img/error.png">
			      </td>
			    </tr>
 			    <tr>
			      <td align="right">Class:</td>
			      <td align="left" id="radio">


			      	<?php
				      	if (isset($_GET['class'])) {
							$class = $_GET['class'];
							echo '	<input type="radio" name="class" id="radiofr" value="freshmen">
									<label for="freshmen">Freshmen</label>
									<input type="radio" name="class" id="radioso" value="sophomore">
									<label for="sophomore">Sophomore</label>
									<br>
									<input type="radio" name="class" id="radioju" value="junior">
									<label for="junior">Junior</label>
									<input type="radio" name="class" id="radiose" value="senior" >
									<label for="senior">Senior</label>';

							if ($class == "freshmen") {echo '<script type="text/javascript">document.getElementById("radiofr").checked = true</script>';}
							elseif ($class == "sophomore") {echo '<script type="text/javascript">document.getElementById("radioso").checked = true</script>';}
							elseif ($class == "junior") {echo '<script type="text/javascript">document.getElementById("radioju").checked = true</script>';}
							elseif ($class == "senior") {echo '<script type="text/javascript">document.getElementById("radiose").checked = true</script>';}
						}
						else {
							echo '	<input type="radio" name="class" value="freshmen" checked="checked">
									<label for="freshmen">Freshmen</label>
									<input type="radio" name="class" value="sophomore">
									<label for="sophomore">Sophomore</label>
									<br>
									<input type="radio" name="class" value="junior">
									<label for="junior">Junior</label>
									<input type="radio" name="class" value="senior" id="senior-radio">
									<label for="senior">Senior</label>';
						}
					?>

				</td>
			    </tr> 
			    <tr>
			      <td align="right">Email:*</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['email'])) {
							$email = $_GET['email'];
							echo '<input type="email" name="email" placeholder="netID@rutgers.edu" value="'.$email.'">';
						}
						else {
							echo '<input type="email" name="email" placeholder="netID@rutgers.edu">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">RUID:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['ruid'])) {
							$ruid = $_GET['ruid'];
							echo '<input type="text" name="ruid" maxlength="9" placeholder="RUID" value="'.$ruid.'">';
						}
						else {
							echo '<input type="text" name="ruid" maxlength="9" placeholder="RUID">';
						}
					?>

			      </td>
			    </tr>
			    <tr>
			      <td align="right">Credits Completed:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['credits'])) {
							$credits = $_GET['credits'];
							echo '<input type="text" name="credits" maxlength="3" placeholder="#Credits" value="'.$credits.'">';
						}
						else {
							echo '<input type="text" name="credits" maxlength="3" placeholder="#Credits">';
						}
					?>
			      </td>
			    </tr>
			    <tr>
			      <td align="right">Major:</td>
			      <td align="left">
					<?php
				      	if (isset($_GET['major'])) {
							$major = $_GET['major'];
							if ($major == "other"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE">Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "ASE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "BEE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE" selected>Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "BME"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME" selected>Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "CBE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE" selected>Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "CEE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE" selected>Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "ECE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE" selected>Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "ISE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE"selected>Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "MSE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE" selected>Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "MAE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE" selected>Mechanical and Aerospace Engineering</option><option value="PE">Packaging Engineering</option></select>';}
							elseif ($major == "PE"){echo '<select name="major"><option value="other" selected>Other</option><option value="ASE" selected>Applied Sciences in Engineering</option><option value="BEE">Bioenvironmental Engineering</option><option value="BME">Biomedical Engineering</option><option value="CBE">Chemical and Biochemical Engineering</option><option value="CEE">Civil and Environmental Engineering</option><option value="ECE">Electrical and Computer Engineering</option><option value="ISE">Industrial and Systems Engineering</option><option value="MSE">Materials Science and Engineering</option><option value="MAE">Mechanical and Aerospace Engineering</option><option value="PE" selected>Packaging Engineering</option></select>';}

						}
						else {
							echo '	<select name="major">
									  	<option value="other">Other</option>
									  	<option value="ASE">Applied Sciences in Engineering</option>
									  	<option value="BEE">Bioenvironmental Engineering</option>
									  	<option value="BME">Biomedical Engineering</option>
									  	<option value="CBE">Chemical and Biochemical Engineering</option>
									  	<option value="CEE">Civil and Environmental Engineering</option>
									  	<option value="ECE">Electrical and Computer Engineering</option>
									  	<option value="ISE">Industrial and Systems Engineering</option>
									  	<option value="MSE">Materials Science and Engineering</option>
									  	<option value="MAE">Mechanical and Aerospace Engineering</option>
									  	<option value="PE">Packaging Engineering</option>
									</select>';
						}
					?>
				</td>
			    </tr>
			    <tr>
			      <td align="right">Phone:</td>
			      <td align="left">
			      	<?php
				      	if (isset($_GET['phone'])) {
							$phone = $_GET['phone'];
							echo '<input type="tel" name="phone" id="telInput" onkeypress="formatTel()" maxlength="14" autocomplete="off" placeholder="Phone number" value="'.$phone.'">';
						}
						else {
							echo '<input name="phone" type="tel" id="telInput" onkeypress="formatTel()" maxlength="14" autocomplete="off" placeholder="Phone number">';
						}
					?>

			      </td>
			    </tr>
			    <tr>
			      <td align="right">Profile Picture:*</td>
			      <td align="left"><input type="file" name="schedule" class="file-upload"></td>
			    </tr>

			    <tr>
			    	<td align="right"></td>
			    	<td align="left">
			     <button class="signup-button" type="submit" name="signup-submit" id="tutee-signup-submit" onclick="tuteeUp()">Submit!</button>
			 </td>
			 </tr>
			  </table>
			</form>
			</div>

			<!-- Faculty Form -->
			<div class="signup-form" id="faculty-form">
			<form action="includes/signup2.inc.php" method="POST">
			  <table>
			  	<tr class="type">
			      <td align="right">Type:</td>
			      <td align="left">
			      	<input type="radio" name="type" value="tutee">
					<input type="radio" name="type" value="tutor">
					<input type="radio" name="type" value="faculty" checked="checked">
			    </tr>
			    <tr>
			      <td align="right">First Name:*</td>
			      <td align="left"><input type="text" name="first" placeholder="First Name" required/></td>
			    </tr>
			    <tr>
			      <td align="right">Last Name:*</td>
			      <td align="left"><input type="text" name="last" placeholder="Last Name" required/></td>
			    </tr>
			    <tr>
			      <td align="right">Username:*</td>
			      <td align="left"><input type="text" name="username" placeholder="Username" required/></td>
			    </tr>
			    <tr>
			      <td align="right">Rutgers Email:*</td>
			      <td align="left"><input type="email" name="email" placeholder="name@rutgers.edu" required></td>
			    <tr>
			    	<td align="right"></td>
			    	<td align="left">
			     <button class="signup-button" type="submit" name="signup-submit">Submit!</button>
			 </td>
			 </tr>
			  </table>
			</form>
			</div>
		<p id="fac-msg">Our team will review your request, and send you an email soon!</p>
		</div>
	</div>
		<script type="text/javascript" src="scriptsheet.js"></script>
		<script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
	</body>
</html>



