<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入失敗</title>
    <link rel="stylesheet" href="fail.css">
</head>
<body>
<?php
    session_start();

    if(isset($_SESSION["loginfail"])){
        echo "<div class='fail'>";
        echo "<p>Login failed ! </p>";
        unset ($_SESSION["loginfail"]);
        echo "<a href='no_login/'>Back to index page</a>";
        echo "</div>";
    }
    else{
        echo "<div class='yes'>";
        echo "<p>Illegal access to webpage! </p>";
        echo "<a href='no_login/'>Back to login page</a>";
        echo "</div>";
    }
?>
</body>
</html>
