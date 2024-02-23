<?php

	if (!empty($_REQUEST['username'])) {
		setcookie('username', $_REQUEST['username'], time()+3600, '/');
	}
?>

<form action="hello.php" method="POST">
	<input type="text" name="username">
	<input type="submit">
</form>


