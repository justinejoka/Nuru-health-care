<?php

include 'connect.php'; 
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $role=$_POST['role'];

  $sql="insert into `users` (name,email,role)
  values('$name','$email','$role')"; 
  $result=mysqli_query($con,$sql); 
  if($result){
    //echo "Data inserted successfully";
    header('location:userlist.php');
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
        <i class="fa fa-user-o fa-2x" aria-hidden="true"></i>
        <h4>Justin Joka</h4>
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
            <h3>Users</h3>
            <div class="headp">
              <h1>Vaccinations for <br> babies and children</h1>
            </div>
           <!-- <img src="images\julien-flutto-HPha3t0r4MU-unsplash.jpg" alt="" height="100px" width="100px">-->
      </div>
      <form method='post' action="">
      <div class="form">
        <h3>Create</h3>
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter your name">
        <label for="">Email</label>
        <input type="email" name="email" id="" placeholder="Enter your email">
        <label for="">password</label>
        <input type="password" name="" id="">
        <label for="">Confirm password</label>
        <input type="password" name="" id="">
        <label for="">select roles</label>
        
          <label for="">Admin
          <input type="checkbox" name="role" id="" value="admin" class="sd2">
          </label>
         
        
      
          <label for="">Staff
          <input type="checkbox" name="role" id="" value="staff">
          </label>
        
        

        <button name="submit">Save</button>
      </div>
      </form>
    </div>
</body>

</html>