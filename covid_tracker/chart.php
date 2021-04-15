<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid_project";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM Student";

// check for checkbox values
function IsChecked($chkname,$value)
    {
        if(!empty($_GET[$chkname]))
        {
            foreach($_GET[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }

    if(IsChecked('department','A'))
    {
    $comsci = true;
    $query_cs = "SELECT Test_Date FROM Covid_Test WHERE Test_Status = 'Positive'";
    }
    if(IsChecked('department','B'))
    {
    $biology = true;
    }
    if(IsChecked('department','C'))
    {
    $chemistry = true;
    }
    if(IsChecked('department','D'))
    {
    $geology = true;
    }
    if(IsChecked('department','E'))
    {
    $abStudies = true;
    }

$dataPoints1 = array(
  array("label"=> "JAN", "y"=> 1 ),
  array("label"=> "FEB", "y"=> 0 ),
  array("label"=> "MAR", "y"=> 2 ),
  array("label"=> "APR", "y"=> 3 ),
  array("label"=> "MAY", "y"=> 0 ),
  array("label"=> "JUN", "y"=> 0 ),
  array("label"=> "JUL", "y"=> 0 ),
  array("label"=> "AUG", "y"=> 0 ),
  array("label"=> "SEP", "y"=> 0 ),
  array("label"=> "OCT", "y"=> 0 ),
  array("label"=> "NOV", "y"=> 0 ),
  array("label"=> "DEC", "y"=> 0 )
);
 
$dataPoints2 = array(
  array("label"=> "JAN", "y"=> 1 ),
  array("label"=> "FEB", "y"=> 0 ),
  array("label"=> "MAR", "y"=> 2 ),
  array("label"=> "APR", "y"=> 3 ),
  array("label"=> "MAY", "y"=> 0 ),
  array("label"=> "JUN", "y"=> 0 ),
  array("label"=> "JUL", "y"=> 0 ),
  array("label"=> "AUG", "y"=> 0 ),
  array("label"=> "SEP", "y"=> 0 ),
  array("label"=> "OCT", "y"=> 0 ),
  array("label"=> "NOV", "y"=> 0 ),
  array("label"=> "DEC", "y"=> 0 )
);
 
$dataPoints3 = array(
  array("label"=> "JAN", "y"=> 1 ),
  array("label"=> "FEB", "y"=> 0 ),
  array("label"=> "MAR", "y"=> 2 ),
  array("label"=> "APR", "y"=> 3 ),
  array("label"=> "MAY", "y"=> 0 ),
  array("label"=> "JUN", "y"=> 0 ),
  array("label"=> "JUL", "y"=> 0 ),
  array("label"=> "AUG", "y"=> 0 ),
  array("label"=> "SEP", "y"=> 0 ),
  array("label"=> "OCT", "y"=> 0 ),
  array("label"=> "NOV", "y"=> 0 ),
  array("label"=> "DEC", "y"=> 0 )
);
 
$dataPoints4 = array(
  array("label"=> "JAN", "y"=> 1 ),
  array("label"=> "FEB", "y"=> 0 ),
  array("label"=> "MAR", "y"=> 2 ),
  array("label"=> "APR", "y"=> 3 ),
  array("label"=> "MAY", "y"=> 0 ),
  array("label"=> "JUN", "y"=> 0 ),
  array("label"=> "JUL", "y"=> 0 ),
  array("label"=> "AUG", "y"=> 0 ),
  array("label"=> "SEP", "y"=> 0 ),
  array("label"=> "OCT", "y"=> 0 ),
  array("label"=> "NOV", "y"=> 0 ),
  array("label"=> "DEC", "y"=> 0 )
);
 
$dataPoints5 = array(
  array("label"=> "JAN", "y"=> 1 ),
  array("label"=> "FEB", "y"=> 0 ),
  array("label"=> "MAR", "y"=> 2 ),
  array("label"=> "APR", "y"=> 3 ),
  array("label"=> "MAY", "y"=> 0 ),
  array("label"=> "JUN", "y"=> 0 ),
  array("label"=> "JUL", "y"=> 0 ),
  array("label"=> "AUG", "y"=> 0 ),
  array("label"=> "SEP", "y"=> 0 ),
  array("label"=> "OCT", "y"=> 0 ),
  array("label"=> "NOV", "y"=> 0 ),
  array("label"=> "DEC", "y"=> 0 )
);
 
$dataPoints6 = array(
    array("label"=> "JAN", "y"=> 1 ),
    array("label"=> "FEB", "y"=> 0 ),
    array("label"=> "MAR", "y"=> 2 ),
    array("label"=> "APR", "y"=> 3 ),
    array("label"=> "MAY", "y"=> 0 ),
    array("label"=> "JUN", "y"=> 0 ),
    array("label"=> "JUL", "y"=> 0 ),
    array("label"=> "AUG", "y"=> 0 ),
    array("label"=> "SEP", "y"=> 0 ),
    array("label"=> "OCT", "y"=> 0 ),
    array("label"=> "NOV", "y"=> 0 ),
    array("label"=> "DEC", "y"=> 0 )
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
    <div class="nav-wrapper container"><a id="logo-container" href="/covid_tracker/index.html" class="brand-logo">Langara College</a>
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
  
</script>
<script>
  var comsci, biology, chemistry, geology, abstudies = false;
  
<?php
if($comsci){
  echo 'comsci = true;';
}
if($biology){
  echo 'biology = true;';
}
if($chemistry){
  echo 'chemistry = true;';
}
if($geology){
  echo 'geology = true;';
}
if($abStudies){
  echo 'abstudies = true;';
}
?>

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
         showInLegend: comsci,
         visible: comsci,
         yValueFormatString: "#,##0 Cases",
         dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Chemistry",
         showInLegend: chemistry,
         visible: chemistry,
         yValueFormatString: "#,##0 Cases",
         dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Biology",
         showInLegend: biology,
         visible: biology,
         yValueFormatString: "#,##0 Cases",
         dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Geology",
         showInLegend: geology,
         visible: geology,
         yValueFormatString: "#,##0 Cases",
         dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "stackedArea",
         name: "Aboriginal Studies",
         showInLegend: abstudies,
         visible: abstudies,
         yValueFormatString: "#,##0 Cases",
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

