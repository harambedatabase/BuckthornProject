<html>
  <head>
    <title>This Is Not A Database</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="php, mysql" />
  </head>
  <body>
    <h1>Observations</h1>
    <?php
        // connect to the database
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"university") or die("Some error occurred during connection " . mysqli_error($con));
    	   // create the query and send it
        $query = "select Data_ID, Team_Name from Data";
    	  $result = mysqli_query($con, $query);
    ?>
    <table border='1'>
    <tr><th>Observation</th><th>Team Name</th><th> </th></tr>
    <?php
    // iterate through the result set
    while($row = mysqli_fetch_array($result)) {	//mysqli_fetch_array grabs the next entry in the array
     echo "<tr><td><form><input action="deleteConfirm.php" method="post" value="Delete Observation" id="deleteObservation" style="width:100%"></td><td>" . $row['Data_ID'] . "</td><td>" . $row['Team_Name']  . "</td><input type="hidden" value="$row['Data_ID']" name="observationNumber"></form><td style='text-align:center'></td></tr>\n";
    }
    ?>
  </table>
  </body>
  </html>
