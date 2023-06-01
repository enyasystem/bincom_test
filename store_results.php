<?php
include('config.php');
include('nav.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $pollingUnitId = $_POST["polling_unit_id"];
  $partyResults = $_POST["party_results"];

  // Loop through the party results and insert them into the database
  foreach ($partyResults as $partyAbbreviation => $partyScore) {
    $partyAbbreviation = mysqli_real_escape_string($connection, $partyAbbreviation);
    $partyScore = mysqli_real_escape_string($connection, $partyScore);

    // Insert the party result into the database
    $query = "INSERT INTO announced_pu_results (polling_unit_uniqueid, party_abbreviation, party_score) 
              VALUES ($pollingUnitId, '$partyAbbreviation', $partyScore)";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if (!$result) {
      echo "Error: " . mysqli_error($connection);
      break;
    }
  }

  if ($result) {
    echo "Results successfully stored for the new polling unit.";
  }
}

// Close the database connection
mysqli_close($connection);
?>
<br><br>
<!-- HTML form to store results for a new polling unit -->
<!DOCTYPE html>
<html>
<head>
  <title>Store Results for New Polling Unit</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Store Results for New Polling Unit</h1>

    <form method="post" action="">
      <div class="form-group">
        <label for="polling_unit_id">Polling Unit ID:</label>
        <input type="text" class="form-control" id="polling_unit_id" name="polling_unit_id">
      </div>

      <div class="form-group">
        <label for="party_results">Party Results:</label>
        <table class="table table-bordered" id="party_results">
          <thead>
            <tr>
              <th>Party Abbreviation</th>
              <th>Party Score</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" class="form-control" name="party_results[PDP]" placeholder="PDP"></td>
              <td><input type="text" class="form-control" name="party_results[DPP]" placeholder="DPP"></td>
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="party_results[CAN]" placeholder="CAN"></td>
              <td><input type="text" class="form-control" name="party_results[PPA]" placeholder="PPA"></td>
            </tr>
            <tr>
              <td><input type="text" class="form-control" name="party_results[CDC]" placeholder="CDC"></td>
              <td><input type="text" class="form-control" name="party_results[JP]" placeholder="JP"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
