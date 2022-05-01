<!DOCTYPE html>
<html>
<?php session_start();

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
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loading-bar.min.css"/>
</head>

<body >
<?php
$connectionInfo = array("UID" => "User1", "pwd" => "Project1", "Database" => "gtfsdata", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "lunar-rover.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
<?php
include "./header.html"

?>

<div class="ldBar"
  style="width:100%;height:100px",
  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20",
  data-value="50"
></div>

<div
  data-preset="fan"
  class="ldBar label-center"
  data-value="35"
  style="margin-top:50px"
></div>


<div
  data-preset="bubble"
  class="ldBar label-center"
  data-value="35"
  style="margin-top:50px"
></div>


<div
  data-type="fill"
  data-path="M10 10L90 10L90 90L10 90Z"
  class="ldBar"
  data-fill="data:ldbar/res,
  bubble(#248,#fff,50,1)"
></div>

<!-- <div
  data-type="fill"
  data-img="kirby-dance.svg"
  style="margin-top:60px"
></div> -->


<!-- <div
  data-type="fill"
  data-path="M10 10L90 10L90 90L10 90Z"
  class="ldBar"
  data-fill="data:ldbar/res,
  bubble(#248,#fff,50,1)"
></div> -->
</body>
<script src="assets/js/loading-bar.min.js"></script>

</html>