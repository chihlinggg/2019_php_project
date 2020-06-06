<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/lightbox.min.js"></script>
  <script src="jquery.min.js" language="javascript"></script>
  <link rel="stylesheet" href="apply.css">
  <script src="/user_all.js"></script>
  <title>加入社團</title>
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
    <div class="top"><a href="index.php"><img src="15.png" width=1200px></a></div>
    <div class="clear"></div>
    <div class="content">
      <p>歡迎加入社團喔喔喔!!!</p>
      <div class="menu">
        <form method="post" class="apply">
          <table>
            <tr><td>申請社團名稱</td>  
            <td>      
            <select name="club">
                  <?php
                    $link = mysqli_connect('localhost', 'root', '123456','php_project');    
                    $sql = "SELECT club FROM account where club!='管理員'";        
                    if($result = mysqli_query($link, $sql)){
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<option value='".$row["club"]."'>".$row["club"]."</option>";
                        }
                    }                  
                  ?>                
            </select>
            </td></tr>
            <!-- <td><input type="text" name="club"></td></tr> -->
            <tr><td>姓名</td> <td><input type="text" name="stu_name" placeholder="ex.A1063301"></td></tr>
            <tr><td>學號</td> <td><input type="text" name="stu_id"></td></tr>
            <tr><td>科系</td> <td><input type="text" name="dep"></td></tr>
            <tr><td>連絡電話</td> <td><input type="text" name="tel"></td></tr>
            <tr><td>信箱</td> <td><input type="text" name="email"></td></tr>
            <tr><td colspan="2">加入動機</td></tr> 
            <tr><td colspan="2"><textarea name="reason" cols="40" rows="5"></textarea></td></tr>
          </table>
          <br><br>
          <input type="submit" value="填寫完畢" class="sub">
        </form>
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
  <?php
    $link = @mysqli_connect('localhost','root', '123456','php_project');
    $club=$_POST["club"];

    if(isset($club)){
        $stu_id=$_POST["stu_id"];
        $stu_name=$_POST["stu_name"];
        $tel=$_POST["tel"];
        $dep=$_POST["dep"];
        $email=$_POST["email"];
        
        $reason=$_POST["reason"];
        //新增
        $SQLCreate="INSERT into club_app(stu_id,stu_name,tel,email,club,reason,dep) VALUES ('$stu_id','$stu_name','$tel','$email','$club','$reason','$dep')";
        $result=mysqli_query($link,$SQLCreate);
        echo "<script>alert('申請成功，待審核')</script>";
    }
?>
</body>
</html>
      
