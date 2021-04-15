<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid_project";
$conn = new mysqli($servername, $username, $password, $dbname);

$ID=$_POST['SIDQ8B'];
$answer1 = $_POST['group91'];
$answer2 = $_POST['group92'];

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}


if ($answer2 == "group92a") {
  if ($answer1 == "group91a") {
    $query="UPDATE Covid_19_Test
    SET Vaccination_Status=0
    WHERE Patient_ID IN (
    SELECT Patient_ID
    FROM Student_Recieves_Test AS t1, Student AS t2
    WHERE t1.Langara_ID= t2.Langara_ID AND t1.Langara_ID=$ID
    )
    ";
  }
  elseif ($answer1 == "group91b") {
    $query="UPDATE Covid_19_Test
    SET Vaccination_Status=1
    WHERE Patient_ID IN (
    SELECT Patient_ID
    FROM Student_Recieves_Test AS t1, Student AS t2
    WHERE t1.Langara_ID= t2.Langara_ID AND t1.Langara_ID=$ID
    )
    ";
  }
}
else if ($answer2 == "group92b") {
  if ($answer1 == "group91a") {
    $query="UPDATE Covid_19_Test
    SET Vaccination_Status=0
    WHERE Patient_ID IN (
    SELECT Patient_ID
    FROM Employee_Recieves_Test AS t1, Employee AS t2
    WHERE t1.Langara_ID= t2.Langara_ID AND t1.Langara_ID=$ID
    )
    ";
  }
  elseif ($answer1 == "group91b") {
    $query="UPDATE Covid_19_Test
    SET Vaccination_Status=1
    WHERE Patient_ID IN (
    SELECT Patient_ID
    FROM Employee_Recieves_Test AS t1, Employee AS t2
    WHERE t1.Langara_ID= t2.Langara_ID AND t1.Langara_ID=$ID
    )
    ";
  }
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
  <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Langara College</a>
  <ul class="right hide-on-med-and-down">
  <li><a href="/covid_tracker/index.html">Home</a></li>
  <li><a href="/covid_tracker/form.html">Form</a></li>
  <li><a href="/covid_tracker/search.html">Queries</a></li>
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
      <h5 class="header col s12 light">Covid19 Vacination status has been updated</h5>
    </div>
      <div class="row">';
      $result = $conn->query($query);

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