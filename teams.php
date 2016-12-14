<html>
<head>
    <title>This Is Not A Database</title>
  	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
  	<script type="text/javascript">google.load("jquery", "1.3.2");</script>
  	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="card">
		<h2>Teams and Members</h2>
    <a href="generate.html">Back to Generate Reports</a>
    <?php
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
        $query = "SELECT DISTINCT Team FROM Student";
    	  $result = mysqli_query($con, $query);

        if(!$result)
        {
            die('Data could not be entered.' . mysql_error());
        }
    ?>
    <table border='1' id="teamTable">
    <tr><th>Team Name</th><th>Members</th></tr>
    <?php
    while($row = mysqli_fetch_array($result)) {
     echo "<tr>
            <td>" , $row['Team'] , "</td>";

          $team = $row['Team'];
          $queryNames = "SELECT Name FROM Student WHERE Team='$team'";
      	  $resultTwo = mysqli_query($con, $queryNames);

          if(!$resultTwo)
          {
              die('Data could not be entered.' . mysql_error());
          }
          echo "<td>";

          while($rowTwo = mysqli_fetch_array($resultTwo)) {
              echo $rowTwo['Name'] . nl2br("\n");
          }
          echo "</td>";
          echo "</tr>";
    }
    ?>
	</div>
</body>
</html>
