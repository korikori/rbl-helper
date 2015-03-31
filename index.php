<?php  
  echo "<title>rbl helper</title>";
  echo "<h1>rbl helper<sup>0.5.3</sup></h1>";
  echo "<a href='http://www.tulibu-dibu.com/work/rblhelper/slow.php'>split-process version</a></br>";
  echo "<form name='form' method='POST' action='index.php'>";
  

  #initial empty screen
  
  if ($_POST['Submit1'] == null) { 
    echo "<textarea name='textarea' rows='20' cols='160'>";
    echo "</textarea>";
  }  
  
  #once some input is given and submit button has been clicked upon
  
  if ($_POST['Submit1'] == "Parse") { 
    $i = 0;
    $radio = '12';
    $input = $_POST['textarea'];
    $inputline = explode("\n",$input);
    
    foreach ($inputline as $line){
      $tripped = explode(" ", $line);
      if ($tripped[$radio] == "from") { #12 goes to 13
      $radio = '13';
      }
    $ip[$i] = $tripped[$radio];
    $ips = array_unique($ip); 
    $line2 = trim($ips[$i]);
    $i++;  
    }
    
    echo "<textarea name='textarea' rows='20' cols='75'>";
    for ($i = 0; $i <= count($ips); ++$i) {
      print $ips[$i];
    }
    echo "</textarea>";
       
   echo "<textarea name='textarea2' rows='20' cols='85'>";

    for ($i = 0; $i <= count($ips); ++$i) {
      $izmama = $ips[$i];
      $wat = shell_exec('host -W 2 '. $izmama); 
      echo $wat;
    }
    echo "</textarea>";
  }
    echo "<br><br><input type='Submit' name='Submit1' value='Parse'></form>";

  ?>
​
