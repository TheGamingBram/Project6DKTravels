<?php
    $PageName = "Maps";
    include("./Assets/config.php");
    session_start();
    

    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Maps</h5>
        <p class="card-text">
            <div id="map"></div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>
<script>
    var element = document.getElementById('map');
    element.style = 'height:500px;';
    var map = L.map(element);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


    var target = L.latLng('51.7218987', '5.8797225');
    map.setView(target, 14);
    L.marker(target).addTo(map);
    var target1 = L.latLng('51.7314521', '5.852152');
    L.marker(target1).addTo(map);
</script>