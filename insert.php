<?php
include_once 'Util.php';
if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $age = $_POST['age'];
    $pic_dir = upload('profile_pic', 'uploaded/'.$username);
    $connection = mysqli_connect("localhost", "root", "", "edu_db");
    
    if (!$connection) {
        die();
    } else {
        $now = time();
        $query = "INSERT INTO user_tbl (username, password, email, age, profile_pic, date_created, last_modified) 
                                VALUES ('$username', '$pass', '$email', '$age', '$pic_dir', '$now', '$now')";
        mysqli_query($connection, $query);
    }        
}
?>

<html>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
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
			age:
			<br/>
			<input type="text" name="age">
			<br/>			
			Profile picture:
			<br/>
			<input type="file" name="profile_pic">
			<br/>			
			<br/>			
			<input type="submit" name="sub">
		</form>
	</body>
</html>