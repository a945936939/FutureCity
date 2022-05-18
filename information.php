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
    <meta name=" viewport" content="width=device-width   initial-scale=1.0  minimum-scale=1.0 user-scalable=yes" />
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/information.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./assets/js/echarts.min.js"></script>
    <title>information</title>
</head>

<body>
    <div id="app">
        <div class="nav">
            <header>
            <?php
require_once("connection.php");

include "./header.html"

?>
            </header>
        </div>
        <div class="banner">
            <div class="contain-box reactive">
                <div class="title" data-aos="fade-down">
                    Get the Fact
                </div>
                </br>
                </br>
                <div class="sub-title" data-aos="fade-up">
                    Learn more about Transport in Victoria
                </div>
            </div>
        </div>
        <div class="info info1">
            <div class="contain-box">
                <div class="title" data-aos="fade-down">
                    Victoria's Greenhouse Gas Emission in 2019
                </div>
                <div class="context">
                    <div class="context-item">
                        <div id="pieChart1" style="width:600px; height: 400px"></div>
                    </div>
                    <div class="context-item" data-aos="fade-down">
                        The pie chart shows the Greenhouse gas emission in Victoria, 2019.<br /> Transport is the third largest source of that (17% of total emission).
                    </div>
                </div>
            </div>
        </div>
        <div class="info info2">
            <div class="contain-box">
                <div class="title" data-aos="fade-down">
                    Method of travel to work in 2016
                </div>
                <div class="context">
                    <div class="context-item" data-aos="fade-down">
                        The pie chart shows the mode of transport for people to travel to work. <br /> Most people (66%) are going to take a car to work while only 13% of people are taking public transport.
                    </div>
                    <div class="context-item">
                        <div id="pieChart2" style="width:600px; height: 400px"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="info info3">
            <div class="contain-box">
                <div class="title" data-aos="fade-down">
                    Grams of CO2 per person km travelled
                </div>
                <div class="context">
                    <div class="context-item">
                        <div id="lineChart" style="width:650px; height: 400px"></div>
                    </div>
                    <div class="context-item" data-aos="fade-down">
                        The bar chart shows the CO2 emitted by different transports per person km travelled.<br /> For most public transport (Bus, Train, Tram), they are emitting less CO2 than the personal transport (Petrol Car, Electric Car and Motorcycle).
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        AOS.init();
    </script>
    <script>
        var pieDom1 = document.getElementById('pieChart1');
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
                name: 'Access From',
                type: 'pie',
                radius: '80%',
                data: [{
                    value: 17,
                    name: 'Transport'
                }, {
                    value: 83,
                    name: 'Other'
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


        var pieDom2 = document.getElementById('pieChart2');
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
                name: 'Access From',
                type: 'pie',
                radius: '80%',
                data: [{
                    value: 13,
                    name: 'Public'
                }, {
                    value: 21,
                    name: 'others'
                }, {
                    value: 66,
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

        var chartDom = document.getElementById('lineChart');
        var myChart3 = echarts.init(chartDom);
        var option3;

        option3 = {
            xAxis: {
                type: 'category',
                data: ['Petrol Car', 'Electric Car', 'Motorcycle', 'Train', 'Tram', 'Bus']
            },
            yAxis: {
                type: 'value'
            },
            tooltip: {
                trigger: 'item',
            },
            series: [{
                data: [{
                    value: 243.8,
                    itemStyle: {
                        color: '#ff0000'
                    }
                }, {
                    value: 209.1,
                    itemStyle: {
                        color: '#ff5d00'
                    }
                }, {
                    value: 119.6,
                    itemStyle: {
                        color: '#ffa847'
                    }
                }, {
                    value: 28.6,
                    itemStyle: {
                        color: '#ffc800'
                    }
                }, {
                    value: 20.2,
                    itemStyle: {
                        color: '#9fff00'
                    }
                }, {
                    value: 7.7,
                    itemStyle: {
                        color: '#9fffeb'
                    }
                }],
                type: 'bar',
                showBackground: true,
                backgroundStyle: {
                    color: 'rgba(180, 180, 180, 0.2)'
                }
            }]
        };

        option3 && myChart3.setOption(option3);
    </script>

</body>

</html>