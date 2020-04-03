<?php
    $link = mysqli_connect("localhost", "root", "", "db_created");
    
    $query = "CREATE TABLE persons (
                id bigint PRIMARY KEY,
                username varchar(30)
                )";
    
    mysqli_query($link, $query);
?>