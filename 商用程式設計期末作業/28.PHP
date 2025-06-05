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

$bid = isset($_GET["bid"]) ? (int)$_GET["bid"] : 0;

$stmt = mysqli_prepare($conn, "DELETE FROM bulletin WHERE bid = ?");
mysqli_stmt_bind_param($stmt, "i", $bid);

if (mysqli_stmt_execute($stmt)) {
    echo "佈告刪除成功";
} else {
    echo "佈告刪除錯誤";
}

echo "<meta http-equiv='refresh' content='3;url=11.bulletin.php'>";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>