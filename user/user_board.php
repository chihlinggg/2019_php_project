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
  <title>布告欄消息管理</title>
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
            <!-- 5or6的圖 -->
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
                  <h2 class="title">布告欄消息管理</h2>
                </div>
                <div>
                  
                  <?php
                    $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
                    

                    //更新
                    $club=$_COOKIE["club"];
                    $title=$_POST["title"];
                    $website=$_POST["website"];
                    $datestart=$_POST["datestart"];
                    $dateend=$_POST["dateend"];
                    $content=$_POST["content"];
                    date_default_timezone_set("Asia/Shanghai");
                    $date=date("Y/m/d");
                    $alter_no=$_POST["announce_id"];
                    $SQLUpdate="UPDATE announce SET club='$club',title='$title',website='$website',date_start='$datestart',date_end='$dateend',content='$content' WHERE announce_id=$alter_no";
                    $result=mysqli_query($link,$SQLUpdate);

                    //刪除
                    $del_no=$_GET["No"];
                    $SQLDelete="UPDATE announce SET check_ann='N' WHERE announce_id='$del_no'";
                    $result=mysqli_query($link,$SQLDelete);

                    //列印
                    $SQL = "SELECT * FROM announce WHERE club='$club'";
                    echo "<table width='100%' class='con'>";
                    
                    echo "<th width='8%'>"."狀態"."</th><th width='25%'>"."發布時間"."</th><th width='25%'>"."主題"."</th><th width='22%'>"."社團"."</th><th width='10%'>"."修改"."</th><th width='10%'>"."刪除"."</th>";
                    
                    if($result=mysqli_query($link,$SQL)){
                      while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row["check_ann"]."</td><td>".$row["date"]."</td><td>".$row["title"]."</td><td>".$row["club"]."</td><td>"."<a href='user_board_alter.php?No=".$row["announce_id"]."'>修改</a>"."</td><td>"."<a href='user_board.php?No=".$row["announce_id"]."'>刪除</a>"."</td>";
                        echo "</tr>";
                      }
                      
                    }
                    
                    echo "<tr><td colspan='6'>";
                    echo "<form action='user_board_add.php'>";
                    echo "<input type='submit' value='新增公告' class='btn'>";
                    echo "</form>";
                    echo "</td></tr>";

                    echo "</table>";
                    mysqli_close($link);
                    ?>
                  
                </div>           
              </div>
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

</body>
</html>
