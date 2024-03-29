let transportId = 0;
let end_time;
let start_time;
let userDistance;
let userDuration;
let total_emissions;
const finishButton = document.getElementById("finish-button");
finishButton.addEventListener("click", () => {
  if (transportUserChoice == 2) {
    userDistance = tripDistanceList[0];
    userDuration = tripDurationList[1];
    total_emissions = tripEmissionList[0];
  } else if (transportUserChoice == 4) {
    userDistance = tripDistanceList[1];
    userDuration = tripDurationList[0];
    total_emissions = tripEmissionList[1];
  }
  // console.log(tripDistance[0]);
  // console.log(tripDuration[0]);
  // console.log(tripDistance[1]);
  // console.log(tripDuration[1]);

  // console.log(total_emissions);
  var xhr = new XMLHttpRequest();
  tripInfo =
    "?user_id=" +
    username +
    "&transport_id=" +
    transportUserChoice +
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
// const personalTransport = document.getElementById("personal-transport");
// personalTransport.addEventListener("click", () => {
//   transportId = 4;
//   document.getElementById("public-transport-text").innerHTML =
//     "Public Transport";
//   document.getElementById("personal-transport-text").innerHTML =
//     "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10004";
//   // document.getElementById("personal-transport-text").setAttribute('style','font-size:50px;padding-left:30%;') = "&#10004";
// });
// const publicTransport = document.getElementById("public-transport");
// publicTransport.addEventListener("click", () => {
//   transportId = 2;
//   document.getElementById("personal-transport-text").innerHTML =
//     "Personal vehicle";
//   document.getElementById("public-transport-text").innerHTML =
//     "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10004";
//   // document.getElementById("public-transport-text").setAttribute('style','font-size:50px;padding-left:30%;') = "&#10004";
// });

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

// // Wrap every letter in a span
// var textWrapper = document.querySelector(".ml1 .letters");
// textWrapper.innerHTML = textWrapper.textContent.replace(
//   /\S/g,
//   "<span class='letter'>$&</span>"
// );

// anime
//   .timeline({ loop: true })
//   .add({
//     targets: ".ml1 .letter",
//     scale: [0.3, 1],
//     opacity: [0, 1],
//     translateZ: 0,
//     easing: "easeOutExpo",
//     duration: 600,
//     delay: (el, i) => 70 * (i + 1),
//   })
//   .add({
//     targets: ".ml1 .line",
//     scaleX: [0, 1],
//     opacity: [0.5, 1],
//     easing: "easeOutExpo",
//     duration: 700,
//     offset: "-=875",
//     delay: (el, i, l) => 80 * (l - i),
//   })
//   .add({
//     targets: ".ml1",
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 5000,
//   });
// Wrap every letter in a span
var textWrapper = document.querySelector(".ml7 .letters");
textWrapper.innerHTML = textWrapper.textContent.replace(
  /\S/g,
  "<span class='letter'>$&</span>"
);

anime
  .timeline({ loop: true })
  .add({
    targets: ".ml7 .letter",
    translateY: ["1.1em", 0],
    translateX: ["0.55em", 0],
    translateZ: 0,
    rotateZ: [180, 0],
    duration: 1550,
    easing: "easeOutExpo",
    delay: (el, i) => 50 * i,
  })
  .add({
    targets: ".ml7",
    opacity: 0,
    duration: 4000,
    easing: "easeOutExpo",
    delay: 30000,
  });

// Wrap every letter in a span
var textWrapper = document.querySelector(".ml8 .letters");
textWrapper.innerHTML = textWrapper.textContent.replace(
  /\S/g,
  "<span class='letter'>$&</span>"
);

anime
  .timeline({ loop: true })
  .add({
    targets: ".ml8 .letter",
    translateY: ["1.1em", 0],
    translateX: ["0.55em", 0],
    translateZ: 0,
    rotateZ: [180, 0],
    duration: 4000,
    easing: "easeOutExpo",
    delay: (el, i) => 50 * i,
  })
  .add({
    targets: ".ml8",
    opacity: 0,
    duration: 2200,
    easing: "easeOutExpo",
    delay: 30000000,
  });

document.getElementById("guide-1").addEventListener("click", () => {
  console.log(document.getElementById("letters-1"));
  document.getElementsByClassName("letter span").textContent("blah blah blah");
});
