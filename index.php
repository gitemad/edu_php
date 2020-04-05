<?php 
    session_start();
    if ($user = $_SESSION['username']) {
        echo "Hello $user";
        echo "<br/>";
        echo "<br/>";
    }
?>

<html>

	<body>
		<a href="insert.php">INSERT</a>
		<br/>
		<br/>
		<a href="search.php">SEARCH</a>
		<br/>
		<br/>
		<a href="login.php">LOGIN</a>
		<br/>
		<br/>
		<a href="logout.php">LOGOUT</a>
	</body>
	
</html>