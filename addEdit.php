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

  //update general
  $setGeneral = "UPDATE General VALUES(" . $last_id . ", " . $_POST["quadrantGPS_NS"] . ", "
                                         . $_POST["quadrantGPS_EW"] . ", '" . $_POST["quadrantSize"] . "', "
                                         . $_POST["buckthornSize"] . ", '" . $_POST["density"] . "', "
                                         . $_POST["buckthornCoverage"] . ", '" . $_POST["median"] . "', '"
                                         . $_POST["habitat"] . "', '" . $_POST["photos"]. "', '" . $_POST["otherNotes"] . "') WHERE ";

  $resultGeneral = mysqli_query($con, $setGeneral);
  if(!$resultGeneral)
  {
      die('General Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "General Data entered successfully.<br>";

  //update competitive
  $setCompetitive = "INSERT INTO Competitive (Data_ID, BuckthornDBH, DistanceBN, BNDBH, DistanceNBN, NBNDBH, CompetitionNotes)
                                     VALUES(" . $last_id . ", " . $_POST["buckthornDBH"] . ", " . $_POST["distanceBN"] . ", "
                                              . $_POST["BNDBH"] . ", " . $_POST["distanceNBN"] . ", " . $_POST["NBNDBH"] . ", '"
                                              . $_POST["competitionNotes"] . "');";

  $resultCompetitive = mysqli_query($con, $setCompetitive);
  if(!$resultCompetitive)
  {
      die('Competitive Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "Competitive Data entered successfully.<br>";

  //update biodiversity
  $setBiodiversity = "INSERT INTO Biodiversity (Data_ID, BiodiversityNotes) VALUES(" . $last_id . ", '" . $_POST["biodiversityNotes"] . "');";
  $resultBiodiversity = mysqli_query($con, $setBiodiversity);
  if(!$resultBiodiversity)
  {
      die('Biodiversity Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "Biodiversity Data entered successfully.<br>";

  //update Species
  $letters = explode("\n", trim($_POST['letterArea']));
  $numbers = explode("\n", trim($_POST['numArea']));
  $speciesArray = array(array());
  $index = 0;
  foreach($letters as $line) {
    $letter = trim($line);
    $speciesArray[$index][0] = $letter;
    $index++;
  }
  $index = 0;
  foreach($numbers as $line) {
    $number = trim($line);
    $speciesArray[$index][1] = $number;
    $index++;
  }
  for($index=0; $index<count($speciesArray); $index++) {
    $query = "INSERT INTO Species (Data_ID, Letter, Number) VALUES(" . $last_id . ", '" . $speciesArray[$index][0] . "', " . $speciesArray[$index][1] . ");";
    echo "SPECIES QUERY: " . $query;
    $result = mysqli_query($con, $query);
    if(!$resultBiodiversity)
    {
      die('Species Data could not be entered.' . mysql_error() . "<br>");
    }
    echo "Species Data entered successfully.<br>";
  }

  // end connection
  mysql_close($con);

	?>

</body>
</html>