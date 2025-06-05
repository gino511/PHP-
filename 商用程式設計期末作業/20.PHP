<?php
error_reporting(0);
session_start();

if (!$_SESSION["id"]) {
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    exit(); // 結束執行，避免繼續執行程式碼
}

// 建立資料庫連線
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 加密密碼
$hashed_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

// 預備 SQL 語句
$stmt = mysqli_prepare($conn, "UPDATE user SET pwd = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ss", $hashed_pwd, $_POST['id']);

// 執行更新
if (mysqli_stmt_execute($stmt)) {
    echo "修改成功，三秒鐘後回到網頁";
    echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
} else {
    echo "修改錯誤";
    echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
}

// 關閉連線
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>