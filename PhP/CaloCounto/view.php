<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php 
    $timm = strtotime($_GET["dtv"]);
    $fulltime = date("l, F jS, Y",$timm);
    echo $fulltime;
    ?></title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  
</head>

<body style="background-color:#121212;" onload="sortTable();">
  <div class="container-fluid">
    <div class="jumbotron jumbotron-fluid text-white text-center bgg1 jtr">
      <div class="container">
        <a href="index.php"><h1 class="text-white display-3">Calo-Counto</h1></a>
      </div>
    </div>
    <div class="row justify-content-center text-center">
    <div class="col-auto">
      <?php
      //error
      $err = "<div class=\"alert alert-danger\"><h1 class=\"alert-heading\"><a href=\"cal.php\" class=\"alert-link\">Nothing here! Go to your room!</a></h1></div>";
      $err2 = "<div class=\"alert alert-danger\"><h1 class=\"alert-heading\"><a href=\"index.php\" class=\"alert-link\">Weird Error! Contact indian tech support.</a></h1></div>";
      //gets the date to view
      $dtv = $_GET["dtv"];
      //checks if var isn't empty
      if ($dtv != ""){
        //Sets Filename
        $filename = ("dates/".$dtv.".txt");
        //Checks if it exists
        if (file_exists($filename)){
          //Echos the header with the date.
          echo"<div style=\"padding:10px;\"class=\"jumbotron bg-dark text-white\"><h1 class=\"display-4\">".$fulltime."</h1><h2 class=\"display-6\"><a href=\"cal.php\" class=\"btn btn-secondary\"><i style=\"font-size:80px;\" class=\"fas fa-long-arrow-alt-left\"></i></a></h2></div>";
          //Echos the Card.
          echo "<div class=\"card bg-dark\" style=\"border-radius:10px; padding:5px;\">";
          //Bootstrap table div
          echo "<div class=\"table-responsive\" style=\"padding-bottom:0px;\">";
          //Table + Bootstrap styling
          echo "<table id=\"spag\" style=\"margin-bottom:0px;\" class=\"table table-dark text-white text-center table-bordered table-striped table-hover\">";
          //table headers
          echo "<tr><th>Edit</th><th>Food</th><th># Calories</th></tr>";
          //Opens File, reads, sets variables
          $file = fopen($filename, "r") or die($err2);
          $data = fread($file, filesize("dates/".$dtv.".txt"));
          //Explodes newlines into an array
          $allfoods = explode("\n", $data);
          $towrite = "";
          $xnum = 0;
          //for everything in the array, seperate it into Calories and Foods
          foreach($allfoods as &$combo) {
            if ($combo == "") {
              
            } else {
            $combo = $combo."|||--|||".$xnum;
            $xnum += 1;
            }
          }
          sort($allfoods);
          foreach($allfoods as $grimbo){
            if ($grimbo == "") {
              
            } else {
            $owo = explode("|-|-|", $grimbo);
            $foodname = $owo[0];
            $test = explode("|||--|||", $owo[1]);
            $calories = $test[0];
            $lnum = $test[1];
            $towrite = "<tr><td><a id=".$xnum." href=\"" . "edit.php?dtv=".$dtv."&ln=".$lnum."\"'><i class=\"fas fa-pencil-alt\"></i></a></td><td>" . $foodname . "</td><td>" . $calories . "</td></tr>";
            echo $towrite;
            }
          }
          fclose($file);
          echo "</table></div></div>";
        } else {
          echo $err;
        }
      } else {
        echo $err;
      }
      ?>
    </div>
      </div>
  </div>
<iframe name="frame" style="display:none;"></iframe>
</body>

</html>
