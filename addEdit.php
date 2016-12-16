<html>
<body>
	<?php
  // connect to database
  $username = "mjf78594";
  $password = "A1G0r!tHm";
  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
  $id = $_POST['observationNumber'];

  //update general
  $setGeneral = "UPDATE General (QuadrantGPS_NS, QuadrantGPS_EW, QuadrantSize, BuckthornSize, Density, BuckthornCoverage,
                                 Median, Habitat, Photos, OtherNotes) VALUES(" . $_POST["quadrantGPS_NS"] . ", "
                                         . $_POST["quadrantGPS_EW"] . ", '" . $_POST["quadrantSize"] . "', "
                                         . $_POST["buckthornSize"] . ", '" . $_POST["density"] . "', "
                                         . $_POST["buckthornCoverage"] . ", '" . $_POST["median"] . "', '"
                                         . $_POST["habitat"] . "', '" . $_POST["photos"]. "', '" . $_POST["otherNotes"] . "') WHERE Data_ID='$id';";

  $resultGeneral = mysqli_query($con, $setGeneral);
  if(!$resultGeneral)
  {
      die('General Data could not be updated.' . mysql_error() . "<br>");
  }
  echo "General Data entered successfully.<br>";

  //update competitive
  $setCompetitive = "UPDATE Competitive (BuckthornDBH, DistanceBN, BNDBH, DistanceNBN, NBNDBH, CompetitionNotes)
                                     VALUES(" . $_POST["buckthornDBH"] . ", " . $_POST["distanceBN"] . ", "
                                              . $_POST["BNDBH"] . ", " . $_POST["distanceNBN"] . ", " . $_POST["NBNDBH"] . ", '"
                                              . $_POST["competitionNotes"] . "') WHERE Data_ID='$id';";

  $resultCompetitive = mysqli_query($con, $setCompetitive);
  if(!$resultCompetitive)
  {
      die('Competitive Data could not be entered.' . mysql_error() . "<br>");
  }
  echo "Competitive Data entered successfully.<br>";

  //update biodiversity
  $setBiodiversity = "UPDATE Biodiversity (BiodiversityNotes) VALUES('" . $_POST["biodiversityNotes"] . "') WHERE Data_ID='$id';";
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
    $query = "UPDATE Species (Letter, Number) VALUES('" . $speciesArray[$index][0] . "', " . $speciesArray[$index][1] . ") WHERE Data_ID='$id';";
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
