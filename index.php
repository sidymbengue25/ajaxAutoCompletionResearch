<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <title>Système auto-complétion</title>
</head>
<body>
  <div class="main-content col-md-offset-2 col-md-4 ">
    <h1>Système d'autocomplétion.</h1><br>
      <div class="input-group col-lg-3">
        <input type="text" autocomplete="off" name="search" id="search" class="form-control" style="text-align: left;">
        <span class="input-group-btn">
          <button class="btn btn-info" type="button">Search</button>
        </span>
      </div>
    <div id="results" class="col-lg-3" style="display: none;"></div>
  </div>
  <script type="text/javascript" src="app.js"></script>
</body>
</html>
