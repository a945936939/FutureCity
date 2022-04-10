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
</head>

<body style="height: 2480.38px;">
<?php
$connectionInfo = array("UID" => "User1", "pwd" => "Project1", "Database" => "gtfsdata", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "lunar-rover.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>

    <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto position-relative">
                    <div class="site-heading">
                        <h1>Future City transport</h1><span class="subheading">help children to know the transport better

                        </span>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
                <div class="container"><a class="navbar-brand" href="Home.php">lunar rover</a>
                    <div class="collapse navbar-collapse" id="navbarResponsive" style="height: 115px;margin: 25px;padding: 32px;">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="Home.php" style="padding: 10px 20px;margin: -1px;height: 38px;">HOME</a></li>

                            <li class="nav-item"><a class="nav-link" href="publictransport.html" style="padding: 10px 20px;margin: -1px;height: 38px;">Information</a></li>

                            <li class="nav-item"><a class="nav-link" href="tracker.html" style="padding: 10px 20px;margin: -1px;height: 38px;">Tracker</a></li>

                          
                            <li class="nav-item dropdown">
                                <div class="dropdown-menu"><a class="dropdown-item" href="publictransport.html" style="font-size: 14px;font-weight: bold;">Information</a><a class="dropdown-item" href="tracker.html" style="font-size: 14px;font-weight: bold;">Tracker</a></div>
                            </li>
       
                            <li class="nav-item"></li>
                        </ul>
                    </div><button data-bs-target="#navbarResponsive" data-bs-toggle="collapse" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <!-- <div class="simple-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background: url('assets/img/6.png;') ;"></div>
                    <div class="swiper-slide" style="background: url('assets/img/6.png;');"></div>
                    <div class="swiper-slide" style="background: url('assets/img/6.png;');"></div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div> -->
        </div>
        <section class="features-boxed">
            <div class="container">
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-map-marker icon" style="--bs-body-color: var(--bs-red);color: var(--bs-red);"></i>
                            <h3 class="name">Tracker</h3>
                            <p class="description">Experience our tracker. Know your carbon footprint and your living environment.</p><a class="learn-more" href="tracker.html">Learn more »</a>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box" style="height: 351.594px;"><i class="fa fa-plane icon" style="color: var(--bs-gray-900);"></i>
                            <h3 class="name">Public transport</h3>
                            <p class="description">Introduce Melbourne's traffic situation and future plans</p><a class="learn-more" href="publictransport.html">Learn more »</a>
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