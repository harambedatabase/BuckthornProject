<html>
<body>
  <?php
        $con = mysqli_connect("localhost","mjf78594","A1G0r!tHm","ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));

        $query = "INSERT INTO Student (Team_Name,Name) VALUES('".$_POST['teamName']."','".$_POST['name']."')";

        $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }

        echo "Data entered successfully.\n";

        mysql_close($con);
  ?>

    <p>
    <a href="index.html">Return to Index</a>
    </p>
    <p>
    <a href="createTeam.html">Add Another Student</a>
    <p>
</body>
</html>
