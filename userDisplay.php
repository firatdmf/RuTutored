<?php 
	require "header.php";
	require "includes/dbh.inc.php";


		$sql = "SELECT Monday FROM users WHERE id='".$_SESSION['id']."';";
		$Monday = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($Monday);
		$actualResult = $result['Monday'];
		if ($actualResult == NULL) {
echo '
<div class="schedule-input">
	<form action="includes/schedule-input.inc.php" method="POST">
  <p class="instruction">Please enter values such as (08:30am-10:30am, 12:30pm-02:30pm)</p>
			  <table>
			    <tr>
			      <td align="right">Monday:*</td>
			      <td align="left"><input type="text" name="Monday" required/></td>
			    </tr>
			    <tr>
			    	<td align="right"></td>
			    	<td align="left">
			     <button class="schedule-button" type="submit" name="schedule-submit">Submit!</button>
			 </td>
			 </tr>
			</table>
		</form>
          </div>
    ';
}else {
	echo 'Your current availability on record is: '.$actualResult;
	echo '<br>';
	echo 'tutors will be presented here';

}
