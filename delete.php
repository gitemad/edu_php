<?php
    $user = $_GET['username'];
    $text = $_GET['search'];
    
    $connection = mysqli_connect("localhost", "root", "", "edu_db");
    
    $last_char = strlen($user) - 1;
    $query = "SELECT profile_pic FROM user_tbl WHERE username LIKE '$user[0]%$user[$last_char]'";
    $data = mysqli_query($connection, $query);
    $record = mysqli_fetch_assoc($data);
    var_dump($record);
    
    if (!$connection) {
        die();
    } else {
        unlink($record['profile_pic']);
        rmdir(dirname($record['profile_pic'], 1));
        $query = "DELETE FROM user_tbl WHERE username LIKE '$user[0]%$user[$last_char]'";
        mysqli_query($connection, $query);
    } 
    
    header("location: "."search.php?search=$text&submit=Search")
?>