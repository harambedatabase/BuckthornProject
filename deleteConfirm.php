<?php
  session_start();
?>
<html>
<head>
  <title>This Is Not A Database</title>
  <script src="http://www.google.com/jsapi" type="text/javascript"></script>
  <script type="text/javascript">google.load("jquery", "1.3.2");</script>
  <script type="text/javascript" src="functions.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php
    $username = "mjf78594";
    $password = "A1G0r!tHm";
    $con = mysqli_connect("localhost",$username,$password,"university") or die("Some error occurred during connection " . mysqli_error($con));
    $query = "Delete * From Data where Data_ID = $_POST['observationNumber']";
    $result = mysqli_query($con, $query);
    if(!$result)
    {
      die('Data could not be entered.' . mysql_error());
    }
    echo "Data entered successfully.\n";
   ?>
</body>
</html>
