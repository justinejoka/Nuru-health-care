<?php

include 'connect.php'; 
session_start ();

if(isset($_POST['submit'])){
  $tittle=$_POST['tittle'];
  $description=$_POST['description'];
  $schedule=$_POST['schedule'];
  $Attendance=$_POST['Attendance'];


  $sql="insert into `my-immunization-schedule` (tittle,description,schedule,Attendance)
  values('$tittle','$description','$schedule','$Attendance')"; 
  $result=mysqli_query($con,$sql); 
  if($result){
    //echo "Data inserted successfully";
    header('location:client.php');
  }else{
    die(mysqli_error($con)); 
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usercreate.css">
    <link rel="stylesheet" href="dead.css">
    <title>My Schedule</title>
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
                <h4 class="fade">Main Menu</h4>
                <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="client.php">Immunisation Schedule</a>
                </h4>
                <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="schedule.php">My Schedule</a> </h4>
            </div>
        </div>

        <div class="side2">
        <div class="heading">
            
            <div class="headp">
              <h1>Vaccinations for <br> babies and children</h1>
            </div>
           <!-- <img src="images\julien-flutto-HPha3t0r4MU-unsplash.jpg" alt="" height="100px" width="100px">-->
      </div>
            <div>
                <form method='post' action="">
                <div class="detailsf">
                    <h3>schedule details</h3>
                    <h3>Tittle</h3>
                    <input type="text" name="tittle">
                    <h3>Description</h3>
                    <textarea name="description" id=""></textarea>
                    <h3>Schedule</h3>
                    <input type="date" name="schedule">
                 
                    <h3>Enter Attendance Including Infants</h3>
                    <input type="text" name="Attendance">
                    <button name="submit">Confirm Attendance</button>
                </div>
                </form>
</div></div></div>
</body>

</html>