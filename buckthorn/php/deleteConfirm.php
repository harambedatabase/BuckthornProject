<html>
<head>
  <title>This Is Not A Database</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="card">
  <?php
  //Assign a variable with the observation number from the hidden input containing the Data_ID to be deleted.
    $ObsNumber = $_POST['observationNumber'];
    session_start();
  
  // connect to database
  $con = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
    // create the query and send it
    $query = "Delete From Data where Data_ID = $ObsNumber";
    $result = mysqli_query($con, $query);
    if(!$result)//something went wrong
    {
      die('Data could not be deleted.' . mysql_error());
    }
    echo "Data deleted successfully.\n";//The data was succesfully deleted
   ?>
   <p>
       <a href="admin.html">Return to Admin home</a>
       <a href="deleteObservation.php">Delete another Observation</a>
   </p>
 </div>
</body>
</html>
