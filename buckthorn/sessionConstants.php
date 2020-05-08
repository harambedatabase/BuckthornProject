<?php 
  //Retrieve the creds from the common comma delimited file
  $credsfile = fopen("C:/appdev/credsFile.txt", "r");
  $credstring = fgets($credsfile);
  fclose($credsfile);

  $creds = explode(",", $credstring);
  
  session_start();
  // Set creds to connect to the database
  $_SESSION['username'] = $creds[0];
  $_SESSION['password'] = $creds[1];
?>