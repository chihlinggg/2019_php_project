<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/lightbox.min.js"></script>
  <script src="jquery.min.js" language="javascript"></script>
  <link rel="stylesheet" href="club.css">
  <script src="/user_all.js"></script>
  <title>社團資料</title>
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
        <li><a id="section1" href="club1.html">社團資料</a></li>
    </ul>
    <div class="clear"></div>
  </div>
    <div class="top"><a href="index.php"><img src="15.png" width=1200px ></a></div>
    <div class="clear"></div>
    <div class="content"><a name="01"></A>
        <p>>社團資料</p>
            <div class="menu">
                <ul>
                    <li><a href="club1.php#01">學藝性</a></li>
                    <li><a href="club2.html#02">文康性</a></li>
                    <li><a href="club3.html#03">學術性</a></li>
                    <li><a href="club4.html#04">聯誼性</a></li>
                    <li><a href="club5.html#05">體適能性</a></li>
                    <li><a href="club6.html#06">自治團體</a></li>
                    <li><a href="club7.html#07">服務性/關懷性</a></li>
                </ul>
            </div>
              <div class="body">
                <ul class="clublist"> 
                  <li><a href="#"><img src=club/guitar.jpg width="200" height="200" id="clubinfo"><p>吉他社</p></a></li>
                  <li><a href="#"><img src=club/photo.jpg width="200" height="200"><p>高大攝影社</p></a></li>
                  <li><a href="#"><img src=club/hiphop.jpg width="200" height="200"><p>嘻哈研究社</p></a></li>
                  <li><a href="#"><img src=club/music.jpg width="200" height="200"><p>愛樂社</p></a></li>
                  <li><a href="#"><img src="https://fakeimg.pl/200/" height="200"><p>烘焙社</p></a></li>
                  <li><a href="#"><img src="https://fakeimg.pl/200/" height="200"><p>熱門音樂社</p></a></li>
                </ul>
              </div>
          <div class="clear"></div>
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
          <div id="window1" class="windowya">        
              <div class="club-content"> 
                  <span class="close1">&times;</span> 
                  <?php
                  $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
                  $SQL = "SELECT * FROM club WHERE club='吉他社'";
                  $result=mysqli_query($link,$SQL);
                  $row=mysqli_fetch_assoc($result);
                  echo "<table  width='75%' class='con'>";
                  echo "<tbody><tr height='35'><td width='8%' bgcolor='#F0BBFF'>社團名稱</td>";
                  echo "<td width='20%'>".$row["club"]."</td>";
                  echo "<td width='8%' bgcolor='#F0BBFF' >指導老師</td>";
                  echo "<td width='20%'>".$row["teacher"]."</td></tr>";
                  echo "<tr height='35'><td width='8%' bgcolor='#F0BBFF'>社長</td>";
                  echo "<td width='20%'>".$row["president"]."</td>";
                  echo "<td width='8%' bgcolor='#F0BBFF'>聯絡方式</td>";
                  echo "<td width='20%'>".$row["tel"]."</td></tr>";
                  echo "<tr height='35'><td width='8%' bgcolor='#F0BBFF'>社團信箱</td>";
                  echo "<td >".$row["prin_email"]."</td>";
                  echo "<td width='8%' bgcolor='#F0BBFF'>社團網頁</td></tr>";
                  echo "<tr height='60'>";
                  echo "<td width='8%' bgcolor='#F0BBFF'>宗旨</td>";
                  echo "<td colspan='4' >".$row["purpose"]."</td></tr>";
                  echo "<tr height='60'><td width='8%' bgcolor='#F0BBFF'>簡介</td>";
                  echo "<td colspan='4' >".$row["introduction"]."</td></tr>";
                  echo "</tbody></table>";
                  ?>
              </div> 	 
          </div>  
              <script>  
                  var windowya = document.getElementById('window1'); 	 
                  var btn = document.getElementById("clubinfo");  
                  var span = document.getElementsByClassName("close1")[0];  
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
      