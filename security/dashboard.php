<?php

// if ($_SERVER['HTTP_HOST'] == 'localhost' && $_SERVER["HTTP_REFERER"] == "http://localhost/edu_project/security/login.php") {
    if (isset($_GET['user'])) {
        echo "Salam $_GET[user]";
    }
// }
?>