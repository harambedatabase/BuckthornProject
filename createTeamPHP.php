<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="card">
    <?php
        $username = "mjf78594";
        $password = "A1G0r!tHm";
        $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        $con->autocommit(false);
        $teamName = $_POST['teamName'];
        $memberArea = trim($_POST['memberArea']);
        $members = explode("\n",$memberArea);

        foreach($members as $line){

            $name = trim($line);
            $query = "INSERT INTO Student VALUES(null,'" . $name . "', '" . $teamName . "')";
            $result = $con->query($query);

            if(!$result)
            {
                die('Data could not be entered.' . mysql_error());
            }

            mysqli_commit($con);
        }

        echo "Data entered successfully.","\n";
        mysqli_close($con);
        ?>

        <p>
            <a href="index.html">Return to Index</a>
        </p>
    </div>
</body>
</html>
