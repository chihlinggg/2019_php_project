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
  <link rel="stylesheet" href="property.css">
  <script src="scripts/user_all.js"></script>
  <title>經費申請</title>
  <style>
      .btn{
          margin-right:20px;
          margin-top: 10px;
          font-size: 15px;
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
  </style>
</head>
<body>
        <div class="wrap">
        <div class="top"><img src="6.png" width=1280>
        <a href="../logout.php?cookie=<?php echo $club ?>" class="loginout">登出</a>
          </div>
            <div class="head"><a name="change"></A>
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
                <div class="intro">
                        <div class="contents">
                          <h2 class="title1">經費申請</h2>
                        <form action="user_funds_apply.php" method="POST">                       
                                <table>
                                    <tr>
                                        <td bgcolor='#F0BBFF'>社團名稱</td>
                                        <td align="left"><?php echo $_COOKIE["club"] ?></td>
                                        <td bgcolor='#F0BBFF'>社團人數</td>
                                        <td align="left">
                                          <?php $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');
                                                $count = "SELECT count(*) stu_count FROM club_app WHERE check_join='Y' AND club='$club'";
                                                $result=mysqli_query($link,$count);
                                                $row=mysqli_fetch_assoc($result);
                                                echo $row["stu_count"];
                                                echo "<input type='hidden' value='".$row["stu_count"]."' name='total_member'>";
                                                mysqli_close($link);
                                          ?>                                          
                                        </td>
                                    </tr>
                                    <tr >
                                        <td width="20%" bgcolor='#F0BBFF'>填表人</td>
                                        <td width="30%" align="left"><input type="text" style=width:99% name="applicant"></td>
                                        <td width="20%" bgcolor='#F0BBFF'>手機</td>
                                        <td width="30%" align="left"><input type="text" style=width:99% name="phonenum"></td>
                                    </tr>                                    
                                    <tr >
                                        <td bgcolor='#F0BBFF'>活動名稱</td>
                                        <td align="left"><input type="text" style=width:98% name="act_name"></td>                                        
                                        <td bgcolor='#F0BBFF'>活動預算</td>
                                        <td align="left"><input type="text" style=width:98% name="budget"></td>
                                    </tr>
                                    <tr >
                                        <td bgcolor='#F0BBFF'>西元年/月/日</td>                                    
                                        <td align="left"><input type="date" style=width:98% name="date"></td>
                                        <td bgcolor='#F0BBFF'>地點</td>
                                        <td align="left"><input type="text" style=width:98% name="location"></td>
                                        
                                    </tr>
                                    <tr >
                                        <td bgcolor='#F0BBFF'>社團自籌款</td>
                                        <td align="left"><input type="text" style=width:99% name="from_self"></td>
                                        <td bgcolor='#F0BBFF'>預計申請補助金額</td>
                                        <td align="left"><input type="text" style=width:99% name="app_funding"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><input type="submit" value="確定送出" class="btn"></td>
                                    </tr>
                                </table>                       
                        
                    </form>
                    
                        </div>
                </div>
                <div class="clear"></div>
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
</body>
</html>
<?php
        $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');
        date_default_timezone_set("Asia/Shanghai");
        $app_date = date("Y/m/d");
        $club = $_COOKIE["club"];
        $total_member = $_POST["total_member"];
        $applicant = $_POST["applicant"];
        $phonenum = $_POST["phonenum"];
        $act_name = $_POST["act_name"];
        $date = $_POST["date"];
        
        $location = $_POST["location"];
        $budget = $_POST["budget"];
        $from_self = $_POST["from_self"];
        
        $app_funding = $_POST["app_funding"];
        $filter = "N";
        if(isset($budget)){
        $sql_insert = "INSERT INTO money (app_date, club, total_member, applicant, phonenum, act_name, date, location, budget, from_self, app_funding, filter) VALUES ('$app_date', '$club', '$total_member', '$applicant', '$phonenum', '$act_name', '$date', '$location', '$budget', '$from_self', '$app_funding', '$filter')";

        $result = mysqli_query($link, $sql_insert);
        echo "<script>alert('申請成功，待審核')</script>";
        }
        mysqli_close($link);

    ?>