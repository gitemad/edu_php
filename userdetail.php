<?php
    session_start();
    if ($_SESSION['username']) {
        echo $_SESSION['username'];
    } else {
        header('location: login.php');
    }

?>