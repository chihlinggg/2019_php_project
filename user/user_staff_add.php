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
  <title>社團人員新增</title>
  <style>

  .changetable{
    width:1100px;
    border:1px solid ;
    background: rgba(185, 102, 224, 0.384);
    border:2px solid rgba(243, 239, 239, 0.973);
    font-family: 標楷體;
  }
  .changetable tr{
    border:2px solid rgba(243, 239, 239, 0.973);
  }
  .changetable td{
    border:2px solid rgba(243, 239, 239, 0.973);
  }
  .changetable input{
    width:150px;
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .col{
    font-size: 20px;
  }
  .btn{
    font-size: 15px;
    outline:none;
    border:white;
    background:rgb(233, 227, 227);
    padding: 5px;
    text-align: center;
  }
  .title{
    width:950px;
    text-align: center;
  }
  .mem th{
    background: rgba(159, 70, 201, 0.582);
    color:black;
    border:2px solid rgba(159, 70, 201, 0.582);
    letter-spacing: 2px;
    font-size:20px;
    font-family: 標楷體;
  }
  .mem tr{
    border:2px solid rgba(243, 239, 239, 0.973);
  }
  .mem td{
    padding: 10px;
    border:2px solid rgba(159, 70, 201, 0.582);
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
            <div class="head"><a name="intro"></A>
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
                      <li><a href="user_property_add.php#intro">財產新增</a></li>
                      
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
            <div class="intro">
                <h2 class="title">社團人員新增</h2>
                <form action="user_staff_add.php" method="post">
                    <table width='100%' border='1' class="mem">
                        <tr>
                            <th width='25%'>學號</th>
                            <th width='25%'>姓名</th>
                            <th width='25%'>系所</th>
                            <th width='25%'>幹部/社員</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="stu_id1" placeholder="ex.A1063301"></td>
                            <td><input type="text" name="stu_name1"></td>
                            <td><input type="text" name="dep1"></td>
                            <td><input type="text" name="position1"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="stu_id2" placeholder="ex.A1063301"></td>
                            <td><input type="text" name="stu_name2"></td>
                            <td><input type="text" name="dep2"></td>
                            <td><input type="text" name="position2"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="stu_id3" placeholder="ex.A1063301"></td>
                            <td><input type="text" name="stu_name3"></td>
                            <td><input type="text" name="dep3"></td>
                            <td><input type="text" name="position3"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="stu_id4" placeholder="ex.A1063301"></td>
                            <td><input type="text" name="stu_name4"></td>
                            <td><input type="text" name="dep4"></td>
                            <td><input type="text" name="position4"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="stu_id5" placeholder="ex.A1063301"></td>
                            <td><input type="text" name="stu_name5"></td>
                            <td><input type="text" name="dep5"></td>
                            <td><input type="text" name="position5"></td>
                        </tr>
                        <tr>
                        <td colspan="4"><input type="hidden" value="Y" name="check_join">
                    <input type="submit" value="確定送出" class="btn"></td>
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
</body>
<?php
$link = @mysqli_connect('localhost','root', 'S123123S','php_project');
$club=$_COOKIE["club"];
$check_join=$_POST["check_join"];
if(isset($check_join)){
for($i=1;$i<=5;$i++){
    $stu_id=$_POST["stu_id$i"];
    $stu_name=$_POST["stu_name$i"];
    $dep=$_POST["dep$i"];
    $position=$_POST["position$i"];  
    if(!empty($_POST["stu_id$i"])){
        //新增
        $SQLCreate="INSERT into club_app(stu_id,stu_name,dep,position,check_join,club) VALUES ('$stu_id','$stu_name','$dep','$position','$check_join','$club')";
        $result=mysqli_query($link,$SQLCreate);
        echo "<script>alert('".$stu_name."新增成功')</script>";
    }
}

}
?>