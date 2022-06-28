<?php
    $PageName = "Portal";
    include("./Assets/config.php");
    session_start();
  
    include("PAGE_FRAMEWORK.php"); //connection to database and some test functions
?>

<div class="row">
  <div class="col"></div>
  <div class="col card text-start">
    <div class="card-body">
      <h4 class="card-title">Route Pin</h4>
      <hr>
      <form method="get" action="Route.php">
      <div class="row g-3">
        <div class="col-auto">
          <label for="input" class="col-form-label">Pin</label>
        </div>
        <div class="col-auto">
          <input type="text" id="input" name="PIN" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Gebruik de pin van jou boeking
          </span>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  <div class="col"></div>
</div>

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