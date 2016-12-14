<html>
<head>
    <title>This Is Not A Database</title>
  	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
  	<script type="text/javascript">google.load("jquery", "1.3.2");</script>
  	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="card">
		<h2>Observations by Data ID</h2>
    <a href="generate.html">Back to Generate Reports</a>
    <table border='1' id="teamTable">
    <tr><th>Data ID</th><th>Team Name</th><th>Date</th></tr>
    <?php
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        $id = $_POST['data_id'];
        $query = "SELECT * FROM Data where Data_ID='$id'";
    	  $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }

        while($row = mysqli_fetch_array($result)) {	//mysqli_fetch_array grabs the next entry in the array
	     	echo "<tr>
	            <td>" , $row['Data_ID'] , "</td>
	            <td>" , $row['Team_Name'], "</td>
	            <td>" , $row['Date'], "</td>
	          </tr>";
	    	}
    ?>
	</div>
</body>
</html>
