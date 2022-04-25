<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <Title>Register Page</title>

    </head>

    <body>
        <h1>Refister/login<br></h1>
        <?php
        $username=$password="";
        $usererr=$passwderr=$checkerr="";
        $check="";

        function str_input($str)
        {
            //exclude the space;
            $str=trim($str);
            //turn the char into html
            $str=htmlspecialchars($str);
            return $str;

        }

        if ($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(empty($_POST["username"]))
            {
                $usererr="Please tell us your name";
            }
            else
            {
                $username=str_input($_POST["username"]);
                //make sure the username only could be numbers and letters
                if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
                {
                    $usererr="please input the numbers and letters";
                }

            }
            if (empty($_POST["password"]))
            {
                $passwderr="Please tell us your password";
            }
            else
            {
                $password=str_input($_POST["password"]);
                if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
                {
                    $passwderr="please input the numbers and letters";
                }
            }
            if(empty($_POST["check"]))
            {
                $checkerr="Please choose the type";
            }
            else
            {
                $check=str_input($_POST["check"]);
            }

        }
        ?>

        <h2>Register/Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        username:<input type="text" name="username" value="<?php echo $username;?>">
            <span class="error"><?php echo $usererr;?></span>
            <br><br>
        password:<input type="password" name="password" value="<?php echo $password;?>">
            <span class="error"><?php echo $passwderr;?></span>
            <br><br>
            Register/Login: 
            <input type="radio" name="check" <?php if (isset($check) && $check=="register") echo "checked";?> value="register">Register
            <input type="radio" name="check" <?php if (isset($check) && $check=="login") echo "checked";?> value="register">Login
            <span class="error"><?php echo $checkerr;?></span>
            <br><br>
            <input type="submit" name="submit" value="submit">

    </form>

    
    </body>
</html>
