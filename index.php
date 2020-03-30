<?php
    if ($_POST) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $con_pass = $_POST['con_pass'];
        if ($pass == $con_pass) {
            header('Location: '."login.php");
        } else {
            echo "INCORRECT";
        }
    }
?>

<html>
	<body>
		<form action="" method="post">
			username:
			<br/>
			<input type="text" name="username">
			<br/>
			email:
			<br/>
			<input type="text" name="email">
			<br/>
			password:
			<br/>
			<input type="password" name="pass">
			<br/>			
			confirm password:
			<br/>
			<input type="password" name="con_pass">
			<br/>			
			<input type="submit" name="sub">
		</form>
	</body>
</html>