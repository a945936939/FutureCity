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
    <link rel="stylesheet" type="text/css" href="loading-bar.css"/>
</head>

<body >
<header class="masthead" style="background-image: url('assets/img/header4.jpg')">

<?php
$query="select t.transport_type, count(*) as 'number_of_trips'
from user_trip_2 u join transport t on u.transport_id = t.transport_id
where user_id = 1234
group by t.transport_type
Order by t.transport_type;";

$result = sqlsrv_query($conn,$query);
 


include "./header.html"

?>
  </header>

<div class="row">



<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
  <!-- <img class="card-img-top" src="/assets/img/card1.jpg" alt="Card image cap">
 -->

 <div
class="ldBar"
  data-type="fill"
  data-img="./assets/img/card1.jpg"
  data-img-size="398,398"
  data-value="50";
  style="margin-bottom:10rem"
></div>
  <div class="card-body">
    <h5 class="card-title"> Bus man Lv.1</h5>
    <p class="card-text">Catch Bus 10 times</p>
</div>
    <!-- <div class="ldBar"
  style="width:100%;height:10rem;",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
$row = sqlsrv_fetch_array($result);
$bus_trips=$row["number_of_trips"];
  echo $bus_trips*10;
  ?> 
  "
></div> -->

<!-- <div class="ldBar"style="width:100%;height:10rem;"
 data-value="
 
 <?php 
$row = sqlsrv_fetch_array($result);
$bus_trips=$row["number_of_trips"];
  echo $bus_trips*10;
  ?>
 ">
</div> -->

  </div>
</div>




<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
  <img class="card-img-top" src="/assets/img/card2.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> Car man Lv.1</h5>
    <p class="card-text">Catch Car 10 times</p>
</div>
    <div class="ldBar"
  style="width:100%;height:10rem;",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
$row = sqlsrv_fetch_array($result);
$bus_trips=$row["number_of_trips"];
  echo $bus_trips*10;
  ?>
  "
></div>
  </div>
</div>




<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
  <img class="card-img-top" src="/assets/img/card3.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> Train man Lv.1</h5>
    <p class="card-text">Catch Train 10 times</p>
</div>
    <div class="ldBar"
  style="width:100%;height:10rem;",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
$row = sqlsrv_fetch_array($result);
$train_trips=$row["number_of_trips"];
  echo $train_trips*10;
  ?>
  "
></div>
  </div>
</div>


<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
  <img class="card-img-top" src="/assets/img/card4.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> Tram man Lv.1</h5>
    <p class="card-text">Catch Train 10 times</p>
</div>
    <div class="ldBar"
  style="width:100%;height:10rem;",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
$row = sqlsrv_fetch_array($result);
$tram_trips=$row["number_of_trips"];
  echo $tram_trips*10;
  ?>
  "
></div>
  </div>
</div>

<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
  <img class="card-img-top" src="/assets/img/card5.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> Travel King</h5>
    <p class="card-text">Travel 1000 km</p>
</div>
    <div class="ldBar"
  style="width:100%;height:10rem;",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="
  <?php 
  $query="select sum(user_trip_length) as 'distance_travelled'
  from user_trip_2
  where user_id = 1234;";
  $result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$total_distance=$row["distance_travelled"];
  echo $total_distance;
  ?>
  "
></div>
  </div>
</div>




</div>

</body>
<script src="assets/js/loading-bar.min.js"></script>

</html>

