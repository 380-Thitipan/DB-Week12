<?php
session_start();         // เริ่มต้นใช้งาน Session
$_SESSION = array();     // ล้างข้อมูลในตัวแปร Session ทั้งหมด
session_destroy();       // ทำลาย Session บนเซิร์ฟเวอร์

// (ทางเลือก) ลบ Cookie ของ Session ทิ้งด้วยเพื่อให้ปลอดภัยสมบูรณ์
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// พาผู้ใช้กลับไปหน้า login.php
header("Location: login.php");
exit;
?>