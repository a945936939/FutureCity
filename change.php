<?php
// require_once "inc/config.php"; 
require_once "mysql.php";
require_once "connection.php";

if(isset($_POST['submit'])){
    // connect to the database
    $link = $conn;

    // get the user input
    $username = escape(trim($_POST['username']));
    $OldPassword = hash("sha256",trim($_POST['OldPassword']));
    $NewPassword = hash("sha256",trim($_POST['NewPassword']));

    $query = "select user_id, hashed_password from user_profile where user_id={$username} and hashed_password='{$OldPassword}'";
    $res = execute($link,$query);

    if(is_null(sqlsrv_fetch_array($res))){
        echo "<script>alert('Account does not exist');location.href='change.php';</script>";
        die;
    }

    $query = "update user_profile set hashed_password='{$NewPassword}' where user_id={$username}";
    $res = execute($link,$query);
    if(sqlsrv_num_rows($res) !== 0){
        echo "<script>alert('Your password is changed');location.href='index.php';</script>";
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
<div id="wrapper" class="login-page">
    <div id="login_form" class="form">
        <form action="" class="login-form" method="post">
            <input type="text" placeholder="username" id="user_name" name="username"/>
            <input type="password" placeholder="old password" id="OldPassword" name="OldPassword"/>
            <input type="password" placeholder="new password" id="NewPassword" name="NewPassword"/>
            <button id="change" type="submit" name="submit">Change</button>
            <p class="message">Want an account? <a href="/register.php">Register</a></p>
        </form>
    </div>
</div>

<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    function check_login(){
        $("#login_form").removeClass('shake_effect');
        setTimeout(function() {
            $("#login_form").addClass('shake_effect')
        },1);
    }

    $("#change").on('click',function(e){
        let username = $("#user_name").val().trim();
        let OldPassword = $("#OldPassword").val().trim();
        let NewPassword = $("#NewPassword").val().trim();
        let reg =  /^[A-Za-z0-9]*$/;

        if (username === "" || OldPassword === "" || NewPassword === ""){
            e.preventDefault();
            alert('Please type in the information');
        }else if (OldPassword.length < 4 || NewPassword.length < 4){
            e.preventDefault();
            alert('The password is too short');
        }else if(reg.test(username) === false || reg.test(OldPassword) === false || reg.test(NewPassword) === false){
            e.preventDefault();
            alert('Please type in letters and numbers');
        }else if (OldPassword === NewPassword){
            e.preventDefault();
            alert('The new password cannot be the same with the old one');
        }
    })
</script>
</body>
</html>