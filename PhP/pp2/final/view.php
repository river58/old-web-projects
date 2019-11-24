<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Hello, world!</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbName = "blood_donations";
		//Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbName);
		// Check connection
		if (!$conn) {
			$err = "true";
			$err2 = ("Connection failed: " . mysqli_connect_error());
		} else {
			$err="false";
		}

            if (isset($_POST["viewID"])){
             $vid = $_POST["viewID"];
            }
            
            ?>
        <div class="background-image"></div>
        <div class="jumbotron jumbotron-fluid text-center jtrn">
            <div class="container">
                <h1><a href="index.php">BLOOOOOODD</a></h1>
            </div>
        </div>
        <div class="container-fluid text-center tpct">
        <?php 
            if (isset($vid) && ($err != "true")){
				echo "<h2 class=\"text-white\">Viewing ID: ".$vid."</h2>";
				echo "<div class=\"row text-center justify-content-around text-white\">";
					echo "<div id=\"leftcol\" class=\"col-6 bgg1\">";
						echo "<h1>Pee</h1>";
					echo "</div>";
					echo "<div id=\"rightcol\" class=\"col-6 bgg1\">";
						echo "<h1>Pee</h1>";
					echo "</div>";
				echo "</div>";
            } else if($err == "true"){
				echo "<div class=\"alert alert-danger\" role=\"alert\"><a href=\"index.php\" class=\"alert-danger\"><h2>Error!".$err2." Try Again!</h2></a></div>";
			} else { echo "<div class=\"alert alert-danger\" role=\"alert\"><a href=\"index.php\" class=\"alert-danger\"><h2>Error! No ID! Try again!</h2></a></div>"; }
            ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>