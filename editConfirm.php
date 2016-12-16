<html>
<head>
  <title>This Is Not A Database</title>
  <script src="http://www.google.com/jsapi" type="text/javascript"></script>
  <script type="text/javascript">google.load("jquery", "1.3.2");</script>
  <script type="text/javascript" src="functions.js"></script>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php
    $ObsNumber = $_POST['observationNumber'];
    $username = "mjf78594";
    $password = "A1G0r!tHm";
    $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
    $query1 = "Select Team_Name from Data where Data_ID = $ObsNumber;";
    $teamName = mysqli_fetch_array(mysqli_query($con, $query1));
    echo $teamName['Team_Name'];
    $query2 = "select Date from Data where Data_ID = $ObsNumber;";
    $date = mysqli_query($con, $query2);
    $query3 = "select QuadrantGPS_NS from General where Data_ID = $ObsNumber;";
    $gpsNS = mysqli_query($con, $query3);
    $query4 = "select QuadrantGPS_EW from General where Data_ID = $ObsNumber;";
    $gpsEW = mysqli_query($con, $query4);
    $query5 = "select QuadrantSize from General where Data_ID = $ObsNumber;";
    $quadSize = mysqli_query($con, $query5);
    $query6 = "select BuckthornSize from General where Data_ID = $ObsNumber;";
    $numBuckthorn = mysqli_query($con, $query6);
    $query7 = "select Density from General where Data_ID = $ObsNumber;";
    $density = mysqli_query($con, $query7);
    $query8 = "select BuckthornCoverage from General where Data_ID = $ObsNumber;";
    $coverage = mysqli_query($con, $query8);
    $query9 = "select Median from General where Data_ID = $ObsNumber";
    $median = mysqli_query($con, $query9);z
    $query10 = "select Habitat from General where Data_ID = $ObsNumber";
    $query9 = "select Median from General where Data_ID = $ObsNumber;";
    $median = mysqli_query($con, $query9);
    $query10 = "select Habitat from General where Data_ID = $ObsNumber;";
    $habitat = mysqli_query($con, $query10);
    $query11 = "select photos from General where Data_ID = $ObsNumber;";
    $photos = mysqli_query($con, $query11);
    $query12 = "select OtherNotes from General where Data_ID = $ObsNumber;";
    $notes = mysqli_query($con, $query12);
    $query13 = "select BuckthornDBH from Competitive where Data_ID = $ObsNumber;";
    $dbh = mysqli_query($con, $query13);
    $query14 = "select DistanceBN from Competitive where Data_ID = $ObsNumber;";
    $distanceBN = mysqli_query($con, $query14);
    $query15 = "select BNDBH from Competitive where Data_ID = $ObsNumber;";
    $bndbh = mysqli_query($con, $query15);
    $query16 = "select distanceNBN from Competitive where Data_ID = $ObsNumber;";
    $distanceNBN = mysqli_query($con, $query16);
    $query17 = "select NBNDBH from Competitive where Data_ID = $ObsNumber;";
    $nbndbh = mysqli_query($con, $query17);
    $query18 = "select competitionNotes from Competitive where Data_ID = $ObsNumber;";
    $compNotes = mysqli_query($con, $query18);
  ?>
    <form action="addEdit.php" method="post">
    <input type='hidden' value="$ObsNumber" name='observationNumber'>
    <div class="card large">
        <h2>Team</h2>
        <br/>
        <h3>Enter your Team Name</h3>
        <input type="text" name="teamName" value="<?php echo $teamName['Team_Name']; ?>">
        <h3>Enter the Date(mm/dd/yy)</h3>
        <input type="text" name="date" value="<?php echo $date['Date']; ?>">
    </div>
  	<div class="card large">
        <h2>General</h2>
        <br/>
        <h3>GPS Quadrant North/South:</h3>
        <input type="text" name="quadrantGPS_NS" value=$gpsNS>
        <h3>GPS Quadrant East/West:</h3>
        <input type="text" name="quadrantGPS_EW" value=$gpsEW>
        <h3>Quadrant Size:</h3>
        <input type="text" name="quadrantSize" value=<?php $quadSize ?>>
        <h3>Number of Buckthorn Stems:</h3>
        <input type="text" name="buckthornSize" value=<?php $numBuckthorn ?>>
        <h3>Density(# of stems/m^2):</h3>
        <input type="text" name="density" value=<?php $density ?>>
        <h3>% Buckthorn Foliar Coverage:</h3>
        <input type="text" name="buckthornCoverage" value=<?php $coverage ?>>
        <h3>Median Buckthorn Stem Circumference:</h3>
        <input type="text" name="median" value=<?php $median ?>>
        <h3>Habitat Description:</h3>
        <input type="text" name="habitat" value=<?php $habitat ?>>
        <h3>Photos:</h3>
        <input type="text" name="photos" value=<?php $photos ?>>
        <h3>Notes (opional):</h3>
        <input type="text" name="otherNotes" value=<?php $notes ?>>
    </div>
    <div class="card large">
        <h2>Competitive</h2>
        <br/>
        <h3>DBH of Buckthorn:</h3>
        <input type="text" name="buckthornDBH" value=<?php echo $dbh['BuckthornDBH']; ?>>
        <h3>Distance to nearest buckthorn neighbor:</h3>
        <input type="text" name="distanceBN" value=<?php echo $distanceBN['DistanceBN']; ?>>
        <h3>DBH of nearest buckthorn neighbor:</h3>
        <input type="text" name="BNDBH" value=<?php echo $BNDBH['BNDBH']; ?>>
        <h3>Distance to nearest non-buckthorn neighbor:</h3>
        <input type="text" name="distanceNBN" value=<?php echo $distanceNBN['DistanceNBN']; ?>>
        <h3>DBH of nearest non-buckthorn neighbor:</h3>
        <input type="text" name="NBNDBH" value=<?php echo $nbndbh['NBNDBH']; ?>>
        <h3>Notes (opional):</h3>
        <input type="text" name="competitionNotes" value=<?php echo $compNotes['CompetitionNotes']; ?>>
    </div>
    <div class="card large">
        <h2>Biodiversity</h2>
        <br/>
        <h3>Biodiversity Index</h3>
        <h3>Enter a letter (Start at B, where B designates Buckthorn):</h3>
        <input type="text" id="newLetter" name="newLetter">
        <input type="button" value="Add letter" onclick="addLetter()" name="letter">
        <h3>Letters:</h3>
        <textarea name="letterArea" id="letterArea" style="width: 100px; height: 100px;" readonly="true"></textarea>
        <h3>Enter the number of the species designated by letter:</h3>
        <input type="text" id="newNumber" name="newNumber">
        <input type="button" value="Add number" onclick="addNumber()" name="number">
        <h3>Numbers:</h3>
        <textarea id="numberArea" name="numArea" style="width: 100px; height: 100px;" readonly="true"></textarea>
        <h3>Notes (optional):</h3>
        <input type="text" name="biodiversityNotes">
    </div>
    <div class="card large">
        <input type="submit" value="Submit">
    </div>
    </form>
</body>
</html>
