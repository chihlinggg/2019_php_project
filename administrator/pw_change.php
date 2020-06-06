<?php
    session_start();

    if(!isset($_SESSION["adminlogin"])){
      header("Location: ../no_login/");
    }else{
      $club = $_COOKIE["admin"];
    }
    
    $password_old = $_POST["password1"];
    $password_new = $_POST["password2"];
    $password_confirm = $_POST["password3"];
    $club = $_COOKIE["admin"];

    $link = mysqli_connect('localhost', 'root', '123456','php_project');

    $sql_password = "SELECT password FROM account WHERE club = '$club'";
    $result = mysqli_query($link, $sql_password);
    $row = mysqli_fetch_assoc($result);

    if($password_old != $password_new && $row["password"] == $password_old && $password_new == $password_confirm){
      $sql_update = "UPDATE account SET password='$password_new' WHERE club = '$club'";
      $result = mysqli_query($link, $sql_update);
      echo "<script>alert('修改成功！！')</script>";
      header("refresh:0 ; url=index.php?change=變更密碼");
    }
    else if($row["password"] == $password_old && $password_new != $password_confirm){
        echo "<script>alert('密碼重新輸入錯誤，請重新修改')</script>";
        header("refresh:0 ; url=index.php?change=變更密碼");
    }
    else{
        echo "<script>alert('舊密碼重新輸入錯誤，請重新修改')</script>";
        header("refresh:0 ; url=index.php?change=變更密碼");
    }

    mysqli_close($link);
?>
    
      
