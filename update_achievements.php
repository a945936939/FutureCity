<!-- -- update achievements .php -->
<?php
session_start();


if(isset($_GET['login'])){
  echo "<script>alert('Please login');location.href='login.php';</script>";
};



$username = $_SESSION["username"];


// generic insert into achievement_record statement
include "connection.php";


//  create achievement records if none are present for a user

// number of achievements stored for a user
$query = "select count(*) as count from achievement_record where user_id ={$username};";
$result = sqlsrv_query($conn,$query);

// //  if there are no achievements: create empty achievements
if(sqlsrv_fetch_array($result)["count"] == 0){
  for($i=0; $i <= 25; $i++){

    #insert empty/uncompleted achievement for specified user
    $insert_query = "insert into achievement_record (achievement_id, user_id, record_progress, record_date_completed, record_opened, achievement_completed) values
     ({$i},{$username},0,CURRENT_TIMESTAMP,0,0);";
    
    $result = sqlsrv_query($conn,$insert_query);
  };
};

// update achievement progress
function update_progress($username, $ach_id, $conn, $progress, $ach_max, $completed, $update_val){
    // check progress of achievement
  // if achievement not done (and value progress is not the same as before)
  if(($update_val < 100)&&($update_val != $progress) && $completed == 0){
    $update_query = "update achievement_record 
    set record_progress =".$update_val.", 
      achievement_completed = 0 
    where user_id={$username} and achievement_id={$ach_id}";
    $update_result = sqlsrv_query($conn,$update_query);

    echo "\n{$ach_id}:\n".$update_val;
  // if achievement is completed
  }elseif( ($update_val >= 100 || $completed == 0 ) && $update_val != $progress){
    $update_query = "update achievement_record 
    set record_progress =100, 
      achievement_completed = 1
    where user_id={$username} and achievement_id={$ach_id}";
    $update_result = sqlsrv_query($conn,$update_query);
    echo "\n{$ach_id} comp :\n".$update_val;
  }
}

// find number of pt trips
$query="select count(*) as 'number_of_trips', a.achievement_id, a.achievement_maximum, r.achievement_completed, r.record_progress
from (user_trip u join achievement_record r on u.user_id = r.user_id) join achievement a on a.achievement_id = r.achievement_id
where u.user_id = {$username} and a.achievement_id between 1 and 5
group by a.achievement_id, a.achievement_maximum, r.achievement_completed, r.record_progress
order by a.achievement_id;";
$result = sqlsrv_query($conn,$query);

// update achievements 1-5
for($i=1;$i<=5;$i++){
  $row = sqlsrv_fetch_array($result);

  $num_trips = $row['number_of_trips'];
  $ach_id = $row['achievement_id'];
  $ach_max = $row['achievement_maximum'];
  $progress = $row['record_progress'];
  $completed = $row['achievement_completed'];

  $update_val = round($num_trips/$ach_max * 100,2);

// check progress of achievement
// if achievement not done (and value progress is not the same as before)
  update_progress($username, $ach_id, $conn, $progress, $ach_max, $completed, $update_val);
}


//  find distance travelled via public transport 
$query = "select sum(user_trip_length) as 'trip_length',
 sum(user_trip_emissions) as 'total_emissions',
 sum(DATEDIFF(minute, user_trip_start_time, user_trip_end_time )) as 'total_time'
from user_trip where user_id={$username} and transport_id = 2;";

$result = sqlsrv_query($conn,$query);

$row = sqlsrv_fetch_array($result);


$length = $row['trip_length']; // distanxce travelled on public transport
$emissions = $row['total_emissions']/1000; // total emissions from public transport
$total_time = $row['total_time']/60; // total time on public transport

// check user progress
$query="select a.achievement_id, a.achievement_maximum, r.achievement_completed, r.record_progress
from achievement_record r join achievement a on a.achievement_id = r.achievement_id
where r.user_id = {$username} and a.achievement_id between 6 and 25
group by a.achievement_id, a.achievement_maximum, r.achievement_completed, r.record_progress
order by a.achievement_id;";

$result = sqlsrv_query($conn,$query);


// find number of consecutive days the user has used the app-- Reference: Code Adapted from: https://blog.jooq.org/how-to-find-the-longest-consecutive-series-of-events-in-sql/
// Reference: Code Adapted from: https://blog.jooq.org/how-to-find-the-longest-consecutive-series-of-events-in-sql/

$query_ach_5 = "WITH
  -- This table contains all the distinct date 
  -- instances in the data set
  dates(date) AS (
    SELECT DISTINCT cast(user_trip_start_time as date)
    FROM user_trip
    WHERE user_id = {$username}
  ),
   
  -- Generate 'groups' of dates by subtracting the
  -- date's row number (no gaps) from the date itself
  -- (with potential gaps). Whenever there is a gap,
  -- there will be a new group

  groups AS (
    SELECT
      ROW_NUMBER() OVER (ORDER BY date) AS rn,
      dateadd(day, -ROW_NUMBER() OVER (ORDER BY date), date) AS grp,
      date
    FROM dates
  )
SELECT
  COUNT(*) AS consecutiveDates
FROM groups
GROUP BY grp
having count(*) > 1
ORDER BY 1 DESC;";

$result_ach_5 = sqlsrv_query($conn,$query_ach_5);

$consecutive_days = sqlsrv_fetch_array($result_ach_5)['consecutiveDates'];

// update achievements 6-25
for($i=6;$i<=25;$i++){

  $row = sqlsrv_fetch_array($result);
  $ach_id = $row['achievement_id'];
  $ach_max = $row['achievement_maximum'];
  $progress = $row['record_progress'];
  $completed = $row['achievement_completed'];

  #set the value of progress made (depending on achievement)
  if($i < 11){
    $update_val = round($emissions/$ach_max * 100,0);
  }elseif (11<=$i && $i<16){
    $update_val = round($length/$ach_max * 100,0);
  } elseif(16<=$i && $i<21) {
    $update_val = round($total_time/$ach_max * 100,0);
  } elseif(21<=$i && $i<26){
    $update_val = $consecutive_days/$ach_max * 100;
  } else { 
    echo "something has gone very wrong";
  }

  update_progress($username, $i, $conn, $progress, $ach_max, $completed, $update_val);

}



  ?>