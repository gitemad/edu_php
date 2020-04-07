<?php
//     setcookie('username', $username, (time() - 24 * 60 * 60));
//     setcookie('password', $password, (time() - 24 * 60 * 60));
//     if (isset($_COOKIE['username'])) {
//         $username = $_COOKIE['username'];
//         $password = $_COOKIE['password'];
        
//         $link = mysqli_connect("localhost", "root", "", "edu_db");
//         $query = "SELECT * FROM user_tbl WHERE username='$username'";
//         $data = mysqli_query($link, $query);
        
//         if ($record = mysqli_fetch_array($data)) {
//             if (sha1($password) == $record['password']) {
//                 session_start();
//                 $_SESSION['username'] = $username;                
//                 echo "Login with cookie";
//             } else {
//                 echo "Incorrect Password!";
//             }
//         } else {
//             echo "User not found";
//         }
//     }
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];
        
        $link = mysqli_connect("localhost", "root", "", "edu_db");
        $query = "SELECT * FROM user_tbl WHERE username='$username'";
        $data = mysqli_query($link, $query);
        
        if ($record = mysqli_fetch_array($data)) {
            if (sha1($password) == $record['password']) {
                session_start();
                $_SESSION['username'] = $username; 
                
                if ($remember) {
                    setcookie('username', $username, (time() + 24 * 60 * 60));
                    setcookie('password', $password, (time() + 24 * 60 * 60));
                }
                
                header('location: userdetail.php');
                
            } else {
                header('location: login.php');
                echo "Incorrect Password!";
            }
        } else {
            header('location: login.php');
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