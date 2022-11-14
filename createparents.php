<?php

include 'connect.php';
session_start ();

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];

  //Generate key
  


  $sql="insert into `parents` (name,contact,email)
  values('$name','$contact','$email')"; 
  $result=mysqli_query($con,$sql); 
  if($result){
    //echo "Data inserted successfully";
    header('location:parents.php');
  }else{
    die(mysqli_error($con)); 
  }

}

if(isset($_POST['add'])){
  $name=$_POST['name'];
  $parentid=$_POST['parentid'];
  $birthday=$_POST['birthday'];
  $gender=$_POST['gender'];
  //$gender=$_POST['Female'];

  $sql="insert into `children` (name,parentid,birthday,gender)
  values('$name','$parentid','$birthday','$gender')"; 
  $result=mysqli_query($con,$sql); 
  if($result){
    echo "Data inserted successfully";
    
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
  <title>Create parents</title>
</head>

<body onload="document.form1.email.focus()">
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
          <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="immunisationschedule.php"> Immunisation Schedule</a>
          </h4>
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


        <div class="parent-ch">
          <div class="parents-info">
            <h3>Parents Information</h3>
            <form id="myform" name="form1" method="post" action="">
              <label for="">First Name</label>
              <input type="text" class="form-control" placeholder="Enter your First Name" name="name" required>
              <!--<label for="">Last Name</label>
              <input type="text" class="form-control" placeholder="Enter your Last Name" name="name" required>
              <label for="">Birthday</label>
              <input type="date">-->
              <label for="">Contact No</label>
              <input type="tel" id="myform_phone" placeholder="Enter your number" name="contact"
       pattern="[[0-9]{10}" 
       required>
              
              <label for="">Email</label>
              <input type="email"class="form-control" placeholder="Enter your email" name="email" onkeyup="return validateEmail()" required>
              <button name="submit" 
             >Add</button>
            </form>
            
          </div>
          <div class="childs-info">
            <h3>Add Children</h3>
            <form method='post' action="" name="form2">
              <label for="">Name</label>
              <input type="text" placeholder="Enter your name" name="name" >
              <label for="">ParentId</label>
              <input type="text" placeholder="Enter Parent Id" name="parentid">
              <label for="">Birthday</label>
              <input type="date"  name="birthday" id="dateControl">
              
              <label for="">Gender</label>
                <label for="">
                  Male
                  <input type="radio" name="gender" value="male" class="sd" >
                </label> 
                <label for="">
                  Female
                  <input type="radio" name="gender" value="female" >
                  </label> 
            

           
              <button name="add" >Add</button>
            </form>
            
          </div>
          </div>
          <div>
          <table>
            
              <caption><b>Children list</b></caption>
            <tr>
              <th>#</th>
              <th>NAME</th>
              <th>Birthday</th>
              <th>Gender</th>
              <th>ACTIONS</th>
            </tr>

            <?php

$sql="select *from `children`";
$result=mysqli_query($con,$sql);
if($result){

  while( $row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $birthday=$row['birthday'];
    $gender=$row['gender'];
    
    echo '
    <tr>
          <td>'.$id.'</td>
          <td>'.$name.'</td>
          <td>'.$birthday.'</td>
          <td>'.$gender.'</td>
          <td>
        
<button><a href="update.php?
updateid='.$id.'"><i class="fa fa-pencil"></i></a></button> 
<button><a href="delete.php?
deleteid='.$id.'"><i class="fa fa-trash-o"></i></a></button>  
</td>

        </tr>
          ';
  }
}
          ?>
        
          </table>
        </div>

        
        <div>
        </div>
    
  </div>

  <script src="validation.js"></script>
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
$('#dateControl').attr('max', maxDate);

});
</script>
</body>

</html>