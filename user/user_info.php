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
  <title>社團資料</title>
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
              <h2 class="title">社團資料</h2>
            <?php
              $link = @mysqli_connect('localhost','root', '123456','php_project');
              $club=$_COOKIE["club"];

              //更新
              $alter_no=$_POST["no"];
              $info=$_POST["info"];

              if($info=='club'){
              $club_kind=$_POST["club_kind"];
              $president=$_POST["president"];
              $tel=$_POST["tel"];
              $office=$_POST["office"];
              $website=$_POST["website"];
              $email=$_POST["email"];
              $tax_id=$_POST["tax_id"];
              $bank=$_POST["bank"];
              $b_account=$_POST["b_account"];
              $purpose=$_POST["purpose"];
              $introduction=$_POST["introduction"];
              $SQLUpdate="UPDATE club SET club_kind='$club_kind',president='$president',tel='$tel',office='$office',website='$website',email='$email',tax_id='$tax_id',bank='$bank',b_account='$b_account',purpose='$purpose',introduction='$introduction' WHERE club_id=$alter_no";
              $result=mysqli_query($link,$SQLUpdate);
              }

              if($info=='teacher'){
              $teacher=$_POST["teacher"];
              $t_tel=$_POST["t_tel"];
              $t_email=$_POST["t_email"];
              $SQLUpdate="UPDATE club SET teacher='$teacher',t_tel='$t_tel',t_email='$t_email' WHERE club_id=$alter_no";
              $result=mysqli_query($link,$SQLUpdate);
              }

              if($info=='prin'){
              $principal=$_POST["principal"];
              $prin_id=$_POST["prin_id"];
              $prin_dep=$_POST["prin_dep"];
              $prin_tel=$_POST["prin_tel"];
              $prin_email=$_POST["prin_email"];
              $SQLUpdate="UPDATE club SET principal='$principal',prin_id='$prin_id',prin_dep='$prin_dep',prin_tel='$prin_tel',prin_email='$prin_email' WHERE club_id=$alter_no";
              $result=mysqli_query($link,$SQLUpdate);
              }



              //列印
              $SQL = "SELECT * FROM club WHERE club='$club'";
              $result=mysqli_query($link,$SQL);
              $row=mysqli_fetch_assoc($result);

              //社團資料
              echo "<table border='1' width='100%'>";
              echo "<tr>";
              echo "<td colspan='4' bgcolor='#F0BBFF'>社團基本資料</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td width='20%' bgcolor='#F0BBFF'>社團名稱</td><td width='30%' align='left'>".$row["club"]."</td>";
              echo "<td width='20%' bgcolor='#F0BBFF'>社團類別</td><td width='30%' align='left'>".$row["club_kind"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>社長</td><td align='left' align='left'>".$row["president"]."</td>";
              echo "<td bgcolor='#F0BBFF'>社長連絡電話</td><td align='left'>".$row["tel"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>社團辦公室</td><td align='left'>".$row["office"]."</td>";
              echo "<td bgcolor='#F0BBFF'>網址</td><td align='left'>".$row["website"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>email</td><td align='left'>".$row["email"]."</td>";
              echo "<td bgcolor='#F0BBFF'>社團統編</td><td align='left'>".$row["tax_id"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>銀行</td><td align='left'>".$row["bank"]."</td>";
              echo "<td bgcolor='#F0BBFF'>銀行帳號</td><td align='left'>".$row["b_account"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>社團宗旨</td><td colspan='3' align='left'>".$row["purpose"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>社團簡介</td><td colspan='3' align='left'>".$row["introduction"]."</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<td colspan='4'>";
              echo "<form action='user_club_alter.php#intro' method='post'>";
              echo "<input type='hidden' value='club' name='info'>";
              echo "<input type='hidden' value='".$row["club_id"]."' name='no'>";
              echo "<input type='submit' value='修改' class='btn'>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
        

              //指導老師
              echo "<table border='1' width='100%'>";
              echo "<tr>";
              echo "<td colspan='4' bgcolor='#F0BBFF'>社團指導老師基本資料</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF'>社團指導老師</td><td colspan='3' align='left'>".$row["teacher"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td width='20%' bgcolor='#F0BBFF'>連絡電話</td><td width='30%' align='left'>".$row["t_tel"]."</td>";
              echo "<td width='20%' bgcolor='#F0BBFF'>email</td><td width='30%' align='left'>".$row["t_email"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td colspan='4'>";
              echo "<form action='user_club_alter.php#intro' method='post'>";
              echo "<input type='hidden' value='teacher' name='info'>";
              echo "<input type='hidden' value='".$row["club_id"]."' name='no'>";
              echo "<input type='submit' value='修改' class='btn'>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
              

              //負責人	
              echo "<table border='1' width='100%'>";
              echo "<tr>";
              echo "<td colspan='4' bgcolor='#F0BBFF'>社團負責人基本資料</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td bgcolor='#F0BBFF' width='20%'>負責人</td><td colspan='3' align='left'>".$row["principal"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td width='20%' bgcolor='#F0BBFF'>學號</td><td width='30%' align='left'>".$row["prin_id"]."</td>";
              echo "<td width='20%' bgcolor='#F0BBFF'>系所</td><td width='30%' align='left'>".$row["prin_dep"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td width='20%' bgcolor='#F0BBFF'>連絡電話</td><td width='30%' align='left'>".$row["prin_tel"]."</td>";
              echo "<td width='20%' bgcolor='#F0BBFF'>email</td><td width='30%' align='left'>".$row["prin_email"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td colspan='4'>";
              echo "<form action='user_club_alter.php#intro' method='post'>";
              echo "<input type='hidden' value='prin' name='info'>";
              echo "<input type='hidden' value='".$row["club_id"]."' name='no'>";
              echo "<input type='submit' value='修改' class='btn'>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
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
