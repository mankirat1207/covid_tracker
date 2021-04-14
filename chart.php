<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid_project";
$conn = new mysqli($servername, $username, $password, $dbname);

$SEARCH=$_POST['student_name'];

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM Student";

$dataPoints1 = array(
    array("label"=> "2007", "y"=> 2016456 ),
    array("label"=> "2008", "y"=> 1985801 ),
    array("label"=> "2009", "y"=> 1755904 ),
    array("label"=> "2010", "y"=> 1847290 ),
    array("label"=> "2011", "y"=> 1733430 ),
    array("label"=> "2012", "y"=> 1514043 ),
    array("label"=> "2013", "y"=> 1581115 ),
    array("label"=> "2014", "y"=> 1581710 ),
    array("label"=> "2015", "y"=> 1352398 ),
    array("label"=> "2016", "y"=> 1239149 )
);
 
$dataPoints2 = array(
    array("label"=> "2007", "y"=> 49505 ),
    array("label"=> "2008", "y"=> 31917 ),
    array("label"=> "2009", "y"=> 25972 ),
    array("label"=> "2010", "y"=> 23337 ),
    array("label"=> "2011", "y"=> 16086 ),
    array("label"=> "2012", "y"=> 13403 ),
    array("label"=> "2013", "y"=> 13820 ),
    array("label"=> "2014", "y"=> 18276 ),
    array("label"=> "2015", "y"=> 17372 ),
    array("label"=> "2016", "y"=> 13008 )
);
 
$dataPoints3 = array(
    array("label"=> "2007", "y"=> 896590 ),
    array("label"=> "2008", "y"=> 882981 ),
    array("label"=> "2009", "y"=> 920979 ),
    array("label"=> "2010", "y"=> 987697 ),
    array("label"=> "2011", "y"=> 1013689 ),
    array("label"=> "2012", "y"=> 1225894 ),
    array("label"=> "2013", "y"=> 1124836 ),
    array("label"=> "2014", "y"=> 1126609 ),
    array("label"=> "2015", "y"=> 1333482 ),
    array("label"=> "2016", "y"=> 1378307 )
);
 
$dataPoints4 = array(
    array("label"=> "2007", "y"=> 806425 ),
    array("label"=> "2008", "y"=> 806208 ),
    array("label"=> "2009", "y"=> 798855 ),
    array("label"=> "2010", "y"=> 806968 ),
    array("label"=> "2011", "y"=> 790204 ),
    array("label"=> "2012", "y"=> 769331 ),
    array("label"=> "2013", "y"=> 789016 ),
    array("label"=> "2014", "y"=> 797166 ),
    array("label"=> "2015", "y"=> 797178 ),
    array("label"=> "2016", "y"=> 805694 )
);
 
$dataPoints5 = array(
    array("label"=> "2007", "y"=> 247510 ),
    array("label"=> "2008", "y"=> 254831 ),
    array("label"=> "2009", "y"=> 273445 ),
    array("label"=> "2010", "y"=> 260203 ),
    array("label"=> "2011", "y"=> 319355 ),
    array("label"=> "2012", "y"=> 276240 ),
    array("label"=> "2013", "y"=> 268565 ),
    array("label"=> "2014", "y"=> 259367 ),
    array("label"=> "2015", "y"=> 249080 ),
    array("label"=> "2016", "y"=> 267812 )
);
 
$dataPoints6 = array(
    array("label"=> "2007", "y"=> 612 ),
    array("label"=> "2008", "y"=> 864 ),
    array("label"=> "2009", "y"=> 891 ),
    array("label"=> "2010", "y"=> 1212 ),
    array("label"=> "2011", "y"=> 1818 ),
    array("label"=> "2012", "y"=> 4327 ),
    array("label"=> "2013", "y"=> 9036 ),
    array("label"=> "2014", "y"=> 17691 ),
    array("label"=> "2015", "y"=> 24893 ),
    array("label"=> "2016", "y"=> 36054 )
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Covid Tracker</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class='orange darken-4' role="navigation">
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
      <h1 class="header center orange-text text-darken-4">COVID-19 Cases By Department</h1>
      <br><br>
    </div>
  </div>
  <div class="container">
    <div class="section">
      <!--   Chart Container   -->
      <div class="row">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      </div>
    </div>
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", { 
     theme: "light2",
     legend:{
         cursor: "pointer",
         itemclick: toggleDataSeries
     },
     toolTip: {
         shared: true
     },
     data: [{
         type: "stackedArea",
         name: "Computer Science",
         showInLegend: true,
         yValueFormatString: "#,##0 GWh",
         dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Chemistry",
         showInLegend: true,
         yValueFormatString: "#,##0 GWh",
         dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Biology",
         showInLegend: true,
         visible: false,
         yValueFormatString: "#,##0 GWh",
         dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Geology",
         showInLegend: true,
         visible: false,
         yValueFormatString: "#,##0 GWh",
         dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Aboriginal Studies",
         showInLegend: true,
         visible: false,
         yValueFormatString: "#,##0 GWh",
         dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
     }]
 });
  
 chart.render();
  
 function toggleDataSeries(e){
     if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
         e.dataSeries.visible = false;
     }
     else{
         e.dataSeries.visible = true;
     }
     chart.render();
 }
  
 }
 </script>
</body>
</html>


<?php
 $conn->close();
 ?>

