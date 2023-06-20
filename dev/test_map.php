<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq94vXWhsgs9FC3LgDIKN8FtisFcM4l0A&signed_in=true&callback=initMap&libraries=drawing,places"></script> -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Térkép</title>
   <style>
       #map {
           height: 100%;
           width: 100%;
       }
       html, body {
           height: 100%;
           margin: 0;
           padding: 0;
       }
       .label {
           color: #000;
           background-color: white;
           border: 1px solid #000;
           font-family: "Lucida Grande", "Arial", sans-serif;
           font-size: 12px;
           text-align: center;
           white-space: nowrap;
           padding: 2px;
       }
       .label.green {
           background-color: #58D400;
       }
       .label.red {
           background-color: #D80027;
           color: #fff;
       }
       .label.yellow {
           background-color: #FCCA00;
       }
       .label.turquoise {
           background-color: #00D9D2;
       }
       .label.brown {
           background-color: #BF5300;
           color: #fff;
       }
   </style>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq94vXWhsgs9FC3LgDIKN8FtisFcM4l0A&v=3.exp" type="text/javascript"></script>
   <script src="http://cdn.sobekrepository.org/includes/gmaps-markerwithlabel/1.9.1/gmaps-markerwithlabel-1.9.1.js" type="text/javascript"></script>
</head>
<body>
<div id="map"></div>
<script>
 function initMap() {
   var bp = {lat: 47.538736, lng: 19.04631};
   var map = new google.maps.Map(document.getElementById('map'), {
     zoom: 11,
     center: bp
   });
   var locations = [
     ['Label 1', 47.453740, 19.142052, 'green', 38, -3],
     ['Label 2', 47.502547, 19.038126, 'red', -10, 20],
     ['Label 3', 47.650821, 19.020171, 'brown', 23, -3],
     ['Label 4', 47.490881, 19.012405, 'yellow', 23, -3],
     ['Label 5', 47.562505, 19.087996, 'red', 23, -3],
     ['Label 6', 47.481118, 19.250704, 'yellow', 37, -3],
     ['Label 7', 47.569537, 19.098241, 'yellow', -10, 20],
     ['Label 8', 47.496817, 19.030732, 'turquoise', 55, 33],
     ['Label 9', 47.480566, 19.276519, 'green', 10, -3],
     ['Label 10', 47.478538, 19.046445, 'turquoise', 23, -3],
     ['Label 11', 47.435689, 19.210308, 'turquoise', 10, -3],
     ['Label 12', 47.492465, 19.052041, 'red', -10, 15],
     ['Label 13', 47.523764, 19.096748, 'green', 25, -3],
     ['Label 14', 47.521279, 19.161779, 'yellow', 25, 50],
     ['Label 15', 47.438614, 19.183433, 'yellow', 45, -5],
     ['Label 16', 47.501973, 19.034013, 'brown', 40, 45]
   ];
   var icons = {
     'green': {
       url: 'https://goo.gl/qvLZ4R',
       color: '#58D400'
     },
     'yellow': {
       url: 'https://goo.gl/G6HyHS',
       color: '#FCCA00'
     },
     'red': {
       url: 'https://goo.gl/6hkqX1',
       color: '#D80027'
     },
     'turquoise': {
       url: 'https://goo.gl/uLRpYZ',
       color: '#00D9D2'
     },
     'brown': {
       url: 'https://goo.gl/XTosFM',
       color: '#BF5300'
     }
   };
   var image = 'https://goo.gl/dqvvFA';
   for (var i = 0; i < locations.length; i++) {
     var item = locations[i];
     var marker = new MarkerWithLabel({
       position: {lat: item[1], lng: item[2]},
       map: map,
       icon: icons[item[3]].url,
       labelContent: item[0],
       labelAnchor: new google.maps.Point(item[4], item[5]),
       // the CSS class for the label
       labelClass: "label " + item[3],
       labelInBackground: true
     });
   }
 }
 initMap();
</script>
</body>
</html>
