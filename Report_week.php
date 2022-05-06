<!DOCTYPE html>
<html lang="en">
  <head>
       
  <?php session_start();
    require_once("connection.php");
    $username=$_SESSION["username"];


      // // example query
      // $query="select t.transport_type, count(*) as 'number_of_trips'
      // from user_trip_2 u join transport t on u.transport_id = t.transport_id
      // where user_id = CAST(".strval($username)." AS int)
      // group by t.transport_type
      // Order by t.transport_type;";

      // $result = sqlsrv_query($conn,$query);

      // $row = sqlsrv_fetch_array($result);
      // $bus_trips=$row["number_of_trips"];
      // echo $bus_trips*10;

      // Queries for the report
      //Still need to change 'user_id' from CAST(".strval($username)." AS int) to the current user's id
      // -- report sql functions

      // -- 1 hours spent on public transport

      $query1 = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'trip_time'
      from user_trip_2
      where user_id = CAST(".strval($username)." AS int) 
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

      $result1 = sqlsrv_query($conn,$query1);

      $time = sqlsrv_fetch_array($result1);

      // time spent on public transport in minutes and hours
      $hours = floor($time["trip_time"]/60);
      $minutes = $time["trip_time"] % 60;


      // // -- 2 grams of carbon emitted

      $query2 = "select sum(user_trip_emissions) as 'emissions'
      from user_trip_2
      where user_id = CAST(".strval($username)." AS int) 
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

      $result2 = sqlsrv_query($conn,$query2);

      $emissions = sqlsrv_fetch_array($result2)["emissions"];
      
      // 6 trees —> 1000 kg carbon per year
      // 1 trees —> 166 kg carbon per year
      // 2 trees -> 332 kg carbon per year
      if (0<$emissions && $emissions<166666){
          $trees = round($emissions/13333, 1)."mature trees growing for a month";
      } elseif (166666<=$emissions){
        $trees = round($emissions/166666,1). " mature trees growing for a year";
      } else {
        $trees = "0 or error";
      };
      
      // // --1.5 total trip length for each type of transport

      $query3 = "select t.transport_type, sum(user_trip_length) as 'distance_travelled'
      from user_trip_2 u join transport t on u.transport_id = t.transport_id
      where user_id = CAST(".strval($username)." AS int) 
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()
      group by t.transport_type
      order by t.transport_type;";

      $result3 = sqlsrv_query($conn,$query3);

      $bus_distance = sqlsrv_fetch_array($result3)["distance_travelled"];
      $car_distance = sqlsrv_fetch_array($result3)["distance_travelled"];
      $train_distance = sqlsrv_fetch_array($result3)["distance_travelled"];
      $tram_distance = sqlsrv_fetch_array($result3)["distance_travelled"];

      $pt_dist = $bus_distance + $train_distance + $tram_distance;

      
// -- 3 minutes spent on transport and minutes spent in car
      $query4 = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'pt_trip_time'
      from user_trip_2
      where user_id = CAST(".strval($username)." AS int) and transport_id between 1 and 3
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

      $pt_travel_time= sqlsrv_fetch_array(sqlsrv_query($conn,$query4))["pt_trip_time"];


