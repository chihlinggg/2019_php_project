<?php
    session_start();

    if(!isset($_SESSION["userlogin"])){
      header("Location: ../no_login/");
    }else{
      $club = $_COOKIE["club"];
    }

    $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
  
    //如果沒人就跳回去
    $sql = "SELECT count(*) count FROM club_app WHERE club = '$club' AND check_join=''";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row["count"]==0){
    echo "<script>alert('目前無人提交入社申請')</script>";
    header("refresh:0 ; url=user_staff.php");
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
  <title>入社申請</title>
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
    border:2px solid rgba(243, 239, 239, 0.973);
    letter-spacing: 2px;
    font-size:20px;
    font-family: 標楷體;
  }
  .mem tr{
    border:2px solid rgba(243, 239, 239, 0.973);
  }
  .mem td{
    padding: 10px;
    border:2px solid rgba(243, 239, 239, 0.973);
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
                <h2 class="title">入社申請人資料</h2>
                <?php
                    $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
                    $club=$_COOKIE["club"];
                    $SQL = "SELECT * FROM club_app WHERE check_join='' AND club='$club'";
                    
                    if($result=mysqli_query($link,$SQL)){
                        while($row=mysqli_fetch_assoc($result)){
                            
                                    echo "<table border='1'>";
                                    echo "<tr>";           
                                        echo "<td width='20%' bgcolor='#F0BBFF'>姓名</td>";
                                        echo "<td align='left' width='30%'>".$row["stu_name"]."</td>";
                                        echo "<td width='20%' bgcolor='#F0BBFF'>學號</td>";
                                        echo "<td align='left' width='30%'>".$row["stu_id"]."</td>";
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                        echo "<td bgcolor='#F0BBFF'>連絡電話</td>";
                                        echo "<td align='left'>".$row["tel"]."</td>";
                                        echo "<td bgcolor='#F0BBFF'>信箱</td>";
                                        echo "<td align='left'>".$row["email"]."</td>";
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                        echo "<td colspan='4' align='center' bgcolor='#F0BBFF'>加入動機</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td colspan='4'>".$row["reason"]."</td>";
                                    echo "</tr>";
                                    echo "<tr align='center'>";           
                                        echo "<td colspan='2'>";
                                            echo "<form action='user_staff_apply.php' method='post'><input type='submit' value='允許加入' class='btn'><input type='hidden' name='yes' value='".$row["no"]."'></form>";
                                        echo "</td>";
                                        echo "<td colspan='2'>";
                                            echo "<form action='user_staff_apply.php' method='post'><input type='submit' value='拒絕加入' class='btn'><input type='hidden' name='no' value='".$row["no"]."'></form>";
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "</table>";
                               
                        }
                    }
                   
                    
                    //確定加入與否
                    $yes=$_POST["yes"];
                    $no=$_POST["no"];
                    if(!empty($yes)){
                        $SQLDelete="UPDATE club_app SET check_join='Y',position='社員' WHERE no='$yes'";
                        $result=mysqli_query($link,$SQLDelete);
                        $sql = "SELECT stu_name FROM club_app WHERE no = $yes";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result); 
                        echo "<script language='javascript'>";
                        echo "alert('將".$row["stu_name"]."成功加入！！')";                      
                        echo "</script>";
                    }
                    if(!empty($no)){
                        $SQLDelete="UPDATE club_app SET check_join='N' WHERE no='$no'";
                        $result=mysqli_query($link,$SQLDelete);
                        $sql = "SELECT stu_name FROM club_app WHERE no = $no";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result); 
                        echo "<script>alert('哭哭".$row["stu_name"]."，拒絕加入你')</script>";
                 
                    }



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
