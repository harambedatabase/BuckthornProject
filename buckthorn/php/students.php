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
		<h2>Student Researchers</h2>
		<?php
			session_start();
  
			// connect to database
			$con = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
	     	$query = "select Name, Team from Student;";
	     	$result = mysqli_query($con, $query);
		?>
		<table border='1' id="teamTable">
    	<tr><th>Student Name</th><th>Team Name</th></tr>
    	<?php
	    	// Iterate through all observations as $row
	    	while($row = mysqli_fetch_array($result)) {	
	    	// Echo out each data point in their respective table column
	     	echo "<tr>
	            <td>" , $row['Name'] , "</td>
	            <td>" , $row['Team'], "</td>
	          </tr>";
	    	}
    	?>
		<a href="generate.html">Back to Generate Reports</a>
	</div>
</body>
</html>