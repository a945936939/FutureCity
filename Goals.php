<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("connection.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/Goals.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loading-bar.min.css"/>
    <script src="./js/echarts.min.js"></script>

    <title>Goals</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

        <div class="nav">
            <header>
            <?php
// require_once("connection.php");

include "./header.html"

?>
            </header>
        </div>

         
          <div class="banner">
            <div class="contain-box reactive">
                <div class="title" data-aos="fade-down" style="font-family: YouSheBiaoTiHei; font-size:90px;">
                    Pic3 Public Transport
                </div>
                <div class="sub-title" data-aos="fade-up"style="font-family: YouSheBiaoTiHei;">
                    Clickon the icon Go to that row
                </div>
            </div>
        </div>
        <div class="blocks" >




    <div class="contain-box reactive" style="height:100px;">
                <div class="title" data-aos="fade-down" style="font-family: YouSheBiaoTiHei;">
                Weekly Global Goals
                </div>
                <div class="sub-title" data-aos="fade-up"style="font-family: YouSheBiaoTiHei;">
                This is the shared objectives that every user is participating
                </div>
            </div>










<div class="gradient-border" id="box" >
<div class="ldBar"
  style="width:100%;height:200px;margin-top:0px;margin-bottom:120px",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
  $query="select sum(user_trip_length) as 'total_length'
  from user_trip
  where user_trip_start_time between DATEADD(day, -14, GETDATE()) AND GETDATE();";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$travel_distance=$row["total_length"];
echo $travel_distance;
?>
"
> <p style="font-family: YouSheBiaoTiHei;">Travel 100km in total</p>
<?php
// echo $row["total_length"];
?>
</div>
</div>
<div class="gradient-border" id="box" >
<div class="ldBar"
style="width:100%;height:200px;margin-top:0px;margin-bottom:120px",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
  $query="select sum(user_trip_emissions) as 'total_emissions'
  from user_trip
  where user_trip_start_time between DATEADD(day, -14, GETDATE()) AND GETDATE();";
  $result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$total_emissions=$row["total_emissions"];
echo $total_emissions/100000;
  ?>"
 >
 <p style="font-family: YouSheBiaoTiHei;">Carbon emission reduction in total 25000
</p>
</div></div>
<div class="gradient-border" id="box">
<div class="ldBar"
style="width:100%;height:200px;margin-top:0px;margin-bottom:120px",
  data-stroke="data:ldbar/res,gradient(0,1,#7he,#7ld,#7e5,#ed5)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
  $query="select count(*) as 'long_travel'
  from user_trip
  where user_trip_start_time between DATEADD(day, -14, GETDATE()) AND GETDATE()
  and user_trip_length > 7000;
  ";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$counts=$row["long_travel"];
  echo $counts;
  ?>
  "
> <p style="font-family: YouSheBiaoTiHei;">Long distance travel (more than 7 km) in public transport 20 times in total</p>
</div>
</div>




        </div>

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
<script src="assets/js/loading-bar.min.js"></script>

</html>