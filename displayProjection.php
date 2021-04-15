<?php
$servername = "sql206.epizy.com";
$username = "epiz_28401508";
$password = "BEDmsemdbZorb";
$dbname = "epiz_28401508_covid_project";
$conn = new mysqli($servername, $username, $password, $dbname);

$answer = $_POST['group1'];

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

if ($answer == "group1a") {
    $query = "SELECT LANGARA_ID, STUDENT_NAME AS SNAME FROM Student";
}
else if ($answer == "group1b") {
    $query = "SELECT LANGARA_ID, EMPLOYEE_NAME AS SNAME FROM Employee";
}
else if ($answer == "group1c"){
    $query = "(SELECT LANGARA_ID, STUDENT_NAME AS SNAME FROM Student) UNION (SELECT LANGARA_ID, EMPLOYEE_NAME AS SNAME FROM Employee)";
}


echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>CPSC2221 Group Project</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<style>
  body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}

main {
  flex: 1 0 auto;
}
</style>
<body>
  <nav class="orange darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img src="logo.png" width="150" height="auto" alt="Langara Logo"></a>
    <ul class="right hide-on-med-and-down">
    <li><a href="/covid_tracker/index.html">Home</a></li>
    <li><a href="/covid_tracker/form.html">Form</a></li>
    <li><a href="/covid_tracker/search.html">Search</a></li>
    <li><a href="/covid_tracker/chart.html">Chart</a></li>
  </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
  <div class="container">
      <br><br>
    <h1 class="header left orange-text text-darken-4">Search Results</h1>
    <div class="row">
      <h5 class="header col s12 light">Search result:</h5>
    </div>
      <div class="row">';
      $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<table class='striped'> 
            <thead> 
                <tr> 
                    <th>LANGARA_ID</th> 
                    <th>NAME</th>
                </tr> 
            </thead> 
            <tbody>";

 while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>". $row["LANGARA_ID"]. "</td>
    <td>". $row["SNAME"]. "</td>
    </tr>";
 }
 echo '</tbody> 
    </table>
    <div class="row col s12" style="height:auto;"></div>
    </div>';
} else {
 echo "0 results";
}
echo '</div>
<br><br>
</div>
<footer class="page-footer orange darken-4">
<div class="container">
  <div class="row">
    <div class="col l6 s12">
      <h5 class="white-text">Group Details</h5>
      <p class="grey-text text-lighten-4">We are a team of college students who put together this PHP project for CPSC 2221 Database Systems, at Langara College.</p>

    </div>
    <div class="col l3 s12">
      <h5 class="white-text">Group Members</h5>
      <ul>
        <li><a class="white-text" href="#!">Trista Townsend</a></li>
        <li><a class="white-text" href="#!">Mankirat Singh</a></li>
        <li><a class="white-text" href="#!">Jaspreet Singh</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="footer-copyright">
  <div class="container">
  Made by <a class="white-text text-lighten-3" href="#"><i class="material-icons">copyright</i>Trista Townsend - 2021</a>
  </div>
</div>
</footer>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>';
$conn->close();
?> 
