<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/lightbox.min.js"></script>
  <script src="jquery.min.js" language="javascript"></script>
  <link rel="stylesheet" href="news.css">
  <script src="/user_all.js"></script>
  <title>活動訊息</title>
</head>
<body>
  <div class="wrap">
  <div class="head">
      <div class="nukjpg">
      <a href="https://www.nuk.edu.tw/bin/home.php"><img src="http://intro.nuk.edu.tw/download/logo_2013new/logoword.jpg" width=250></a>
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
        <p>活動訊息</p>
        <div class="menu">
          <?php
            $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');

            $sql = "SELECT * FROM act_app WHERE check_act='Y'";

            if($result = mysqli_query($link, $sql)){
                echo "<table border=1>";
                    echo "<tr>";
                        echo "<th>發布日期</th><th>發布單位</th><th>活動名稱</th><th>活動時間</th><th>活動地點</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                        echo "<td>".$row["app_time"]."</td>";
                        echo "<td>".$row["club"]."</td>";
                        echo "<td>".$row["act_name"]."</td>";
                        echo "<td>".$row["act_datestart"]."</td>";
                        echo "<td>".$row["act_location"]."</td>";                    
                        //echo "<td>".$row["act_purpose"]."</td>";
                        // echo "<td><a href='".$row["website"]."'>".$row["website"]."</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
          ?>
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
      