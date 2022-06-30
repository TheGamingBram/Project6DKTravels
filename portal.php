<?php
    $PageName = "Portal";
    include("./Assets/config.php");
    session_start();

    $query_Boekingen = "
    Select
        donkeytravel.boekingen.id,
        donkeytravel.klanten.Email,
        donkeytravel.boekingen.Startdatum,
        donkeytravel.boekingen.PINCode,
        donkeytravel.tochten.Omschrijving
    From
        donkeytravel.klanten Inner Join
        donkeytravel.boekingen On donkeytravel.boekingen.FKklantenID = donkeytravel.klanten.ID Inner Join
        donkeytravel.tochten On donkeytravel.tochten.ID = donkeytravel.boekingen.FKtochtenID
    Where
      donkeytravel.klanten.Email = '".$_SESSION['email']."'
    ";

    $table_Boeking = "";

    $query_Boekingen_run = mysqli_query($con, $query_Boekingen);
    if($query_Boekingen_run->num_rows>0){
      while ($row_boeking = mysqli_fetch_assoc($query_Boekingen_run)){
        $table_Boeking .= "<tr>";
          $table_Boeking .= "<td>";
            $table_Boeking .= $row_boeking['id'];
          $table_Boeking .= "</td>";
          $table_Boeking .= "<td>";
            $table_Boeking .= date("F j, Y",strtotime($row_boeking['Startdatum']));
          $table_Boeking .= "</td>";
          $table_Boeking .= "<td>";
            $table_Boeking .= $row_boeking['PINCode'];
          $table_Boeking .= "</td>";
          $table_Boeking .= "<td>";
            $table_Boeking .= $row_boeking['Omschrijving'];
          $table_Boeking .= "</td>";
        $table_Boeking .= "</tr>";
      }  
    }
    
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
    <table id="Boekingen_Table" class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Start Datum</th>
                <th>Pin</th>
                <th>Info Route</th>
            </tr>
        </thead>
        <tbody>
          <?= $table_Boeking ?>
        </tbody>
    </table>
  </div>
</div>

<script>
    $('#Boekingen_Table').DataTable({
        paging: true,
        "info": false,
        "lengthChange":false,
        "pageLength": 5,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/nl-NL.json" // adds dutch language support
        },
        "columnDefs": [
          {
              "targets": [0],
              "visible": false,
              "searchable": false
          }
        ]
    });
</script>