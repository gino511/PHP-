<!DOCTYPE html>
<html>
<head>
  <title>明新科技大學資訊管理系</title>
  <meta charset="utf-8">
  
  <!-- 載入 Flexslider CSS -->
  <link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">
  
  <!-- 載入 jQuery -->
  <script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>
  
  <!-- 載入 Flexslider JS -->
  <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>
  
  <!-- Flexslider 初始化設定 -->
  <script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            rtl: true
        });
    });
  </script>
  
  <!-- CSS 樣式區塊 -->
  <style>
    /* 全域設定 */
    * {
      margin:0;
      color:gray;
      text-align:center;
    }
    
    /* top 區塊 */
    .top {
      background-color: white;
    }
    .top .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding:10px;
    }
    .top .logo {
      font-size: 35px;
      font-weight: bold;
    }
    .top .logo img {
      width: 100px;
      vertical-align: middle;
    }
    .top .top-nav {
      font-size: 25px;
      font-weight: bold;
    }
    .top .top-nav a {
      text-decoration: none;
      margin: 0 10px;
      cursor: pointer;
    }
    
    /* 導覽列 */
    .nav {
      background-color:#333;
      display: flex;
      justify-content: center;
    }
    .nav ul {
      list-style-type: none;  
      margin: 0; 
      padding: 0; 
      overflow: hidden; 
      background-color: #333; 
      display: flex;
    }
    .nav li {
      position: relative;
    }
    .nav li a {    
      display: block;  
      color: white;  
      text-align: center;  
      padding: 14px 16px;  
      text-decoration: none;  
    }
    .nav li a:hover {
      background-color: #111; 
    }
    /* 下拉式選單 */
    .dropdown:hover .dropdown-content {
      display: block; /* 顯示下拉內容 */
    }
    li.dropdown:hover {
      background-color: #333;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 160px;
      z-index: 1;
      top: 100%;
      left: 0;
    }
    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    .dropdown-content a:hover {
      background-color: #111;
    }
    
    /* 輪播區塊 */
    .slider {
      background-color: black;
    }
    
    /* 佈告欄 */
    .bulletin {
      background-color: rgb(255,204,153);
      padding: 30px 0;
    }
    .bulletin h1 {
      padding: 10px;
    }
    .bulletin table {
      border-collapse: collapse;
      font-family: "微軟正黑體";
      font-size: 16px;
      margin: 0 auto;
      border: 1px solid #000;
    }
    .bulletin table th {
      background-color: #abdcff;
      color: #ffffff;
      padding: 8px 12px;
    }
    .bulletin table td {
      background-color: #ffffff;
      color: #0396ff;
      padding: 8px 12px;
    }
    
    /* 其他區塊... (依需求繼續) */
  </style>
</head>

