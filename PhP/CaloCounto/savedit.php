<!DOCTYPE HTML><html><head><title>Loading...</title></head><body style="background-color:#121212"onload="redirect();"><table><div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-pacman center-div"><div><div></div><div></div><div></div></div><div><div></div><div></div></div></div><style type="text/css">@keyframes lds-pacman-1 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  50% {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  100% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
}
.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border-radius: 3px;
}

@-webkit-keyframes lds-pacman-1 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  50% {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  100% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
}

@keyframes lds-pacman-2 {
  0% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
  50% {
    -webkit-transform: rotate(225deg);
    transform: rotate(225deg);
  }
  100% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
}

@-webkit-keyframes lds-pacman-2 {
  0% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
  50% {
    -webkit-transform: rotate(225deg);
    transform: rotate(225deg);
  }
  100% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
}

@keyframes lds-pacman-3 {
  0% {
    -webkit-transform: translate(190px, 0);
    transform: translate(190px, 0);
    opacity: 0;
  }
  20% {
    opacity: 1;
  }
  100% {
    -webkit-transform: translate(70px, 0);
    transform: translate(70px, 0);
    opacity: 1;
  }
}

@-webkit-keyframes lds-pacman-3 {
  0% {
    -webkit-transform: translate(190px, 0);
    transform: translate(190px, 0);
    opacity: 0;
  }
  20% {
    opacity: 1;
  }
  100% {
    -webkit-transform: translate(70px, 0);
    transform: translate(70px, 0);
    opacity: 1;
  }
}

.lds-pacman {
  position: relative;
}

.lds-pacman>div:nth-child(2) div {
  position: absolute;
  top: 40px;
  left: 40px;
  width: 120px;
  height: 60px;
  border-radius: 120px 120px 0 0;
  background: #fcb711;
  -webkit-animation: lds-pacman-1 1s linear infinite;
  animation: lds-pacman-1 1s linear infinite;
  -webkit-transform-origin: 60px 60px;
  transform-origin: 60px 60px;
}

.lds-pacman>div:nth-child(2) div:nth-child(2) {
  -webkit-animation: lds-pacman-2 1s linear infinite;
  animation: lds-pacman-2 1s linear infinite;
}

.lds-pacman>div:nth-child(1) div {
  position: absolute;
  top: 92px;
  left: -8px;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: #FFFFFF;
  -webkit-animation: lds-pacman-3 1s linear infinite;
  animation: lds-pacman-3 1s linear infinite;
}

.lds-pacman>div:nth-child(1) div:nth-child(1) {
  -webkit-animation-delay: -0.67s;
  animation-delay: -0.67s;
}

.lds-pacman>div:nth-child(1) div:nth-child(2) {
  -webkit-animation-delay: -0.33s;
  animation-delay: -0.33s;
}

.lds-pacman>div:nth-child(1) div:nth-child(3) {
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
}

.lds-pacman {
  width: 200px !important;
  height: 200px !important;
  -webkit-transform: translate(-100px, -100px) scale(1) translate(100px, 100px);
  transform: translate(-100px, -100px) scale(1) translate(100px, 100px);
}

</style></div>
<?php 
if (isset($_POST['oldat']) )
{
    $date=$_POST["oldat"];
}
if (isset($_POST['linum']) )
{
    $line=$_POST["linum"];
}
if (isset($_POST['del']) )
{
    $del=$_POST["del"];
}
if (isset($_POST['oldat']) )
{
    $date=$_POST["oldat"];
}
$a=isset($date);
$b=isset($line);
if (isset($_POST['dateIn']) )
{
    $newdat=$_POST["dateIn"];
}
if (isset($_POST['food']) )
{
    $newfood=$_POST["food"];
}
if (isset($_POST['calories']) )
{
    $newcals=$_POST["calories"];
}
if (isset($_POST['lida']) )
{
    $lida=$_POST["lida"];
}
if ($a && $b) {
  $filename=("dates/" . $date . ".txt");
    if (file_exists($filename)) {
      $file=fopen($filename, "r+") or die($err);
      $data=fread($file, filesize("dates/" . $date . ".txt"));
      $listboi=explode("\n", $data);
      $linedata=$listboi[$line];
      $lineoof = $line;
      $linedata=$listboi[$lineoof];
      unset($listboi[$lineoof]);
      $listboi=array_values($listboi);
      if (isset($newdat)){
        //Same Date
        if ($newdat==$date) {
          array_pop($listboi);
          $listboi[] = $newfood."|-|-|".$newcals;
          $writedata=implode($listboi, "\n");
          $writedata = $writedata."\n";
          file_put_contents($filename, $writedata);
          fclose($file);
        }
        //New Date
        else if ($newdat != $date) {
          $writedata=implode($listboi, "\n");
          $writedata = $writedata."\n";
          file_put_contents($filename, $writedata);
          fclose($file);
          $new = fopen("dates/".$newdat.".txt", 'a');
          $data2=($newfood."|-|-|".$newcals."\n");
          fwrite($new, $data2);
          fclose($new);
        }
      } else if ($del==1) {
      $newdat=$date;
      $writedata=implode($listboi, "\n");
      file_put_contents($filename, $writedata);
      fclose($file);
      } else {
      echo "Line not found in file.";
      fclose($file);
    }
  }
}

?><script>function redirect() {
  location.href="view.php?dtv=<?php echo $newdat ?>";
}

</script></body></html>