<?php
$my_password = "T88188"; 
$new_hash = password_hash($my_password, PASSWORD_DEFAULT);
echo $new_hash;
?>