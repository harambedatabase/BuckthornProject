<html>
<body>
  <?php
    $con = mysqli_connect("localhost","mjf78594","A1G0r!tHm","ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));

    $con->autocommit(false);


    $teamName = $_POST['teamName'];
    $memberArea = trim($_POST['memberArea']);

//  $members = explode("\n",$_POST['memberArea'],$members);

    $members = explode("\n",$memberArea);

print_r(array_values($members));

    foreach($members as $line){

        $query = "INSERT INTO Student VALUES(null,'" . $line . "', '" . $teamName . "')";

echo $query,"\n";

//      $result = mysqli_query($con, $query);
        $result = $con->query($query);

        if(!$result)
        {
             die('Data could not be entered.' . mysql_error());
        }

        echo "Data entered successfully.\n";

        mysqli_commit($con);
    }

//  mysqli_commit($con);
    mysqli_close($con);

    ?>

    <p>
    <a href="index.html">Return to Index</a>
    </p>

    </body>
    </html>
