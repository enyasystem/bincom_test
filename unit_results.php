<?php
include('config.php');
include('nav.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the polling unit ID from the form submission
  $pollingUnitId = $_POST["polling_unit_id"];

  // Query the database to retrieve the results for the specified polling unit
  $query = "SELECT party_abbreviation, party_score FROM announced_pu_results WHERE polling_unit_uniqueid = $pollingUnitId";
  $result = mysqli_query($connection, $query);

  // Check if the query was successful
  if ($result) {
    // Display the results in a table
    echo '<table class="table table-bordered">
            <thead>
              <tr>
                <th>Party Abbreviation</th>
                <th>Party Score</th>
              </tr>
            </thead>
            <tbody>';

    // Loop through the results and display each row
    while ($row = mysqli_fetch_assoc($result)) {
      $partyAbbreviation = $row["party_abbreviation"];
      $partyScore = $row["party_score"];

      echo '<tr>
              <td>' . $partyAbbreviation . '</td>
              <td>' . $partyScore . '</td>
            </tr>';
    }

    echo '</tbody></table>';
  } else {
    echo "Error: " . mysqli_error($connection);
  }

  // Close the database connection
  mysqli_close($connection);
}
?>
<br><br>
<!-- HTML form to capture the polling unit ID -->
<!DOCTYPE html>
<html>
<head>
  <title>Individual Unit Results</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Individual Unit Results</h1>

    <form method="post" action="">
      <div class="form-group">
        <label for="polling_unit_id">Polling Unit ID:</label>
        <input type="text" class="form-control" id="polling_unit_id" name="polling_unit_id">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
