<?php
include_once 'Util.php';
if ($_POST) {
    $old_username = $_POST['old_username'];
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
        $query = "UPDATE user_tbl SET username='$username', email='$email', password='$pass', age='$age', last_modified='$now' WHERE username='$old_username';";
        if ($pic_dir) {
            $query2 = "UPDATE user_tbl SET profile_pic='$pic_dir' WHERE username='$old_username'";            
            mysqli_query($connection, $query2);
        }
        mysqli_query($connection, $query);
    }
}
?>
<?php
    $user = $_GET['username'];
    
    $connection = mysqli_connect("localhost", "root", "", "edu_db");
    
    $last_char = strlen($user) - 1;
    $query = "SELECT * FROM user_tbl WHERE username LIKE '$user[0]%$user[$last_char]'";
    $data = mysqli_query($connection, $query);
    $record = mysqli_fetch_assoc($data);
    
    echo "<html>
        	<body>
        		<form action='' method='post' enctype='multipart/form-data'>
        			username:
        			<br/>
        			<input type='text' name='username' value=$record[username]>
        			<br/>
        			email:
        			<br/>
        			<input type='text' name='email' value=$record[email]>
        			<br/>
        			password:
        			<br/>
        			<input type='password' name='pass' value=$record[password]>
        			<br/>			
        			age:
        			<br/>
        			<input type='text' name='age' value=$record[age]>
        			<br/>			
        			Profile picture: <img src=$record[profile_pic]>
        			<br/>
        			<input type='file' name='profile_pic'>
        			<br/>			
        			<input type='hidden' name='old_username' value=$record[username]>
        			<br/>			
        			<input type='submit' name='sub'>
        		</form>
        	</body>
        </html>";
?>