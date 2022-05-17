let transportId = 0;
let end_time;
let start_time;
const finishButton = document.getElementById("finish-button");
finishButton.addEventListener("click", () => {
  if (transportId == 2) {
    userDistance = tripDistance[0];
    userDuration = tripDuration[0];
  } else if (transportId == 4) {
    userDistance = tripDistance[1];
    userDuration = tripDuration[1];
  }
  total_emissions = carbonEmissions(userDistance, transportId);
  // console.log(tripDistance[1]);
  // console.log(tripDuration[1]);

  // console.log(total_emissions);
  var xhr = new XMLHttpRequest();
  tripInfo =
    "?user_id=" +
    username +
    "&transport_id=" +
    transportId +
    "&user_trip_length=" +
    userDistance +
    "&duration=" +
    userDuration +
    "&user_trip_emissions=" +
    total_emissions;
  xhr.open("GET", "TrackerInsert.php" + tripInfo, true);
  xhr.onload = function () {
    console.log("xhr:" + this.responseText);
  };
  xhr.send();
  alert("Trip is added to your record!");
  document.getElementById("public-transport-text").innerHTML =
    "Public Transport";
  document.getElementById("personal-transport-text").innerHTML =
    "Personal vehicle";

  //update_achievement

  var xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    console.log("xhttp:" + this.responseText);
  };

  xhttp.open("GET", "update_achievements.php", true);
  xhttp.send();
});
const personalTransport = document.getElementById("personal-transport");
personalTransport.addEventListener("click", () => {
  transportId = 4;
  document.getElementById("public-transport-text").innerHTML =
    "Public Transport";
  document.getElementById("personal-transport-text").innerHTML =
    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10004";
  // document.getElementById("personal-transport-text").setAttribute('style','font-size:50px;padding-left:30%;') = "&#10004";
});
const publicTransport = document.getElementById("public-transport");
publicTransport.addEventListener("click", () => {
  transportId = 2;
  document.getElementById("personal-transport-text").innerHTML =
    "Personal vehicle";
  document.getElementById("public-transport-text").innerHTML =
    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10004";
  // document.getElementById("public-transport-text").setAttribute('style','font-size:50px;padding-left:30%;') = "&#10004";
});

//insert into user_trip values (.....,CURRENT_TIMESTAMP, DATEADD(second,  {$seconds},CURRENT_TIMESTAMP),,.....)

function carbonEmissions(dist, transportType) {
  let emissions = 0;
  switch (transportType) {
    case 1:
      // transport_id = 1;
      // 1000x times larger dont forget to change it back (28.6)
      emissions = dist * 28.6;
      break;

    case 2:
      // transport_id = 2;
      emissions = dist * 20.2;
      break;

    case 3:
      // transport_id = 3;
      emissions = dist * 17.7;
      break;

    case 4:
      // transport_id = 4;
      emissions = dist * 243.8;
      break;
  }
  return emissions;
}
