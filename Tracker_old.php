<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="assets/css/box-container.css">
    <link rel="stylesheet" href="assets/css/Update1-Coming-Soon-Site.css">
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
</head>

  <body>

  <header class="masthead" style="background-image: url('assets/img/header7.jpg')">

  <?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
include "./header.html"

?>
</header>
<div class="box-container">
    <div class="container">
    
      <div class="row">
        <div class="col-md-12 col-lg-12 mx-auto">
          
          <p style="font-size: 36px; font-weight: bold ;color:white;">
            Carbon Emission Tracker
          </p>
          <h4>Track your carbon footprint, protect the environment</h4>
          <p>
            <br />Use your location and the transport type and the website will calculate carbon emission for you<br /><br />
          </p>
        
</div>
          <div class="col-md-12 col-lg-12 mx-auto">
            <div id="vehicle-selection" style="margin-bottom: 30px;">
 
              <input type="radio"   id="Car" name="vehicles" value="Car"  checked=true>
              <label class="btn btn-primary " for="Car" >Car</label>

            <di>
              <input type="radio"  id="Bus" name="vehicles" value="Bus">
              <label class="btn btn-primary "  for="Bus" >Bus    </label>
            </di>

              <input type="radio"  id="Train" name="vehicles" value="Train">
              <label class="btn btn-primary "  for="Train" >Train    </label>

              <input type="radio" id="Tram" name="vehicles" value="Tram">
              <label class="btn btn-primary "  for="Tram" >Tram   </label>
            </div>
          <button class="btn btn-success btn-lg" id="start-tracking">Start tracking now</button>
          <button  class="btn btn-danger btn-lg"id="stop-tracking">Stop</button>
          <div id="map-content"  style="margin-top: 30px;">
          <p id="demo"></p>
          <div id="map" style="width: auto;height: 300px;"></div>
        </div>
          <script src="tracker.js"></script><br><br><br><br><br>
          </div>
</div>
</div>
</div>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 mx-auto"> 
            <p style="font-size: 36px; font-weight: bold">
              Why to use
            </p>
            <br>
            <p>Choose the environment protection way to reduce your carbon footprint
            </p>

          </div>
          <div class="col-md-6 col-lg-6 mx-auto"> 
            <img src="/assets/img/12.png" style="height: 333px;width: 550.234px;"/>
            <!-- margin: -27px;padding: -38px;  for above line-->
            </p>
            <br><br><br><br><br><br><br>
          </div>
      </div>
</div>
       

    <hr />
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   <script src="tracker.js"></script>
  </body>
</html>
