<?php

include 'connect.php';
session_start();

if( isset($_POST['parent']) || isset($_POST['child']) || isset($_POST['vdate']) || isset($_POST['gender'])  || isset($_POST['vaccine'])  ){
  $pname=$_POST['parent'];
  $cname=$_POST['child'];
  $date=$_POST['vdate'];
  $gender=$_POST['gender'];
  $vaccine=$_POST['vaccine'];
  
  
  

  $sql="insert into `vaccination-details` (parent,child, vdate,gender,vaccine)
  values('$pname','$cname','$date','$gender','$vaccine')"; 
  $result=mysqli_query($con,$sql); 
  if($result){
    //echo "Data inserted successfully";
    //header('location:immunisationschedule.php');
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
  <link rel="stylesheet" href="dead.css">

  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>createuser</title>
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
      <form method='POST' action="#">
        <div class="form">
            <label for=""> Parent name</label>
              <input type="text" placeholder="Enter your name" name="parent">
            <label for=""> Child's Name</label>
              <input type="text" placeholder="Enter your name" name="child">
              <label for="">Vaccination Date</label>
              <input type="date"  name="vdate" id="dateControl">
              
              <label for="">Gender</label>
                <label for="">
                  Male
                  <input type="radio" name="gender" value="male" class="sd" >
                </label> 
                <label for="">
                  Female
                  <input type="radio" name="gender" value="female" >
                  </label> 
                  <label for="">Vaccine
                    <select id="vaccine" name="vaccine">
                        <option value="polio" name="vaccine">Polio</option>
                        <option value="OPV, DPT, PCV 10, Tetanus 1st Dose" name="vaccine">OPV, DPT, PCV 10, Tetanus 1st Dose</option>
                        <option value="OPV, DPT, PCV 10, Tetanus 2nd Dose" name="vaccine">OPV, DPT, PCV 10, Tetanus 2nd Dose</option>
                        <option value="OPV, DPT, PCV 10, Tetanus 3rd Dose" name="vaccine">OPV, DPT, PCV 10, Tetanus 3rd Dose</option>
                        <option value="Tetanus 4thdose" name="vaccine">Tetanus 4th Dose</option>
                        <option value="Tetanus 5thdose" name="vaccine">Tetanus 5th Dose</option>
                        <option value="Yellow Fever" name="vaccine">Yellow Fever</option>
                      </select>
                                 
                  </label>
                  

            
           
            <button name="submit">Approve Vaccination</button>
        </div>
        </form>
        </div>
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