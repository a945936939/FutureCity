<?php
include "./header.html";
if(!isset($_SESSION['username'])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Blog Post - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Arizonia&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap"
    />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/Article-List.css" />
    <link rel="stylesheet" href="assets/css/Features-Boxed.css" />
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="assets/css/Simple-Slider.css" />
    <link rel="stylesheet" href="assets/css/untitled.css" />
    <link rel="stylesheet" href="assets/css/Update1-Coming-Soon-Site.css" />
    <link rel="stylesheet" href="./assets/bootstrap/css/publictransport.css" />
  </head>

  <body>
  <header class="masthead" style="background-image: url('assets/img/header6.jpg')">



</header>

    <article>
      <p class="describtion" style="font-size: 10px"></p>
      <br /><br /><br />
      <section class="article-list">
        <div class="container">

          <div class="row articles">
            <div class="col-sm-6 col-md-4 item">
              <a href="#"><img class="img-fluid" src="/assets/img/6.png" /></a>
              <h3 class="name">BUS</h3>
              <p class="description">
                17.7 grams of Carbon Dioxide per person kilometer travelled
              </p>

            </div>
            <div class="col-sm-6 col-md-4 item">
              <a href="#"><img class="img-fluid" src="/assets/img/7.png" /></a>
              <h3 class="name">TRAM</h3>
              <p class="description">
                As of 2019 Melbourne's trams are aupplied from 100% renreable
                sources, making their emissions parctically zero in any case
              </p>

            </div>
            <div class="col-sm-6 col-md-4 item">
              <a href="#"><img class="img-fluid" src="/assets/img/8.png" /></a>
              <h3 class="name">TRAIN</h3>
              <p class="description">
                28.6 grams of Carbon Doixide per person kilometer travelled
              </p>

            </div>
          </div>
          <div class="row articles">
            <div class="col-sm-6 col-md-4 item">
              <a href="#"><img class="img-fluid" src="/assets/img/15.jpg" /></a>
              <h3 class="name">Electric vehicle</h3>
              <p class="description">
                209.1 grams of Carbon Dioxide per person kilometer travelled
              </p>

            </div>
            <div class="col-sm-6 col-md-4 item">
              <a href="#"><img class="img-fluid" src="/assets/img/16.jpg" /></a>
              <h3 class="name">Petrol vehicle</h3>
              <p class="description">
              243.8 grams of Carbon Dioxide per person kilometer travelled
              </p>

            </div>
            <div class="col-sm-6 col-md-4 item">
              <a href="#"><img class="img-fluid" src="/assets/img/17.jpg" /></a>
              <h3 class="name">Motorcycle</h3>
              <p class="description">
                119.6 grams of Carbon Doixide per person kilometer travelled
              </p>

            </div>
          </div>
        </div>
      </section>
    </article>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
  </body>
</html>
