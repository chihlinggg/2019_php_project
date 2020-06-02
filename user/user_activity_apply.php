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
  <title>活動申請</title>
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
                    <h2 class="title">活動申請</h2>
                    
            </div>  
            <div class="intro">
                <form action="user_activity_apply.php" method="post">
            <table>
                <tr>
                    <th width='25%'>主辦社團</th>
                    <td width='25%' align='left'><?php echo $_COOKIE["club"] ?></th>
                    <th width='25%'>申請人</td>
                    <td width='25%' align='left'><input type="text" name="applicant"></td>
                </tr>
                <tr>
                    <th>申請人信箱</th>
                    <td align='left'><input type="email" name="app_email"></td>
                    <th>申請人連絡電話</th>
                    <td align='left'><input type="text" name="app_tel"></td>
                </tr>
                <tr>
                    <th>活動名稱</th>
                    <td align='left'><input type="text" name="act_name"></td>
                    <th>活動地點</th>
                    <td align='left'><input type="text" name="act_location"></td>
                </tr>
                <tr>
                    <th class="yo">活動目的</th>
                    <td colspan="3" align='left'><textarea name="act_purpose" cols="80" rows="4"></textarea></td>
                </tr>
                <tr>
                    <th>活動日期</th>
                    <td align='left'><input type="date" name="act_datestart">~<input type="date" name="act_dateend"></td>
                    <th>預計參加人數</th>
                    <td align='left'><input type="text" name="act_num"></td>
                </tr>
                <tr>
                    <th>活動負責人</th>
                    <td align='left'><input type="text" name="principal"></td>
                    <th>活動負責人連絡電話</th>
                    <td align='left'><input type="text" name="principal_tel"></td>
                </tr>
                <tr>
                <td colspan="4">
                <input type="submit" value="確定送出" class="btn">
                </td>
                </tr>
            </table>
                
            
        </form>
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
</body><a name="intro"></A>
<?php
        $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
        $club=$_COOKIE["club"];
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
        $check_act='N';
        if(isset($applicant)){
            //新增
            $SQLCreate="INSERT into act_app(club,applicant,app_email,app_tel,act_name,act_location,act_purpose,act_datestart,act_dateend,act_num,principal,principal_tel,app_time,check_act) VALUES ('$club','$applicant','$app_email','$app_tel','$act_name','$act_location','$act_purpose','$act_datestart','$act_dateend','$act_num','$principal','$principal_tel','$app_time','$check_act')";
            $result=mysqli_query($link,$SQLCreate);
            echo "<script>alert('申請成功，待審核')</script>";           
        }
        
    ?>