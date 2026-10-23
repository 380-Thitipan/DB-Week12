session_start();
session_regenerate_id(true);
$_SESSION["user_id"] = $user['id'];
header("Location: index.php"); // หรือหน้า CRUD
exit;