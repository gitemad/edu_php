<?php
    function upload($uploadedfile, $dir="uploaded") {
        $file = $_FILES[$uploadedfile];
        $from = $file['tmp_name'];
        $to = "$dir/".$file['name'];
        if (!file_exists("$dir")) {
            mkdir("$dir");
            echo "directory created successfully";
        } else {
            echo "directory is already exists";
        }
        move_uploaded_file($from, $to);
    }
?>