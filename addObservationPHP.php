<?php
  session_start();
?>
<html>
<head>
  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css"/>
  <meta name="keywords" content="php, mixed array" />
</head>
<body>
	<?php
  // connect to database
  $username = "mjf78594";
  $password = "A1G0r!tHm";
  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));

  //insert general
  $query = "INSERT INTO General VALUES(" . $_POST["id"] . "," . $_POST["quadrantGPS_NS"] . "," . $_POST["quadrantGPS_EW"]
                                         . "," . $_POST["quadrantSize"] . "," . $_POST["buckthornSize"] . "," . 
                                         $_POST["density"] . "," . $_POST["buckthornCoverage"] . "," . $_POST["median"]
                                         . "," . $_POST["habitat"] . "," . $_POST["photos"]. "," . $_POST["otherNotes"] . ");";

  $result = mysqli_query($con, $query);

  if(!$result)
  {
      die('Data could not be entered.' . mysql_error());
  }

  echo "Data entered successfully.";

  //insert competitive

  //insert biodiversity



  //end connection
  mysql_close($con);

	?>

</body>
</html>
