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
		<h2>All Observations</h2>
		<?php
			// Connect to the database
	        $username = "mjf78594";
	        $password = "A1G0r!tHm";
	     	$con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
	     	$query = "select * from Data;";
	     	$result = mysqli_query($con, $query);
		?>
		<table border='1' id="teamTable">
    	<tr><th>Data ID</th><th>Team Name</th><th>Date</th></tr>
    	<?php
	    	// Iterate through all observations as $row
	    	while($row = mysqli_fetch_array($result)) {	
	    	// Echo out each data point in their respective table column
	     	echo "<tr>
	            <td>" , $row['Data_ID'] , "</td>
	            <td>" , $row['Team_Name'], "</td>
	            <td>" , $row['Date'], "</td>
	          </tr>";
	    	}
    	?>
		<a href="generate.html">Back to Generate Reports</a>
	</div>
</body>
</html>