<?php
    session_start();

    if(!isset($_SESSION["adminlogin"])){
      header("Location: ../no_login/");
    }else{
      $club = $_COOKIE["admin"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
  <link rel="stylesheet" href="adminpage.css">
  <link rel="stylesheet" href="announce_add.css">
  <!-- <script src="/user_all.js"></script> -->
  <title>社團管理網站</title>
  <style type="text/css">
    input{
      background:none;  
	    outline:none;  
	    border:0px;
    }
    .loginout{
      position:absolute;
      z-index: 1;
      width:65px;
      margin-left: 1200px;
      margin-top: -40px;
      padding-bottom: 5px;
      font-size: 24px;
      color:white;
      border-bottom:1px solid white;
      text-align: center;
    }
    .content{
   
      font-family: 標楷體;
    }
  </style>   
</head>
<body>
  <div class="wrap">
    <div class="top"><img src="6.png" width=1280>
    <a href="../logout.php?cookie=<?php echo $club ?>" class="loginout">登出</a>
    </div>
    <div class="head">
      <div class="title" id="menu">
        <form action="index.php" method="get" class="form">
          <ul class="list">
            <li><input type="submit" name="info" value="消息管理" class="QQ"></li>
            <li><input type="submit" name="club_app" value="社團管理" class="QQ"></li>
            <li><input type="submit" name="act_app" value="社團活動" class="QQ"></li>
            <li id="info"><input name="submit" type="submit" value="經費管理" class="QQ">
            <ul class="clubinfo">
              <li><input type="submit" name="funding_app" value="經費審核" class="GG"></li>
              <li><input type="submit" name="" value="經費審核記錄" class="GG"></li>
            </ul>
            </li>
            <li><input type="submit" name="change" value="變更密碼" class="QQ"></li>
            <li><input type="submit" name="" value="訊息留言" class="QQ"></li> 
            <li><input type="submit" name="" value="後台分析" class="QQ"></li> 
          </ul>
        </form>
      </div>
    </div>
  </div>
  <div class="content"><a name="yo"></A>  
    <?php
        $add = $_POST["add"];

        $link = mysqli_connect('localhost', 'root', '123456','php_project');

        if(!is_null($add)){
          echo "<form action='announce_add.php#yo' method='post'>";
              echo "<br />";
              echo "張貼社團： ".$club."<br />";
              echo "公告主題：<input type='text' name='title'> <br />";
              echo "相關網址：<input type='text' name='website'><br />";
              echo "公告期限：<input type='date' name='datestart'>~<input type='date' name='dateend'><br />";
              echo "<span>公告內容：</sapn><textarea name='content' cols='80' rows='4'></textarea><br />";
              echo "<p><input type='submit' value='送出'></p>";
          echo "</form>";
        }
        
        date_default_timezone_set("Asia/Shanghai");
        $app_date = date("Y/m/d");
        
        $title=$_POST["title"];
        $website=$_POST["website"];
        $datestart=$_POST["datestart"];
        $dateend=$_POST["dateend"];
        $content=$_POST["content"];
        $check_ann = "Y";

        if(isset($title)){
            //新增
            $SQLCreate="INSERT into announce(date, title, club, website, date_start, date_end, content, check_ann) VALUES ('$app_date','$title','$club', '$website','$datestart','$dateend','$content', '$check_ann')";
            $result=mysqli_query($link,$SQLCreate);
            header("Location:index.php?info=消息管理#yo");
        }
    ?>
  </div>
</body>
</html>
      
