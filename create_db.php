<?php
    $con = mysqli_connect("localhost", 'root', '');
    //from local
    $query = "CREATE DATABASE db_created";
    
    mysqli_query($con, $query);

?>