<!DOCTYPE html>
<html lang="en">
<?php
require_once 'connection.php';
session_start();

if(isset($_GET['login'])){
    echo "<script>alert('Please login');location.href='login.php';</script>";
};



$username = $_SESSION['username'];

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=" viewport" content="width=device-width   initial-scale=1.0  minimum-scale=1.0 user-scalable=yes" />
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/report.css">
    <script src="./assets/js/echarts.min.js"></script>

    <title>Report</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<?php 
// check for trips
      
$query0 = "select count(*) as 'count' from user_trip where user_id = {$username};";

$result0 = sqlsrv_query($conn,$query0);

$count = sqlsrv_fetch_array($result0)['count'];

// if there are no trips redirect the user to the tracker page
if($count==0){
   echo "<script>alert('You need to take a trip first');location.href='Tracker.php';</script>";
}


// -- 1 hours spent on public transport

$query1 = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'trip_time'
from user_trip
where user_id ={$username} and transport_id = 2
and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

$result1 = sqlsrv_query($conn,$query1);

$time = sqlsrv_fetch_array($result1);



// time spent on public transport in minutes and hours
$hours = floor($time["trip_time"]/60);
$minutes = $time["trip_time"] % 60;
$seconds = $time["trip_time"];


// total time 
$query = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'trip_time'
from user_trip
where user_id ={$username} 
and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

$result = sqlsrv_query($conn,$query);

$total_time = sqlsrv_fetch_array($result)['trip_time'];

$percent_PT = $seconds / $total_time * 100;

$percent_Car = 100 - $percent_PT;


// // -- 2 grams of carbon emitted

$query2 = "select sum(user_trip_emissions) as 'emissions'
from user_trip
where user_id = ".$username." 
and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

$result2 = sqlsrv_query($conn,$query2);

$emissions = round(sqlsrv_fetch_array($result2)["emissions"],2);



// 6 trees —> 1000 kg carbon per year
// 1 trees —> 166 kg carbon per year
// 2 trees -> 332 kg carbon per year
if (0<$emissions && $emissions<166666){
    $trees = round($emissions/13333, 1)." mature trees growing for a month";
} elseif (166666<=$emissions){
  $trees = round($emissions/166666,1). " mature trees growing for a year";
} else {
  $trees = "0";
};

$units = 'grams';

if($emissions > 1000){
    $emissions = round($emissions / 1000,2);
    $units = 'kilograms';
}


// -- 3 minutes spent on transport and minutes spent in car
      $query4 = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'pt_trip_time'
      from user_trip
      where user_id = ".$username."  and transport_id = 2
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

      $pt_travel_time= sqlsrv_fetch_array(sqlsrv_query($conn,$query4))["pt_trip_time"];


//-- 4 car trip time
      $query42 = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'car_trip_time'
      from user_trip
      where user_id = ".$username."  and transport_id = 4
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

      $car_travel_time= sqlsrv_fetch_array(sqlsrv_query($conn,$query42))["car_trip_time"];



      // // -- 6 counts for each type of transport
      $query6 = "select count(*) as 'number_of_trips'
      from user_trip u join transport t on u.transport_id = t.transport_id
      where user_id = ".$username." 
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()
      group by t.transport_type
      order by t.transport_type;";

      $result6 = sqlsrv_query($conn,$query6);

      $pt_count = sqlsrv_fetch_array($result6);
      if(is_null($pt_count)){
          $pt_count = 0;
      }else{
        $pt_count = $pt_count["number_of_trips"];
      }

      $car_count = sqlsrv_fetch_array($result6);
      if(is_null($car_count)){
        $car_count = 0;
    }else{
      $car_count = $car_count["number_of_trips"];
    }


    //   how far you travelled

    $query3 = "select sum(user_trip_length) as 'distance travelled'
    from user_trip 
    where user_id = ".$username." 
    and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()
    and transport_id in (2,4)
    group by transport_id
    order by transport_id;";

    $result3 = sqlsrv_query($conn,$query3);


    $pt_distance = sqlsrv_fetch_array($result3);

    if(is_null($pt_distance)){
        $pt_distance = 0;
    }else{
      $pt_distance = $pt_distance["distance travelled"];
    }
    

    $car_distance = sqlsrv_fetch_array($result3);

    if(is_null($car_distance)){
        $car_distance = 0;
    }else{
        $car_distance = $car_distance["distance travelled"];
    }


     
    //    as a percentage
      $pt_dist_percentage = $pt_distance/($pt_distance + $car_distance + 0.0001) * 100;
      $car_dist_percentage = 100 - $pt_dist_percentage;

      # determine which type of transport has the maximum number of trips
      $array = array($pt_count, $car_count);
      $value = max($array);

      #find the corresponding type of transport
      $key = array_search($value, $array);
      $type = array("Public Transport","Car");
      $key = $type[$key];

      $query7 = "select max(Year) as 'year'
      from transport_stats
      where Month = month(GETDATE())
      order by Year desc;";

      $result7 = sqlsrv_query($conn,$query7);

      $year = sqlsrv_fetch_array($result7)['year'];

      $query8 = "select train_perc, bus_perc, tram_perc
      from transport_stats
      where Year = ".$year." and Month = month(GETDATE());";

      $stats = sqlsrv_fetch_array(sqlsrv_query($conn,$query8));
    
      $stats_train = $stats['train_perc'];
      $stats_tram = $stats['tram_perc'];
      $stats_bus = $stats['bus_perc'];

?> 

</head>

