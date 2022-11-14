<?php

include 'connect.php';
session_start ();

$id=$_GET['updateid'];
$sql="select * from `users` where id=$id";
$result=mysqli_query($con,$sql); 
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$role=$row['role'];

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $role=$_POST['role'];
  $email=$_POST['email'];

  $sql="update `users` set id=$id,name='$name',
  email='$email',role='$role' where id=$id";
  $result=mysqli_query($con,$sql); 
  if($result){
    //echo "Data inserted successfully";
    header('location:parents.php');
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
  <title>Create parents</title>
</head>

<body>
  <div class="container-client">
    <section>
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
        

<h4><?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name']; ?></h4>
        
        
        
        <a href="logout.php">Logout</a>
        </div>

        <div class="main-menu">
          <h4><i class="fa fa-lemon-o" aria-hidden="true"></i><a href=""> Dashboard</a></h4>
          <h4 class="fade">Main Menu</h4>
          <h4><i class="fa fa-user-o" aria-hidden="true"></i><a href="parents.php"> Parents</a></h4>
          <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="immunisation.html"> Immunisation Schedule</a>
          </h4>
        </div>

        <div class="system">
          <h4 class="fade">System</h4>
          <h4><i class="fa fa-user-o" aria-hidden="true"></i><a href="userlist.html">Users</a></h4>
          <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="roles.html">Roles</a></h4>
        </div>

      </div>
    </section>
    <section>
      <div class="side2">
        <div class="heading">
          <div class="head1">
            <div class="headp">

            </div>
         

          </div>


        </div>
        <div class="parent-ch">
          <div class="parents-info">
            <h3>Parents Information</h3>
            <form method='post' action="">
      <div class="form">
        <h3>Create</h3>
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter your name">
        <label for="">Email</label>
        <input type="email" name="email" id="" placeholder="Enter your email">
        <label for="">password</label>
        <input type="password" name="" id="" placeholder="Enter your password">
        <label for="">Confirm password</label>
        <input type="password" name="" id="" placeholder="Enter your password">
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
        <div>
        </div>
    </section>
  </div>
</body>

</html>