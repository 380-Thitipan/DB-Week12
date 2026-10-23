<?php
$my_password = "รหัสผ่านใหม่ที่คุณต้องการ_เช่น_12345678"; 
$new_hash = password_hash($my_password, PASSWORD_DEFAULT);
echo $new_hash;
?>