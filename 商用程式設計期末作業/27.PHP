<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請登入帳號";
    echo "<meta http-equiv='refresh' content='3;url=2.login.html'>";
    exit();
}

$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
if (!$conn) {
    die("資料庫連線失敗");
}

// 取並過濾輸入
$bid = isset($_POST['bid']) ? (int)$_POST['bid'] : 0;
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$type = isset($_POST['type']) ? (int)$_POST['type'] : 0;
$time = $_POST['time'] ?? '';

// 預防 XSS，更新前可視需求做，通常更新時用資料庫原始字串即可
// $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
// $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

$sql = "UPDATE bulletin SET title=?, content=?, time=?, type=? WHERE bid=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssii", $title, $content, $time, $type, $bid);

if (mysqli_stmt_execute($stmt)) {
    echo "修改成功，三秒鐘後回到佈告欄列表";
    echo "<meta http-equiv='refresh' content='3;url=11.bulletin.php'>";
} else {
    echo "修改錯誤";
    echo "<meta http-equiv='refresh' content='3;url=11.bulletin.php'>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>