<?php
error_reporting(0);
session_start();

if (!$_SESSION["id"]) {
    echo "請先登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    exit();
}

// 建立資料庫連線
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 防止 XSS：轉義輸入內容
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$type = (int) $_POST['type'];  // 保證為整數
$time = $_POST['time'];

// 預處理 SQL 插入語句
$sql = "INSERT INTO bulletin(title, content, type, time) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssis", $title, $content, $type, $time);

// 執行 SQL
if (mysqli_stmt_execute($stmt)) {
    echo "新增佈告成功，三秒鐘後回到網頁";
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
} else {
    echo "新增命令錯誤";
}

// 清理資源
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>