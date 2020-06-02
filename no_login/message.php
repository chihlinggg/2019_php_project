<?php
    $link = @mysqli_connect('localhost','root', 'S123123S','php_project');
    
    $club=$_POST["club"];
    $message=$_POST["message"];
    date_default_timezone_set("Asia/Shanghai");
    $date=date("Y/m/d");
    if(isset($message)){
        //新增
        $SQLCreate="INSERT into message(club,message,date) VALUES ('$club','$message','$date')";
        $result=mysqli_query($link,$SQLCreate);
        echo "<script>alert('留言成功!!')</script>";
        header("refresh:0 ; url=index.php");
        
    }

?>