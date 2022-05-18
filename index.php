<?php
// require_once "inc/config.php";
session_start();
require_once "mysql.php";
require_once "connection.php";

if(isset($_GET['login'])){
    echo "<script>alert('Please login');location.href='login.php';</script>";
};

if(isset($_POST['submit'])){
    // connect to the database
    $link = $conn;

    // Get the user input
    $username = intval(escape(trim($_POST['username'])));
    // encrypt the pwd
    $password = hash("sha256",trim($_POST['password']));

    // verify pwd
    $query = "select user_id from user_profile where user_id= {$username} and hashed_password='{$password}'";
    $res = execute($link,$query);

    // Wrong pwd
    global $bool;
    if(is_null(sqlsrv_fetch_array($res))){
        $GLOBALS['bool'] = true;
    }else{
        // if the pwd is correct, start session
        $_SESSION['username'] = $username;
        // jump to the homepage
        header("Location: home.php");
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
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
<div id="wrapper" class="login-page">
    <div id="login_form" class="form">
        <form action="" class="login-form" method="post">
            <input type="text" placeholder="username" id="user_name" name="username"/>
            <input type="password" placeholder="password" id="password" name="password"/>
            <button id="login" type="submit" name="submit">Login</button>
            <p class="message">Want to get an account?<a href="/register.php">Register</a></p>
            <p class="message">Want to change your password? <a href="/change.php">Change Password</a></p>
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
    <?php if($GLOBALS['bool']){ echo "check_login()";} ?>

    $("#login").on('click',function(e){
        let username = $("#user_name").val().trim();
        let password = $("#password").val().trim();
        let reg =  /^[A-Za-z0-9]*$/;

        if (username === "" || password === ""){
            e.preventDefault();
            alert('Please type in the information');
        }else if (password.length < 4){
            e.preventDefault();
            alert('The password is wrong');
        }else if(reg.test(username) === false || reg.test(password) === false){
            e.preventDefault();
            alert('Please type in letters and numbers');
        }
    })

</script>
</body>
</html>