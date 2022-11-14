<?php
include 'connect.php'; 
session_start ();

$query = $con->query("
SELECT tittle, COUNT(tittle) AS cnt
FROM `immunisation-details`
GROUP BY `tittle`
HAVING cnt > 0
");

foreach($query as $data)
{
  $vaccine[] = $data['tittle'];
  $children[] = $data['cnt'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parents.css">

  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
    <style>
        .chart-container {
            width: 640px;
            height: auto;
        }
    </style>
</head>

<body>

<div class="container-client">
    <div class="side-bar">

      <div class="logo">
        <div class="logo-image">
          <img src="images/jeremy-bezanger-TiktAywR5n8-unsplash.jpg" alt="">
        </div>
        <div class="logo-head">
          <h4>Nuru</h4>
          <div class="h-color">
            <h4>-Health</h34>
          </div>
        </div>
      </div>

      <div class="childs-name">
      <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
     
 <h4><?php if (isset($_SESSION['user_name']))  echo $_SESSION['user_name']; ?></h4>
        
        
        
        <a href="logout.php">Logout</a>
      </div>

      <div class="main-menu">
        <h4><i class="fa fa-lemon-o" aria-hidden="true"></i><a href="dashboard.php"> Dashboard</a></h4>
        <h4 class="fade">Main Menu</h4>
        <h4><i class="fa fa-user-o" aria-hidden="true"></i><a href="parents.php"> Parents</a></h4>
        <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="immunisationschedule.php"> Immunisation Schedule</a></h4>
      </div>

      <div class="system">
        <h4 class="fade">System</h4>
        <h4><i class="fa fa-user-o" aria-hidden="true"></i><a href="userlist.php">Users</a></h4>
        <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="roles.html">Roles</a></h4>
      </div>

    </div>

    <div class="side2">
      <div class="heading">
            
            <div class="headp">
              <h1>Vaccinations for <br> babies and children</h1>
            </div>
           <!-- <img src="images\julien-flutto-HPha3t0r4MU-unsplash.jpg" alt="" height="100px" width="100px">-->
      </div>
<form action="">
  <button><a href="generatereport.php">View Report</a> </button>
</form>
      <div class="chart-container">
        <canvas id="myChart" ></canvas>
    </div>
    </div>
  </div>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($vaccine) ?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'Immunisation',
    data: <?php echo json_encode($children) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(255, 159, 64, 1)',
      'rgba(255, 205, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(201, 203, 207, 1)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
        const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      x: {
        grid:{
          display: false
        }
      },
      y: {
        beginAtZero: true,
        grid:{
          display: false
        }
      }
    }
  },
};
      </script>
      <script>
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
      </script>
       
</body>

</html>