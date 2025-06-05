<?php
    error_reporting(0); // 關閉錯誤訊息顯示，避免暴露系統細節
    session_start(); // 啟動 session，取得使用者登入狀態

    if (!$_SESSION["id"]) { // 若尚未登入
        echo "請登入帳號"; // 顯示提示訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉至登入頁
    }
    else {   
        // 建立與資料庫的連線（伺服器位址、帳號、密碼、資料庫名稱）
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 建立刪除使用者的 SQL 命令，從 GET 參數取得使用者帳號
        $sql = "delete from user where id='{$_GET["id"]}'";

        // echo $sql; // 除錯用，可印出 SQL 命令來檢查格式

        // 執行刪除命令，並根據結果顯示訊息
        if (!mysqli_query($conn, $sql)) {
            echo "使用者刪除錯誤"; // 刪除失敗
        } else {
            echo "使用者刪除成功"; // 刪除成功
        }

        // 不論成功與否，3 秒後回到使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>