<?php
    $PageName = "Route";
    include("./Assets/config.php");
    session_start();
    

    $SQL_Request = "
    Select
        donkeytravel.tochten.Route,
        donkeytravel.boekingen.PINCode
    From
        donkeytravel.boekingen Inner Join
        donkeytravel.tochten On donkeytravel.boekingen.FKtochtenID = donkeytravel.tochten.ID
    Where
        donkeytravel.boekingen.PINCode = ".$_GET['PIN']."
    ";

    $query_run = mysqli_query($con, $SQL_Request);
    if($query_run->num_rows>0){
        while ($row = mysqli_fetch_assoc($query_run)) 
        {
            $route = explode(",", $row["Route"]);
    
            $cordsArray = array();
    
            $MaxValue = count($route) -1;
            $startCode = 0;
    
            foreach ($route as $key => $value) {
                if($startCode == 0 || $startCode == $MaxValue){
                    $SQL_Request_location = "Select
                        donkeytravel.herbergen.Coordinaten
                    From
                        donkeytravel.herbergen
                    Where
                        donkeytravel.herbergen.ID = ".$value."";
    
                }else{
                    $SQL_Request_location = "Select
                        donkeytravel.restaurants.Coordinaten
                    From
                        donkeytravel.restaurants
                    Where
                        donkeytravel.restaurants.ID = ".$value."";
                }
    
                $query_run_Location = mysqli_query($con, $SQL_Request_location);
                while ($row_location = mysqli_fetch_assoc($query_run_Location)) {
                    array_push($cordsArray, $row_location['Coordinaten']);
                }
                $startCode++;
            }
        }
    }else{
        header("location: portal.php");
        exit;
    }
    

    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Route</h5>
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

    var CordsArray_Java = <?php echo json_encode($cordsArray) ?>;

    var MaxValue_Java = <?= $MaxValue ?>;
    var startCode_java = 0;

    CordsArray_Java.forEach(element => {

        const SpitText = element.split(",");

        if(startCode_java == 0){
            var target = L.latLng(SpitText[0], SpitText[1]);
            map.setView(target, 14);
            
        }else{
            var target = L.latLng(SpitText[0], SpitText[1]);
        }
        L.marker(target).addTo(map);

        startCode_java++;
    });

    // var target = L.latLng('51.7218987', '5.8797225');
    // map.setView(target, 14);
    // L.marker(target).addTo(map);
    // var target1 = L.latLng('51.7314521', '5.852152');
    // L.marker(target1).addTo(map);
</script>