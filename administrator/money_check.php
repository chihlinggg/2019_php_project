<?php
    session_start();

    if(!isset($_SESSION["adminlogin"])){
      header("Location: ../no_login/");
    }else{
      $club = $_COOKIE["admin"];
    }

    $link = mysqli_connect('localhost', 'root', '123456','php_project');

    $act_id = $_POST["act_id"];
    $funding_get = $_POST["funding_get"];
    $filter = "Y";

    $sql_update = "UPDATE money SET funding_get='$funding_get', filter='$filter' WHERE act_id = $act_id";

    $result = mysqli_query($link, $sql_update);

    header("Location:./index.php?funding_record=經費審核記錄#yo");

    mysqli_close($link);
?>
