<html>
  <head>
    <title>This Is Not A Database</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="php, mysql" />
  </head>
  <body>
    <h1>Observations</h1>
    <?php
        // connect to the database
        $username = "mjf78594";
        $password = "A1G0r!tHm";
     	  $con = mysqli_connect("localhost",$username,$password,"ThisIsNotADatabase") or die("Some error occurred during connection " . mysqli_error($con));
    	   // create the query and send it
        $query = "select Data_ID, Team_Name from Data";
    	  $result = mysqli_query($con, $query);
      // mysql_query is a php function
      // you may need to uncomment ;extension=php_mysqli.dll <for windows, something similar for unix> in php.ini
      // you also may need to set extension_dir in the php.ini file
    ?>
    <table border='1'>
    <tr><th>Observation</th><th>Team Name</th><th>        </th></tr>
    <?php
    // iterate through the result set
    while($row = mysqli_fetch_array($result)) {	//mysqli_fetch_array grabs the next entry in the array
     echo "<tr><td>" . $row['Data_ID'] . "</td><td>" . $row['Team_Name']  . "</td><td><form><input type=submit value="Edit Observation" id="editObservation" style="width:100%"></form></td><td style='text-align:center'></td></tr>\n";
    }
    ?>
  </table>
  </body>
  </html>