<body>

  <!-- 頁首區塊 -->
  <div class="top">
    <div class="container">
      <div class="logo">
        <img src="https://github.com/shhuangmust/html/raw/111-1/IMMUST_LOGO.JPG" alt="明新科技大學Logo">
        明新科技大學資訊管理系
      </div>
      <div class="top-nav">
        <a href="#">明新科大</a>
        <a href="#">明新管理學院</a>
        <!-- 登入按鈕 -->
        <label onclick="document.getElementById('login').style.display='block'" style="cursor:pointer;">登入</label>
        
        <!-- 登入視窗 -->
        <div id="login" class="modal" style="display:none; position:fixed; z-index:1000; top:20%; left:40%; width:300px; padding:20px; background:#fff; border:1px solid #ccc;">
          <span onclick="document.getElementById('login').style.display='none'" style="float:right; cursor:pointer; font-weight:bold;">&times;</span>
          <h3>管理系統登入</h3>
          <form method="post" action="10.login.php">
            帳號：<input type="text" name="id"><br /><br />
            密碼：<input type="password" name="pwd"><br /><br />
            <input type="submit" value="登入"> <input type="reset" value="清除">
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- 導覽列 -->
  <div class="nav">   
    <ul>
      <li><a href="#home">首頁</a></li>
      <li><a href="#introduction">系所簡介</a></li>
      <li class="dropdown"><a href="#faculty">成員簡介</a>
        <div class="dropdown-content">
          <a href="#faculty">黃老師</a>
          <a href="#faculty">李老師</a>
          <a href="#faculty">應老師</a>
        </div>                       
      </li>
      <li><a href="#about">相關資訊</a></li>
    </ul>
  </div>
  
  <!-- 輪播區塊 -->
  <div class="slider">
    <div class="flexslider">
      <ul class="slides">
        <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider1.JPG" alt="輪播圖1" /></li>
        <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider2.JPG" alt="輪播圖2" /></li>
        <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider3.JPG" alt="輪播圖3" /></li>
      </ul>
    </div>
  </div>
  
  <!-- 佈告欄 (使用 PHP 連接資料庫) -->
  <div class="bulletin">
    <h1>最新公告</h1>
    <?php
      // 連接資料庫
      $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
      if (!$conn) {
          echo "資料庫連接失敗：" . mysqli_connect_error();
      } else {
          // 查詢佈告資料
          $result = mysqli_query($conn, "SELECT * FROM bulletin");
          if ($result && mysqli_num_rows($result) > 0) {
              echo "<table border='2'><tr><th>佈告編號</th><th>佈告類別</th><th>標題</th><th>佈告內容</th><th>發佈時間</th></tr>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>" . $row["bid"] . "</td><td>";
                  if ($row["type"] == 1) echo "系上公告";
                  else if ($row["type"] == 2) echo "獲獎資訊";
                  else if ($row["type"] == 3) echo "徵才資訊";
                  else echo "其他";
                  echo "</td><td>" . htmlspecialchars($row["title"]) . "</td><td>" . htmlspecialchars($row["content"]) . "</td><td>" . $row["time"] . "</td></tr>";
              }
              echo "</table>";
          } else {
              echo "目前沒有公告資料。";
          }
          mysqli_close($conn);
      }
    ?>
  </div>
  
  <!-- 系所簡介區塊 -->
  <div class="banner" id="introduction" style="background-image: linear-gradient(#ABDCFF,#0396FF); padding:30px;">
    <h1>系所簡介</h1>
    <h1>歷年教育部評鑑皆榮獲一等</h1>
    <h1>明新科技大學資訊管理系</h1>
    <h1>全國私立科大第一資管系</h1>
  </div>
  
  <!-- 師資介紹 -->
  <div class="faculty" id="faculty" style="background-color:white; padding:40px;">
    <h2>師資介紹</h2>
    <div class="container" style="display:flex; justify-content:space-around; align-items:center;">
      <a class="teacher" href="">
        <img src="https://github.com/shhuangmust/html/raw/111-1/faculty1.jpg" alt="黃老師" style="height:200px; width:200px;">
        <h3 style="color:white; background-color: rgba(39,40,34,.5); text-align:center;">黃老師</h3>
      </a>
      <a class="teacher" href="">
        <img src="https://github.com/shhuangmust/html/raw/111-1/faculty2.jpg" alt="李老師" style="height:200px; width:200px;">
        <h3 style="color:white; background-color: rgba(39,40,34,.5); text-align:center;">李老師</h3>
      </a>
      <a class="teacher" href="">
        <img src="https://github.com/shhuangmust/html/raw/111-1/faculty3.jpg" alt="應老師" style="height:200px; width:200px;">
        <h3 style="color:white; background-color: rgba(39,40,34,.5); text-align:center;">應老師</h3>
      </a>
    </div>
  </div>
  
  <!-- 相關資訊 -->
  <div class="contact" id="about" style="margin: 30px 0;">
    <h2>相關資訊</h2>
    <div class="infos" style="display:flex; justify-content:center; margin-top:30px;">
      <div class="left" style="text-align:left; margin-right:30px;">
        <b>明新科技大學管理學院大樓二樓</b>
        <span>304新竹縣新豐鄉新興路1號</span>
        <b>電話: 03-5593142</b>
        <span>分機: 3431、3432、3433</span>
        <b>傳真: 03-5593142</b>
        <span>分機: 3440</span>
      </div>
      <div class="right" style="height:200px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3044.185885150929!2d120.98912333466727!3d24.86332844316392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34683154faa8283b%3A0x92cb1c5564a574ef!2z5piO5paw56eR5oqA5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1536665837954" frameborder="0" style="border:0; width:100%; height:100%;" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  
  <!-- 頁尾 -->
  <
