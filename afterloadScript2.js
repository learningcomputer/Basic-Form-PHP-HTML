
var d = new Date();
document.getElementById("nowDate").innerHTML = d.toDateString();




function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// var x = document.getElementById("demo");
// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition, showError);
//   } else {
//     x.value = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//   x.value = "Latitude: " + position.coords.latitude +
//     ", Longitude: " + position.coords.longitude;
//   /*           x.innerHTML = "Latitude: " + position.coords.latitude +
//               "<br>Longitude: " + position.coords.longitude; */
// }


function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED:
      x.value = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.value = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.value = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.value = "An unknown error occurred."
      break;
  }
}

var geoaddress = document.getElementById("demo");
function getLocation2() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition2, showError);
  } else {
    geoaddress.value = "Geolocation is not supported by this browser.";
  }
}


function showPosition2(position) {
  var latlon = position.coords.latitude + "," + position.coords.longitude;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      document.getElementById("demo").value = myObj.results[0].formatted_address;
    }
  };
  xmlhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latlon + "&key=", true);
  xmlhttp.send();
  var emb_url = "https://www.google.com/maps/embed/v1/place?key=&q=" + latlon;

  document.getElementById("iframeholder").innerHTML = "<iframe width='80%'  height='250' style='border:1' loading='lazy' src='" + emb_url + "'></iframe>";

  
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
//var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
document.getElementById("currentDate").value = date;

var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
document.getElementById("currentTime").value = time;
