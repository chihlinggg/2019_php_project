<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/lightbox.min.js"></script>
  <script src="jquery.min.js" language="javascript"></script>
  <link rel="stylesheet" href="homepage.css">
  <script src="/user_all.js"></script>
  <title>社團管理系統</title>
  <style>
      .message .select{
    margin-top: 20px;
    margin-left: 50px;
  }
  </style>
</head>
<body>
  <div class="wrap">
  <div class="head">
      <div class="nukjpg">
      <a href="https://www.nuk.edu.tw/bin/home.php"  target='_blank'><img src="http://intro.nuk.edu.tw/download/logo_2013new/logoword.jpg" width=250></a>
      </div>
    <ul class="list">
         <li><a href="register.html">註冊帳號</a></li>
          <li><a href="#" id="clublogin">社團登入</a></li> 
          <li><a href="apply.php">加入社團</a></li> 
          <li><a href="news.php">活動訊息</a></li>
          <li><a id="section1" href="club1.php">社團資料</a></li>
    </ul>
    <div class="clear"></div>
  </div>
    <div class="top"><a href="index.php"><img src="15.png" width=1200px ></a></div>
    <div class="clear"></div>
    <div class="content">
        <p>最新消息</p>
        <div class="menu">
          <?php
            $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');
  
            $sql = "SELECT date, club, title, website FROM announce WHERE check_ann='Y' ORDER BY date DESC";
  
            if($result = mysqli_query($link, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href='".$row["website"]."' target='_blank'><ul>";
                        echo "<li>".$row["date"]." | ".$row["club"]." | ".$row["title"]."</li>";
                    echo "</ul></a>";
                }
            }
          ?>
        </div>
        <div class="message">
            <p>我想對你說</p>
            <form action="message.php" method="post" class="form">
              <div class="select">
                <select name="club">
                  <?php
                    $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');    
                    $sql = "SELECT club FROM account";        
                    if($result = mysqli_query($link, $sql)){
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<option value='".$row["club"]."'>".$row["club"]."</option>";
                        }
                    }                  
                  ?>                
                </select>
              </div>
              <input class="text" type="text" name="message">
              <input class="submit" type="submit" value="送出">
            </form>
        </div>
        <div class="clear"></div>
      </div>
      <div class="photo">
          <p class="yo">照片回顧</p>
          <ul class="photolist">
              <li><a href="#"><img src="yo.jpg" width="350" height="350"><p>6/4熱音社成發</p></a></li>
              <li><a href="#"><img src="yo.jpg" width="350" height="350"><p>6/4熱音社成發</p></a></li>
              <li><a href="#"><img src="yo.jpg" width="350" height="350"><p>6/4熱音社成發</p></a></li>
            </ul>
      </div>
      <div id="window" class="windowya">        
        	<div class="login-content"> 
            <span class="close">&times;</span> 
            <form action="../check.php" method="post" class="form">
                帳號： <input type="text" class="account" name="account">
                <br><br>
                密碼： <input type="password" class="passwd" name="password"> 
                <br><br>
          	    <input type="submit" value="登入"> 
            </form>
          </div> 	 
      </div>  
      <script> 
        	var windowya = document.getElementById('window'); 	 
          var btn = document.getElementById("clublogin");  
          var span = document.getElementsByClassName("close")[0];  
          btn.onclick = function() { 
           windowya.style.display = "block"; 
          } 	 
          span.onclick = function() { 
          windowya.style.display = "none"; 
          } 
      </script> 	 
      </div>
    </div> 
  </body>
  </html>
      