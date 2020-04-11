<?php
if (isset($_POST["username"]) && isset($_POST['password'])) {
    if (!empty($_POST["username"]) && !empty($_POST['password'])) {
        if ($_SERVER['HTTP_HOST'] == 'localhost' && $_SERVER["HTTP_REFERER"] == "http://localhost/edu_project/security/login.php") {
                $username = $_POST['username'];
            if (3 < strlen($username) && strlen($username) <= 20) {
                $password = $_POST['password'];
                $password = sha1($password);
    
                $link = mysqli_connect("localhost", "root", "", "edu_db");
                $query = "SELECT * FROM user_tbl WHERE username='$username' AND password='$password'";
                $data = mysqli_query($link, $query);
                $record = mysqli_fetch_all($data);
                if (count($record) == 1) {
                    session_regenerate_id();
                    header("location: dashboard.php?user=".$username);
                }
//     var_dump($record);
            }
        }
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
    		<br/>
    		<input type="submit" name="login">
		</form>
	</body>
</html>