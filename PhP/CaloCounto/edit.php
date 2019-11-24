<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Edit this entry!</title>
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
    <?php
    $date = $_GET["dtv"];
    $line = $_GET["ln"];
    $a = $date != "";
    $b = $line != "";
    $err = "<div class=\"alert text-center alert-danger\"><h1 class=\"alert-heading\"><a href=\"cal.php\" class=\"alert-link\">Nothing here! Go to your room!</a></h1></div>";
    if ($a && $b){
      $filename = ("dates/".$date.".txt");
      if(file_exists($filename)){
        $file = fopen($filename, "r") or die($err);
        $data = fread($file, filesize("dates/".$date.".txt"));
        $listboi = explode("\n", $data);
        $linedata = $listboi[$line];
        $owo = explode("|-|-|", $linedata);
        echo "<div class=\"row justify-content-center text-center text-white\">
      <div class=\"col-auto bg-dark\" style=\"border-radius:10px;\">
	  <h1>Edit Entry!</h1>
        <a href=\"view.php?dtv=".$date."\" class=\"btn btn-secondary\"><i style=\"font-size:80px;\" class=\"fas fa-long-arrow-alt-left\"></i></a>
		
        <form method=\"post\" action=\"savedit.php\" id=\"cheese\" onsubmit=\"return validateForm()\">
          <div class=\"form row\">
          <div class=\"form-group col-6\">
            <label for=\"dateIn\">Date Consumed:</label>
            <input type=\"date\" name=\"dateIn\" class=\"form-control\" id=\"dateIn\" style=\"text-transform: uppercase;\" value=\"".$date."\" required>
          </div>
          <div class=\"form-group col-6\">
            <label for=\"Calories\">Calories:</label>
            <input type=\"number\" class=\"form-control\" id=\"numCals\" name=\"calories\" placeholder=\"# of Calories\" value=\"".$owo[1]."\" required>
          </div>
          </div>
          <div class=\"form row\">
            <div class=\"form-group col-12\">
              <label for=\"food\">What was consumed:</label>
              <input type=\"text\" class=\"form-control\" id=\"food\" name=\"food\" placeholder=\"Consumed Item\" value=\"".$owo[0]."\" required>
              <input type=\"text\" style=\"display:none;\" name=\"oldat\" value=\"".$date."\" required>
              <input type=\"text\" style=\"display:none;\" name=\"linum\" value=\"".$line."\" required>
            </div>
          </div>
          
          <button type=\"submit\" class=\"btn btn-primary bgg2\">Submit</button>
        </form>
        <br>
        <form method=\"post\" action=\"savedit.php\">
        <input type=\"text\" style=\"display:none;\" name=\"oldat\" value=\"".$date."\" required>
        <input type=\"text\" style=\"display:none;\" name=\"linum\" value=\"".$line."\" required>
        <input type=\"text\" style=\"display:none;\" name=\"lida\" value=\"".$linedata."\" required>
        <input type=\"text\" style=\"display:none;\" name=\"del\" value=\"1\" required>
        <button type=\"submit\" class=\"btn btn-danger\"><i class=\"fas fa-trash\"></i> delet this</button>
        </form>
        <br>
      </div>
    </div>";
        fclose($file);
      } else {
        echo $err;
      }
    } else {
      echo $err;
    }
    ?>
    
  </div>
  <script>
    function validateForm(){
      var x = 0;
      var errStr = "Errors are as follows: ";
      if($("#food").val().includes("|-|-|")){
        x += 1
        errStr += "Do not use \"|-|-|\"! ";
      }
      if(x > 0){
        $("#modTit").text("Failure! Error(s):");
        $("#modBod").text(errStr);
        try{
          $("#onlyValid").hide();
          $("#closeBtn").removeClass("btn-secondary");
          $("#closeBtn").addClass("btn-danger");
          $("#modTit").addClass("text-danger");
          $("#modTit").addClass("bg-warning");
          $("#modTit").addClass("rounded");
          $("#modTit").addClass("p-1");
          $("#modTit").addClass("px-2");
        }catch(err){
        }
        $("#modalboi").modal();
        return false;
      }else{
        try{
          $("#onlyValid").show();
          $("#closeBtn").addClass("btn-secondary");
          $("#closeBtn").removeClass("btn-danger");
          $("#modTit").removeClass("text-danger");
          $("#modTit").removeClass("bg-warning");
          $("#modTit").removeClass("rounded");
          $("#modTit").removeClass("p-1");
          $("#modTit").removeClass("px-2");
        }catch(err){
        }
      
        $("#modTit").text("Succcess!");
        $("#modBod").text("You successfully added a new entry!");
        $("#modalboi").modal();
        return true;
      }
    }
  </script>
  <iframe name="frame" style="display:none;"></iframe>
</body>

</html>