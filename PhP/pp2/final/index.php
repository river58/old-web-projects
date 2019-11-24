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
        <div class="background-image"></div>
        <div class="jumbotron jumbotron-fluid text-center jtrn">
            <div class="container">
                <h1><a href="#">BLOOOOOODD</a></h1>
            </div>
        </div>
        <div class="container-fluid text-center tpct">
            <div class="row text-center justify-content-around text-white">
                <!-- Left Column -->
                <div class="col-4 bgg1 br20">
                    <form method="post" action="input/" onsubmit="">
                        <div class="form-group">
                            <label for="addID">Donor ID:</label>
                            <input type="number" name="addID" min="1" max="4294967295" class="form-control text-center" id="addID" placeholder="  Enter Donor ID" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block text-white btn-lg py-4">Add New Data!</button>
                    </form>
                    <br>
                </div>
                <!-- Right Column -->
                <div class="col-4 bgg1 br20">
                    <form method="get" action="view.php" onsubmit="">
                        <div class="form-group">
                            <label for="viewID">Donor ID:</label>
                            <input type="number" name="viewID" min="1" max="4294967295" class="form-control text-center" id="viewID" placeholder="  Enter Donor ID" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block text-white btn-lg py-4">View Info!</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script></script>
    </body>
</html>