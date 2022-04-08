<form method="get" name="form" action="">
        <input type="text" placeholder="username"  name="username">
        <input type="text" placeholder="password" name="password">
        <input type="submit" value="Submit">
    </form>
    <?php    
    $correctPassword = true;
    $correctUsername = true;

        $username = $_GET['username'];
        $user_password = $_GET['password'];

    

    
    $connectionInfo = array("UID" => "User1", "pwd" => "Project1", "Database" => "gtfsdata", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "lunar-rover.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    // if(isset($username)){
    $sql="select hashed_password from user_profile where  user_id=CAST( ".$username."AS int)";
    $password=sqlsrv_query(
    $conn, $sql);
    $row = sqlsrv_fetch_array($password, MYSQLI_ASSOC);


    // foreach ($row as $value) {
    //     echo "$value <br>";
    //   }
      
    if($user_password==$row[0]){
        header("Location:index1.php");
    }else{
        header("Location:index.php");
    }
    ?>