<!DOCTYPE html>
<?php session_start();


if(isset($_GET['login'])){
    echo "<script>alert('Please login');location.href='login.php';</script>";
};

$username = $_SESSION['username'];

require_once("./connection.php");
?>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/achievement.css">

    <title>Achievement</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./js/echarts.min.js"></script>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arizonia&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap"> 
     <link rel="stylesheet" href="./assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/Article-List.css">
    <link rel="stylesheet" href="./assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="./assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="./assets/css/untitled.css">
    <link rel="stylesheet" href="./assets/css/Update1-Coming-Soon-Site.css">
    <!-- <link rel="stylesheet" href="./goals.css"> -->
    <link rel="stylesheet" type="text/css" href="./assets/css/loading-bar.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/loading-bar.css" />

</head>

<body>
    <div id="app">
        <div class="nav">
        <header>
                    <?php 
require_once("connection.php");
include 'header.html';
?>
                        </header>

        </div>
        <div class="banner">
            <div class="box reactive">
                <div class="title" data-aos="fade-up">
                    Achievements
                </div>
            </div>
        </div>



<!--  achievement info for the first five achievements -->
<?php


// $username = $_SESSION['username'];

// achievements progress
$query = "select * from achievement_record r join achievement a on r.achievement_id=a.achievement_id
 where r.achievement_id between 1 and 25 and r.user_id = {$username};";

$result1 = sqlsrv_query($conn, $query);

?>


<!-- show achievements 1-5 -->
<div class="contain-box">
<div class="list-item" key="1">

        <img class="item-bg1" src="./images/achievement/goals_banner.jpeg" alt="">
        
        <div class="row" id = "row1" >
            <div class ="row-title">Tracker</div>
   
            <div class="col-sm-2">
            <div class="card" data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach11.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?></h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach12.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach13.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach14.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach15.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
    </div>
</div> 
</div>



<!-- show achievements 6-10 -->
<div class="contain-box">
<div class="list-item" key="2">
    <img class="item-bg2" src="./images/home/introductions/introduction-bg.png" alt="">

        
        <div class="row" id = "row2" >
        <div class ="row-title">Carbon Emissions</div>
   
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach21.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>" ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card" data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach22.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach23.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach24.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach25.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
    </div>
</div>
</div>


<!-- show achievements 11-15-->
<div class="contain-box">
<div class="list-item" key="3">

        <img class="item-bg3" src="./images/home/introductions/introduction-bg.png" alt="">
        
        <div class="row"   id = "row3"  >
        <div class ="row-title">Distance</div>
   
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach31.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach32.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach33.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach34.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach35.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
    </div>
</div>  
</div>


<!-- show achievements 16-20-->
<div class="contain-box">
<div class="list-item" key="4">
    
<img class="item-bg4" src="./images/home/introductions/introduction-bg.png" alt="">
        <div class="row"  id = "row4"   >
        <div class ="row-title">Time</div>
   
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach41.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach42.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach43.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach44.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach45.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
    </div>
</div>
</div>


<!-- show achievements 21-25-->
<div class="contain-box">
<div class="list-item" key="5">

        
        <img class="item-bg5" src="./images/home/introductions/introduction-bg.png" alt="">

        <div class="row" id = "row5" >
        <div class ="row-title">Streak</div>
   
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach51.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach52.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach53.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach54.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
            <div class="col-sm-2">
            <div class="card"    data-aos="fade-up" data-aos-delay="500">
                <?php 
                // load the achievement information
                $ach_info = sqlsrv_fetch_array($result1);?>

                <div class="ldBar" data-type="fill" data-img="./assets/img/cards/ach55.jpg" data-img-size="150,150"
                    data-value="<?php echo  $ach_info['record_progress'];?>"  ></div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ach_info['achievement_name'];?>
                    </h5>
                    <p class="card-text"><?php echo $ach_info['achievement_description'];?></p>
                </div>
            </div>
            </div>
    </div>
</div> 
</div>


    




<script src="./assets/js/loading-bar.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
AOS.init()
</script>

</body>

</html>