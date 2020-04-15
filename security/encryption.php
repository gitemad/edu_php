<?php
$pass = '1234';
$options = [
    'cost' => 10,
];
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT, $options);
echo $hashed_pass;
echo "</br>";
if (password_verify($pass, $hashed_pass)) {
    echo "Verified";
}
?>