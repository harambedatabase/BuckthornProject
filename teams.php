<?php
  session_start();
?>
<html>
<head>
	<title>This Is Not A Database</title>
  	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
  	<script type="text/javascript">google.load("jquery", "1.3.2");</script>
  	<script type="text/javascript" src="functions.js"></script>
  	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="card">
		<h2>Teams and Members</h2>

    <?php
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        $query = "select * from Data";
    	  $result = mysqli_query($con, $query);
    ?>
    <table border='1'>
    <tr><th> </th><th>Observation</th><th>Team Name</th></tr>
    <?php
    // iterate through the result set
    while($row = mysqli_fetch_array($result)) {	//mysqli_fetch_array grabs the next entry in the array
     echo "<tr>
            <td><form action='deleteConfirm.php' method='post'><input type='submit' value='Delete Observation' id='deleteObservation' style='width:100%'></td>
            <td>" , $row['Data_ID'] , "</td>
            <td>" , $row['Team_Name'], "</td>
            <input type='hidden' value=",$row['Data_ID']," name='observationNumber'></form>
          </tr>";
    }
    ?>




		<a href="index.html">Back to Home</a>
	</div>
</body>
</html>
