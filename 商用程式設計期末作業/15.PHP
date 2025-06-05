<?php

error_reporting(0); // 關閉錯誤訊息顯示，避免使用者看到系統錯誤細節
session_start(); // 啟動 session 功能，才能使用 $_SESSION 變數

if (!$_SESSION["id"]) { // 如果 session 中沒有 id（表示尚未登入）
    echo "請登入帳號"; // 提示使用者登入
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後自動跳轉至登入頁面
}
else { // 如果已登入

   // 建立與 MySQL 資料庫的連線（主機、帳號、密碼、資料庫名稱）
   $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

   // 建立 SQL 新增命令，將 POST 表單中的帳號與密碼插入 user 資料表中
   // 注意：此處未做 SQL 注入防護（建議改用 prepared statement）
   $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";

   // 嘗試執行 SQL 命令，若失敗則顯示錯誤訊息
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤"; // SQL 執行失敗
   }
   else {
     // 新增成功，提示訊息並 3 秒後自動跳轉回使用者列表頁面
     echo "新增使用者成功，三秒鐘後回到網頁";
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>