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
    $ObsNumber = $_POST['observationNumber']
    echo $ObsNumber;
    $username = "mjf78594";
    $password = "A1G0r!tHm";
    $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
    $query = "Delete From Data where Data_ID = $ObsNumber";
    $result = mysqli_query($con, $query);
    if(!$result)
    {
      die('Data could not be deleted.' . mysql_error());
    }
    echo "Data deleted successfully.\n";
   ?>
</body>
</html>
