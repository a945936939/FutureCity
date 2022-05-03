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
</head>

<body >
<header class="masthead" style="background-image: url('assets/img/header1.jpg')">
<?php
require_once("connection.php");

include "./header.html"

?>
</header>

    <div class="container">
        </div>
        <section class="features-boxed" style="background-color:#E9C46A">
            <div class="container">
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-map-marker icon" style="--bs-body-color: var(--bs-red);color: var(--bs-red);"></i>
                            <h3 class="name">Tracker</h3>
                            <p class="description">Experience our tracker. Know your carbon footprint and your living environment.</p><button class="btn " style="color:#E76F51" onclick="location.href = 'tracker.html'">Start tracking</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>