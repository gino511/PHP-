<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0); // 關閉錯誤訊息顯示，避免敏感資訊外洩
    session_start(); // 啟用 session 功能

    if (!$_SESSION["id"]) { // 檢查是否已登入
        echo "請登入帳號"; // 提示使用者
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳回登入頁
    }
    else {   
        // 連接資料庫（主機、帳號、密碼、資料庫名稱）
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 依照 GET 參數中的 id 抓取該使用者資料
        $result = mysqli_query($conn, "select * from user where id='{$_GET['id']}'");

        // 取得查詢結果的第一筆資料
        $row = mysqli_fetch_array($result);

        // 顯示修改表單，帳號為只讀，密碼可修改
        echo "
        <form method=post action=20.user_edit.php> <!-- 表單送到 20.user_edit.php 做修改 -->
            <input type=hidden name=id value={$row['id']}> <!-- 隱藏欄位帶入帳號 -->
            帳號：{$row['id']}<br> <!-- 顯示帳號（不可改） -->
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p> <!-- 顯示現有密碼 -->
            <input type=submit value=修改> <!-- 送出表單 -->
        </form>
        ";
    }
    ?>
    </body>
</html>