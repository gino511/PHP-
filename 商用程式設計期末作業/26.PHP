<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請先登入帳號";
    echo "<meta http-equiv='refresh' content='3;url=2.login.html'>";
    exit();
}

$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
if (!$conn) {
    die("資料庫連線失敗");
}

// 使用預處理語句防止 SQL 注入
$bid = isset($_GET["bid"]) ? (int)$_GET["bid"] : 0;
$stmt = mysqli_prepare($conn, "SELECT * FROM bulletin WHERE bid = ?");
mysqli_stmt_bind_param($stmt, "i", $bid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // 防止 XSS
    $bid = htmlspecialchars($row['bid'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8');
    $type = (int)$row['type'];
    $time = htmlspecialchars($row['time'], ENT_QUOTES, 'UTF-8');
} else {
    echo "找不到該佈告";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

$checked1 = $type === 1 ? "checked" : "";
$checked2 = $type === 2 ? "checked" : "";
$checked3 = $type === 3 ? "checked" : "";
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>修改佈告</title>
</head>
<body>
    <h2>修改佈告</h2>
    <form method="post" action="27.bulletin_edit.php">
        佈告編號：<?php echo $bid; ?>
        <input type="hidden" name="bid" value="<?php echo $bid; ?>"><br><br>

        標　　題：<input type="text" name="title" value="<?php echo $title; ?>" required><br><br>

        內　　容：<br>
        <textarea name="content" rows="20" cols="40" required><?php echo $content; ?></textarea><br><br>

        佈告類型：
        <input type="radio" name="type" value="1" <?php echo $checked1; ?> required>系上公告　
        <input type="radio" name="type" value="2" <?php echo $checked2; ?>>獲獎資訊　
        <input type="radio" name="type" value="3" <?php echo $checked3; ?>>徵才資訊<br><br>

        發布時間：<input type="date" name="time" value="<?php echo $time; ?>" required><br><br>

        <input type="submit" value="修改佈告">
        <input type="reset" value="清除">
    </form>
</body>
</html>
