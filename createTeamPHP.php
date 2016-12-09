<html>
    <head>
        <title>Create Team</title>
    </head>
<body>
  <?php
        $con = mysqli_connect("localhost","jot43536","harambe2020!","ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));

        // Get this from somewhere rather than set it
        $id = 1;

        $query = "INSERT INTO Student VALUES($_POST["id"],$_POST["teamName"],$_POST["name"])";

        $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }

        echo "Data entered successfully."

        mysql_close($con);
  ?>
</body>
</html>
