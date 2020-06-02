<?php 
    session_start();

    //不懂這幹嘛的
    // if(!isset($_SESSION["login"])){
    //     header("Location: no_login/");
    // }

    $account = $_POST["account"];
    $password = $_POST["password"];

    $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');

    $sql_confirm = "SELECT * FROM account WHERE account = '$account' AND password = '$password'";
    $result = mysqli_query($link, $sql_confirm);
    $row = mysqli_fetch_assoc($result);

    if(!is_null($row)){
        
        
        if($row["club"] == "管理員"){
            $_SESSION["adminlogin"] = "success";
            setcookie("admin", $row["club"], time()+3600);
            $sql_count = "SELECT * FROM account WHERE club = '管理員'";
            $count = mysqli_query($link, $sql_count);
            $login_count = mysqli_fetch_assoc($count);

            $x = (int) $login_count["login_count"];
            $x = $x + 1;

            $sql_update = "UPDATE account SET login_count = $x WHERE club = '管理員'";
            $update = mysqli_query($link, $sql_update);
        
            header("Location: administrator/index.php");
        }
        else {
            $_SESSION["userlogin"] = "success";
            setcookie("club", $row["club"], time()+3600);
            $club = $row["club"];
            
            $sql_count = "SELECT * FROM account WHERE club = '$club' ";
            $count = mysqli_query($link, $sql_count);
            $login_count = mysqli_fetch_assoc($count);

            $x = (int) $login_count["login_count"];
            $x = $x + 1;

            $sql_update = "UPDATE account SET login_count = $x WHERE club = '$club'";
            $update = mysqli_query($link, $sql_update);

            header("Location: user/user_info.php");
        }
    }
    else{
        $_SESSION["loginfail"] = "fail";
        header("Location: fail.php");
    }
    
    mysqli_close($link);
?>
