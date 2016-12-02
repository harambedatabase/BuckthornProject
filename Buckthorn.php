<html>
<head>
  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=utf-8"/>
  <meta http-equiv="Content-Style-Type" content="text/css"/>
  <meta name="description" content="Demonstrate php form handling." />
  <meta name="keywords" content="php, forms" />
  <title>This is not a Database</title>
</head>

<body>
  <h1>A Sample Form</h1>
  <p>
    Here is some helpful information about how to fill in this form:
  </p>
  <ul>
    <li>Use your mouse and keyboard.</li>
    <li>Think first.</li>
  </ul>
  <p>
    Here is the actual form:
  </p>


  <table border="1">
    <tr><td>
      <form action="http://www.mathcs.bethel.edu/~gossett/spies.php" method="post">
        <p>This is an amazing form! Fill it in!</p>
        <p>Enter your secret code name.
          <input type="text" name="codename" size="20"/>
        </p>
        <p>
          Choose a job description:
        </p>
        <p>
          <input type="radio" name="jobcategory" value="sa"/>Secret Agent<br/>
          <input type="radio" name="jobcategory" value="da"/>Double Agent<br/>
          <input type="radio" name="jobcategory" value="ff"/>Femme Fatale<br/>
          <input type="radio" name="jobcategory"  value="ib" checked="checked"/>Innocent Bystander
        </p>

        <p>
          Select all that apply:
        </p>
        <!-- Note the use of the [] after the common name to tell PHP that an array should be generated. -->
        <p>
          <input type="checkbox" name="features[]" value="smart"/>I am smart.<br/>
          <input type="checkbox" name="features[]" value="attractive"/>I am attractive.<br/>
          <input type="checkbox" name="features[]" value="childrenLike"/>Small children like me.<br/>
          <input type="checkbox" name="features[]" value="rich"/>I am rich.<br/>
        </p>

        <p>
          Select two famous spies that have been most influential in your decision to join our organization.
        </p>
        <p>
          <select name="influence">
            <option>Mata Hari</option>
            <option>James Bond</option>
            <option selected="selected">Harry Potter</option>
          </select>
          <select name="influence2" size="3">
            <option>Jennifer Garner</option>
            <option>Belle Boyd</option>
            <option>Oskar Schindler</option>
            <option>Alfred Drefus</option>
          </select>
        </p>

        <p>
          Write a short essay describing why we should trust you.
        </p>
        <p>
          <textarea name="essay" rows="8" cols="44">
          </textarea>
        </p>

        <p>
          <input type="submit" value="Submit" />
          <input type="reset" value="Clear Form" />
        </p>
      </form>
    </td></tr>
  </table>

</body>
</html>
