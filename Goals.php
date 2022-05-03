<!DOCTYPE html>
<html>
<?php session_start();
require_once("connection.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arizonia&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/Update1-Coming-Soon-Site.css">
    <link rel="stylesheet" href="Goals.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loading-bar.min.css"/>
</head>

<body >
<header class="masthead" style="background-image: url('assets/img/Tram_Home.jpg')">

<?php
$connectionInfo = array("UID" => "User1", "pwd" => "Project1", "Database" => "gtfsdata", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "lunar-rover.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

include "./header.html"

?>

</header>

<div class="row">
      <div class="col-md-10 col-lg-8 mx-auto position-relative">
        <div class="site-heading">
          <h1>Weekly Global Goals</h1>
          <span class="subheading"
            >This is the shared objectives that every user is participating
          </span>
        </div>
      </div>
    </div>
<div class="border" >
<div class="ldBar"
  style="width:100%;height:200px;margin-top:100px;margin-bottom:100px",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  
  <?php 
  $query="select sum(user_trip_length) as 'total_length'
  from user_trip_2
  where user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";
  
  $result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$travel_distance=$row["total_length"];
  echo $travel_distance/1000;
  ?>
  "
>Travel 100km in total</div>
</div>
<div class="border" >
<div class="ldBar"
  style="width:100%;height:200px; margin-top:100px;margin-bottom:100px",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
  $query="select sum(user_trip_emissions) as 'total_emissions'
  from user_trip_2
  where user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";
  
  $result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$total_emissions=$row["total_emissions"];
  echo $total_emissions/100000;
  ?>
  "
  <!-- data-unit="Kg" -->
Carbon emission reduction in total 25000
</div></div>
<div class="border" >
<div class="ldBar"
  style="width:100%;height:200px; margin-top:100px;margin-bottom:100px",
  data-stroke="data:ldbar/res,gradient(0,1,#7he,#7ld,#7e5,#ed5)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
  $query="select count(*) as 'long_travel'
  from user_trip_2
  where user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()
  and user_trip_length > 7000;
  ";
  
  $result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$counts=$row["long_travel"];
  echo $counts;
  ?>
  "
  
>Long distance travel (more than 7 km) in public transport 20 times in total
</div>
</div>

</body>
<script src="assets/js/loading-bar.min.js"></script>

</html>