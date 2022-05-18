<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("connection.php");
?>
<script >let username = <?php echo $_SESSION['username']; ?>;</script>


<head>
<script src="jquery-2.1.1.min.js"></script> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">

    <link rel="stylesheet" href="./assets/css/tracker.css">
    <title>tracker</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <div id="app">
        <div class="nav">
            <header>
            <?php


include "./header.html";

?>
            </header>
        </div>
        <div class="banner">
            <div class="contain-box reactive">
                <div class="title">
                   Welcome, 
                </div>
            </div>
        </div>
        <div class="buttons">
            <div class="contain-box">
              <div class="how-why">
                <div class="how-why-item" data-aos="fade-right">
                  How to use?
                </div>
                <div class="how-why-item" data-aos="fade-left">
                  Why to use?
                </div>
              </div>              

              <div class="map">
              <div id="includedContent" style="margin-top:40px; height:600px; width:80%;">
               <script> 
               $(function(){
                //  console.log("1234313");
               $("#includedContent").load("map.php"); 
               });
               </script> 
               
               </div>
               </div>
               <div class="vehicle">
                 <div>
                <div class="vehicle-item" id="public-transport" data-aos="fade-right">
                  <div class="vehicle-img" 
                 >
                    <img src="./images/tracker/buttons/bus.png" alt="">
                  </div>
                  <div class="vehicle-button" >
                    
                    <span id="public-transport-text">Public Transport</span>
                  </div>
                </div>
                 </div>
                <div class="vehicle-item"id="personal-transport"data-aos="fade-left">
                  <div class="vehicle-img" >
                    <img src="./images/tracker/buttons/car.png" id="personal-transport"alt="">
                  </div>
                  <div class="vehicle-button">
                  
                      <span id="personal-transport-text">Personal vehicle</span>
                  
                  </div>
                </div>
              </div>
              <div class="start-stop">
                <div class="start-stop-item" id="finish-button"data-aos="fade-right" >TRACK</div>
              </div>

            </div>
          </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script defer src="tracker.js"></script>

    <script>
      
        var app = new Vue({
            el: '#app',
            mounted(){
                AOS.init()
            },
            data: {

            }
        })



    </script>
</body>

</html>