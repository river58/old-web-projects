<!DOCTYPE HTML>
<html>

<head>
  <title>Date idk</title>
</head>

<body>
  <h1>
    Right now it is: <?php echo date("m/d/Y H:i:s"); ?>
  </h1>
  <h1>
    Mktime: <?php
    $date=mktime(0, 0, 0, 10, 4, 1982);
    echo date("l, F jS, Y", $date)
    
    ?>
  </h1>
  
</body>

</html>