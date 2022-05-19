<?php
session_start();
require_once("connection.php");
if (
    isset($_GET["user_id"])
&&isset($_GET["transport_id"])&&isset($_GET["user_trip_length"])&&isset($_GET["user_trip_emissions"])


){

// echo $_GET["user_id"];
// echo $_GET["user_trip_start_time"];
// echo $_GET["user_trip_end_time"];
// echo $_GET["transport_id"];
// echo $_GET["user_trip_length"];
// echo $_GET["user_trip_emissions"];

$user_id=$_SESSION['username'];
$duration=intval($_GET['duration']);
$transport_id=$_GET["transport_id"];
$user_trip_length=round(floatval($_GET["user_trip_length"]),4);
$user_trip_emissions=round(floatval($_GET["user_trip_emissions"]),4);
echo $user_trip_emissions;



// $query="insert into user_trip_2 (user_trip_id,  user_id, user_trip_start_time, 
// user_trip_end_time, transport_id, user_trip_length, user_trip_emissions
// ) values (next value for user_trip_seq,".$user_id.",".date('Y-m-d H:i:s',strtotime($user_trip_start_time)).",".date('Y-m-d H:i:s',strtotime($user_trip_end_time)).",".$transport_id.",".$user_trip_length.",".$user_trip_emissions.");";
// echo $user_trip_start_time;

//CURRENT_TIMESTAMP, DATEADD(second,  {$seconds},CURRENT_TIMESTAMP)


// echo strval(date('Y-m-d H:i:s',strtotime("04/05/2022 21:02:53")));
//Y-m-d H:i:s'
//04/05/2022, 23:02:53


//date('Y-m-d H:i:s',strtotime($user_trip_start_time))
$query="insert into user_trip (user_trip_id,  user_id, user_trip_start_time, user_trip_end_time, transport_id, user_trip_length, user_trip_emissions) values (next value for user_trip_seq,".$user_id.",CURRENT_TIMESTAMP, DATEADD(second, ".$duration.",CURRENT_TIMESTAMP),".$transport_id.",".$user_trip_length.",".$user_trip_emissions.");";
echo "query is here";
$result = sqlsrv_query($conn,$query) ;

if (!$result) { //if result is NOT true
    echo 'FAIL'; //it failed
}
else { //otherwise
    echo 'It worked BABY!'; //it did NOT fail
}


echo $result;
// echo date('Y-m-d H:i:s',strtotime($user_trip_end_time));
echo $query;
}


require_once("update_achievements.php");

?>