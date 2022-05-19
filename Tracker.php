<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("connection.php");
?>
<script >let username = <?php echo $_SESSION['username']; ?>;</script>


<head>
<script src="https://kit.fontawesome.com/d6a56bb6df.js" crossorigin="anonymous"></script>

<script src="jquery-2.1.1.min.js"></script> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">

    <link rel="stylesheet" href="./assets/css/tracker.css">
    <title>tracker</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
 
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
                Tracker
                </div>
                <div class="sub-title" data-aos="fade-up">
                    Try our Tracker Map 
                </div>
            </div>
        </div>
        <div class="buttons">
            <div class="contain-box">
              <div class="how-why">
            <div class="flip-card">
            <div class="flip-card-inner">

                <div class="how-why-item" id="guide-1" data-aos="fade-right">
                  
                <h1 class="ml7">
  <span class="text-wrapper">
    <span class="letters">How to use</span>
  </span>
</h1>
</div>


<div class="how-why-item" id="guide-3" data-aos="fade-right">

                  <h1 class="ml7"> 
    <span class="text-wrapper">
    
      <span class="back-letters">
1. Click the “start” button<br>
2. Input your destination in the map<br>
3. Compare the routes of “Car” and “Public Transport”<br>
4. Choose the one you decide to take by clicking on corresponding button under the cartoon picture<br>
5. Confirm your decision.
</span>
    </span>
  </h1>
  </div>
  </div>
</div>










                  
                
<div class="flip-card">
            <div class="flip-card-inner">

                <div class="how-why-item" id="guide-2" data-aos="fade-right">
                  
                <h1 class="ml8">
  <span class="text-wrapper">
    <span class="letters">Why to use</span>
  </span>
</h1>
</div>


<div class="how-why-item" id="guide-4" data-aos="fade-right">
                  
                  <h1 class="ml8">
    <span class="text-wrapper">
      <span class="back-letters ">
      By using our tracker regularly, you can build a habit to record your travelling trips. 
Each time you decide your trip, you would understand the consequence by comparing the carbon emissions.

</span>
    </span>
  </h1>
  </div>
  </div>
</div>
                </div>

              <div class="map">
              <div id="includedContent" style="margin-top:40px; height:600px; width:80%;">
               <script> 
                     HTMLElement.prototype.scrollIntoView = function() {};

               $(function(){
                //  console.log("1234313");
               $("#includedContent").load("map.php"); 
//                const publicTransport = document.getElementsByClassName("destination active");
// publicTransport.addEventListener("click", () => {
//   transportId = 2;
// });


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
          <div class="overlay hidden"></div>

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