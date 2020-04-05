<?php
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $link = mysqli_connect("localhost", "root", "", "edu_db");
        $query = "SELECT * FROM user_tbl WHERE username='$username'";
        $data = mysqli_query($link, $query);
        
        if ($record = mysqli_fetch_array($data)) {
            if (sha1($password) == $record['password']) {
                session_start();
                $_SESSION['username'] = $username;                
                echo "Login OK";
            } else {
                echo "Incorrect Password!";
            }
        } else {
            echo "User not found";
        }
        
    }
?>

<html>
	<head>
	</head>
	<body>
		<form action="" method="post">
    		Username:
    		<br/>
    		<input type="text" name="username" placeholder="username">
    		<br/>
    		Password:
    		<br/>
    		<input type="password" name="password" placeholder="password">
    		<br/>
    		Remember me:
    		<input type="checkbox" name="remember">
    		<br/>
    		<input type="submit" name="login">
		</form>
	</body>
</html>