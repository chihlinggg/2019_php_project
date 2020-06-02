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
  <title>財產新增</title>
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
                <div class="addya" >
                    <h2 class="title">財產新增</h2>
                    <div class="add-content" id="add">
                    <form action="user_property_add.php" method="post">
                    <table>
                      <tr>
                          <td bgcolor="#F0BBFF">保管單位</td>
                          <td align="left"><?php echo $_COOKIE["club"] ?></td>
                          <td bgcolor="#F0BBFF">類別</td>
                          <td align="left"><select name="kind">
                          <option value="in">校內財產</option>
                          <option value="self">社團自購財產</option>
                          </select></td>
                          <td bgcolor="#F0BBFF">保管人</td>
                          <td align="left"><input type="text" name="depository"></td>
                      </tr>
                      <tr>
                          <td bgcolor="#F0BBFF">財產名稱</td>
                          <td align="left"><input type="text" name="pro_name"></td>
                          <td bgcolor="#F0BBFF">數量</td>
                          <td align="left"><input type="text" name="quantity"></td>
                          <td bgcolor="#F0BBFF">單位</td>
                          <td align="left"><input type="text" name="unit"></td>
                      </tr>
                      <tr>
                          <td bgcolor="#F0BBFF">購置日期</td>
                          <td align="left"><input type="date" name="startdate"></td>
                          <td bgcolor="#F0BBFF">使用年限</td>
                          <td align="left"><input type="text" name="usetime"></td>
                          <td bgcolor="#F0BBFF">放置地點</td>
                          <td align="left"><input type="text" name="place"></td>
                      </tr>
                      <tr>
                          <td colspan='6'><input type="submit" value="確定送出" class="btn"></td>
                      </tr>
                      </table>
                      </form>
                </div>
                
    </div>
  </div>
</body>
</html>
<?php
        $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');

        $kind = $_POST["kind"];
        $department = $_COOKIE["club"];
        $depository = $_POST["depository"];
        $quantity = $_POST["quantity"];
        $pro_name = $_POST["pro_name"];
        $unit = $_POST["unit"];
        $startdate = $_POST["startdate"];
        $place = $_POST["place"];
        $usetime = $_POST["usetime"];
        if(isset($pro_name)){
        $sql_insert = "INSERT INTO properties (kind, department, depository, quantity, pro_name, unit, startdate, place, usetime) VALUES ('$kind', '$department', '$depository', '$quantity', '$pro_name', '$unit', '$startdate', '$place', '$usetime')";

        $result = mysqli_query($link, $sql_insert);
        mysqli_close($link);
        echo "<script>alert('新增成功')</script>";
        
        }
        
?>