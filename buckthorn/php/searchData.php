<html>
<head>
    <title>This Is Not A Database</title>
  	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
  	<script type="text/javascript">google.load("jquery", "1.3.2");</script>
  	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="card large">
		<h2>Observations by Data ID</h2>
    <a href="generate.html">Back to Generate Reports</a>
    <?php
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        $id = $_POST['data_id'];
// Each section repeats the same it of code here
// Data
        // Set up table
        echo "<h2>Data</h2>";
        echo "<table border='1' id='teamTable'>";
        echo "<tr><th>Data ID</th><th>Team Name</th><th>Date</th></tr>";
        // Get the Data
        $query = "SELECT * FROM Data where Data_ID='$id'";
    	  $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }
        // Iterate throguh and output data in respective table columns
        while($row = mysqli_fetch_array($result)) {
	     	echo "<tr>
	            <td>" , $row['Data_ID'] , "</td>
	            <td>" , $row['Team_Name'], "</td>
	            <td>" , $row['Date'], "</td>
	          </tr>";
	    	}
        echo "</table>";
// General
        // Set up table
        echo "<h2>General</h2>";
        echo "<table border='1' id='teamTable'>";
        echo "<tr><th>GPS Quadrant NS</th><th>GPS Quadrant EW</th><th>Quadrant Size</th><th>Number of Buckthorn Stems</th>
        <th>Density(# of stems/m^2)</th><th>% Buckthorn Foliar Coverage</th><th>Median Buckthorn Stem Circumference</th>
        <th>Habitat Description</th><th>Photos</th><th>Notes</th></tr>";
        // Get the Data
        $query = "SELECT * FROM General where Data_ID='$id'";
          $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }
        // Iterate throguh and output data in respective table columns
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td>" , $row['QuadrantGPS_NS'] , "</td>
                <td>" , $row['QuadrantGPS_EW'], "</td>
                <td>" , $row['QuadrantSize'], "</td>
                <td>" , $row['BuckthornSize'], "</td>
                <td>" , $row['Density'], "</td>
                <td>" , $row['BuckthornCoverage'], "</td>
                <td>" , $row['Median'], "</td>
                <td>" , $row['Habitat'], "</td>
                <td>" , $row['Photos'], "</td>
                <td>" , $row['OtherNotes'], "</td>
              </tr>";
            }
        echo "</table>";
// Competitive
        // Set up table
        echo "<h2>Competitive</h2>";
        echo "<table border='1' id='teamTable'>";
        echo "<tr><th>DBH of Buckthorn</th><th>Distance to nearest buckthorn neighbor</th><th>DBH of nearest buckthorn neighbor</th>
        <th>Distance to nearest non-buckthorn neighbor</th><th>DBH of nearest non-buckthorn neighbor</th>
        <th>Notes</th></tr>";
        // Get the Data
        $query = "SELECT * FROM Competitive where Data_ID='$id'";
          $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }
        // Iterate throguh and output data in respective table columns
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td>" , $row['BuckthornDBH'] , "</td>
                <td>" , $row['DistanceBN'], "</td>
                <td>" , $row['BNDBH'], "</td>
                <td>" , $row['DistanceNBN'], "</td>
                <td>" , $row['NBNDBH'], "</td>
                <td>" , $row['CompetitionNotes'], "</td>
              </tr>";
            }
        echo "</table>";
// Biodiversity
        // Set up table
        echo "<h2>Biodiversity</h2>";
        echo "<table border='1' id='teamTable'>";
        echo "<tr><th>Letter</th><th>Number</th></tr>";
        // Get the Data
        $query = "SELECT * FROM Species where Data_ID='$id'";
          $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }
        $sumOfSpecimens = 0;
        $arrayOfSpecimens = array();
        // Iterate throguh and output data in respective table columns
        // Also grab data to use in Shannon-Weiner Index later
        while($row = mysqli_fetch_array($result)) {
          $sumOfSpecimens = $sumOfSpecimens + $row['Number'];
          array_push($arrayOfSpecimens, $row['Number']);
          echo "<tr>
                  <td>" , $row['Letter'] , "</td>
                  <td>" , $row['Number'], "</td>
                </tr>";
        }
        echo "</table>";
        // Calculate S-W Index and echo
        $sWIndex = 0;
        foreach ($arrayOfSpecimens as $num) {
          $sWIndex = $sWIndex + (($num/$sumOfSpecimens)*log($num/$sumOfSpecimens));
        }
        if($sWIndex != 0){
          $sWIndex = -1*$sWIndex;
        }
        echo "Shannon Weiner Index: $sWIndex";

    ?>
	</div>
</body>
</html>
