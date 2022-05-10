<!DOCTYPE html>
<html>
<?php session_start();

$username = $_SESSION['username'];

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

 


include "./header.html";
// Achievement TRAINING complete  
$query_Training_complete="select count(*) as 'number_of_trips' from user_trip_2 where user_id = 1234 and transport_id = 1;";
$result = sqlsrv_query($conn,$query_Training_complete);
$row = sqlsrv_fetch_array($result);
$train_achievement=$row["number_of_trips"];
  
  
// Achievement BUSted 
$query="select count(*) as 'number_of_trips'
from user_trip_2
where user_id = 1234 and transport_id = 3;";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$bus_achievement=$row["number_of_trips"];

// Achievement The Trolley Problem 

$query="select count(*) as 'number_of_trips'
from user_trip_2
where user_id = 1234 and transport_id = 2;";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$tram_achievement=$row["number_of_trips"];

// Achievement Greenhouse Gasses are CARcinogenic :p lv.1 
$query="select t.transport_type, sum(user_trip_length) as 'total_length'
from user_trip_2 u join transport t on u.transport_id = t.transport_id
where user_id = 1234
group by t.transport_type
order by t.transport_type;";
$result = sqlsrv_query($conn,$query);
$bus = sqlsrv_fetch_array($result)['total_length'];
$train = sqlsrv_fetch_array($result)['total_length'];
$tram = sqlsrv_fetch_array($result)['total_length'];
$total_distance=($bus+$train+$tram);
$car_emissions=$total_distance*243.8;
$public_emissions=($train*28.6+$bus*20.2+$tram*17.7);
$emission_achievement=(($car_emissions-$public_emissions)/2500);
// Achievement Sisterhood of the Travelling App 
$query="select sum(user_trip_length) as 'distance travelled'
from user_trip_2
where user_id = 1234;";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$travel_achievement=$row["distance travelled"];

?>
  </header>

<div class="row">


<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
 <div
class="ldBar"
  data-type="fill"
  data-img="./assets/img/card1.jpg"
  data-img-size="398,398"
  data-value="

  <?php 
$query="select count(*) as 'number_of_trips'
from user_trip_2
where user_id = ".$username." and transport_id = 1;";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$array=$row["number_of_trips"];
  echo $array*10;
  ?>
  ";
  style="margin-bottom:10rem"
></div>
  <div class="card-body">
    <h5 class="card-title"> TRAINing Complete
</h5>
    <p class="card-text">You caught 10 trains good job </p>
</div>
  </div>
</div>


<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
 <div
class="ldBar"

  data-type="fill"
  data-img="./assets/img/card2.jpg"
  data-img-size="398,398"
  data-value="
  <?php 
$query="select count(*) as 'number_of_trips'
from user_trip_2
where user_id = ".$username." and transport_id = 3;";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$array=$row["number_of_trips"];
  echo $array*10;
  ?>  
  ";
  style="margin-bottom:10rem"
></div>
  <div class="card-body">
    <h5 class="card-title"> BUSted lv.1!
</h5>
    <p class="card-text">Catch Bus 10 times</p>
</div>
  </div>
</div>



<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
 <div
class="ldBar"
  data-type="fill"
  data-img="./assets/img/card3.jpg"
  data-img-size="398,398"
  data-value="
  <?php 
$query="select count(*) as 'number_of_trips'
from user_trip_2
where user_id = ".$username." and transport_id = 2;";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$bus_trips=$row["number_of_trips"];
  echo $bus_trips*10;
  ?>
  ";
  style="margin-bottom:10rem"
></div>
  <div class="card-body">
    <h5 class="card-title">The Trolley Problem lv.1
</h5>
    <p class="card-text">Catch Trams 10 times</p>
</div>
  </div>
</div>



<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
 <div
class="ldBar"
  data-type="fill"
  data-img="./assets/img/card4.jpg"
  data-img-size="398,398"
  data-value="
<?php 
$query="select t.transport_type, sum(user_trip_length) as 'total_length'
from user_trip_2 u join transport t on u.transport_id = t.transport_id
where user_id = ".$username."
group by t.transport_type
order by t.transport_type;";
$result = sqlsrv_query($conn,$query);
$bus = sqlsrv_fetch_array($result)['total_length'];
$train = sqlsrv_fetch_array($result)['total_length'];
$tram = sqlsrv_fetch_array($result)['total_length'];
$total_distance=($bus+$train+$tram);
$car_emissions=$total_distance*243.8;
$public_emissions=($train*28.6+$bus*20.2+$tram*17.7);
echo (($car_emissions-$public_emissions)/2500);
?>
  
  ";
  style="margin-bottom:10rem"
></div>
  <div class="card-body">
    <h5 class="card-title">Greenhouse Gasses are CARcinogenic :p lv.1</h5>
    <p class="card-text"> Compared to car use, you have reduced (
      <?php
      echo $car_emissions-$public_emissions;
        ?>
       ) g of carbon.
</p>
</div>
  </div>
</div>




<div class="col-sm-6 col-md-5 col-lg-4 "style="margin-bottom:12rem; padding-bottom:100px">
<div class="card" style="width: 25rem;">
 <div
class="ldBar"
  data-type="fill"
  data-img="./assets/img/card5.jpg"
  data-img-size="398,398"
  data-value="<?php 
$query="select sum(user_trip_length) as 'distance travelled'
from user_trip_2
where user_id = ".$username.";";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);
$array=$row["distance travelled"];
  echo $array/10;
  ?>";
  style="margin-bottom:10rem"
></div>
  <div class="card-body">
    <h5 class="card-title"> Sisterhood of the Travelling App</h5>
    <p class="card-text">Total distance 1000km travelled
</p>
</div>
  </div>
</div>





</div>

</body>
<script src="assets/js/loading-bar.min.js"></script>
<?php


?>

</html>

