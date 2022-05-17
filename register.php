<?php
// require_once "config.php";
require_once "mysql.php";
require_once "connection.php";
   
$link = $conn;

?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
    <!-- <script src="js/jquery-2.1.1.min.js"></script> -->

<!-- 
    <script type="text/javascript">
        // track whether button has been clicked
    
    </script> -->

</head>

<body>
<div id="wrapper" class="register-page">

    <div id="reg_form" class="form">
        <button id="Register" name="submit">Register</button>

        <p id= "uname">Your username:</p>
        
        <p id = "pword">Your password:</p>
      
        <form name ="submit" type = "submit" action="change.php">
            <button type="submit" >Change your password</button>
           
        </form>

        <form name ="submit" type = "submit" action="index.php">
        <button type="submit" >Back to login</button>
        </form>

        <!-- <a herf = ><button id="change" name="submit" type="submit">Change your password</button></a>
        <a herf = "login.php"><button id="login" name="submit" type="submit">Back to login</button></a>  -->

    </div>
</div>




<script type="text/javascript"> 

//  to identify first click of the register button
let first_click = true;

document.getElementById("Register").addEventListener("click", addUser);

// add a user to the database, then display the username and password on the page
function addUser(){

    
    // generate password
    temp_pword = "<?php 
    $pword = rand(1000, 9999);
    $hash_pword = hash("sha256", $pword);

    // insert new user account into database
    $query = "insert into user_profile (user_id, date_registered, hashed_password)
     values (next value for user_id_gen, CURRENT_TIMESTAMP, '{$hash_pword}');";
    $result = sqlsrv_query($link, $query);
    echo ($pword);
    ?>";
    
    // only change elements if it is after the first click
    if(first_click){
    // display password
    document.getElementById("pword").insertAdjacentHTML('beforeend', temp_pword);

    // display username
    document.getElementById("uname").insertAdjacentHTML('beforeend', "<?php 
        $query = "select max(user_id) as 'u_id' from user_profile;";
        $result = sqlsrv_query($link, $query);
        $result = sqlsrv_fetch_array($result)["u_id"];
        echo $result;
    
    ?>");

    // user cannot click button again
    first_click = false;
    };
}

</script>


</body>

</html>