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
        session_start();
  
        // connect to database
        $con = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        // create the query and send it
        $query = "select * from Data";
    	  $result = mysqli_query($con, $query);
    ?>
    <table border='1' id="teamTable">
    <tr><th> </th><th>Observation</th><th>Team Name</th></tr>
    <?php
    // iterate through the result set
    while($row = mysqli_fetch_array($result)) {	//go through each row
      //Add a new row to the table with a delete button and a hidden input containing the selected Data_ID
     echo "<tr>
            <td><form action='deleteConfirm.php' method='post'><input type='submit' value='Delete Observation' id='deleteObservation' style='width:100%'></td>
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