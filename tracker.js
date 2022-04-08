var lat = 0;
var lng = 0;
var lat2 = 0;
var lng2 = 0;
var keepTracking = true;
let distance;
const buttonStartTrack = document.getElementById("start-tracking");

const buttonStopTrack = document.getElementById("stop-tracking");

function createMap(lat) {
  var map = L.map("map");
  L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
    {
      attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: "mapbox/streets-v11",
      tileSize: 512,
      zoomOffset: -1,
      accessToken:
        "pk.eyJ1IjoiamFja3NvbmphY2tzb25qYWNrc29uIiwiYSI6ImNsMHQ3MHBuOTBodzczY3JwOW91NTk5djEifQ.hfwu_tJVcukZMyLU-IcvbA",
    }
  ).addTo(map);
  navigator.geolocation.getCurrentPosition((position) => {
    const {
      coords: { latitude, longitude },
    } = position;

    map.setView([latitude, longitude], 13).locate();
  });
  navigator.geolocation.getCurrentPosition((position) => {
    const {
      coords: { latitude, longitude },
    } = position;
    var marker = new L.marker([latitude, longitude], {
      draggable: true,
      autoPan: true,
    }).addTo(map);
  });
}

// createMap(coords);
function calculateDistance() {
  var options = {
    enableHighAccuracy: true,
  };
  if (navigator.geolocation)
    navigator.geolocation.getCurrentPosition(
      function (position) {
        lat = lat2;
        lng = lng2;
        lat2 = position.coords.latitude;
        lng2 = position.coords.longitude;
        //calculate the distance now
        lng3 = (lng * Math.PI) / 180;
        lng4 = (lng2 * Math.PI) / 180;
        lat3 = (lat * Math.PI) / 180;
        lat4 = (lat2 * Math.PI) / 180;
        // console.log(lat);
        // console.log(lat2);
        // Haversine formula
        if (lat != 0 && lng != 0) {
          let dlon = lng4 - lng3;
          let dlat = lat4 - lat3;
          let a =
            Math.pow(Math.sin(dlat / 2), 2) +
            Math.cos(lat3) * Math.cos(lat4) * Math.pow(Math.sin(dlon / 2), 2);

          let c = Math.asin(Math.sqrt(a));
          // Radius of earth in kilometers. Use 3956
          // for miles
          let r = 6371;

          typeof distance !== "undefined"
            ? (distance += c * r)
            : (distance = c * r);

          if (typeof distance !== "undefined" && c * r > 0) {
            document.getElementById("demo").innerHTML = distance;
          }
        }
        if (distance > 0) {
          console.log(distance);
        }
      },
      function () {
        alert("Could not get it");
      },
      options
    );
  buttonStopTrack.addEventListener("click", () => {
    keepTracking = false;
  });

  if (keepTracking) {
    setTimeout(calculateDistance, 300);
  }
}

buttonStartTrack.addEventListener("click", () => {
  createMap();
  calculateDistance();
});