//-- 4 car trip time
      $query42 = "select sum(datediff(minute,user_trip_start_time, user_trip_end_time)) as 'car_trip_time'
      from user_trip_2
      where user_id = CAST(".strval($username)." AS int) and transport_id = 4
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE();";

      $car_travel_time= sqlsrv_fetch_array(sqlsrv_query($conn,$query42))["car_trip_time"];


      // // -- 5 percentage public transport and percentage car
      // $query5 = "select t.transport_type, count(*)/
      // (select count(*) from user_trip_2 where user_id = CAST(".strval($username)." AS int) 
      // and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()) as 'percentage_trips'
      // from user_trip_2 u join transport t on u.transport_id = t.transport_id
      // where user_id = CAST(".strval($username)." AS int) 
      // and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()
      // group by t.transport_type;";

      // $result5 = sqlsrv_query($conn,$query5);



      // // -- 6 counts for each type of transport
      $query6 = "select t.transport_type, count(*) as 'number_of_trips'
      from user_trip_2 u join transport t on u.transport_id = t.transport_id
      where user_id = CAST(".strval($username)." AS int) 
      and user_trip_start_time between DATEADD(day, -7, GETDATE()) AND GETDATE()
      group by t.transport_type
      order by t.transport_type;";

      $result6 = sqlsrv_query($conn,$query6);

      $bus_count = sqlsrv_fetch_array($result6)["number_of_trips"];
      $car_count = sqlsrv_fetch_array($result6)["number_of_trips"];
      $train_count = sqlsrv_fetch_array($result6)["number_of_trips"];
      $tram_count = sqlsrv_fetch_array($result6)["number_of_trips"];

      # determine which type of transport has the maximum number of trips
      $array = array($bus_count, $car_count, $train_count, $tram_count);
      $value = max($array);

      #find the corresponding type of transport
      $key = array_search($value, $array);
      $type = array("Bus","Car","Train","Tram");
      $key = $type[$key];

      // // -- 7 preferred type of public transport just take max of above\
      

      // // -- 8 Compare usage to average
      // // -- need to select the most recent year available which has the current month
      // // -- data ends at september so from september to december it will show 2020 stats rather than 2021
      // // -- show the relevent statistic -- compare the user's most commonly taken transport to 
      // // -- the correspoinding percentage
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

      switch ($key){
        case "Bus":
          $stats = round($stats["bus_perc"],2);
          break;
        case "Train":
          $stats = round($stats["train_perc"],2);
          break;
        case "Tram":
          $stats = round($stats["tram_perc"],2);
          break;
        case null:
          $stats = "Error";
          break;
      };

      

     

      //  create an array of the transport stats informations
      $end = False;
      while ($end){
          $temp  = sqlsrv_fetch_array($result7);
          if (isnull($temp)){
            echo $end;
            $end = True;
          } else {
            $transport_stats[] = $temp;
          }
      }

    
  ?>

<meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
    <link rel="stylesheet" href="./assets/css/week.css" />
    <title>Document</title>
  </head>
  <header
      class="masthead"
      style="background-image: url('assets/img/header3.jpg') "
    
    >
 <?php
 include "./header.html";
 
 ?>

    </header>
 
  <body>
 

    <div class="week">
      <div class="title">Weekly Report</div>
      <div class="previous_week">Previous Week：<?php 
          $startdate=strtotime("Today");
          $enddate=strtotime("-1 week", $startdate);
          echo date("M/d/y", $startdate)."-".date("M/d/y", $enddate);?></div>
      <div class="white_box">
        <p>
      For the previous week you spent <?php echo $hours." hours and ".$minutes." minutes"; ?> on travelling 
      and <?php echo $emissions; ?> grams of carbon were emitted.
      This is equivalent to <?php echo $trees; ?>. <br>


      You have travelled <?php echo $pt_dist?> Km on public transport and <?php echo $car_distance?> Km by car.
      The distance travelled for each type is <?php echo $train_distance?> Km by train,
      <?php echo $tram_distance ?> Km by tram and <?php echo $bus_distance?> Km by bus.
    </p>

      </div>
      <div class="tip">
        <p>
        The previous week you have spent <?php echo floor($pt_travel_time/60)." hours and ".($pt_travel_time%60)." minutes";?> 
        on public transport and <?php echo floor($car_travel_time/60)." hours and ".($car_travel_time%60)." minutes";?>  in cars. 
        </p>
        <!--        <img src="./images/pic2.png" alt="">-->
        <div class="pic"></div>
      </div>
      <div class="distribution">
        <div class="title">DISTRIBUTION OF PUBLIC TRANSPORT</div>
        <div class="pic"></div>
        <div class="text">
            For the previous week: <?php echo $key;?>
            was your preferred type of public transport with <?php echo $value;?> trips.
          <br>
            In the month of <?php echo (date('F')." ".$year.", ".$key); ?> accounted for <?php echo ($stats * 100); ?> % of all public transport trips in Melbourne.

            <?php $transport_stats ?>
            

        </div>
      </div>
    </div>
  </body>
</html>
