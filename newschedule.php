<?php

include 'connect.php'; 
if(isset($_POST['submit'])){
  $tittle=$_POST['tittle'];
  $description=$_POST['description'];
  $schedule=$_POST['schedule'];

  $sql="insert into `immunization-schedule` (tittle,description,schedule)
  values('$tittle','$description','$schedule')"; 
  $result=mysqli_query($con,$sql); 
  if($result){
    //echo "Data inserted successfully";
    header('location:immunisationschedule.php');
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
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="dead.css">

  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>newschedule</title>
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
        <?php 
       $sel = "select * from userz ";
			 $query = mysqli_query($con, $sel);
       $result = mysqli_fetch_assoc($query);
       ?>

        <h4><?php  echo $result['user_name']; ?></h4>
        
        
        <a href="logout.php">Logout</a>
      </div>

      <div class="main-menu">
        <h4><i class="fa fa-lemon-o" aria-hidden="true"></i><a href=""> Dashboard</a></h4>
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
      <form method='post' action="">
      <div class="frm">
       
        <h3>New Schedule</h3>
        <label for="">Tittle</label>
        <input type="text" placeholder="Enter your tittle" name="tittle">
        <label for="">Description</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <label for="">Schedule</label>
        <input type="date" name="schedule" id="dateControl">
        <label for="">Max Attendees</label>
        <input type="text">
        <button name="submit">Submit</button>
        
      </div>
      </form>
    </div>
  </div>
<script>
  $(document).ready(function() {

var dtToday = new Date ();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate ();
var year = dtToday.getFullYear();
if(month < 10)
month = '0' + month.toString();
if(day < 10)
day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;
$('#dateControl').attr('min', maxDate);

});
</script>
</body>

</html>