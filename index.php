<?php
	if (!empty($_REQUEST['username'])) {
		session_start(); //стартуем сессию
		$_SESSION['username'] = $_REQUEST['username']; 
	}
?>

<form action="hello.php" method="POST">
	<input type="text" name="username">
	<input type="submit">
</form>

