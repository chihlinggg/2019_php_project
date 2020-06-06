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
  <title>財產清單</title>
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
                          <h2 class="title1">財產清單</h2>
                          <?php
                            $club=$_COOKIE["club"];
                            $id_delete = $_GET["pro_id"];

                            $id_update = $_POST["pro_id"];
                            $kind = $_POST["kind"];
                            $department = $_COOKIE["club"];
                            $depository = $_POST["depository"];
                            $quantity = $_POST["quantity"];
                            $pro_name = $_POST["pro_name"];
                            $unit = $_POST["unit"];
                            $startdate = $_POST["startdate"];
                            $place = $_POST["place"];
                            $usetime = $_POST["usetime"];

                            $link = mysqli_connect('localhost', 'root', '123456','php_project');

                            $sql_delete = "DELETE FROM properties WHERE pro_id = $id_delete";
                            $result_delete = mysqli_query($link, $sql_delete);

                            $sql_update = "UPDATE properties SET kind='$kind', department='$department', depository='$depository', quantity='$quantity', pro_name='$pro_name', unit='$unit', startdate='$startdate', place='$place', usetime='$usetime' WHERE pro_id = $id_update";
                            $result_update = mysqli_query($link, $sql_update);

                            $sql = "SELECT pro_id, pro_name, quantity, place, usetime, startdate, department, depository FROM properties WHERE department='$club'";
                            $result = mysqli_query($link, $sql);

                            if($result = mysqli_query($link, $sql)){
                                echo "<table border=1>";
                                echo "<tr>";
                                    echo "<th>財產名稱</th><th>單位</th><th>放置地點</th><th>年限</th><th>購買日期</th><th>使用單位</th><th>保管人</th><th>修改</th><th>刪除</th>";
                                echo "</tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        
                                        echo "<td>".$row["pro_name"]."</td>";
                                        echo "<td>".$row["quantity"]."</td>";
                                        echo "<td>".$row["place"]."</td>";
                                        echo "<td>".$row["usetime"]."</td>";
                                        echo "<td>".$row["startdate"]."</td>";
                                        echo "<td>".$row["department"]."</td>";
                                        echo "<td>".$row["depository"]."</td>";
                                        echo "<td><a href='user_property_alter.php?pro_id=".$row['pro_id']."'>修改</a></td>";
                                        echo "<td><a href='user_property.php?pro_id=".$row['pro_id']."'>刪除</a></td>";
                                    echo "</tr>";
                                }
                                echo "<tr>";
                                echo "<td colspan='9'><form action='user_property_add.php' method='POST'><input type='submit' value='新增財產' name='add' class='btn'></form></td>";
                                echo "</tr>";
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
