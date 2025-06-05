<?php
error_reporting(0);
session_start();

if (!$_SESSION["id"]) {
    echo "請先登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    exit(); // 終止後續程式
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>新增佈告</title>
</head>
<body>
    <h2>新增佈告</h2>
    <form method="post" action="23.bulletin_add.php">
        標　　題：<input type="text" name="title" required><br><br>
        內　　容：<br>
        <textarea name="content" rows="10" cols="40" required></textarea><br><br>

        佈告類型：
        <input type="radio" name="type" value="1" required> 系上公告　
        <input type="radio" name="type" value="2"> 獲獎資訊　
        <input type="radio" name="type" value="3"> 徵才資訊<br><br>

        發布時間：<input type="date" name="time" required><br><br>

        <input type="submit" value="新增佈告">　
        <input type="reset" value="清除">
    </form>
</body>
</html>