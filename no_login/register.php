<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/lightbox.min.js"></script>
  <script src="jquery.min.js" language="javascript"></script>
  <link rel="stylesheet" href="register.css">
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
                <li><a id="section1" href="club1.php">社團資料</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="top"><a href="index.php"><img src="15.png" width=1200px></a></div>
        <div class="clear"></div>
        <div class="content">
            <?php
                $link = @mysqli_connect('localhost','root', 'S123123S','php_project');

                $club=$_POST["club"];
                $principal=$_POST["principal"];
                $prin_id=$_POST["prin_id"];
                $prin_dep=$_POST["prin_dep"];
                $prin_email=$_POST["prin_email"];
                $prin_tel=$_POST["prin_tel"];
                $account=$_POST["account"];
                $password=$_POST["password"];
                $password_check=$_POST["password_check"];

                if(isset($account)){
                    $SQL="SELECT * FROM account WHERE account='$account'";
                    $result=mysqli_query($link,$SQL);
                    $row=mysqli_fetch_assoc($result);
                    if(empty($row)){
                        $SQL="SELECT * FROM club WHERE club='$club'";
                        $result=mysqli_query($link,$SQL);
                        $row=mysqli_fetch_assoc($result);
                        if(empty($row)){
                            if($password==$password_check){
                                //寫進account
                                $SQLCreate="INSERT into account(account,password,club) VALUES ('$account','$password','$club')";
                                $result=mysqli_query($link,$SQLCreate);
                        
                                //寫進club
                                $SQLCreate="INSERT into club(club,principal,prin_id,prin_dep,prin_email,prin_tel) VALUES ('$club','$principal','$prin_id','$prin_dep','$prin_email','$prin_tel')";
                                $result=mysqli_query($link,$SQLCreate);

                                //寫進club_app
                                $SQLCreate="INSERT into club_app(stu_id,stu_name,dep,email,check_join,club,position) VALUES ('$prin_id','$principal','$prin_dep','$prin_email','Y','$club','社員')";
                                $result=mysqli_query($link,$SQLCreate);
                                echo "<script>alert('註冊成功')</script>";
                                header("refresh:0 ; url=register.html");
                            }else{
                                echo "<script>alert('密碼和確認密碼不一致，請重新註冊')</script>";
                                header("refresh:0 ; url=register.html");
                            }
                        }else{
                            echo "<script>alert('社團名稱已存在，請重新註冊')</script>";
                            header("refresh:0 ; url=register.html");
                        }
                    }else{
                        echo "<script>alert('帳號已存在，請重新註冊')</script>";
                        header("refresh:0 ; url=register.html");
                    }
                }
            ?>
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
      