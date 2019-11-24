<!DOCTYPE HTML>
<html>

<head>
  <title>Write</title>
</head>

<body>
  <h1>
    <a href="index.html">Go Back</a>
  </h1>
    <?php 
      $file = fopen("txt.txt", "a") or die("Pp");
      $data = $_POST["owo"];
      fwrite($file, $data);
      fclose($file);
  
    ?>

</html>