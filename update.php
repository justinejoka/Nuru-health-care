<?php

include 'connect.php'; 
session_start ();

$id=$_GET['updateid'];
$sql="select * from `parents` where id=$id";
$result=mysqli_query($con,$sql); 
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$contact=$row['contact'];

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];

  $sql="update `parents` set id=$id,name='$name',
  email='$email',contact='$contact' where id=$id";
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

  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
      

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
            <form method="post" action="">
              <label for="">Name</label>
              <input type="text" class="form-control" 
              placeholder="Enter your name" name="name" 
              value=<?php echo $name;?> >
             <!-- <label for="">Last Name</label>
              <input type="text">
              <label for="">Birthday</label>
              <input type="date">-->
              <label for="">Contact No</label>
              <input type="number" class="form-control" 
              placeholder="Enter your number" name="contact"
              value=<?php echo $contact;?> >
              <label for="">Email</label>
              <input type="email"class="form-control" 
              placeholder="Enter your email" name="email"
              value=<?php echo $email;?> >
              <button name="submit">Update</button>
            </form>
            
    

        </div>
        <div>
        </div>
    </section>
  </div>
</body>

</html>