<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Spy Report</title>
  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=utf-8"/>
  <meta http-equiv="Content-Style-Type" content="text/css"/>
  <meta name="description" content="The back-end to a demonstration of php form handling." />
  <meta name="keywords" content="php, forms" />
</head>
<body>
  <h1>Spy Data For <?php print $_POST["codename"]?></h1>
  <?php
  switch ($_POST["jobcategory"]) {
     case "sa": $job = "a Secret Agent";
                break;
     case "da": $job = "a Double Agent";
                break;
     case "ff": $job = "a Femme Fatale";
                break;
     case "ib": $job = "an Innocent Bystander";
  }
  ?>
  <p>You are applying for a job as <?php print "$job.";?></p>
  <p>Your self-reported qualifications are: </p>
  <ul>
  <?php
  // from http://www.html-form-guide.com/php-form/php-form-checkbox.html
  function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    };

  if (empty($_POST["features"]))
      print "<li>I have no qualifications.</li>";
  if (IsChecked("features","smart"))
      print "<li>I am smart.</li>";
  if (IsChecked("features","attractive"))
      print "<li>I am attractive.</li>";
  if (IsChecked("features","childrenLike"))
      print "<li>Small children like me.</li>";
  if (IsChecked("features","rich"))
      print "<li>I am rich.</li>";
  ?>
  </ul>
 <p>Two spies who have influenced you are <?php $s1 = $_POST['influence']; $s2 = $_POST['influence2'];
    print "$s1 and $s2.";?></p>

 <h2>Your Essay</h2>
 <p>
 <?php print $_POST["essay"];?>
 </p>
</body>
</html>
