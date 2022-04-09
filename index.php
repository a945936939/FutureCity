<!DOCTYPE html>
<?php

session_start();
?>
<head></head>
<form method="POST"  action="" >
        <input type="number" placeholder="username"  name="username">
        <input type="text" placeholder="password" name="password">
        <input type="submit" value="Submit" name="userSub" id="userSub">
    </form>
    <?php    
            //Connect the database
            $connectionInfo = array("UID" => "User1", "pwd" => "Project1", "Database" => "gtfsdata", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
            $serverName = "lunar-rover.database.windows.net,1433";
            $conn = sqlsrv_connect($serverName, $connectionInfo);
                    if(isset($_POST['userSub'])){

                        $uname = $_POST["username"];
                        $password =$_POST["password"];
                    
                        if ($uname != "" && $password != ""){
                    
                            $sql_query = "select count(*) as cntUser
                            from user_profile 
                            where user_id = cast(".$uname." as int) and hashed_password = ".$password."";
                            $result = sqlsrv_query($conn,$sql_query);
                            if($result!=false){
                                $row = sqlsrv_fetch_array($result);
                    
                                $count = $row['cntUser'];
                        
                                if($count > 0){
                                    $_SESSION['uname'] = $uname;
                                    header('Location: index1.php');
                                }else{
                                    header('Location: index.php');  
                            }
                          }
                    
                        }
                    
                    }



                    
                    ?>



                    <?php


                        



                

                    ?>



                

    </html>

      

    



