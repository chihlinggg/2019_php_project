<?php
    session_start();

    if(!isset($_SESSION["userlogin"])){
      header("Location: ../no_login/");
    }else{
      $club = $_COOKIE["club"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="jquery.min.js" language="javascript"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="activity.css">
  <script src="scripts/user_all.js"></script>
  <title>活動紀錄</title>
  <style>
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
  </style>
</head>
<body>
<div class="wrap">
            <div class="top"><img src="6.png" width=1280>
            <a href="../logout.php?cookie=<?php echo $club ?>" class="loginout">登出</a>
            </div>
        <!-- 5or6的圖 -->
        <div class="head">
         <ul class="list">
              <li><a id="info" href="user_info.php#intro">社團資料</a>
                
                  <ul class="clubinfo">
                    <li><a href="user_info.php#intro">社團資料</a></li>
            
                    <li><a href="user_staff.php#intro">社團人員</a></li>
                    <li><a href="user_staff_apply.php#intro">入社申請</a></li>
                    <li><a href="user_board.php#intro">布告欄</a></li>
                    <li><a href="user_message.php#intro">留言板</a></li>
                  </ul>
              </li>
              <li><a id="info" href="user_activity.php#intro">社團活動</a>
                <ul class="clubinfo">
                  <li><a href="user_activity.php#intro">活動紀錄</a></li>
                  <li><a href="user_activity_apply.php#intro">活動申請</a></li>
                </ul>
              </li>
              <li><a id="info" href="user_property.php#intro">社團財產</a>
                <ul class="clubinfo">
                  <li><a href="user_property.php#intro">財產清單</a></li>
                  <li><a href="user_property_add.php#intro" id="addbtn">財產新增</a></li>
                  
                  </ul>
              </li>
              <li><a id="info" href="user_funds.php#intro">社團經費</a>
                <ul class="clubinfo">
                  <li><a href="user_funds.php#intro">經費紀錄</a></li>
                  <li><a href="user_funds_apply.php#intro">經費申請</a></li>
                </ul>
              </li>
              <li><a class="passwd" href="#" id="changepasswd">變更密碼</a></li>
            </ul>
        </div>
            <div class="clear"></div>
            <div class="no"></div><a name="intro"></A>
            <div class="search">
                    <h2 class="title">活動紀錄</h2>
                    
            </div>  
            <div class="intro">
            <?php
              $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
              
              $club=$_COOKIE["club"];

              //更新              
              $applicant=$_POST["applicant"];
              $app_email=$_POST["app_email"];
              $app_tel=$_POST["app_tel"];
              $act_name=$_POST["act_name"];
              $act_location=$_POST["act_location"];
              $act_purpose=$_POST["act_purpose"];
              $act_datestart=$_POST["act_datestart"];
              $act_dateend=$_POST["act_dateend"];
              $act_num=$_POST["act_num"];
              $principal=$_POST["principal"];
              $principal_tel=$_POST["principal_tel"];
              date_default_timezone_set("Asia/Shanghai");
              $app_time=date("Y/m/d");
              $alter_no=$_POST["act_id"];
              
              $SQLUpdate="UPDATE act_app SET club='$club',applicant='$applicant',app_email='$app_email',app_tel='$app_tel',act_name='$act_name',act_location='$act_location',act_purpose='$act_purpose',act_datestart='$act_datestart',act_dateend='$act_dateend',act_num='$act_num',principal='$principal',principal_tel='$principal_tel',app_time='$app_time',check_act='Y' WHERE act_id=$alter_no";
              $result=mysqli_query($link,$SQLUpdate);

              //刪除
              $del_no=$_GET["No"];
              $SQLDelete="UPDATE act_app SET check_act='N' WHERE act_id='$del_no'";
              $result=mysqli_query($link,$SQLDelete);

              //列印
              echo "<table width='100%' class='con'>";
              echo "<tr>";
              echo "<th width='8%'>狀態</th><th width='14%'>活動日期</th><th width='14%'>活動名稱</th><th width='11%'>活動地點</th><th width='11%'>預計參加人數</th><th width='10%'>申請人</th><th width='16%'>申請日期</th><th width='8%'>修改</th><th width='8%'>刪除</th>";
              echo "</tr>";
              $SQL = "SELECT * FROM act_app WHERE club='$club'";
              if($result=mysqli_query($link,$SQL)){
                while($row=mysqli_fetch_assoc($result)){
                  echo "<tr>";
                    echo "<td>".$row["check_act"]."</td><td>".$row["act_datestart"]."</td><td>".$row["act_name"]."</td><td>".$row["act_location"]."</td><td>".$row["act_num"]."</td><td>".$row["applicant"]."</td><td>".$row["app_time"]."</td><td>"."<a href='user_activity_alter.php?No=".$row["act_id"]."'>修改</a>"."</td><td>"."<a href='user_activity.php?No=".$row["act_id"]."'>刪除</a>"."</td>";
                  echo "</tr>";
                }
              }
              echo "<tr>";
              echo "<td colspan='9'>";
              echo "<form action='user_activity_apply.php#intro'>";
              echo "<input type='submit' value='活動申請' class='btn'>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
            ?>
                  <div id="window" class="windowya">        
            <div class="login-content"> 
              <span class="close">&times;</span> 
                <form method="post" class="form" action="user_changepw.php">
                請輸入原本密碼：<input type="password" class="ori" name="password1">
                <br><br>
                請輸入要更改的密碼：<input type="password" class="newone" name="password2"><br><br>
                再次輸入要更改的密碼：<input type="password" class="newone" name="password3">
                <input type="submit" value="更改" class="re">
                </form>
            </div> 	 
          </div>   
                <script> 
                    var windowya = document.getElementById('window'); 	 
                    var btn = document.getElementById("changepasswd");  
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
</div>
</body>
