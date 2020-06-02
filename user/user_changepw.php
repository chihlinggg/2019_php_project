<?php
    session_start();

    if(!isset($_SESSION["userlogin"])){
        header("Location: ../no_login/");
    }

    $password_old = $_POST["password1"];
    $password_new = $_POST["password2"];
    $password_confirm = $_POST["password3"];
    
    $link = mysqli_connect('localhost', 'root', 'S123123S','php_project');

    $identity = $_COOKIE["club"];

    $sql_password = "SELECT password FROM account WHERE club = '$identity'";
    $result = mysqli_query($link, $sql_password);
    $row = mysqli_fetch_assoc($result); 

    

    if($password_old != $password_new && $row["password"] == $password_old && $password_new == $password_confirm){
        $sql_update = "UPDATE account SET password='$password_new' WHERE club = '$identity'";
        $result = mysqli_query($link, $sql_update);
        echo "<script>alert('修改成功！！')</script>";
        header("refresh:0 ; url=user_info.php");
    }
    else if($row["password"] == $password_old && $password_new != $password_confirm){
        echo "<script>alert('密碼重新輸入錯誤，請重新修改')</script>";
        header("refresh:0 ; url=user_info.php");
    }
    else{
        echo "<script>alert('舊密碼輸入錯誤，請重新修改')</script>";
        header("refresh:0 ; url=user_info.php");
    }
    
    mysqli_close($link);
?>