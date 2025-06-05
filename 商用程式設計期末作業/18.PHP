<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0); // 關閉錯誤訊息顯示
        session_start(); // 啟動 session 功能

        if (!$_SESSION["id"]) { // 如果尚未登入
            echo "請登入帳號"; // 顯示提示訊息
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後自動跳轉至登入頁面
        }
        else {   
            // 顯示使用者管理頁面標題與導覽連結
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] 
                [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";

            // 建立與資料庫的連線
            $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

            // 執行查詢，取得所有 user 資料表的資料
            $result = mysqli_query($conn, "select * from user");

            // 用迴圈列出每筆使用者資料
            while ($row = mysqli_fetch_array($result)) {
                // 每列顯示：修改與刪除連結 + 帳號 + 密碼
                echo "<tr>
                        <td>
                            <a href=19.user_edit_form.php?id={$row['id']}>修改</a>
                            || 
                            <a href=17.user_delete.php?id={$row['id']}>刪除</a>
                        </td>
                        <td>{$row['id']}</td>
                        <td>{$row['pwd']}</td>
                      </tr>";
            }

            echo "</table>"; // 關閉 table 標籤
        }
    ?> 
    </body>
</html>