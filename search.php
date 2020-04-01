<?php
    if (isset($_GET['search'])) {
        $text = $_GET['search'];
        $connection = mysqli_connect("localhost", "root", "", "edu_db");
        if (!$connection) {
            die();
        } else {
            $query = "SELECT username, email, age FROM user_tbl WHERE username LIKE '%$text%' OR email LIKE '%$text%'";
            $data = mysqli_query($connection, $query);
            while ($record = mysqli_fetch_assoc($data)) {
                var_dump($record);
            }
        }
    }
?>

<html>
    <head>
    </head>
    <body>
    	<form action="">
    		<input name="search" type="text">
    		<input name="submit" type="submit" value="Search">
    	</form>
	</body>
</html>