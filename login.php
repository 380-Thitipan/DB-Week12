<?php
session_start();
require 'config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email !== '' && $password !== '') {
        $sql = "SELECT id, password_hash FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $password_hash);
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {
                    mysqli_stmt_close($stmt);
                    session_regenerate_id(true);
                    $_SESSION["user_id"] = $id;
                    header("Location: skills.php"); 
                    exit;
                }
            }
            mysqli_stmt_close($stmt);
        }
        $error = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
    } else {
        $error = 'กรุณากรอกข้อมูลให้ครบถ้วน';
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Login - CRUD Lab</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container" style="max-width: 450px; margin-top: 80px;">
    <div class="card">
        <h2>เข้าสู่ระบบ (Login)</h2>
        <?php if ($error): ?>
            <p style="color: #dc2626; background: #fff5f5; padding: 10px; border-radius: 6px; margin-bottom: 15px;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST">
            <div style="margin-bottom: 12px;">
                <label>Email</label><br>
                <input type="email" name="email" required style="width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 16px;">
                <label>Password</label><br>
                <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <button type="submit" style="width: 100%; padding: 10px; margin-bottom: 10px;">Login</button>
            
            <!-- ปุ่มย้อนกลับ -->
            <div style="text-align: center; margin-top: 10px;">
                <a href="index.php" style="color: #6b7280; font-size: 0.9rem; text-decoration: none;">← กลับสู่หน้าแรก</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>