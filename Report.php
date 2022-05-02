<!doctype html>
<html lang="en">
<head>
<?php session_start();
require_once("connection.php");
?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="./assets/css/Trailer.css">
    <title>Trailer</title>
</head>
<body>
    <nav
      class="navbar navbar-light navbar-expand-lg fixed-top"
      id="mainNav"
      style="box-shadow: inset 0 0 0 2000px rgba(97, 97, 97, 0.64)"
    >
      <div class="container">
        <a class="navbar-brand" href="Home.php">lunar rover</a>
        <div
          class="collapse navbar-collapse"
          id="navbarResponsive"
          style="height: 40px; margin: 25px; padding: 32px"
        >
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a
                class="nav-link"
                href="Home.php"
                style="padding: 10px 20px; margin: -1px; height: 38px"
                >HOME</a
              >
            </li>

            <li class="nav-item">
              <a class="nav-link" href="publictransport.html">Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tracker.html">Tracker</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="Trailer.html">Report</a>
            </li>
          </ul>
        </div>
        <button
          data-bs-target="#navbarResponsive"
          data-bs-toggle="collapse"
          class="navbar-toggler"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fa fa-bars"></i>
        </button>
      </div>
    </nav>
<div class="main_wrapper">
    <div class="title">REPORT</div>
    <div class="btns">
        <div class="btn">
            <a href="Report.html">Week</a>
        </div>
        <div class="btn">Month</div>
    </div>
    <div class="pic"></div>
</div>
</body>
</html>