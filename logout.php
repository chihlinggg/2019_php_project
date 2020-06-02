<?php
    session_start();

    $cookie = $_GET["cookie"];
    
    
        if($cookie == "管理員"){
            setcookie("admin", "", time()-3600);
            unset($_SESSION["adminlogin"]);
            header("Location: no_login/");
        }else{
            setcookie("club", "", time()-3600);
            unset($_SESSION["userlogin"]);
            header("Location: no_login/");
        }
    
    
    

    
?>