<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trial</title>
	<!-- jQuery using cdn-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<form action="trial.php" method="POST">
		<input type="text" name="userName" id="userName"><div id="status"></div>
		<button type="submit" name="submitCheck">Submit</button>
	</form>
<script type="text/javascript">
	$('#userName').keyup(function() {
		var userName = $('#userName').val();
		$('#status').html('loading gif');
});
</script>
</body>
</html>