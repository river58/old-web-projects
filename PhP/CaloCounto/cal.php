<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Select a Date!</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body style="background-color:#121212;">
  <div class="container-fluid">
    <div class="jumbotron jumbotron-fluid text-white text-center bgg1 jtr">
      <div class="container">
        <a href="index.php">
          <h1 class="text-white display-3">Calo-Counto</h1>
        </a>
      </div>
    </div>
    <div class="row justify-content-center text-center text-white">
      <div class="col-auto bg-dark" style="border-radius:10px;">
        <h1>Choose a date!</h1>
        <form action="view.php" method="GET">
          <div class="form-group">
            <label for="dtv">Date:</label>
            <input type="date" name="dtv" class="form-control" id="dtv" style="text-transform: uppercase;" required>
          </div>
          <button type="submit" class="btn btn-primary bgg2">Submit</button>
        </form>
        <br>
      </div>
    </div>
  </div>
  <iframe name="frame" style="display:none;"></iframe>
</body>

</html>