<?php

include 'connect.php';
session_start ();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="parents.css">
  <title>Immunisation Schedule</title>
  
  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
       
 <h4><?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name']; ?></h4>
        
        
        
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
          <table>
          <div class="head2">
            <a href="newschedule.php"><button><i class="fa fa-plus fa-1x aria-hidden="true"></i>Create</button></a>
            <input type="search" placeholder="search parents" name="" id="">
          </div>
      
          <caption><b>List of Schedules</b></caption>
            <tr>
              <th>NO</th>
              <th>TITTLE</th>
              <th>DESCRIPTION</th>
              <th>SCHEDULE</th>
              <th>ACTIONS</th>
            </tr>

            <?php

$sql="select *from `immunization-schedule`";
$result=mysqli_query($con,$sql);
if($result){

  while( $row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $tittle=$row['tittle'];
    $description=$row['description'];
    $schedule=$row['schedule'];
    
    echo '
    <tr>
          <td>'.$id.'</td>
          <td>'.$tittle.'</td>
          <td>'.$description.'</td>
          <td>'.$schedule.'</td>
          <td>


<button><a href="deleteimmunisation.php?
deleteid='.$id.'"><i class="fa fa-trash-o"></i></a></button>
<button><a href="attendees.php"><i class="fa fa-eye" aria-hidden="true"></i></a></button>    
</td>

        </tr>
    ';

  }

}

?>
          
          </table>
        </div>
      </div>
  </div>

</body>

</html>