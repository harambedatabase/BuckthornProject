<html>
<body>
  <?php
    $con = mysqli_connect("localhost","mjf78594","A1G0r!tHm","ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
    $teamName = $_POST['teamName'];
    foreach(explode("\n", $_POST['memberArea']) as $line){
      $query = "INSERT INTO Student (Name, Team_Name) VALUES('$line', '$teamName')";
      $result = mysqli_query($con, $query);
      if(!$result)
      {
        die('Data could not be entered.' . mysql_error());
      }
      echo "Data entered successfully.\n";
    }
    mysql_close($con);
  ?>

    <p>
    <a href="index.html">Return to Index</a>
    </p>
    <p>
    <p>
</body>
</html>
