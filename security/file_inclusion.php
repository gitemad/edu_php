<?php
    $page = $_GET['page'];
    if (!file_exists($page)) {
        die();
    }
    $is_black_list = TRUE;
    //white list
    switch ($page) {
        case 'login.php':
        case 'comment.php':
            $is_black_list = FALSE;
    }
    if ($is_black_list) {
        die();
    }
    include_once $page;
?>