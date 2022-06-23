<?php
    $PageName = "Portal";
    include("./Assets/config.php");
    session_start();
    

    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions
?>

<div class="card text-start">
  <div class="card-body">
    <h4 class="card-title">Mijn Boekingen</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Start Datum</th>
                <th>Pin</th>
                <th>Info Route</th>
            </tr>
        </thead>
    </table>
  </div>
</div>