<body>
    
        <div class="nav">
            <header>
                <?php require_once("connection.php");

                        include "./header.html"

                ?>
            </header>
        </div>
        
        <div class="banner">
            <div class="contain-box reactive">
                <div class="title" data-aos="fade-down">
                    Report
                </div>
                <div class="sub-title" data-aos="fade-up">
                Review your previous week<br> Find out the carbon emissions you've saved
                </div>
            </div>
        </div>
    
        
        
      
        <div class="contain-box" id ="content">
            <div class="blocks">
            
                <div class="block-item" id ="block1">

                    <div class="item-left" data-aos="fade-right">
                        <div class="flip_card_left">
                            <div class="flip_card_inner_left">
                                <div class="flip_card_front_left">
                                    <div class="flip_card_2">
                                        How much CO2 have you saved this week?
                                    </div>
                                </div>
                                <div class="flip_card_back_left">
                                    <div class="flip_card_1">
                                        <?php echo $emissions." ".$units;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-right" data-aos="fade-left">
                        <div class="flip_card">
                            <div class="flip_card_inner">
                                <div class="flip_card_front">
                                    <div class="flip_card_2">
                                        How many trees is that?
                                    </div>
                                </div>
                                <div class="flip_card_back">
                                    <div class="flip_card_2">
                                        <?php echo $trees;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-item" id ="block2">
                    <div class="item-left" data-aos="fade-right">
                        <div class="flip_card_left">
                            <div class="flip_card_inner_left">
                                <div class="flip_card_front_left">
                                    <div class="flip_card_3">
                                        How much time did you spend on Public Transport?
                                    </div>
                                </div>
                                <div class="flip_card_back_left">
                                    <div class="flip_card_2">
                                        <?php echo $hours." hours and ".$minutes." minutes"?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-right" data-aos="fade-left">
                        <div class="flip_card">
                            <div class="flip_card_inner">
                                <div class="flip_card_front">
                                    <div class="flip_card_1">
                                        Break it down:
                                    </div>
                                </div>
                                <div class="flip_card_back">
                                    <div id = "pie1" style="width:100%; height: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <!-- <img src="./images/report/tree.png" alt=""> -->
                    </div>
                </div>
                <div class="block-item" id ="block3">
                    <div class="item-left" data-aos="fade-right">
                        <div class="flip_card_left">
                            <div class="flip_card_inner_left">
                                <div class="flip_card_front_left">
                                    <div class="flip_card_2">
                                        How far did you travel this week?
                                    </div>
                                </div>
                                <div class="flip_card_back_left">
                                    <div class="flip_card_3">
                                        <?php echo "Public Transport: ".round($pt_distance,2)." Km \n Car: ".round($car_distance,2)." Km"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-right" data-aos="fade-left">
                        <div class="flip_card">
                            <div class="flip_card_inner">
                                <div class="flip_card_front">
                                    <div class="flip_card_2">
                                        Let's take a closer look
                                    </div>
                                </div>
                                <div class="flip_card_back">
                                    <div id = "pie2" style="width:100%; height: 100%"></div>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-item" id ="block4">
                    <div class="item-left" data-aos="fade-right">
                        <div class="flip_card_left">
                            <div class="flip_card_inner_left">
                                <div class="flip_card_front_left">
                                    <div class="flip_card_3">
                                        What type of transport was your favourite?
                                    </div>
                                </div>
                                <div class="flip_card_back_left">
                                    <div class="flip_card_1">
                                        <?php echo $key;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-right" data-aos="fade-left">
                        <div class="flip_card">
                            <div class="flip_card_inner">
                                <div class="flip_card_front">
                                    <div class="flip_card_3">
                                        How does that compare to Melbourne in <?php echo date('M')." ".$year;?>?
                                    </div>
                                </div>
                                <div class="flip_card_back">
                                    <div id="pie3" style="width:100%; height: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {

            },
            mounted() {
                AOS.init()
            },
        })
    </script>

<script>
        var pieDom1 = document.getElementById('pie1');
        var myChart = echarts.init(pieDom1);
        var option;
        option = {
            title: {
                left: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: ({d}%)'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [{
                name: '',
                type: 'pie',
                radius: '80%',
                data: [{
                    value: <?php echo $percent_PT;?>,
                    name: 'Public Transport'
                }, {
                    value:  <?php echo $percent_Car;?>,
                    name: 'Car'
                }, ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        option && myChart.setOption(option);

        var pieDom2 = document.getElementById('pie2');
        var myChart2 = echarts.init(pieDom2);
        var option2;
        option2 = {
            title: {
                left: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: ({d}%)'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [{
                name: '',
                type: 'pie',
                radius: '80%',
                data: [{
                    value: <?php echo $pt_dist_percentage;?>,
                    name: 'Public Transport'
                }, {
                    value:  <?php echo $car_dist_percentage;?>,
                    name: 'Car'
                }, ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        option2 && myChart2.setOption(option2);



        var pieDom3 = document.getElementById('pie3');
        var myChart3 = echarts.init(pieDom3);
        var option3;
        option3 = {
            title: {
                left: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: ({d}%)'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [{
                name: '',
                type: 'pie',
                radius: '80%',
                data: [{
                    value: <?php echo $stats_bus;?>,
                    name: 'Bus'
                }, {
                    value: <?php echo $stats_train;?>,
                    name: 'Train'
                }, {
                    value: <?php echo $stats_tram;?>,
                    name: 'Tram'
                }, ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        option3 && myChart3.setOption(option3);

    </script>

</body>

<?php include 'footer.html'; ?>

</html>