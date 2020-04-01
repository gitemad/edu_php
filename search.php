<html>
    <head>
    </head>
    <body>
    	<form action="">
    		<input name="search" type="text">
    		<input name="submit" type="submit" value="Search">
    	</form>

    <?php
        if (isset($_GET['search'])) {
            $text = $_GET['search'];
            $connection = mysqli_connect("localhost", "root", "", "edu_db");
            if (!$connection) {
                die();
            } else {
                $query = "SELECT username, email, age, profile_pic FROM user_tbl WHERE username LIKE '%$text%' OR email LIKE '%$text%'";
                $data = mysqli_query($connection, $query);
                
            echo '<table>';
                echo '<tr>';
                    echo '<th>username</th>';
                    echo '<th>email</th>';
                    echo '<th>age</th>';
                    echo '<th>profile</th>';
                    echo '<th>delete</th>';
                echo '</tr>';
                while ($record = mysqli_fetch_assoc($data)) {
                    echo '<tr>';
                        echo "<td>$record[username]</td>";
                        echo "<td>$record[email]</td>";
                        echo "<td>$record[age]</td>";
                        echo "<td> <img src=$record[profile_pic]></td>";
                        echo "<td> <a  href='delete.php?username=$record[username]&search=$text'> 
                                        <img src='img/delete_icon.png'></td>
                                    </a>";
                    echo '</tr>';
                }
            echo '</table>';
            }
        }
    ?>

	</body>
</html>