
<?php    
session_start();
            //Connect the database
require_once("connection.php");
                    if(isset($_POST['userSub'])){
                        $uname = $_POST["username"];
                        $password =$_POST["password"];
                        if ($uname != "" && $password != ""){
                            $sql_query = "select count(*) as cntUser
                            from user_profile 
                            where user_id = cast(".$uname." as int) and hashed_password = ".$password."";
                            $result = sqlsrv_query($conn,$sql_query);
 
                                $row = sqlsrv_fetch_array($result);
                    
                                $count = $row['cntUser'];
                        
                                if($count > 0){
                                    $_SESSION['username']=$uname;
                                    $_SESSION['password']=$password;
                                    header('Location: Home.php');
                                    die();
                                }
                            }
                          
                    
                        }
                    
                    ?>
<!DOCTYPE html>
<head></head>
<form method="POST"  action="" >
        <input type="number" placeholder="username"  name="username">
        <input type="text" placeholder="password" name="password">
        <input type="submit" value="Submit" name="userSub" id="userSub">
    </form>

          

    </html>

      

    



