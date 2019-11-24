<!DOCTYPE HTML>
<html>

<head>
  <title>Read</title>
</head>

<body>
  <h1>
    <a href="index.html">Go Back</a><br>
    <?php 
      $file = fopen("txt.txt", "r") or die("oof");
      echo fread($file,filesize("txt.txt"));
      echo "hi";
      fclose($file);
      ?>
  </h1>

</html>