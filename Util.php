<?php

    function upload($tag_name, $dir="uploaded") {
        $file = $_FILES[$tag_name];
        $from = $file['tmp_name'];
        $to = "$dir/".$file['name'];
        if (!file_exists("$dir")) {
            mkdir("$dir");
//             echo "directory created successfully";
        } else {
//             echo "directory already exists";
        }
        move_uploaded_file($from, $to);
        return $to;
    }
    
?>
