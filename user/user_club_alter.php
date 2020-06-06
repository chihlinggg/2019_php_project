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
  <link rel="stylesheet" href="user_info.css">
  <script src="scripts/user_all.js"></script>
  <title>社團資料修改</title>
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
            <div class="intro">
              <h2 class="title">社團資料修改</h2>
            <?php
                $link = @mysqli_connect('localhost','root', '123456','php_project');
                $info=$_POST["info"];
                $no=$_POST["no"];
                $SQLUpdate="SELECT * FROM club WHERE club_id=$no";
                $result=mysqli_query($link,$SQLUpdate);
                $row=mysqli_fetch_assoc($result);

                //社團資料
                if($info=='club'){
                echo "<form action='user_info.php#intro' method='post'>";
                echo "<input type='hidden' value='".$row["club_id"]."' name='no'>";
                echo "<input type='hidden' value='club' name='info'>";
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<td colspan='4' bgcolor='#F0BBFF'>社團基本資料</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td width='20%' bgcolor='#F0BBFF'>社團名稱</td>";
                echo "<td align='left'>".$row["club"]."</td>";
                echo "<td width='20%' bgcolor='#F0BBFF'>社團類別</td>";
                echo "<td align='left'><select name='club_kind'><option value='學藝性'>學藝性</option><option value='自治團體'>自治團體</option><option value='體適能性'>體適能性</option><option value='服務性/關懷性'>服務性/關懷性</option><option value='文康性'>文康性</option><option value='聯誼性'>聯誼性</option><option value='學術性'>學術性</option></select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF'>社長</td>";
                echo "<td align='left'><input type='text' name='president' value='".$row["president"]."'></td>";
                echo "<td bgcolor='#F0BBFF'>社長連絡電話</td>";
                echo "<td align='left'><input type='text' name='tel' value='".$row["tel"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF'>社團辦公室</td>";
                echo "<td align='left'><input type='text' name='office' value='".$row["office"]."'></td>";
                echo "<td bgcolor='#F0BBFF'>網址</td>";
                echo "<td align='left'><input type='text' name='website' value='".$row["website"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF'>email</td>";
                echo "<td align='left'><input type='email' name='email' value='".$row["email"]."'></td>";
                echo "<td bgcolor='#F0BBFF'>社團統編</td>";
                echo "<td align='left'><input type='text' name='tax_id' value='".$row["tax_id"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF'>銀行</td>";
                echo "<td align='left'><input type='text' name='bank' value='".$row["bank"]."'></td>";
                echo "<td bgcolor='#F0BBFF'>銀行帳號</td>";
                echo "<td align='left'><input type='text' name='b_account' value='".$row["b_account"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF' class='yo'>社團宗旨</td>";
                echo "<td colspan='3' align='left'><textarea name='purpose' cols='80' rows='4'>".$row["purpose"]."</textarea></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF' class='yo'>社團簡介</td>";
                echo "<td colspan='3' align='left'><textarea name='introduction' cols='80' rows='4'>".$row["introduction"]."</textarea></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='4'>";
                echo "<input type='submit' value='確定送出' class='btn'>";
                echo "</td>";
                echo "</tr>";
                echo "</form>";
                echo "</table>";
                }

                //指導老師
                if($info=='teacher'){
                echo "<form action='user_info.php#intro' method='post'>";
                echo "<input type='hidden' value='".$row["club_id"]."' name='no'>";
                echo "<input type='hidden' value='teacher' name='info'>";
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<td colspan='4' bgcolor='#F0BBFF'>社團指導老師基本資料</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF'>社團指導老師</td>";
                echo "<td colspan='3' align='left'><input type='text' name='teacher' value='".$row["teacher"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td width='20%' bgcolor='#F0BBFF'>連絡電話</td>";
                echo "<td align='left'><input type='text' name='t_tel' value='".$row["t_tel"]."'></td>";
                echo "<td width='20%' bgcolor='#F0BBFF'>email</td>";
                echo "<td align='left'><input type='email' name='t_email' value='".$row["t_email"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='4'>";
                echo "<input type='submit' value='確定送出' class='btn'>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";
                }

                //負責人
                if($info=='prin'){
                echo "<form action='user_info.php#intro' method='post'>";
                echo "<input type='hidden' value='".$row["club_id"]."' name='no'>";
                echo "<input type='hidden' value='prin' name='info'>";
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<td colspan='4' bgcolor='#F0BBFF'>社團負責人基本資料</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td bgcolor='#F0BBFF' width='20%'>負責人</td>";
                echo "<td colspan='3' align='left'><input type='text' name='principal' value='".$row["principal"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td width='20%' bgcolor='#F0BBFF'>學號</td>";
                echo "<td align='left'><input type='text' name='prin_id' value='".$row["prin_id"]."'></td>";
                echo "<td width='20%' bgcolor='#F0BBFF'>系所</td>";
                echo "<td align='left'><input type='text' name='prin_dep' value='".$row["prin_dep"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td width='20%' bgcolor='#F0BBFF'>連絡電話</td>";
                echo "<td align='left'><input type='text' name='prin_tel' value='".$row["prin_tel"]."'></td>";
                echo "<td width='20%' bgcolor='#F0BBFF'>email</td>";
                echo "<td align='left'><input type='text' name='prin_email' value='".$row["prin_email"]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='4'>";
                echo "<input type='submit' value='確定送出' class='btn'>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";
                }
            ?>


            </div>
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
</body>
