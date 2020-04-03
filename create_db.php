<?php
    $con = mysqli_connect("localhost", 'root', '');
    //this is comment from github
    $query = "CREATE DATABASE db_created";
    
    mysqli_query($con, $query);

?>
