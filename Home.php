<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <title>home</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <div id="app">
        <div class="nav">
            <header>
            <?php
include 'header.html';
?>            </header>
        </div>
        <div class="banner">
            <div class="contain-box reactive">
                <div class="title" data-aos="fade-up">
                    Transport
                    <br> Go Public
                </div>
                <!-- <img src="./images/home/banner/banner-element.png" alt=""> -->
                <div class="sub_title" data-aos="fade-up">
                    Track your carbon emissions
                </div>
                <form method="get" action="tracker.php">
                    <button class="T_button" action="tracker.php" style="vertical-align:middle"><span>Tracker</span></button>
                </form>
            </div>
        </div>
        <div class="buttons">
            <img class="sun" src="./images/home/buttons/sun.png" alt="">
            <img class="plane" src="./images/home/buttons/plane.png" alt="">
            <div class="contain-box">
                <div class="button-item" v-for="(item,index) in buttons" :key="index">
                    <div class="item-area">
                        <img :src="item.icon" alt="">
                    </div>
                    <div class="item-label">
                        {{ item.label }}
                    </div>
                </div>
            </div>
        </div>
        <div class="introductions">
            <div class="introduction-list">
                <div class="list-item" v-for="(item,index) in introductionsList" :key="index">
                    <!-- <img class="item-bg" src="./images/home/introductions/introduction-bg.png" alt=""> -->
                    <div class="contain-box">
                        <div class="item-text">
                            <div class="text-title" data-aos="fade-down">{{ item.title }}</div>
                            <div class="text-content" data-aos="fade-up">{{ item.content }}</div>
                        </div>
                        <div class="item-img">
                            <img :src="item.img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="cars">
            <img src="./images/home/cars/cars.png" alt="">
          </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        var app = new Vue({
            el: '#app',
            mounted() {
                AOS.init()
            },
            data: {
                buttons: [{
                    label: "Report",
                    path: '/report',
                    icon: './images/home/buttons/button1.png'
                }, {
                    label: "Tracker",
                    path: '/tracker',
                    icon: './images/home/buttons/button2.png'
                }, {
                    label: "Goal",
                    path: '/goal',
                    icon: './images/home/buttons/button3.png'
                }, ],
                introductionsList: [{
                    title: 'Future City in Melbourne',
                    content: 'By 2036, the daily population in Melbourne is estimated to grow to approximately 1.4 million. To become a green city, public transport, walking and cycling should be increased to 70 percent of all trips by 2030.',
                    img: './images/home/introductions/introduction1.jpg'
                }, {
                    title: 'Zero-emissions Transport',
                    content: 'By 2050, transport in the municipality will be emissions-free. All vehicles with internal combustion engines should be phased out and replaced by zero-emissions engines, while all public transport is using 100 percent of clean energy.',
                    img: './images/home/introductions/introduction2.jpg'
                }, {
                    title: 'Build a Habit',
                    content: 'As a citizen, we can build a habit to take public transport so that we can contribute to the plan of our future city. Using carbon emission tracker, you are encouraged to choose the one which helps the environment.',
                    img: './images/home/introductions/introduction3.jpg'
                }, ]
            }
        })
    </script>



</body>

<?php include 'footer.html'; ?>

</html>