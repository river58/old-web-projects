<!DOCTYPE HTML>
<head>
  
</head>
<body>
  <?php 
    if ($_POST["dateIn"] != ""){
      $file = fopen("dates/".$_POST["dateIn"].".txt", "a") or die("bronk");
      $file2 = fopen("latest.txt","w") or die("rip");
      $data = $_POST["food"]."|-|-|".$_POST["calories"]."\n";
      $latest = $_POST["dateIn"];
      fwrite($file, $data);
      fwrite($file2, $latest);
      fclose($file);
      fclose($file2);
    }
    ?>
</body>