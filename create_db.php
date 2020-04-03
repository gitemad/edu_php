<?php
    $con = mysqli_connect("localhost", 'root', '');
    
    $query = "CREATE DATABASE db_created";
    
    mysqli_query($con, $query);

?>