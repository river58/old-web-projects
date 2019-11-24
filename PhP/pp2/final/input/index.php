<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Hello, world!</title>
        <link rel="stylesheet" href="../css.css">
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

            if (isset($_POST["addID"])){
				if (!empty($_POST["addID"])&&($_POST["addID"] != "")){
					$aid = $_POST["addID"];
				}
			}
			if (isset($_POST["editID"])){
				if (!empty($_POST["editID"])&&($_POST["editID"] != "")){
					$eid = $_POST["editID"];
          $oldat = $_POST["oldtim"]; 
				}
			}
            ?>
        <div class="background-image"></div>
        <div class="jumbotron jumbotron-fluid text-center jtrn">
            <div class="container">
                <h1><a href="../">BLOOOOOODD</a></h1>
            </div>
        </div>
        <div class="container-fluid text-center tpct">
		<?php 
            if ((isset($aid) OR isset($eid)) && ($err != "true")){
				if (isset($eid)){$aid = $eid;}
				echo "<h2 class=\"text-white\">Adding New Info For ID: ".$aid."</h2>";
				echo "<div class=\"row text-center justify-content-around text-white bgg1 py-3 br20\">";
				echo   "<form action=\"../adedit.php\" method=\"post\" onsubmit=\"return validate();\">
							<div class=\"row justify-content-around\">
								<div id=\"leftcol\" class=\"col\">
									<h2>Info</h2>
										<div class=\"form-group\">
											<label for=\"email\">E-Mail</label>
											<input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" placeholder=\"email@site.com\""; 
											if (isset($email)){echo "value=\"".$email."\"";}
											echo "required>
										</div>
									<div class=\"form-row\">
										<div class=\"form-group col-6\">
											<label for=\"fnam\">First Name</label>
											<input type=\"text\" name=\"fnam\" class=\"form-control\" id=\"fnam\" placeholder=\"Bob\"";
											if (isset($fnam)){echo "value=\"".$fnam."\"";}
											echo "required>
										</div>
										<div class=\"form-group col-6\">
											<label for=\"lnam\">Last Name</label>
											<input type=\"text\" name=\"lnam\" class=\"form-control\" id=\"lnam\" placeholder=\"Ross\"";
											if (isset($lnam)){echo "value=\"".$lnam."\"";}
											echo "required>
										</div>
									</div>
									<div class=\"form-group\">
										<label for=\"blood\">Blood Type</label>
										<select class=\"form-control\" id=\"blood\" name=\"blood\" required>
											<option selected disabled value=\"\">---SELECT BLOOD TYPE---</option>
											<option value=\"A+\">A+</option>
											<option value=\"A-\">A-</option>
											<option value=\"B+\">B+</option>
											<option value=\"B-\">B-</option>
											<option value=\"O+\">O+</option>
											<option value=\"O-\">O-</option>
											<option value=\"AB+\">AB+</option>
											<option value=\"AB-\">AB-</option>
										</select>
									</div>
									<div class=\"form-group\">
										<label for=\"pnum\">Phone Number(s), Seperate with Comma</label>
										<input type=\"text\" name=\"pnum\" class=\"form-control\" id=\"pnum\" placeholder=\"(XXX) XXX-XXXX\"";
										if (isset($pnum)){echo "value=\"".$pnum."\"";}
										echo "required>
									</div>
								</div>
								<div id=\"rightcol\" class=\"col\">
									<h2>Address</h2>
									<div class=\"form-group\">
										<label for=\"addr\">Street Address</label>
										<input type=\"text\" name=\"addr\" class=\"form-control\" id=\"addr\" placeholder=\"1234 Street Road\""; 
											if (isset($addr)){echo "value=\"".$addr."\"";}
											echo "required>
									</div>
									<div class=\"form-row\">
										<div class=\"form-group col-md-6\">
											<label for=\"zip\">Zip Code</label>
											<input type=\"number\" min=\"10000\" max=\"99999\" class=\"form-control\" name=\"zip\" id=\"zip\" placeholder=\"88888\""; 
											if (isset($zip)){echo "value=\"".$zip."\"";}
											echo "required>
										</div>
										<div class=\"form-group col-md-6\">
											<label for=\"city\">City</label>
											<input type=\"text\" class=\"form-control\" name=\"city\" id=\"city\" placeholder=\"City Name\""; 
											if (isset($city)){echo "value=\"".$city."\"";}
											echo "required>
										</div>
									</div>
									<h2>Date/Time</h2>
									<div class=\"form-group\">
										<input type=\"datetime-local\" name=\"dtim\" class=\"form-control\" id=\"dtim\" placeholder=\"\""; 
											if (isset($dtim)){echo "value=\"".$dtim."\"";}
											echo "required>
									</div>
								</div>
							</div>
							<div class=\"row text-center\">";
							if (isset($eid)){echo "<input style=\"display:none;\" type=\"text\" value=\"".$eid."\" name=\"eid\">";}else{echo "<input style=\"display:none;\" type=\"text\" value=\"".$aid."\" name=\"aid\">";}
							if (isset($oldat)){echo "<input style=\"display:none;\" type=\"text\" value=\"".$oldat."\" name=\"oldtim\">";}
							echo "<div class=\"col-12\">
								<br>
								<button type=\"submit\" class=\"btn btn-primary\">Submit!</button>
							</div></div></form>";
            } else if (isset($eid)){
				
			} else if ($err == "true"){
				echo "<div class=\"alert alert-danger\" role=\"alert\"><a href=\"../\" class=\"alert-danger\"><h2>Error!".$err2."Try Again!</h2></a></div>";
			} else { echo "<div class=\"alert alert-danger\" role=\"alert\"><a href=\"../\" class=\"alert-danger\"><h2>Error! No ID! Try again!</h2></a></div>"; }
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
			function submitForms(){
				$("#f1").submit();
				$("#f2").submit();
				$("#f3").submit();
			}
			<?php
			if(isset($blood)){echo "$('#blood').val('".$blood."');";}
			?>
			function validate(){
				var test = $("#pnum").val();
				test = test.replace(/\(/g, "");
				test = test.replace(/\)/g, "");
				test = test.replace(/\-/g, "");
				test = test.replace(/\s/g, "");
				test = test.replace(/\+/g, "");
				test = test.replace(/'/g, "");
				test = test.replace(/!/g, "");
					test = Number(test);
					if (Number.isInteger(test)){
						if (test.toString().length != 10){
						alert("Error! Only 10 digit phone numbers are Allowed!\nTry formatting like '(123) 867-5309'!");
						return false;
						} else {
						return true;
						}
					} else {
						alert("Please enter only numbers!");
						return false;
					}
			}
		</script>
	</body>
</html>