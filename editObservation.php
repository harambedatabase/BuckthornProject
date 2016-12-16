<html>
  <head>
    <title>This Is Not A Database</title>
    <link rel="stylesheet" href="styles.css">
  </head>
<body>
    <div class="card">
    <h1>Observations</h1>
    <br/>
    <a href="admin.html">Return to Home</a>
    <br/>
    <?php
        // connect to the database
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
    	  // create the query and send it
        $query = "select * from Data";
    	  $result = mysqli_query($con, $query);
    ?>
    <table border='1' id="teamTable">
    <tr><th> </th><th>Observation</th><th>Team Name</th></tr>
    <?php
    // iterate through the result set
    while($row = mysqli_fetch_array($result)) {	//mysqli_fetch_array grabs the next entry in the array
     echo "<tr>
            <td><form action='editAdminConfirm.php' method='post'><input type='submit' value='Edit Observation' id='editObservation' style='width:100%'></td>
            <td>" , $row['Data_ID'] , "</td>
            <td>" , $row['Team_Name'], "</td>
            <input type='hidden' value=",$row['Data_ID']," name='observationNumber'></form>
          </tr>";
    }
    ?>
    </table>
  </div>
</body>
</html>
