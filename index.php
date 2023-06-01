<!DOCTYPE html>
<html>
<head>
  <title>Navigation Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <style>
    /* Custom CSS for the navbar */
    body{
        background-color: #dcdcdc
;
    }
    .navbar-custom {
      background-color: #333;
    }

    .navbar-custom .navbar-brand {
      font-weight: bold;
      color: #fff;
    }

    .navbar-custom .nav-link {
      color: #fff;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link:focus {
      color: #007bff;
    }

    /* Custom CSS for the content */
    .content {
      color: #fff;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom">
    <div class="container">
      <a class="navbar-brand" href="index.php">2011 - Dummy Elections Results</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="unit_results.php">Results</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="local_government_results.php">View Results - LGA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="store_results.php">Store Results</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>
  <div class="container">
    <h1>Welcome to the Navigation Page</h1>
    <h2>2011 <em>Dummy</em> Elections <em>Results</em> from different pooling units.</h2>
    <p>You can click on the links in the navbar to access the different links for election.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget est eu orci tincidunt mattis. Donec fringilla libero nec ante pellentesque congue. Nulla facilisi. Praesent porta ex id eros rhoncus, ac sollicitudin tortor posuere. Sed dictum massa nec ex fringilla, sit amet tincidunt justo dapibus. Nam sollicitudin scelerisque tristique. Nam ac velit sit amet felis facilisis feugiat nec sed sapien. Sed quis augue a ante finibus gravida in non arcu. Duis ac arcu in velit luctus congue.</p>
    <h1>Click on any of the buttons below to view content</h1>
    <a class="btn btn-success" href="unit_results.php" role="button">Summed Results</a>
    <a class="btn btn-primary" href="local_government_results.php" role="button">Summed Results</a>
    <a class="btn btn-primary" href="store_results.php" role="button">Store Results</a>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
