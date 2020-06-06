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
  <title>經費紀錄</title>
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
                          <h2 class="title1">經費紀錄</h2>
                          <?php
                                                               
                                    $link = mysqli_connect('localhost', 'root', '123456','php_project');
                                    $club=$_COOKIE["club"];
                                    $sql = "SELECT club, budget,act_name, from_self, app_funding, funding_get,app_date FROM money WHERE club='$club'";
                                    $result = mysqli_query($link, $sql);

                                    if($result = mysqli_query($link, $sql)){
                                        echo "<table>";
                                        echo "<tr>";
                                            echo "<th>日期</th><th>社團名稱</th><th>活動名稱</th><th>預算合計</th><th>社團自籌款</th><th>申請補助</th><th>實得補助</th>";
                                        echo "</tr>";
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                                echo "<td>".$row["app_date"]."</td>";
                                                echo "<td>".$row["club"]."</td>";
                                                echo "<td>".$row["act_name"]."</td>";
                                                echo "<td>".$row["budget"]."</td>";
                                                echo "<td>".$row["from_self"]."</td>";
                                                echo "<td>".$row["app_funding"]."</td>";
                                                echo "<td>".$row["funding_get"]."</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    mysqli_close($link);
                                
                                
                            ?>
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
