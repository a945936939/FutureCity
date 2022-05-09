<?php
// require_once "config.php";
require_once "mysql.php";
require_once "connection.php";

if(isset($_POST['submit'])){
    // Connect to the database
    $link = $conn;

    // Get username and password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    preg_match("/^[A-Za-z0-9]*$/",$username,$u_match);
    preg_match("/^[A-Za-z0-9]*$/",$username,$p_match);
    if (!$u_match || !$p_match) {
        echo "<script>alert('Please type in letters and numbers');location.href='register.php';</script>";
    }else if(strlen($password) < 4){
        header("Location:register.php");
    };

    
    $username = escape($username);
    // encrypt the password
    $password = hash("sha256",$password);

    $query = "select user_id from user_profile where user_id={$username}";
    $res = execute($link,$query);
    if(!is_null(sqlsrv_fetch_array($res))){
        echo "<script>alert('That account already exists');location.href='register.php';</script>";
        die;
    };


    // create the account
    $query = "insert into user_profile (user_id, date_registered, hashed_password) values({$username}, CURRENT_TIMESTAMP,'{$password}')";
    $res = execute($link,$query);
    if(sqlsrv_num_rows($res) !== 0){
        echo "<script>alert('Your account is created');location.href='index.php';</script>";
    };
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
            <input type="password" placeholder="password" id="password" name="password"/>
            <input type="password" placeholder="confirm the password" id="password_confirm" name="password_confirm"/>
            <button id="create" name="submit" type="submit">Register</button>
            <p class="message">Already have an account?<a href="index.php">Login</a></p>
        </form>
    </div>
</div>

<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $("#create").on('click',function(e){
        let username = $("#user_name").val().trim();
        let password = $("#password").val().trim();
        let password_confirm = $("#password_confirm").val().trim();
        let reg =  /^[A-Za-z0-9]*$/;

        if (username === "" || password === ""){
            e.preventDefault();
            alert('Please type in');
        }else if (password.length < 4){
            e.preventDefault();
            alert('The password is too short');
        }else if(reg.test(username) === false || reg.test(password) === false){
            e.preventDefault();
            alert('Please type in letters and numbers');
        }else if(password !== password_confirm){
            e.preventDefault();
            alert('Please check the password');
            $("#password").val("");
            $("#password_confirm").val("");
        }
    })
</script>
</body>
</html>