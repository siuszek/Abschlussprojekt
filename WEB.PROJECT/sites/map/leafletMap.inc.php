<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Landkarte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
        
        <style>
            #map{
                height:600px; 
                width:100%;
            }
            
            .popup{
                width: 110px;
            }
            .popup2{
                width: 110px;
            }
        </style>      
    </head>
    <body>
   
        <div id="map"></div>
        <h1>Map Gallery</h1>
        <script>
            var map = L.map('map').setView([48.56667, 14.1], 8);
            
            L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=DH9DwMCtz3ilHXXZnsqL', {
                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
            }).addTo(map);
            
            var leafletIcon = L.icon ({
                iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-red.png',
                iconSize: [20,50],
                iconAnchor: [20,45],
                popupAnchor: [-10,-35] //relative Ortsangabe von Popup zum Icon
            });


            
            //var foto = //aus der Datenbank
    var popUp = L.popup({
        minWidth: 110        
    });
    popUp.setContent('<a href= "img/aussen.jpg"> <img src="img/aussen.jpg" width = 100, height = 100/> </a>');

    var popUp2 = L.popup({
        minWidth: 110        
    });
    popUp2.setContent('<a href= "img/space.jpg"> <img src="img/space.jpg" width = 100, height = 100/> </a>');
        
    var popUp3 = L.popup({
        minWidth: 110        
    });
    popUp3.setContent('<a href= "img/hongkong.jpg"> <img src="img/hongkong.jpg" width = 100, height = 100/> </a>');

     var popUp4 = L.popup({
        minWidth: 110        
    });
    popUp4.setContent('<a href= "img/light_on.png"> <img src="img/light_on.png" width = 100, height = 100/> </a>');  

                //.setContent('<img src="https://via.placeholder.com/100" />');
                //popUp.setContent('<a href= "img/aussen.jpg"> <img src="img/aussen.jpg" width = 100, height = 100/> </a>');
                //popUp2.setContent('<a href= "img/aussen.jpg"> <img src="img/space.jpg" width = 100, height = 100/> </a>');
        
   
           
            var marker = L.marker([48.56667, 14.1],{icon: leafletIcon}).addTo(map).bindPopup(popUp);
            var marker = L.marker([49, 14.2],{icon: leafletIcon}).addTo(map).bindPopup(popUp2);
            var marker = L.marker([48.3, 14.3],{icon: leafletIcon}).addTo(map).bindPopup(popUp3);
            var marker = L.marker([48.35, 16.7],{icon: leafletIcon}).addTo(map).bindPopup(popUp4);

        </script>
        
    </body>
</html>