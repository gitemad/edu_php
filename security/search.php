<?php
if (isset($_GET['s'])) {
    $s = addslashes($_GET['s']);
    echo stripslashes($s);
}

?>