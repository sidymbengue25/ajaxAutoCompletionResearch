<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="boostrap.css">
  <title>Système auto-complétion</title>
  <style type="text/css">
    .child{
      cursor: pointer;
      width: 100%;
      padding-left:12px;
    }
    .child:hover,#focused_result{
      background: #39b3d7;
      color: #fff;
    }
    #results{
      padding: 0;
      border: .5px groove lightgrey;
      box-shadow: 2px 2px 0 grey;
    }
  </style>
</head>
<body>
  <div class="main-content col-md-offset-2 col-md-4col-offset">
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
