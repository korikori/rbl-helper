<?php 
  echo "<title>rbl helper</title>";
  echo "<h1>rbl helper<sup>0.6</sup></h1>";
  echo "<a href='index.php'>simultaneous version</a></br>";
  echo "<form name='form' method='POST' action='slow.php'>";  
  #initial empty screen
  if ($_POST['Submit1'] == null) { 
    echo "<textarea name='textarea' rows='20' cols='160'>";
    echo "</textarea>";
  }  
  #once some input is given and submit button has been clicked upon
  if ($_POST['Submit1'] == "Parse") { 
    $i = 0;
    $radio = '12'; #column-to-awk
    $input = $_POST['textarea'];
    $inputline = explode("\n",$input);
    $tripped = explode(" ", $inputline[0]);
    if ($tripped[$radio] == "from") { #column-to-awk may be 13 instead of 12
      $radio = '13';
    }
    foreach ($inputline as $line){
      $tripped = explode(" ", $line);
      $ip[$i] = $tripped[$radio];
      $ips = array_unique($ip); 
      $line2 = trim($ips[$i]);
      $i++;       
    }    
    echo "<textarea name='textarea' rows='20' cols='75'>";
    echo implode($ips);
    echo "</textarea>";   
  }
  #once some output is received and rdns button has been clicked upon
  if ($_POST['Submit1'] == "Reverse DNS") { 
    $input2 = $_POST['textarea'];
    if ($input2 == NULL) {
      echo "<textarea name='textarea' rows='20' cols='160'>";
      echo "</textarea>";
    } else {
      echo "<textarea name='textarea' rows='20' cols='75'>";
      echo $input2;
      echo "</textarea>";
      echo "<textarea name='textarea2' rows='20' cols='85'>";
      $inputline2 = explode("\n",$input2);      
      foreach ($inputline2 as $izmama){
        $wat = shell_exec('host -W 2 '. $izmama); 
        echo $wat;
      }
    }
    echo "</textarea>";
  }
  #button row
  echo "<br><br><input type='Submit' name='Submit1' value='Parse'><input type='Submit' name='Submit1' value='Reverse DNS'></form>";
  ?>​
