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

  $setTeam = "INSERT INTO Data (Team_Name) VALUES('" . $_POST["teamName"] . "');";
  $resultTeam = mysqli_query($con, $setTeam);
  if(!$resultTeam)
  {
      die('Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "Data created successfully.<br>";

  $last_id = $con->insert_id;
  echo "Last inserted ID is: " . $last_id . "<br>";

  //insert general
  $setGeneral = "INSERT INTO General (Data_ID, QuadrantGPS_NS, QuadrantGPS_EW, QuadrantSize, BuckthornSize, Density, BuckthornCoverage, 
                                 Median, Habitat, Photos, OtherNotes) VALUES(" . $last_id . ", " . $_POST["quadrantGPS_NS"] . ", " 
                                         . $_POST["quadrantGPS_EW"] . ", '" . $_POST["quadrantSize"] . "', " 
                                         . $_POST["buckthornSize"] . ", '" . $_POST["density"] . "', " 
                                         . $_POST["buckthornCoverage"] . ", '" . $_POST["median"] . "', '" 
                                         . $_POST["habitat"] . "', '" . $_POST["photos"]. "', '" . $_POST["otherNotes"] . "');";

  $resultGeneral = mysqli_query($con, $setGeneral);
  if(!$resultGeneral)
  {
      die('General Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "General Data entered successfully.<br>";

  //insert competitive
  $setCompetitive = "INSERT INTO Competitive (Data_ID, BuckthornDBH, DistanceBN, BNDBH, DistanceNBN, NBNDBH, CompetitionNotes)
                                     VALUES(" . $last_id . ", " . $_POST["buckthornDBH"] . ", " . $_POST["distanceBN"] . ", "
                                              . $_POST["BNDBH"] . ", " . $_POST["distanceNBN"] . ", " . $_POST["NBNDBH"] . ", '" 
                                              . $_POST["competitionNotes"] . "');";
  echo "COMPETITIVE: " . $setCompetitive . "<br>";

  $resultCompetitive = mysqli_query($con, $setCompetitive);
  if(!$resultCompetitive)
  {
      die('Competitive Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "Competitive Data entered successfully.<br>";
  //insert biodiversity



  //end connection
  mysql_close($con);

	?>

</body>
</html>
