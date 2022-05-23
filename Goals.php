<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("connection.php");
// include 'header.html';


if(isset($_GET['login'])){
  echo "<script>alert('Please login');location.href='login.php';</script>";
};

$username = $_SESSION['username'];
// include "./header.html";

$start_date = date('Y-m-d H:i:s', strtotime('last monday'));


$end_date = strtotime('next sunday');
$end_date = strtotime('+23 hours', $end_date);
$end_date = strtotime('+59 minutes', $end_date);
$end_date = date('Y-m-d H:i:s',strtotime('+59 seconds', $end_date));


//  user contribution 

$query="select sum(user_trip_length) as 'total_length'
from user_trip
where user_trip_start_time between '{$start_date}' and '{$end_date}'
and user_id = {$username};";

$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result)["total_length"];

if(is_null($row)){
  $user_travel_distance = 0;
} else {
  $user_travel_distance=$row;
}


  $query="select sum(user_trip_emissions) as 'total_emissions'
  from user_trip
  where user_trip_start_time between '{$start_date}' and '{$end_date}'
  and user_id = {$username};";
  $result = sqlsrv_query($conn,$query);
  $row = sqlsrv_fetch_array($result)["total_emissions"];

  if(is_null($row)){
    $user_total_emissions = 0;
  }else{
    $user_total_emissions=$row;
  }

  

$query="select count(*) as 'long_travel'
  from user_trip
  where user_trip_start_time between '{$start_date}' and '{$end_date}'
  and user_trip_length > 7
  and user_id = {$username};";
  $result = sqlsrv_query($conn,$query);

  $row = sqlsrv_fetch_array($result)['long_travel'];
  if(is_null($row)){
    $user_counts = 0;
  }else{
    $user_counts = $row;
  }


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/goals.css">
    <link rel="stylesheet" href="./assets/css/goals.scss">
    <link rel="stylesheet" type="text/css" href="assets/css/loading-bar.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="./js/echarts.min.js"></script>

    <title>Goals</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

        <div class="nav">
            <header>
            <?php

include "header.html";

?>
            </header> 
         </div> 

         
          <div class="banner">
            <div class="contain-box reactive">
                <div class="title" data-aos="fade-down" style="font-family: YouSheBiaoTiHei; font-size:90px;">
                    Goals
                </div>
                <div class="sub-title" data-aos="fade-up"style="font-family: YouSheBiaoTiHei;font-size:40px;">
                    Take part in collaborative goals<br> All users contribute to a shared goal<br>
                    Collaborative goals will be reset on <br>
                    <?php
                    echo explode(" ",$end_date)[0];?>
                </div>
            </div>
        </div>
        

    <div class="block-item" id="block1">
          <div class="gradient-border" id="box" >
              <div class="ldBar"
                  style="width:100%;height:200px;margin-top:0px;margin-bottom:120px",
                  data-stroke="data:ldbar/res,gradient(0,10,#9df,#9fd,#df9,#fd9)",
                  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
                  data-value="
                  <?php 
                  $query="select sum(user_trip_length) as 'total_length'
                  from user_trip
                  where user_trip_start_time between '{$start_date}' and '{$end_date}';";
                $result = sqlsrv_query($conn,$query);
                $row = sqlsrv_fetch_array($result);
                $travel_distance=$row["total_length"];
                echo round($travel_distance/10,2);
                ?>">

              <p id = "goal-title" style="font-family: YouSheBiaoTiHei;">Travel 1000km in total</p>

              </div>
              <p id = "goal-title" style="font-family: YouSheBiaoTiHei;">Your Contribution: <?php echo round($user_travel_distance,2)." Km"; ?></p>

          </div>
    </div>
</div>
        <!-- goal 2 -->
        <div class="block-item" id="block2">
            <div class="gradient-border" id="box" >
                <div class="ldBar"
                style="width:100%;height:200px;margin-top:0px;margin-bottom:120px",
                  data-stroke="data:ldbar/res,gradient(0,10,#9df,#9fd,#df9,#fd9)",,
                  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
                  data-value="
                  <?php 
                  $query="select sum(user_trip_emissions) as 'total_emissions'
                  from user_trip
                  where user_trip_start_time between '{$start_date}' and '{$end_date}';";
                  $result = sqlsrv_query($conn,$query);
                $row = sqlsrv_fetch_array($result);
                $total_emissions=$row["total_emissions"];
                echo round($total_emissions/1000,2);
                  ?>">
                <p id = "goal-title" style="font-family: YouSheBiaoTiHei;">Total Carbon emission reduction:<br> 25000 Kg </p>
            </div>
          <p id = "goal-title" style="font-family: YouSheBiaoTiHei;">Your Contribution: <?php echo round($user_total_emissions/1000,2)." Kg C02"; ?></p>
        </div>
  </div>

    <!-- goal 3 -->
    <div class="block-item" id="block3">

      <div class="gradient-border" id="box">

        <div class="ldBar"
              style="width:100%;height:200px;margin-top:0px;margin-bottom:120px",
              data-stroke="data:ldbar/res,gradient(0,10,#9df,#9fd,#df9,#fd9)",
              data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
              data-value="
              <?php 
              $query = "select count(*) as 'long_travel'
              from user_trip
              where user_trip_start_time between '{$start_date}' and '{$end_date}'
              and user_trip_length > 7;
              ";
            $result = sqlsrv_query($conn,$query);
            $row = sqlsrv_fetch_array($result);
            $counts=$row["long_travel"];
              echo $counts*5;
          ?>"> 
            <p id = "goal-title" style="font-family: YouSheBiaoTiHei;">Long distance travel (more than 7 km) in public transport 20 times in total</p>
        </div>
          <p id = "goal-title" style="font-family: YouSheBiaoTiHei;">Your Contribution: <?php echo $user_counts." Trips";?></p>

      </div>

    </div>

  </div>

  <?php include 'footer.html'; ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {

            },
            mounted(){
                AOS.init()
            },
        })
    </script>
</body>
<script src="./assets/js/loading-bar.min.js"></script>

</html>