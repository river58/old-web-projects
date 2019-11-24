<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Simple Calorie Counter!</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css.css">
  
</head>

<body style="background-color:#121212;">
  <div class="container-fluid">
    <div class="jumbotron jumbotron-fluid text-white text-center bgg1 jtr">
      <div class="container">
        <a href="index.php"><h1 class="text-white display-3">Calo-Counto</h1></a>
      </div>
    </div>
    <div class="row text-center justify-content-around text-white">
      <!-- Left Column -->
      <div class="col-4 bgg1 br20">
        <br>
        <!-- Form -->
        <form method="post" action="data.php" id="cheese" onsubmit="return validateForm()" target="frame">
          <div class="form row">
          <div class="form-group col-6">
            <label for="dateIn">Date Consumed:</label>
            <input type="date" name="dateIn" class="form-control" id="dateIn" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group col-6">
            <label for="Calories">Calories:</label>
            <input type="number" class="form-control" id="numCals" min="1" name="calories" placeholder="# of Calories" required>
          </div>
          </div>
          <div class="form row">
            <div class="form-group col-12">
              <label for="food">What was consumed:</label>
              <input type="text" class="form-control" id="food" name="food" placeholder="Consumed Item" required>
            </div>
          </div>
          <style>
			.discurs:hover{
				cursor:not-allowed;
			}
		  </style>
          <button type="submit" class="btn btn-primary bgg2">Submit</button>
          <button type="reset" class="btn btn-danger">Clear</button>
          
        </form>
        <br>
      </div>
      <!-- Right Column -->
      <div class="col-4 bgg1 br20">
        <br>
        <a href="cal.php" class="btn btn-primary btn-block text-white btn-lg py-4 bgg2">Dates</a>
        <a<?php
				 if (file_exists("latest.txt")){
					$file = fopen("latest.txt", "r") or die("oof");
					$latest = fread($file, filesize("latest.txt"));
					echo " href=\"view.php?dtv=".$latest;
					echo "\" class=\"btn btn-primary btn-block text-white btn-lg py-4 bgg2\">Latest File</a>";
				 }
				 else{
					 echo " class=\"btn btn-primary btn-block text-white btn-lg py-4 bgg2 discurs\" disabled>No Latest File</a>";
				 }
                 ?>
        <br>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalboi" tabindex="-1" role="dialog" aria-labelledby="modTit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title" id="modTit"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modBod">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('cheese').reset();" id="closeBtn">Add More!</button>
              <button type="button" class="btn btn-primary" id="onlyValid" onclick="redirect();">View</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function redirect(){
      location.href="view.php?dtv="+$("#dateIn").val();
    }
    function validateForm(){
      var x = 0;
      var errStr = "Errors are as follows: ";
      if($("#food").val().includes("|-|-|")){
        x += 1
        errStr += "Do not use \"|-|-|\"! ";
      }
      if($("#food").val() <= 0){
        x += 1
        errStr += "Calories cannot be None or Negative! ";
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
