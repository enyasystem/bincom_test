<?php
include('config.php');
include('nav.php');

// Retrieve the list of local governments (LGAs) from the database
$query = "SELECT * FROM LGA";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
  // Fetch all the LGAs into an array
  $lgas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Free the result set
  mysqli_free_result($result);
} else {
  echo "Error: " . mysqli_error($connection);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the selected local government ID from the form submission
  $selectedLgaId = $_POST["lga_id"];

  // Query the database to retrieve the summed total results for the polling units under the selected local government
  $query = "SELECT party_abbreviation, SUM(party_score) AS total_score FROM announced_pu_results 
            INNER JOIN polling_unit ON announced_pu_results.polling_unit_uniqueid = polling_unit.uniqueid
            WHERE polling_unit.lga_id = $selectedLgaId
            GROUP BY party_abbreviation";
  $result = mysqli_query($connection, $query);

  // Check if the query was successful
  if ($result) {
    // Display the results in a table
    echo '<table class="table table-bordered">
            <thead>
              <tr>
                <th>Party Abbreviation</th>
                <th>Total Score</th>
              </tr>
            </thead>
            <tbody>';

    // Loop through the results and display each row
    while ($row = mysqli_fetch_assoc($result)) {
      $partyAbbreviation = $row["party_abbreviation"];
      $totalScore = $row["total_score"];

      echo '<tr>
              <td>' . $partyAbbreviation . '</td>
              <td>' . $totalScore . '</td>
            </tr>';
    }

    echo '</tbody></table>';
  } else {
    echo "Error: " . mysqli_error($connection);
  }
}

// Close the database connection
mysqli_close($connection);
?>
<br><br>
<!-- HTML form to select the local government -->
<!DOCTYPE html>
<html>
<head>
  <title>Summed Total Results by Local Government</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Summed Total Results by Local Government</h1>

    <form method="post" action="">
      <div class="form-group">
        <label for="lga_id">Select Local Government:</label>
        <select class="form-control" id="lga_id" name="lga_id">
          <?php foreach ($lgas as $lga) : ?>
            <option value="<?php echo $lga['lga_id']; ?>"><?php echo $lga['lga_name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Get Results</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
