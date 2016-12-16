<html>
<head>
    <title>This Is Not A Database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="card">
    <?php
        // Connect to mysql server
        $username = "mjf78594";
        $password = "A1G0r!tHm";
        $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        $con->autocommit(false);
        // Get team name and members
        $teamName = $_POST['teamName'];
        $memberArea = trim($_POST['memberArea']);
        $members = explode("\n",$memberArea);

        // For each member...
        foreach($members as $line){

            // Get name and then insert into student table
            $name = trim($line);
            $query = "INSERT INTO Student VALUES(null,'" . $name . "', '" . $teamName . "')";
            $result = $con->query($query);

            // If it failed, mysql error
            if(!$result)
            {
                die('Data could not be entered.' . mysql_error());
            }

            mysqli_commit($con);
        }

        // Tell user that it worked, and give them a "Return to Index" button
        echo "Data entered successfully.","\n";
        mysqli_close($con);
        ?>

        <p>
            <a href="index.html">Return to Index</a>
        </p>
    </div>
</body>
</html>
