<?php
    session_start();

    if(!isset($_SESSION["adminlogin"])){
      header("Location: ../no_login/");
    }else{
      $club = $_COOKIE["admin"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
  <!-- <script src="all.js"></script> -->
  <link rel="stylesheet" href="adminpage.css">
  <link rel="stylesheet" href="./index.css">
  <link rel="stylesheet" href="./ana.css">
  <!-- <script src="/user_all.js"></script> -->
  <title>社團管理網站</title>
  <style type="text/css">
    input{
      background:none;  
	    outline:none;  
	    border:0px;
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
    .chart{
    width: 400px;
    height: 400px;
    float:left;
    }
  </style>   
</head>
<body>
  <div class="wrap">
    <div class="top"><img src="6.png" width=1280>
    <a href="../logout.php?cookie=<?php echo $club ?>" class="loginout">登出</a>
    </div>
    <div class="head">
      <div class="title" id="menu">
        <form action="index.php#yo" method="get" class="form">
          <ul class="list">
            <li><input type="submit" name="info" value="消息管理" class="QQ"></li>
            <li><input type="submit" name="club_app" value="社團管理" class="QQ"></li>
            <li><input type="submit" name="act_app" value="社團活動" class="QQ"></li>
            <li id="info"><input name="submit" type="submit" value="經費管理" class="QQ">
            <ul class="clubinfo">
              <li><input type="submit" name="funding_app" value="經費審核" class="GG"></li>
              <li><input type="submit" name="funding_record" value="經費審核記錄" class="GG"></li>
            </ul>
            </li>
            <li><input type="submit" name="change" value="變更密碼" class="QQ" ></li>
            <li><input type="submit" name="message" value="訊息留言" class="QQ"></li> 
            <li><input type="submit" name="ana" value="後台分析" class="QQ"></li> 
          </ul>
        </form>
      </div>
    </div>
    <div class="content"><a name="yo"></A>
        <?php 

                $show = $_GET["show"];
                $hidden = $_GET["hidden"];
                $act_id = $GET["act_id"];
                $update_id = $_GET["update_id"];

                //活動修改
                $act_show = $_GET["act_show"];
                $act_hidden = $_GET["act_hidden"];
                $act_update_id = $_GET["act_update_id"];

                $info = $_GET["info"];
                $act_app = $_GET["act_app"];
                $funding_app = $_GET["funding_app"];
                $funding_record = $_GET["funding_record"];
                $club_app = $_GET["club_app"];
                $change = $_GET["change"];
                $message = $_GET["message"];
                $ana = $_GET["ana"];

                $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');

                if(!is_null($show)){
                    $filter = "Y";

                    $sql_update = "UPDATE announce SET check_ann='$filter' WHERE announce_id = $update_id";

                    $result_update = mysqli_query($link, $sql_update);

                    $sql = "SELECT * FROM announce";

                    if($result = mysqli_query($link, $sql)){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>日期</th><th>主題</th><th>發布社團</th><th>狀態</th><th>調整</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>".$row["date"]."</td>";
                                echo "<td>".$row["title"]."</td>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["check_ann"]."</td>";
                                echo "<td><form action='#yo' method='get'><input type='submit' value='顯示' name='show'><input type='submit' value='隱藏' name='hidden'><input type='hidden' name='update_id' value='".$row["announce_id"]."'></form></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td colspan='5'>";
                        echo "<form action='announce_add.php#yo' method='post'>";
                        echo "<input type='submit' name='add' value='新增' class='btn'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        echo "</table>";
                    }  
                }

                if(!is_null($hidden)){
                    $filter = "N";

                    $sql_update = "UPDATE announce SET check_ann='$filter' WHERE announce_id = $update_id";

                    $result_update = mysqli_query($link, $sql_update);

                    $sql = "SELECT * FROM announce";

                    if($result = mysqli_query($link, $sql)){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>日期</th><th>主題</th><th>發布社團</th><th>狀態</th><th>調整</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>".$row["date"]."</td>";
                                echo "<td>".$row["title"]."</td>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["check_ann"]."</td>";
                                echo "<td><form action='#yo' method='get'><input type='submit' value='顯示' name='show'><input type='submit' value='隱藏' name='hidden'><input type='hidden' name='update_id' value='".$row["announce_id"]."'></form></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td colspan='5'>";
                        echo "<form action='announce_add.php#yo' method='post'>";
                            echo "<input type='submit' name='add' value='新增' class='btn'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        echo "</table>";
                    }
                   
                }

                if(!is_null($info)){
                    $sql = "SELECT announce_id, date, title, club, check_ann FROM announce";

                    if($result = mysqli_query($link, $sql)){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>日期</th><th>主題</th><th>發布社團</th><th>狀態</th><th>調整</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>".$row["date"]."</td>";
                                echo "<td>".$row["title"]."</td>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["check_ann"]."</td>";
                                echo "<td><form action='#yo' method='get'><input type='submit' value='顯示' name='show'><input type='submit' value='隱藏' name='hidden'><input type='hidden' name='update_id' value='".$row["announce_id"]."'></form></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td colspan='5'>";
                        echo "<form action='announce_add.php#yo' method='post'>";
                            echo "<input type='submit' name='add' value='新增' class='btn'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        echo "</table>";
                    }
                   
                }

                if(!is_null($act_app)){
                    $sql = "SELECT act_id, club, act_datestart, act_dateend, act_name, act_location, act_num, principal, app_time, check_act FROM act_app";

                    if($result = mysqli_query($link, $sql)){
                        echo "<table class='con'>";
                        echo "<tr>";
                            echo "<th>申請時間</th><th>活動名稱</th><th>主辦社團</th><th>活動地點</th><th>活動時間</th><th>活動總人數</th><th>負責人</th><th>狀態</th><th>調整</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                // echo "<td>".$row["act_id"]."</td>";
                                echo "<td>".$row["app_time"]."</td>";
                                echo "<td>".$row["act_name"]."</td>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["act_location"]."</td>";
                                echo "<td>".$row["act_datestart"]."~".$row["act_dateend"]."</td>";
                                echo "<td>".$row["act_num"]."</td>";
                                echo "<td>".$row["principal"]."</td>";
                                echo "<td>".$row["check_act"]."</td>";
                                echo "<td><form action='#yo' method='get'><input type='submit' value='顯示' name='act_show'><input type='submit' value='隱藏' name='act_hidden'><input type='hidden' name='act_update_id' value='".$row["act_id"]."'></form></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }
                }

                if(!is_null($act_show)){
                    $filter = "Y";

                    $sql_update = "UPDATE act_app SET check_act='$filter' WHERE act_id = $act_update_id";

                    $result_update = mysqli_query($link, $sql_update);

                    $sql = "SELECT * FROM act_app";

                    if($result = mysqli_query($link, $sql)){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>申請時間</th><th>活動名稱</th><th>主辦社團</th><th>活動地點</th><th>活動時間</th><th>活動總人數</th><th>負責人</th><th>狀態</th><th>調整</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                // echo "<td>".$row["act_id"]."</td>";
                                echo "<td>".$row["app_time"]."</td>";
                                echo "<td>".$row["act_name"]."</td>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["act_location"]."</td>";
                                echo "<td>".$row["act_datestart"]."~".$row["act_dateend"]."</td>";
                                echo "<td>".$row["act_num"]."</td>";
                                echo "<td>".$row["principal"]."</td>";
                                echo "<td>".$row["check_act"]."</td>";
                                echo "<td><form action='#yo' method='get'><input type='submit' value='顯示' name='act_show'><input type='submit' value='隱藏' name='act_hidden'><input type='hidden' name='act_update_id' value='".$row["act_id"]."'></form></td>";
                            echo "</tr>";
                        }
                        

                        echo "</table>";
                    }  
                }

                if(!is_null($act_hidden)){
                    $filter = "N";

                    $sql_update = "UPDATE act_app SET check_act='$filter' WHERE act_id = $act_update_id";

                    $result_update = mysqli_query($link, $sql_update);

                    $sql = "SELECT * FROM act_app";

                    if($result = mysqli_query($link, $sql)){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>申請時間</th><th>活動名稱</th><th>主辦社團</th><th>活動地點</th><th>活動時間</th><th>活動總人數</th><th>負責人</th><th>狀態</th><th>調整</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                // echo "<td>".$row["act_id"]."</td>";
                                echo "<td>".$row["app_time"]."</td>";
                                echo "<td>".$row["act_name"]."</td>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["act_location"]."</td>";
                                echo "<td>".$row["act_datestart"]."~".$row["act_dateend"]."</td>";
                                echo "<td>".$row["act_num"]."</td>";
                                echo "<td>".$row["principal"]."</td>";
                                echo "<td>".$row["check_act"]."</td>";
                                echo "<td><form action='#yo' method='get'><input type='submit' value='顯示' name='act_show'><input type='submit' value='隱藏' name='act_hidden'><input type='hidden' name='act_update_id' value='".$row["act_id"]."'></form></td>";
                            echo "</tr>";
                        }
                        

                        echo "</table>";
                    }  
                }
                
                if(!is_null($funding_app)){
                    $sql = "SELECT act_id, app_date, club, budget, from_self, app_funding, filter,act_name FROM money WHERE filter='N' ";
            
                    if($result = mysqli_query($link, $sql)){
                        echo "<table class='con'>";
                        echo "<tr>";
                            echo "<th>申請日期</th><th>社團名稱</th><th>活動名稱</th><th>預算合計</th><th>社團自籌款</th><th>申請補助</th><th>狀態</th><th>實得補助</th><th>審核</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                    echo "<td>".$row["app_date"]."</td>";
                                    echo "<td>".$row["club"]."</td>";
                                    echo "<td>".$row["act_name"]."</td>";
                                    echo "<td>".$row["budget"]."</td>";
                                    echo "<td>".$row["from_self"]."</td>";
                                    echo "<td>".$row["app_funding"]."</td>";
                                    echo "<td>".$row["filter"]."</td>";
                                    echo "<td><form action='money_check.php#yo' method='post'><input type='text' name='funding_get'></td><td><input type='submit' value='送出'></td><input type='hidden' name='act_id' value='".$row["act_id"]."'></form></td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                    }
                }

                if(!is_null($funding_record)){
                    $sql = "SELECT * FROM money";
            
                    if($result = mysqli_query($link, $sql)){
                        echo "<table class='con'>";
                        echo "<tr>";
                            echo "<th>申請日期</th><th>社團名稱</th><th>活動名稱</th><th>預算合計</th><th>社團自籌款</th><th>申請補助</th><th>狀態</th><th>實得補助</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                    echo "<td>".$row["app_date"]."</td>";
                                    echo "<td>".$row["club"]."</td>";
                                    echo "<td>".$row["act_name"]."</td>";
                                    echo "<td>".$row["budget"]."</td>";
                                    echo "<td>".$row["from_self"]."</td>";
                                    echo "<td>".$row["app_funding"]."</td>";
                                    echo "<td>".$row["filter"]."</td>";
                                    echo "<td>".$row["funding_get"]."</td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                    }
                }

                if(!is_null($club_app)){
                    $sql = "SELECT club_id, club, club_kind, president, office, tel, email, bank, b_account, purpose, introduction, principal, prin_tel, prin_email, check_club FROM club";
            
                    if($result = mysqli_query($link, $sql)){
                        echo "<div class='newww'>";
                        echo "<table class='con'>";
                            echo "<tr>";
                                echo "<th width='10%'>社團名稱</th><th width='7%'>社團類別</th><th width='7%'>社長</th><th width='7%'>社辦</th><th width='7%'>社長手機</th><th width='7%'>社長信箱</th><th width='7%'>銀行</th><th width='7%'>銀行帳戶</th width='7%'><th>創立目標</th><th width='7%'>創立宗旨</th><th width='7%'>負責人</th><th width='7%'>負責人手機</th><th width='7%'>負責人信箱</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                    // echo "<td width='4%'>".$row["club_id"]."</td>";
                                    echo "<td width='10%'>".$row["club"]."</td>";
                                    echo "<td width='7%'>".$row["club_kind"]."</td>";
                                    echo "<td width='7%'>".$row["president"]."</td>";
                                    echo "<td width='7%'>".$row["office"]."</td>";
                                    echo "<td width='7%'>".$row["tel"]."</td>";
                                    echo "<td width='7%'>".$row["email"]."</td>";
                                    echo "<td width='7%'>".$row["bank"]."</td>";
                                    echo "<td width='7%'>".$row["b_account"]."</td>";
                                    echo "<td width='7%'>".$row["purpose"]."</td>";
                                    echo "<td width='7%'>".$row["introduction"]."</td>";
                                    echo "<td width='7%'>".$row["principal"]."</td>";
                                    echo "<td width='7%'>".$row["prin_tel"]."</td>";
                                    echo "<td width='7%'>".$row["prin_email"]."</td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";
                    }
                }

                if(isset($change)){
                    echo "<div class='pass'>";
                    echo "<form action='pw_change.php' method='post'>";
                        echo "舊密碼：       <input type='password'name='password1'> <br />";
                        echo "新密碼：       <input type='password'name='password2'>   <br />";
                        echo "重新輸入新密碼：<input type='password'name='password3'>    <br />";
                        echo "<input type='submit' value='送出'>";
                    echo "</form>";
                    echo "</div>";
                }

                if(isset($message)){
                    echo "<table>";
                    echo "<tr>";
                    echo "<th width='20%'>時間</th><th width='80%'>內容</th>";
                    echo "</tr>";
                    $SQL = "SELECT * FROM message WHERE club='$club'";
                    if($result=mysqli_query($link,$SQL)){
                        while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                            echo "<td>".$row["date"]."</td><td>".$row["message"]."</td>";
                        echo "</tr>";
                        }
                    }              
                    echo "</table>";
                }

                if(!is_null($ana)){
                    echo "<div class='analysis'>";
                
                    //社團登入次數                
                    $sql_login_sum = "SELECT sum(login_count) as tsum FROM account WHERE club!='管理員'";
                    $result = mysqli_query($link, $sql_login_sum);
                    $row = mysqli_fetch_assoc($result);
                    $sum=$row["tsum"];

                    $sql_login_count = "SELECT club, login_count FROM account WHERE club!='管理員'";
                    
                    if($result = mysqli_query($link, $sql_login_count)){
                        echo "<div class='table1'><table border=1>";
                        echo "<tr><th colspan='3'>社團登入次數</th></tr>";
                            echo "<tr>";
                                echo "<th>社團</th><th>登入次數</th><th>比例</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            
                            echo "<tr>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["login_count"]."</td>";
                                echo "<td>".round($row["login_count"]/$sum,2)."</td>";
                            echo "</tr>";
                        }
                    echo "</table></div>";
                    }
                    
                    
                    

                    //各社團社員數量
                    $sql_club = "SELECT count(*) as count, club FROM club_app WHERE check_join = 'Y' GROUP BY club";
                    $sql_total = "SELECT count(*) as count FROM club_app WHERE check_join = 'Y'" ;

                    $sum_member = 0;
                    $result = mysqli_query($link, $sql_total);
                    while($row = mysqli_fetch_assoc($result)){
                        $sum_member += $row["count"];
                    }

                    if($result = mysqli_query($link, $sql_club)){
                        echo "<div class='table2'><table border=1>";
                            echo "<tr><th colspan='3'>各社團社員數量</th></tr>";
                            echo "<tr>";
                                echo "<th>社團</th><th>社員數量</th><th>比例</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>".$row["club"]."</td>";
                                echo "<td>".$row["count"]."</td>";
                                echo "<td>".round($row["count"]/$sum_member,2)."</td>";
                            echo "</tr>";
                        }
                        echo "</table></div>";
                    }

                    //全校學生系統使用比例
                    $sql_login = "SELECT count(*) as count FROM club_app WHERE check_join = 'Y' ";

                    if($result = mysqli_query($link, $sql_login)){
                        echo "<div class='table3'><table border=1>";
                        echo "<tr><th colspan='3'>全校學生系統使用比例</th></tr>";
                            echo "<tr>";
                                echo "<th>全校學生人數</th><th>全部社團人員數</th><th>比例</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>3000</td>";
                                echo "<td>".$row["count"]."</td>";
                                echo "<td>".round($row["count"]/3000,2)."</td>";
                            echo "</tr>";
                        }
                        echo "</table></div>";
                    }

                    //經費比例
                        // 經費申請比例
                        $sum = 0;
                        $sql_app = "SELECT club, count(club) as count FROM money GROUP BY club";
                        $sql_total_app = "SELECT * FROM money";

                        $result = mysqli_query($link, $sql_app);
                        while($row = mysqli_fetch_assoc($result)){
                            $sum += $row["count"];
                        }

                        if($result = mysqli_query($link, $sql_app)){
                            echo "<div class='table4'><table border=1>";
                            echo "<tr><th colspan='3'>經費申請次數</th></tr>";
                                echo "<tr>";
                                    echo "<th>社團</th><th>申請次數</th><th>比例</th>";
                                echo "</tr>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                    echo "<td>".$row["club"]."</td>";
                                    echo "<td>".$row["count"]."</td>";
                                    echo "<td>".round($row["count"]/$sum,2)."</td>";
                                echo "</tr>";
                            }
                            echo "</table></div>";
                        }
                        //所有活動實得經費
                        $sql_act = "SELECT club, act_name, funding_get FROM money WHERE filter = 'Y' ";
                        if($result = mysqli_query($link, $sql_act)){
                            echo "<div class='table5'><table border=1>";
                                echo "<tr><th colspan='3'>所有活動實得經費</th></tr>";
                                echo "<tr>";
                                    echo "<th>社團</th><th>活動名稱</th><th>實得經費</th>";
                                echo "</tr>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                    echo "<td>".$row["club"]."</td>";
                                    echo "<td>".$row["act_name"]."</td>";
                                    echo "<td>".$row["funding_get"]."</td>";
                                echo "</tr>";
                            }
                            echo "</table></div>";
                        }

                        //社團實得經費比例
                        $sum_funding = 0;

                        $sql_fund = "SELECT club, sum(funding_get) as funding FROM money WHERE filter = 'Y' GROUP BY club" ;
                        // $sql_total_fund = "SELECT sum(funding_get) as sum FROM money" ;

                        if($result = mysqli_query($link, $sql_fund)){
                            while($row = mysqli_fetch_assoc($result)){
                                $sum_funding += $row["funding"];
                            }
                        }
                        if($result = mysqli_query($link, $sql_fund)){
                            echo "<div class='table6'><table border=1>";
                                echo "<tr><th colspan='3'>實得經費比例</th></tr>";
                                echo "<tr>";
                                    echo "<th>社團</th><th>實得總經費</th><th>比例</th>";
                                echo "</tr>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                    echo "<td>".$row["club"]."</td>";
                                    echo "<td>".$row["funding"]."</td>";
                                    echo "<td>".round($row["funding"]/$sum_funding,2)."</td>";
                                echo "</tr>";
                            }
                            echo "</table></div>";
                        }
                }
                
                mysqli_close($link);
                echo "<div class='clear'></div>";
           
            
            ?>
        </div>
    </div>

</body>
</html>
      